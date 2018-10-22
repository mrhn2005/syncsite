<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CutomerAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('customer_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('customer_id');
            $table->unsignedinteger('answer_id');
            $table->integer('choice');
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_answer');
    }
}
