<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallCreditUserBAIsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("
            INSERT INTO `CallCreditUserBAIs` (`UID`, `BAIName`, `BAIAddress`, `BAIDOB`, `Court_Name`, `Case_Ref`, `Case_Year`, `Order_Date`, `Current_Status`, `Discharge_Date`, `Order_Type`, `Restriction_Type`, `Restriction_Start_Date`, `Restriction_End_Date`) VALUES
            (1, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410032', '2005', '2013-06-27', 'Active', '', 'Bankruptcy Order', '', '', ''),
            (2, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410031', '2005', '2012-09-27', 'Discharged or completed', '2013-08-27', 'Bankruptcy Order', '', '', ''),
            (2, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410021', '2005', '2012-02-27', 'Discharged or completed', '2013-03-27', 'Individual Voluntary Arrangement Made', '', '', ''),
            (3, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410028', '2005', '2010-06-27', 'Active', '', 'Estates Sequestrated', '', '', ''),
            (4, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410027', '2005', '2009-09-27', 'Discharged or completed', '2011-11-27', 'Estates Sequestrated', '', '', ''),
            (6, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410022', '2005', '2009-08-27', 'Active', '', 'Individual Voluntary Arrangement Made', '', '', ''),
            (5, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410024', '2005', '2009-03-27', 'Discharged or completed', '2010-09-27', 'Trust Deeds Granted', '', '', ''),
            (7, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410025', '2005', '2008-05-27', 'Active', '', 'Trust Deeds Granted', '', '', ''),
            (8, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410032', '2005', '2013-07-09', 'Active', '', 'Bankruptcy Order', '', '', ''),
            (8, 'MR JOHN FERRARI', '17 TOP GEAR LANE X9 9LF', '', 'TESTTOWN', '410031', '2005', '2012-10-09', 'Discharged or completed', '2013-09-09', 'Bankruptcy Order', '', '', '');
        ");
    }
}
