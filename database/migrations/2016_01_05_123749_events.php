<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('short_title_en');
            $table->string('short_title_ru');
            $table->string('short_desc_en');
            $table->string('short_desc_ru');            
            $table->string('title_en');
            $table->string('title_ru');
            $table->text('body_en');
            $table->text('body_ru');            
            $table->date('date')->unique();; 
            $table->string('img_path');            
            $table->string('slug')->unique();
            $table->timestamps();
            $table->string('button');
            $table->boolean('line')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
