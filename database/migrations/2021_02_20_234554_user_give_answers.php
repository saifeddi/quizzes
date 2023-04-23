<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserGiveAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('user_give_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('give_answer');
            $table->unsignedBigInteger('user_answer_id');
            $table->foreign('user_answer_id')->references('id')->on('user_answers')->onDelete('cascade');

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
                Schema::dropIfExists('user_give_answers');

    }
}
