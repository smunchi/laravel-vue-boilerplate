<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCallCreditUserSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::insert(
            DB::raw("CREATE TABLE `CallCreditUserShares` (
                `ID` int(15) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `UID` int(15) NOT NULL,
                `Supplier_Type` varchar(56) NOT NULL,
                `Account_Type` varchar(56) NOT NULL,
                `Name` varchar(128) NOT NULL,
                `Address` varchar(256) NOT NULL,
                `DOB` varchar(28) NOT NULL,
                `Account_Start_Date` varchar(28) NOT NULL,
                `Opening_Balance` varchar(56) NOT NULL,
                `Latest_Balance` varchar(56) NOT NULL,
                `Regular_Payment_Amount` varchar(56) NOT NULL,
                `Current_Status` varchar(56) NOT NULL,
                `Account_End_Date` varchar(28) NOT NULL,
                `account_limit` varchar (255),
                `count_vt` integer,
                `count_rp` integer,
                `count_st_sf_on_over_499_12m_older` integer,
                `count_st_sf_on_over_499` integer,
                `count_over_99_payment` integer,
                `PS1` varchar(4) NOT NULL,
                `PS2` varchar(4) NOT NULL,
                `PS3` varchar(4) NOT NULL,
                `PS4` varchar(4) NOT NULL,
                `PS5` varchar(4) NOT NULL,
                `PS6` varchar(4) NOT NULL,
                `PS7` varchar(4) NOT NULL,
                `PS8` varchar(4) NOT NULL,
                `PS9` varchar(4) NOT NULL,
                `PS10` varchar(4) NOT NULL,
                `PS11` varchar(4) NOT NULL,
                `PS12` varchar(4) NOT NULL,
                `PS13` varchar(4) NOT NULL,
                `PS14` varchar(4) NOT NULL,
                `PS15` varchar(4) NOT NULL,
                `PS16` varchar(4) NOT NULL,
                `PS17` varchar(4) NOT NULL,
                `PS18` varchar(4) NOT NULL,
                `PS19` varchar(4) NOT NULL,
                `PS20` varchar(4) NOT NULL,
                `PS21` varchar(4) NOT NULL,
                `PS22` varchar(4) NOT NULL,
                `PS23` varchar(4) NOT NULL,
                `PS24` varchar(4) NOT NULL,
                `AS1` varchar(5) NOT NULL,
                `AS2` varchar(5) NOT NULL,
                `AS3` varchar(5) NOT NULL,
                `AS4` varchar(5) NOT NULL,
                `AS5` varchar(5) NOT NULL,
                `AS6` varchar(5) NOT NULL,
                `AS7` varchar(5) NOT NULL,
                `AS8` varchar(5) NOT NULL,
                `AS9` varchar(5) NOT NULL,
                `AS10` varchar(5) NOT NULL,
                `AS11` varchar(5) NOT NULL,
                `AS12` varchar(5) NOT NULL,
                `AS13` varchar(5) NOT NULL,
                `AS14` varchar(5) NOT NULL,
                `AS15` varchar(5) NOT NULL,
                `AS16` varchar(5) NOT NULL,
                `AS17` varchar(5) NOT NULL,
                `AS18` varchar(5) NOT NULL,
                `AS19` varchar(5) NOT NULL,
                `AS20` varchar(5) NOT NULL,
                `AS21` varchar(5) NOT NULL,
                `AS22` varchar(5) NOT NULL,
                `AS23` varchar(5) NOT NULL,
                `AS24` varchar(5) NOT NULL,
                `Date1` varchar(15) NOT NULL,
                `Date2` varchar(15) NOT NULL,
                `Date3` varchar(15) NOT NULL,
                `Date4` varchar(15) NOT NULL,
                `Date5` varchar(15) NOT NULL,
                `Date6` varchar(15) NOT NULL,
                `Date7` varchar(15) NOT NULL,
                `Date8` varchar(15) NOT NULL,
                `CB1` varchar(16) NOT NULL,
                `CB2` varchar(16) NOT NULL,
                `CB3` varchar(16) NOT NULL,
                `CB4` varchar(16) NOT NULL,
                `CB5` varchar(16) NOT NULL,
                `CB6` varchar(16) NOT NULL,
                `CB7` varchar(16) NOT NULL,
                `CB8` varchar(16) NOT NULL,
                `L1` varchar(16) NOT NULL,
                `L2` varchar(16) NOT NULL,
                `L3` varchar(16) NOT NULL,
                `L4` varchar(16) NOT NULL,
                `L5` varchar(16) NOT NULL,
                `L6` varchar(16) NOT NULL,
                `L7` varchar(16) NOT NULL,
                `L8` varchar(16) NOT NULL,
                `ASLatestType` varchar(128) NOT NULL,
                `ASLatestTypeRedOveride` varchar(128) NOT NULL,
                `ASLatestTypeAAOveride` varchar(128) NOT NULL,
                `ASLatestTypeAARedOveride` varchar(128) NOT NULL,
                `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
                `updated_at` timestamp DEFAULT CURRENT_TIMESTAMP 
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;")
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("CallCreditUserShares");
    }
}
