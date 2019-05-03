<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateCallCreditUserBAIsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallCreditUserBAIs', function (Blueprint $table) {
            $table->increments("ID");
            $table->integer("UID")->index();
            $table->string("BAIName", 128);
            $table->string("BAIAddress", 128);
            $table->string("BAIDOB", 15);
            $table->string("Court_Name", 56);
            $table->string("Case_Ref", 56);
            $table->string("Case_Year", 56);
            $table->string("Order_Date", 15);
            $table->string("Current_Status", 56);
            $table->string("Discharge_Date", 15);
            $table->string("Order_Type", 56);
            $table->string("Restriction_Type", 56);
            $table->string("Restriction_Start_Date", 15);
            $table->string("Restriction_End_Date", 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("CallCreditUserBAIs");
    }
}
