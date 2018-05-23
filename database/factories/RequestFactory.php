<?php

use Faker\Generator as Faker;

$factory->define(App\Request::class, function (Faker $faker) {
    return [
        'occupancy_type' => $faker->word,
        'institution'  => $faker->word,
        'level'   => $faker->randomNumber,
    ];
});
