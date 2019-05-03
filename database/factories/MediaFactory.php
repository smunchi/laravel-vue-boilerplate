<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Media::class, function (Faker $faker) {
    return [
        'type' => 'image',
        'src' => $faker->imageUrl(),
        'title' => null,
        'description' => null,
        'extension' => null,
        'mediable_id' => null,
        'mediable_type' => null,
    ];
});
