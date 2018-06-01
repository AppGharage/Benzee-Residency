<?php

use Faker\Generator as Faker;

$factory->define(BenZee\Request::class, function (Faker $faker) {
    $occupancyType = [
            "Single Room",
            "Double Room",
            "Single Room with AirCondition",
            "Double Room with AirCondition",
            "Special Room"
        ];

    $institution = [
        "Knutsford Univeristy College",
        "Univeristy of Ghana",
        "Lancaster Univeristy",
        "Islamic University"
    ];

    $level = [
        "1st year",
        "2nd year",
        "3rd year",
        "4th year"
    ];

    $duration = [
        "9 months",
        "12 months"
    ];

    return [
        'occupancy_type' => $occupancyType[array_rand($occupancyType)],
        'institution'  => $institution[array_rand($institution)],
        'duration'  => $duration[array_rand($duration)],
        'level'   => $level[array_rand($level)]
    ];
});
