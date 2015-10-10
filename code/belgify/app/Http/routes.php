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

get('home', ['as' => 'home', function(){
    return view('home');
}]);

get('dashboard',['as' => 'dashboard', 'middleware' => 'auth', function(){
    return view('dashboard');
}]);


//get('/{page}',         ['as' => 'pages',       'uses' => 'PagesController@index']);


// Authentication routes...
get('auth/login',       ['as' => 'getLogin',            'uses' => 'Auth\AuthController@getLogin']);
post('auth/login',      ['as' => 'postLogin',           'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout',      ['as' => 'getLogout',           'uses' => 'Auth\AuthController@getLogout']);

get('login/{provider}', 'Auth\AuthController@login'); // socialite login


// Registration routes...
get('auth/register',     ['as'   =>  'getRegister', 'uses' =>   'Auth\AuthController@getRegister']);
post('auth/register',    ['as'   =>  'postRegister', 'uses' =>   'Auth\AuthController@postRegister']);


Route::group([/*'prefix' => 'dashboard',*/ 'middleware' => 'auth'  ], function(){

    resource('events',  'EventsController');
    resource('posts',   'PostsController');
    resource('profile', 'ProfileController', ['except' => ['index']]);


});