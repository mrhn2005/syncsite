<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
                $table->bigIncrements( 'id' );
    
                // The voucher code
                $table->string( 'code' )->nullable( );
            
                // The human readable voucher code name
                $table->string( 'name' )->nullable( );
            
                // The description of the voucher - Not necessary 
                $table->text( 'description' )->nullable( );
            
                // The number of uses currently
                $table->integer( 'uses' )->unsigned( )->nullable( );
            
                // The max uses this voucher has
                $table->integer( 'max_uses' )->unsigned()->nullable( );
            
                // How many times a user can use this voucher.
                $table->integer( 'max_uses_user' )->unsigned( )->nullable( );
            
                // The type can be: voucher, discount, sale. What ever you want.
                $table->tinyInteger( 'type' )->unsigned( )->nullable( );
            
                // The amount to discount by (in pennies) in this example.
                $table->integer( 'discount_amount' );
            
                // Whether or not the voucher is a percentage or a fixed price. 
                $table->boolean( 'is_fixed' )->default( false );
                $table->integer( 'order_amount' );
                // When the voucher begins
                $table->datetime( 'starts_at' );
            
                // When the voucher ends
                $table->datetime( 'expires_at' );
            
                // You know what this is...
                $table->timestamps( );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
