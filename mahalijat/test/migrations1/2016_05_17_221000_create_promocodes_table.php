<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('promocodes.table', 'promocodes'), function (Blueprint $table) {
            $table->increments('id');

            $table->string('code', 32)->unique();
            $table->double('reward', 10, 2)->nullable();

            $table->text('data')->nullable();

            $table->boolean('is_disposable')->default(false);
            
            $table->boolean('first_use')->default(false);
       
            $table->string('expires_at')->nullable();
         
        
            // The human readable voucher code name
            $table->string( 'name' )->nullable( );
        
            // The description of the voucher - Not necessary 
            $table->text( 'description' )->nullable( );
        
            // The number of uses currently
            $table->integer( 'uses' )->unsigned()->deffault(0)->nullable( );
        
            // The max uses this voucher has
            $table->integer( 'max_uses' )->unsigned()->deffault(0)->nullable( );
        
            // How many times a user can use this voucher.
            $table->integer( 'max_uses_user' )->unsigned( )->deffault(0)->nullable( );
        
            // The type can be: voucher, discount, sale. What ever you want.
            $table->tinyInteger( 'type' )->unsigned( )->nullable( );
        
            // The amount to discount by (in pennies) in this example.
            $table->integer( 'discount_amount' )->nullable( );
        
            // Whether or not the voucher is a percentage or a fixed price. 
            $table->boolean( 'is_fixed' )->default( false );
            $table->integer( 'order_amount' )->nullable( );
            // When the voucher begins
            $table->datetime( 'starts_at' )->nullable( );
        
            // When the voucher ends

        });

        Schema::create(config('promocodes.relation_table', 'promocode_customer'), function (Blueprint $table) {
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('promocode_id');
            
            $table->timestamp('used_at');

            $table->primary(['customer_id', 'promocode_id']);

            // $table->foreign('customer_id')->references('id')->on('customers');
            // $table->foreign('promocode_id')->references('id')->on(config('promocodes.table', 'promocodes'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(config('promocodes.table', 'promocodes'));
        Schema::drop(config('promocodes.relation_table', 'promocode_customer'));
    }
}
