<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('short_desc');
            $table->text('body');
            $table->string('img_path');            
            $table->string('slug')->unique();
            $table->timestamps();
            $table->integer('position');
            $table->integer('category_id')->unsigned()->default(0);
            $table->foreign('category_id')
              ->references('id')->on('category')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item');
    }
}
