<?php

use App\Actor;
use Faker\Generator as Faker;

$factory->define(Actor::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'born_date' => $faker->dateTimeBetween('-60 years', 'now'),
        'nationality' => $faker->country,
    ];
});
