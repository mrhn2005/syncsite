<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstanceChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_choise', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('choice_id');
            $table->unsignedinteger('instance_id');
            $table->timestamps();
            
            
            $table->foreign('choice_id')->references('id')->on('choices')->onDelete('cascade');
            $table->foreign('instance_id')->references('id')->on('instances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instance_choise');
    }
}
