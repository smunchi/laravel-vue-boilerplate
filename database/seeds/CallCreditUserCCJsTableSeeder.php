<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallCreditUserCCJsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `CallCreditUserCCJs` (`UID`, `CCJName`, `CCJAddress`, `CCJDOB`, `CourtName`, `CaseNumber`, `JudgementDate`, `JudgementAmount`, `CCJStatus`, `DateSatisfied`) VALUES
            (1, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840891', '2013-01-27', '544', 'Active', ''),
            (2, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840890', '2012-03-27', '61', 'Satisfied', '2013-12-27'),
            (3, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840891', '2013-02-09', '544', 'Active', ''),
            (5, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840890', '2012-04-09', '61', 'Satisfied', '2014-01-09'),
            (6, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840891', '2013-02-09', '544', 'Active', ''),
            (7, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840890', '2012-04-09', '61', 'Satisfied', '2014-01-09'),
            (8, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840891', '2013-02-09', '544', 'Active', ''),
            (9, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840890', '2012-04-09', '61', 'Satisfied', '2014-01-09'),
            (10, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840891', '2013-02-09', '544', 'Active', ''),
            (10, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', 'TEST 7840890', '2012-04-09', '61', 'Satisfied', '2014-01-09');
        ");
    }
}
