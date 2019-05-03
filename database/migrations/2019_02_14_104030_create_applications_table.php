<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('loan_purpose_id');
            $table->decimal('loan_amount', 10, 3)->nullable()->comment('How much loan was taken');
            $table->string('ipv4', 100)->nullable();
            $table->enum('status', config('enums.application_status'))->nullable();
            $table->text('status_reason')->nullable();
            $table->string('loan_term', 100)->nullable();

            $table->timestamps();

            $table->foreign('customer_id')->references('id')
                ->on('customers')->onDelete('cascade');
            $table->foreign('loan_purpose_id')->references('id')
                ->on('loan_purposes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applications');
    }
}
