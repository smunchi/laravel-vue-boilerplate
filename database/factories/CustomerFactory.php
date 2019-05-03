<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Users\Customer::class, function (Faker $faker) {
    return [
        'user_id' => null,
        'title' => $faker->title,
        'first_name' => $faker->firstName,
        'middle_name' => null,
        'last_name' => $faker->lastName,
        'total_dependent' => $faker->numberBetween(0, 3),
        'dob' => now()->subYear($faker->numberBetween(18, 36)),
        'gender' => $faker->randomElement(config('enums.gender')),
        'hear_from' => null,
        'months_as_self_employed' => null,
    ];
});
