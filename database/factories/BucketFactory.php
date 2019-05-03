<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Buckets\Bucket::class, function (Faker $faker) {
    return [
        'user_id'   => null,
        'product_id' => null,
        'parent_id' => null,
        'name'      => $faker->word,
        'min_score' => $faker->numberBetween(0, 99),
        'max_score' => $faker->numberBetween(99, 1000),
        'rating'    => $faker->randomElement(config('enums.bucket_rating')),
        'is_active' => 1,
    ];
});
