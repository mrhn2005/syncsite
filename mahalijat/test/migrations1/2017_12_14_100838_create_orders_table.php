<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->integer('address_id')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment')->nullable();
            $table->string('delivery_price')->default('0');
            $table->string('total_price')->nullable();
            $table->string('discount')->default(0);
            $table->string('promocode')->nullable();
            $table->text('description')->nullable();
            $table->tinyinteger('delivered')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
