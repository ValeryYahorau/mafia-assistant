<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Photoreports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoreports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_en');
            $table->string('title_ru');
            $table->date('date')->unique(); 
            $table->string('img_path');            
            $table->string('slug')->unique();
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
        Schema::drop('photoreports');
    }
}
