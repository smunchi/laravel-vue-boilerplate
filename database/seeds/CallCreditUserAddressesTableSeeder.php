<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallCreditUserAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert(
            "INSERT INTO `CallCreditUserAddresses` (`UID`, `Type`, `Address`, `MatchLevel`, `Source`) VALUES
            (1, 'C', '1, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Electoral Roll'),
            (2, 'C', '1, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Electoral Roll'),
            (3, 'C', '12, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Credit Data'),
            (4, 'C', '12, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Credit Data'),
            (5, 'C', '12, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Credit Data'),
            (6, 'C', '12, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Credit Data'),
            (7, 'C', '12, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Credit Data'),
            (8, 'C', '12, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Credit Data'),
            (9, 'C', '17, TOP GEAR LANE, TEST TOWN, X9 9LF', 'Individual', 'Electoral Roll'),
            (10, 'C', '1, MONOPOLY CLOSE, TEST TOWN, X9 8HJ', 'Individual', 'Electoral Roll');"
        );
    }
}
