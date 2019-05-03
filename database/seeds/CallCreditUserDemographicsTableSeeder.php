<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallCreditUserDemographicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `CallCreditUserDemographics` (`UID`, `cameouk`, `cameoincome`, `cameoinvestor`, `cameoproperty`, `cameofing`, `ctaxband`, `priceindex`) VALUES
            (1, '02C', '31', '31', '07', '3', 'G', '7536'),
            (2, '04E', '33', '33', '08', '3', 'G', '8065'),
            (3, '04E', '33', '33', '08', '3', 'G', '8065'),
            (4, '04E', '33', '33', '08', '3', 'G', '8065'),
            (5, '04E', '33', '33', '08', '3', 'G', '8065'),
            (6, '04E', '33', '33', '08', '3', 'G', '8065'),
            (7, '04E', '33', '33', '08', '3', 'G', '8065'),
            (8, '04E', '33', '33', '08', '3', 'G', '8065'),
            (10, '04E', '33', '33', '08', '3', 'G', '8065'),
            (9, '04E', '33', '33', '08', '3', 'G', '8065');        
        ");
    }
}
