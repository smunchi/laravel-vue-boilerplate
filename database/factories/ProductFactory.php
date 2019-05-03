<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Products\Product::class, function (Faker $faker) {
    return [
        'min_month' => $min = $faker->numberBetween(1, 6),
        'max_month' => $max = $faker->numberBetween(7, 13),
        'name' => "$min  - $max",
        'description' => null,
        'is_active' => 1,
    ];
});
