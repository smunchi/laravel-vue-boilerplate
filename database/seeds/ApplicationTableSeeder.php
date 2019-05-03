<?php

use App\Models\Users\Customer;
use Illuminate\Database\Seeder;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loanPurposes = factory(\App\Models\Configs\LoanPurpose::class, 10)->create();

        Customer::all()->each(function ($customer) use ($loanPurposes) {
            $application = $customer->applications()->save(
                factory(\App\Models\Applications\Application::class)->make([
                    'loan_purpose_id' => $loanPurposes->pluck('id')->random(1)->first()
                ])
            );
            // insert customer income expense info
            factory(\App\Models\Users\IncomeExpense::class)->create([
                'user_id' => $customer->user_id,
                'application_id' => $application->id
            ]);
            // insert customer Employment info
            factory(\App\Models\Users\Employment::class)->create([
                'user_id' => $customer->user_id
            ]);

            // insert customer Bank info
            factory(\App\Models\Users\Bank::class)->create([
                'user_id' => $customer->user_id
            ]);

            // insert customer Communication preference info
            factory(\App\Models\Users\CommsPreference::class)->create([
                'user_id' => $customer->user_id
            ]);
        });
    }
}
