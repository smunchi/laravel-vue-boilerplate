<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class CreateCallCreditPicklistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallCreditPicklist', function (Blueprint $table) {
            $table->increments("ID");
            $table->integer("UID")->index();
            $table->string("Date", 20);
            $table->text("SerializedPicklist");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CallCreditPicklist');
    }
}
