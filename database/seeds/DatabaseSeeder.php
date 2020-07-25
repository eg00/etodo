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
        $managers = $this->createUsers(10);

        // user seed
        foreach ($managers->pluck('id') as $manager_id) {
            $this->createUsers(10, $manager_id);
        }
    }

    /**
     * @return Collection|Model|mixed
     * @throws Exception
     */
    private function createUsers($amount, $manager = null): Collection
    {

        return factory(User::class, $amount)
            ->create(['manager_id' => $manager])->each(function ($user) {
                factory(\App\Task::class, random_int(2, 10))->create([
                    'manager_id' => $user->manager_id,
                    'user_id' => $user->id,

                ]);
            });
    }
}
