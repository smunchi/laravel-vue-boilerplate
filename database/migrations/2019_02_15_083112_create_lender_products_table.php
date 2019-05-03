<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLenderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lender_products', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('min_loan', 10, 3);
            $table->decimal('max_loan', 10, 3);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('lender_id');
            $table->timestamps();
            $table->foreign('lender_id')->references('id')
                ->on('lenders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lender_products');
    }
}
