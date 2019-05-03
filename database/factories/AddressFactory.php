<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Address::class, function (Faker $faker) {
    return [
        'postcode' => $faker->postcode,
        'house_name' => $faker->companyEmail,
        'house_no' => $faker->numberBetween(1, 1000),
        'road_no' => $faker->numberBetween(1, 10),
        'road_name' => ucfirst($faker->word).' Road',
        'flat' => $faker->numberBetween(1, 10),
        'town' => null,
        'city' => $faker->city,
        'months_at_address' => $faker->numberBetween(3, 100),
        'county' => null,
        'type' => $faker->randomElement(config('enums.address_types')),
        'residence_status' => $faker->randomElement(config('enums.residence_statuses')),
        'addressable_type' => null,
        'addressable_id' => null,
    ];
});
