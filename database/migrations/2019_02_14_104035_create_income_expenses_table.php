<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('net_monthly_income', 10, 3);
            $table->decimal('monthly_mortgage', 10, 3);
            $table->decimal('monthly_credit_commitment', 10, 3);
            $table->decimal('other_monthly_expense', 10, 3);
            $table->decimal('gross_monthly_income', 10, 3);
            $table->decimal('gross_yearly_income', 10, 3);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('application_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')
                    ->on('users')->onDelete('cascade');
            $table->foreign('application_id')->references('id')
                    ->on('applications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income_expenses');
    }
}
