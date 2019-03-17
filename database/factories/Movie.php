<?php

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'release' => $faker->numberBetween(1990, 2019),
        'gender' => $faker->randomElement(['action', 'comedy', 'horror']),
        'length' => $faker->numberBetween(1,3),
        'path' => $faker->word,
    ];
});
