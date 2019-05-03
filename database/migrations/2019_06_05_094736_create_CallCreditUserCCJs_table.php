<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateCallCreditUserCCJsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallCreditUserCCJs', function (Blueprint $table) {
            $table->increments("ID");
            $table->integer("UID")->index();
            $table->string("CCJName", 56);
            $table->string("CCJAddress", 128);
            $table->string("CCJDOB", 15);
            $table->string("CourtName", 56);
            $table->string("CaseNumber", 56);
            $table->string("JudgementDate", 15);
            $table->string("JudgementAmount", 56);
            $table->string("CCJStatus", 128);
            $table->string("DateSatisfied", 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("CallCreditUserCCJs");
    }
}
