<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Games extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['simple', 'raiting'])->default('simple');
            $table->enum('status', ['preparation', 'in_progress', 'ended'])->default('preparation');
            $table->enum('result', ['none', 'red_win', 'black_win_3_3', 'black_win_2_2', 'black_win_1_1'])->default('none');
            $table->integer('current_circle');
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('games');
    }
}
