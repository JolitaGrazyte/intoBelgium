<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function(Blueprint $table){

            $table->increments('id');

            $table->string('title');
            $table->dateTime('date');
            $table->string('body');
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
        Schema::drop('posts');
    }
}
