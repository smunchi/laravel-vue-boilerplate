<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Products\LenderProduct::class, function (Faker $faker) {
    return [
        'min_loan' => $faker->numberBetween(99, 1000),
        'max_loan' => $faker->numberBetween(300, 3000),
        'product_id' => null,
        'lender_id'  => null,
    ];
});
