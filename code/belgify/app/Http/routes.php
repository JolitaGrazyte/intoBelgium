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

get('/', ['as' => 'home', function(){
    return view('home');
}]);

Route::group(['middleware' => 'auth'], function(){

    get('dashboard',                ['as' => 'dashboard',       'uses' => 'DashboardController@index']);
    get('dashboard/my-events',      ['as' => 'my-events',       'uses' => 'DashboardController@index']);
    get('dashboard/my-questions',   ['as' => 'my-questions',    'uses' => 'DashboardController@index']);
});

//get('/{page}',         ['as' => 'pages',       'uses' => 'PagesController@index']);


// Authentication routes...
get('auth/login',       ['as' => 'getLogin',            'uses' => 'Auth\AuthController@getLogin']);
post('auth/login',      ['as' => 'postLogin',           'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout',      ['as' => 'getLogout',           'uses' => 'Auth\AuthController@getLogout']);

get('login/{provider}', 'Auth\AuthController@login'); // socialite login


// Registration routes...
get('auth/register',     ['as'   =>  'getRegister', 'uses' =>   'Auth\AuthController@getRegister']);
post('auth/register',    ['as'   =>  'postRegister', 'uses' =>   'Auth\AuthController@postRegister']);




resource('events',      'EventsController');
resource('comments',    'CommentsController');
resource('posts',       'PostsController');
resource('profile',     'ProfileController', ['except' => ['index']]);


//SEARCH
post('search', ['as' => 'search', 'uses' => 'SearchController@search']);

//Extra routes
post('events/{id}',     ['as' => 'attend', 'uses' => 'EventsController@postAttend']);
get('image/{id}',       ['as'=>'getImage',     'uses' => 'ProfileController@getImage' ]);
//post('image/{user_id}', ['as'=>'postImage',    'uses' => 'ImagesController@postImage' ]);