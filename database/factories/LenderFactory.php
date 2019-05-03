<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Users\Lender::class, function (Faker $faker) {
    return [
        'user_id'   => null,
        'name'      => $faker->company,
        'website'   => $faker->url,
        'contact_email' => $faker->companyEmail,
        'api_credentials' => '{}'
    ];
});
