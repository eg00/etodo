<?php

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // managers seed
        $managers = $this->createUsers(10, 1);

        // user seed
        foreach ($managers->pluck('id') as $manager_id) {
            $this->createUsers(random_int(1, 10), 3, $manager_id);
        }
    }

    /**
     * @return Collection|Model|mixed
     * @throws Exception
     */
    private function createUsers($amount, $nested = 3, $manager = null): Collection
    {

        $users  = factory(User::class, $amount)
            ->create(['manager_id' => $manager])->each(function ($user) {
                factory(\App\Task::class, random_int(2, 10))->create([
                    'manager_id' => $user->manager_id,
                    'user_id' => $user->id,
                ]);
            });
        for ($i = $nested; $i >= 1; $i--) {
            foreach ($users->pluck('id') as $user_id) {
                $this->createUsers(random_int(1, 3), 0, $user_id);
            }
        }

        return $users;
    }
}
