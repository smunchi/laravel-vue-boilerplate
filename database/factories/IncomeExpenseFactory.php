<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Users\IncomeExpense::class, function (Faker $faker) {
    return [
        'net_monthly_income' => $faker->numberBetween(3000, 8000),
        'monthly_mortgage' => $faker->numberBetween(100, 300),
        'monthly_credit_commitment' => $faker->numberBetween(0, 200),
        'other_monthly_expense' => $faker->numberBetween(0, 600),
        'gross_monthly_income' => $faker->numberBetween(4000, 12000),
        'gross_yearly_income' => $faker->numberBetween(24000, 100000),
        'user_id' => null,
        'application_id' => null,
    ];
});
