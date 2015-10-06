<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

get('home', function(){
    return view('home');
});


// Authentication routes...
Route::get('auth/login',    ['as' => 'getLogin',    'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',   ['as' => 'postLogin',   'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',   ['as' => 'getLogout',   'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register',     ['as'   =>  'getRegister', 'uses' =>   'Auth\AuthController@getRegister']);
Route::post('auth/register',    ['as'   =>  'postRegister', 'uses' =>   'Auth\AuthController@postRegister']);
