<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postcode', 100);
            $table->string('house_name')->nullable();
            $table->string('house_no', 100)->nullable();
            $table->string('road_no', 100)->nullable();
            $table->string('road_name', 100)->nullable();
            $table->string('flat', 100)->nullable();
            $table->string('town', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->unsignedInteger('months_at_address'); // Only store month
            $table->string('county', 100)->nullable();
            $table->enum('type', config('enums.address_types'))->default('current');
            $table->enum('residence_status', config('enums.residence_statuses'));
            $table->string('addressable_type')->nullable();
            $table->unsignedInteger('addressable_id')->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
