<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'content' => $faker->text(15),
        'finished' => ($faker->randomDigit()%2),
        'user_id' => $faker->numberBetween(1, 10)
    ];
});
