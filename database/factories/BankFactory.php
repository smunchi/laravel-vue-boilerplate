<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Users\Bank::class, function (Faker $faker) {
    return [
        'account_no' => $faker->bankAccountNumber,
        'sort_code' => $faker->numerify('######'),
        'primary_debit_card_type' => $faker->randomElement(config('enums.primary_debit_card_types')),
        'months_at_bank' => $faker->numberBetween(1, 100),
        'user_id' => null,
    ];
});
