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
            $table->string('origin')->nullable();
            $table->text('desc_short')->nullable();
            $table->text('desc')->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->integer('price_buy')->nullable();
            $table->integer('price_sell')->nullable();
            $table->integer('price_discount')->nullable();
            $table->float('score')->nullable();
            $table->string('image')->nullable();
            $table->integer('weight')->nullable();
            $table->string('weight_unit')->nullable();
            $table->tinyinteger('active_discount')->nullable();
            $table->tinyinteger('whole_sale_active')->default(0);
            $table->integer('whole_sale_quantity')->default(0);
            $table->integer('whole_sale_price')->default(0);
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('slug')->nullable();
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
