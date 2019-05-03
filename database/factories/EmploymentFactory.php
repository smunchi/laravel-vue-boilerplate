<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Users\Employment::class, function (Faker $faker) {
    return [
        'user_id' => null,
        'employer_name' => $faker->company,
        'salary' => $faker->numberBetween(4000, 10000),
        'job_title' => $faker->jobTitle,
        'payment_method' => $faker->randomElement(config('enums.payment_method')),
        'payment_frequency' => $faker->randomElement(config('enums.payment_frequency')),
    ];
});
