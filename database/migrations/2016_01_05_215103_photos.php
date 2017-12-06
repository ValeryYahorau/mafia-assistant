<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Photos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function(Blueprint $table)
        {
            $table->increments('id');
            $table -> integer('photoreport_id') -> unsigned() -> default(0);
            $table->foreign('photoreport_id')
              ->references('id')->on('photoreports')
              ->onDelete('cascade');
            $table->string('img_l_path');
            $table->string('img_s_path');
            $table->integer('position'); 
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
        Schema::drop('photos');
    }
}
