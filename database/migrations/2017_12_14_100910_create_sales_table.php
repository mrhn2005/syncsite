<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->integer('quantity');
            $table->integer('discount');
            $table->string('price');
            $table->string('price_buy')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_weight_unit')->nullable();
            $table->string('product_weight')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
