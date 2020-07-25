<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'text' => $faker->text,
        'priority' => $faker->randomElement(['high', 'middle', 'low']),
        'status' => $faker->randomElement(['new', 'in_progress','canceled']),
        'finish_at' => $faker->dateTimeBetween('- 1 days', '+ 1 days'),
    ];
});
