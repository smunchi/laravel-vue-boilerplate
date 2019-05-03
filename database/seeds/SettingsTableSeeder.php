<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingGroups = [
            'dummy' => [
                'is_credit_profile_dummy' => 1,
            ],
            'expiry' => [
                'credit_profile_valid_days' => 30,
            ],
            'other' => [],
        ];
        foreach ($settingGroups as $group => $settings) {
            foreach ($settings as $name => $value) {
                \App\Models\Configs\Setting::create(compact('name', 'value', 'group'));
            }
        }
    }
}
