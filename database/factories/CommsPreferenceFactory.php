<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Users\CommsPreference::class, function (Faker $faker) {
    return [
        'user_id'   => null,
        'by_email'  => $faker->numberBetween(0, 1),
        'by_sms'    => $faker->numberBetween(0, 1),
        'by_phone'  => $faker->numberBetween(0, 1)
    ];
});
