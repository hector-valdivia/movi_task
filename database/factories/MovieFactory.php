<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'year' => $faker->year,
        'genre_id' => factory(\App\Genre::class)->create()->id,
    ];
});
