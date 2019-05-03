<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCallCreditUserDemographicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallCreditUserDemographics', function (Blueprint $table) {
            $table->increments("ID");
            $table->integer("UID")->index();
            $table->string("cameouk", 256);
            $table->string("cameoincome", 256);
            $table->string("cameoinvestor", 256);
            $table->string("cameoproperty", 256);
            $table->string("cameofing", 256);
            $table->string("ctaxband", 256);
            $table->string("priceindex", 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("CallCreditUserDemographics");
    }
}
