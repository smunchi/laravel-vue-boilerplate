<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBucketRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bucket_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_name');
            $table->enum('operator', config('enums.bucket_rule_operator'))->nullable();
            $table->string('value', 100);
            $table->unsignedInteger('order')->nullable();
            $table->unsignedInteger('bucket_id')->index();
            $table->foreign('bucket_id')->references('id')
                ->on('buckets')->onDelete('cascade');
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
        Schema::dropIfExists('bucket_rules');
    }
}
