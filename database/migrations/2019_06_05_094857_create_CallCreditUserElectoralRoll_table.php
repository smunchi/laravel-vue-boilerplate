<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCallCreditUserElectoralRollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallCreditUserElectoralRoll', function (Blueprint $table) {
            $table->increments("ID");
            $table->integer("PID");
            $table->integer("UID")->index();
            $table->integer("PAFValid")->length(2);
            $table->string("ResidentName");
            $table->string("ERHistory_StartDate");
            $table->string("ERHistory_EndDate");
            $table->integer("ERHistory_OptOut")->length(2);
            $table->integer("ERHistory_RollingRoll")->length(2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("CallCreditUserElectoralRoll");
    }
}
