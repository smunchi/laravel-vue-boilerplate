<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    private $row = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedLenders();
        $this->seedCustomers();
        $this->seedAdminUsers();
    }

    private function seedLenders()
    {
        foreach (range(0, $this->row) as $row) {
            $email = $row == 0 ? 'lender@example.com' : "lender{$row}@example.com";
            $user = factory(\App\Models\Users\User::class)
                    ->create(compact('email'));

            $user->lender()->save(
                factory(\App\Models\Users\Lender::class)->make()
            );
            $user->addresses()->save(
                factory(\App\Models\Address::class)->make()
            );
            $user->assignRole('lender');
        }
    }

    private function seedCustomers()
    {
        foreach (range(0, $this->row) as $row) {
            $email = $row == 0 ? 'customer@example.com' : "customer{$row}@example.com";
            $user = factory(\App\Models\Users\User::class)
                    ->create(compact('email'));

            $user->customer()->save(
                factory(\App\Models\Users\Customer::class)->make()
            );
            $user->addresses()->save(
                factory(\App\Models\Address::class)->make()
            );
            foreach (range(0, 2) as $value) {
                $user->contacts()->save(
                    factory(\App\Models\Contact::class)->make()
                );
            }
            $user->assignRole('customer');
        }
    }

    private function seedAdminUsers()
    {
        factory(\App\Models\Users\User::class)->create(['email' => 'root@example.com'])->assignRole('root');
        factory(\App\Models\Users\User::class)->create(['email' => 'admin@example.com'])->assignRole('admin');
    }
}
