<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Configs\LoanPurpose::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->randomElement(config('enums.loan_purposes_name')),
        'description' => $name,
        'slug' => str_slug($name),
    ];
});
