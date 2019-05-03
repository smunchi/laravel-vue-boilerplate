<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateCallCreditUserAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallCreditUserAddresses', function (Blueprint $table) {
            $table->increments("ID");
            $table->integer("UID")->index();
            $table->string("Type", 10);
            $table->string("Address", 392);
            $table->string("MatchLevel", 56);
            $table->string("Source", 56);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("CallCreditUserAddresses");
    }
}
