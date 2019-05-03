<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleAndPermissionTableSeeder::class);
        $this->call(UserRoleAndPermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(LenderProductTableSeeder::class);
        $this->call(BucketTableSeeder::class);
        $this->call(ApplicationTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->seedCallCreditData();
        $this->displayUserCredentials();
    }

    private function seedCallCreditData()
    {
        $this->call(CallCreditAPIFieldsSeeder::class);
        $this->call(CallCreditPicklistTableSeeder::class);
        $this->call(CallCreditUserAddressesTableSeeder::class);
        $this->call(CallCreditUserBAIsTableSeeder::class);
        $this->call(CallCreditUserCCJsTableSeeder::class);
        $this->call(CallCreditUserDemographicsTableSeeder::class);
        $this->call(CallCreditUserDetailsTableSeeder::class);
        $this->call(CallCreditUserElectoralRollTableSeeder::class);
        $this->call(CallCreditUserSharesTableSeeder::class);
    }

    private function displayUserCredentials()
    {
        if (!app()->isLocal()) {
            return;
        }

        $this->command->warn('---------User Credentials(DEV)-----------');
        foreach (\App\Models\Users\User::all() as $user) {
            $this->command->info($user->email . '/secret');
        }
        $this->command->warn('-----------------------------------------');
    }
}
