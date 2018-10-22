<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahalisazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahalisazs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('price')->nullable();
            $table->string('weight')->nullable();
            $table->text('biography')->nullable();
            $table->text('spec')->nullable();
            $table->text('property')->nullable();
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
        Schema::dropIfExists('mahalisazs');
    }
}
