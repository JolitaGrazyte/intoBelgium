<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {



    return [
        'username'      => $faker->name,
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
        'email'         => $faker->email,
//        'password'    => bcrypt(str_random(10)),
        'password'      => Hash::make('testing'),

        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Event::class, function (Faker\Generator $faker) {

    $date       = Carbon::now()->subDays(rand(1, 30));
    $evnt_date  = Carbon::now()->addDays(rand(1, 30));

    return  [
        'title'             => $faker->sentence,
        'description'       => $faker->text,
        'street_address'    => $faker->streetAddress,
        'location_id'       => rand(1, 161),
        'user_id'           => rand(1, 27),
        'created_at'        => $date,
        'updated_at'        => $date,
        'date'              => $evnt_date

    ];


});



$factory->define(App\Post::class, function (Faker\Generator $faker) {

    $date = Carbon::now()->subDays(rand(1, 30));

    return  [


        'title'      => $faker->sentence,
        'body'       =>  $faker->text,
        'user_id'    =>  rand(1, 27),
        'created_at'        => $date,
        'updated_at'        => $date,

    ];


});


$factory->define(App\Comment::class, function (Faker\Generator $faker) {

    $date = Carbon::now()->subDays(rand(1, 30));

    return  [

        'body'       =>  $faker->text,
        'user_id'    =>  rand(1, 27),
        'post_id'    =>  rand(1, 50),
        'created_at'        => $date,
        'updated_at'        => $date,

    ];


});


