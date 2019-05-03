<?php

use Illuminate\Database\Seeder;

class LenderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lenders = \App\Models\Users\Lender::all();
        $products = \App\Models\Products\Product::all();

        $lenders->each(function ($lender) use ($products) {
            $lender->products()->attach(
                $products->random(rand(2, 6))->pluck('id'),
                [
                    'min_loan' => rand(10, 99),
                    'max_loan' => rand(100, 10000)
                ]
            );
        });
    }
}
