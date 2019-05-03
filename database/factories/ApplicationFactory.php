<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Applications\Application::class, function (Faker $faker) {
    return [
        'customer_id' => null,
        'loan_purpose_id' => null,
        'loan_amount' => $faker->numberBetween(100, 10000),
        'ipv4' => $faker->ipv4,
        'status' => $faker->randomElement(config('enums.application_status')),
        'status_reason' => null,
        'loan_term' => $faker->numberBetween(1, 24),
    ];
});
