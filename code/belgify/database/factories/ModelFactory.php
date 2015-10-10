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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username'  => $faker->name,
        'email'     => $faker->email,
//        'password' => bcrypt(str_random(10)),
        'password' => Hash::make('testing'),

        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'city'  => $faker->city,

    ];
});

