<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Players extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['simple', 'bronze', 'silver', 'gold', 'platinum'])->default('simple');
            $table->boolean('rating')->default(true);
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('real_name');
            $table->string('img_path');
            $table->text('info');
            $table->integer('games_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('players');
    }
}
