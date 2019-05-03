<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCallCreditUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::insert(
            DB::raw("CREATE TABLE `CallCreditUserDetails` (
            `MainID` int(10) AUTO_INCREMENT PRIMARY KEY,
            `UID` int(10),
            `RequestDate` varchar(20),
            `reporttype` varchar(15),
            `totalactiveshareaccs_excl_tel` varchar(128),
            `actsharegreaterthan6mnths_excl_tel` varchar(56),
            `percentactgreat6mthovertotal_excl_tel` varchar(56),
            `actsharegreaterthan12mnths_excl_tel` varchar(56),
            `percentactgreat12mthovertotal_excl_tel` varchar(56),
            `autosearchmaxexceeded` varchar(128),
            `ageflag` varchar(128),
            `totalsearches3months` varchar(128),
            `totalsearches12months` varchar(128),
            `totalhomecreditsearches3months` varchar(128),
            `totaldischargedbais` varchar(128),
            `currentlyinsolvent` varchar(128),
            `restricted` varchar(128),
            `totalactiveccjs` varchar(128),
            `totalsatisfiedccjs` varchar(128),
            `totalccjamount` varchar(128),
            `nocflag` varchar(128),
            `totaldisputes` varchar(128),
            `totalundecaddresses` varchar(128),
            `totalundecaddressessearched` varchar(128),
            `totalundecaddressesunsearched` varchar(128),
            `totalundecaliases` varchar(128),
            `totalundecassociates` varchar(128),
            `totalcifas` varchar(128),
            `totalshareaccounts` varchar(128),
            `totalactiveshareaccs` varchar(128),
            `totalsettledshareaccs` varchar(128),
            `totalopened6months` varchar(128),
            `worsepaystatus12months` varchar(128),
            `worsepaystatus36months` varchar(128),
            `totaldelinqs12months` varchar(128),
            `totaldefaults12months` varchar(128),
            `totaldefaults36months` varchar(128),
            `totalminpayments12months` varchar(128),
            `totalminpayments36months` varchar(128),
            `totalvaluecashadvances12months` varchar(128),
            `totalvaluecashadvances36months` varchar(128),
            `impairedcredit` varchar(128),
            `ichsecured` varchar(128),
            `ichunsecured` varchar(128),
            `ichccj` varchar(128),
            `ichiva` varchar(128),
            `ichboss` varchar(128),
            `totalbalances` varchar(128),
            `balancelimitratio` varchar(128),
            `totalbalancesloans` varchar(128),
            `totalbalancesmortgages` varchar(128),
            `alertdecision` varchar(128),
            `alertreview` varchar(128),
            `hho` varchar(128),
            `pafvalid` varchar(128),
            `rollingroll` varchar(128),
            `current` varchar(128),
            `id` varchar(128),
            `abodeno` varchar(128),
            `buildingno` varchar(128),
            `buildingname` varchar(128),
            `street1` varchar(128),
            `street2` varchar(128),
            `sublocality` varchar(128),
            `locality` varchar(128),
            `posttown` varchar(128),
            `postcode` varchar(128),
            `undeclaredaddresstype` varchar(128),
            `messagecode` varchar(128),
            `score` varchar(128),
            `totalsharegreaterthan6mnths` int(4) DEFAULT NULL,
            `totalsharegreaterthan6mnths_excl_tel` int(4) DEFAULT NULL,
            `currently_default_in_payday` varchar(128) DEFAULT NULL,
            `max_arrears_in_mortgage_hp` varchar(128) DEFAULT NULL,
            `max_ccj_amount_in_12_months` varchar(128) DEFAULT NULL,
            `max_ccj_amount_in_36_months` varchar(128) DEFAULT NULL,
            `propensity_to_default` varchar(128) DEFAULT NULL,
            `propensity_to_repay_after_default` varchar(128) DEFAULT NULL,
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
        Schema::drop("CallCreditUserDetails");
    }
}
