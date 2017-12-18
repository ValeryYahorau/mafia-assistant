<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GamePlayers extends Migration
{
    public function up()
    {
        Schema::create('gameplayers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('game_id')->unsigned()->default(0);
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->integer('player_id')->unsigned()->default(0);
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');

            $table->enum('role', ['red', 'sheriff', 'black', 'don', 'none'])->default('none');
            $table->enum('result', ['win', 'lose', 'draw', 'none'])->default('none');
            $table->integer('points')->default(0);
            $table->integer('additional_points')->default(0);
            $table->integer('position')->default(0);
        });
    }

    public function down()
    {
        Schema::drop('gameplayers');
    }
}
