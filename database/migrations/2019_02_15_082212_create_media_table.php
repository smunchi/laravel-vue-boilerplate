<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', config('enums.media_types'))->nullable();
            $table->string('src');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('extension', 50)->nullable();
            $table->unsignedInteger('mediable_id')->nullable();
            $table->string('mediable_type')->nullable();
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
        Schema::dropIfExists('media');
    }
}
