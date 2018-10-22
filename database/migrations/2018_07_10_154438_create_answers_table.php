<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->unsignedinteger('question_id');
            $table->float('cold')->nullable();
            $table->float('wet')->nullable();
            $table->tinyinteger('balghami')->nullable();
            $table->tinyinteger('safravi')->nullable();
            $table->tinyinteger('damavi')->nullable();
            $table->tinyinteger('sodavi')->nullable();
            $table->timestamps();
            
            // $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
