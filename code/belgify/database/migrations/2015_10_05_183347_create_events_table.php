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
            $table->string('city');
            $table->smallInteger('post_code');
            $table->tinyInteger('is_active')->nullable();
            $table->tinyInteger('is_public')->nullable();

//            $table->tinyInteger('author_id')->unsigned();

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
        Schema::drop('events');
    }
}
