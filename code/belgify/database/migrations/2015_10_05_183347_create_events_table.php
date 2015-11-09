<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function(Blueprint $table){

            $table->increments('id');

            $table->string('title');
            $table->dateTime('date');
            $table->string('description');
            $table->string('street_address');
            $table->tinyInteger('location_id');
            $table->tinyInteger('is_active')->nullable();
            $table->tinyInteger('is_public')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

        });

        Schema::create('event_user', function(Blueprint $table)
            {

                $table->increments('id');
                $table->integer('event_id')->unsigned();
                $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');

                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('event_user');
        Schema::drop('events');

    }
}
