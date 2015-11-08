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

            //Sign up fields
            $table->increments('id');
            $table->string('username');
            $table->tinyInteger('role')->default(2); // 0 = admin; 1 = local; 2 = newcomer
            $table->string('email')->unique();
            $table->string('password', 60);

            //Profile fields
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->dateTime('birth_date')->nullable();
            $table->string('occupation')->nullable();
            $table->string('origin')->nullable();
            $table->smallInteger('location_id')->nullable();
            $table->text('story')->nullable();

            //Todo: FOLLOWERS INTEGRATION => many to many relation ??
//            $table->integer('user_id');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_follower', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');

            $table->integer('follower_id')->unsigned();
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');



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
        Schema::drop('user_follower');
    }
}
