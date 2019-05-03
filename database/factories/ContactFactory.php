<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Contact::class, function (Faker $faker) {
    return [
        'country_code' => '+44',
        'number' => $faker->numerify('7########'),
        'type' => $faker->randomElement(config('enums.contact_types')),
        'contactable_type' => null,
        'contactable_id' => null,
        'verified_at' => now(),
    ];
});
