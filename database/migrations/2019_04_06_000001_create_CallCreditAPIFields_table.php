<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCallCreditAPIFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CallCreditAPIFields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FieldNames')->index();
            $table->string('Description');
            $table->string('Type');
            $table->string('related_table')->nullable()->default('');
            $table->string('rule_type', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('CallCreditAPIFields');
    }
}
