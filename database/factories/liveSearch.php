<?php

use Faker\Generator as Faker;

$factory->define(App\LiveSearch::class, function (Faker $faker) {
    return [
        'identity' => $faker->randomDigit,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber, 
    ];
});
