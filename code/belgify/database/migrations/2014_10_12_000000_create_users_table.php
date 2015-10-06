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
            $table->string('username');
            $table->tinyInteger('role'); // 0 = local; 1 = new local;
            $table->string('email')->unique();
            $table->string('password', 60);

            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->string('origin')->nullable();
            $table->string('location')->nullable();
            $table->text('story')->nullable();

            //Todo: FOLLOWERS INTEGRATION => many to many relation ??
//            $table->integer('user_id');

//            Schema::create('user_user', function(Blueprint $table)
//            {
//                $table->increments('id');
//                $table->integer('user_id')->unsigned();
//                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
//
//                $table->integer('user_id')->unsigned();
//                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
//
//                $table->timestamps();
//            });

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
