<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Properties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {        
            $table->increments('id');
            $table->string('key');
            $table->string('value');                    
            $table->string('locale'); 
            $table->string('description'); 
        });

        DB::table('properties')->insert(
            array(
                array(
                    'key' => 'rating_games_min',
                    'value' => '20',
                    'description' => 'Min count of games to become rating player'
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('properties');
    }
}
