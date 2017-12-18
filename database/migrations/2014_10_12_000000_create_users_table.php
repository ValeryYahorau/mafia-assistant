<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role',['admin','user'])->default('user');
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('users')->insert(
            array(
                array(
                    'name' => 'admin1',
                    'email' => 'admin1@admin1.com',
                    'role' => 'admin',
                    'password' => '$2y$10$MQBUQ3dWqXTHoW7DHXnKLOTAss1S/T59nThRPbQEsqt0y5BPu8Y0O',
                    'created_at' => '2016-07-09 23:25:20',
                    'updated_at' => '2016-07-09 23:25:20',
                    'role' => 'admin'
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
        Schema::drop('users');
    }
}
