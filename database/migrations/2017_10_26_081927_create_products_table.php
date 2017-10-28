<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('origin');
            $table->text('desc_short');
            $table->text('desc');
            $table->integer('quantity');
            $table->integer('price_buy');
            $table->integer('price_sell');
            $table->integer('price_discount');
            $table->float('score');
            $table->string('image');
            $table->tinyinteger('active_discount');
            $table->integer('category_id')->unsigned();
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
        Schema::dropIfExists('products');
    }
}
