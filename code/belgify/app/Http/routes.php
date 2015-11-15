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
//
//get('/home', function(){
//    return redirect()->to('/');
//});


Route::controllers([
    'password' => 'Auth\PasswordController',
]);


//get('/{page}',         ['as' => 'pages',       'uses' => 'PagesController@index']);
//get('auth/reset', ['as'=>'reset', 'uses' => 'Auth\PasswordController']);

// Authentication routes...
get('auth/login',       ['as' => 'getLogin',            'uses' => 'Auth\AuthController@getLogin']);
post('auth/login',      ['as' => 'postLogin',           'uses' => 'Auth\AuthController@postLogin']);
get('auth/logout',      ['as' => 'getLogout',           'uses' => 'Auth\AuthController@getLogout']);

get('login/{provider}', 'Auth\AuthController@login'); // socialite login


// Registration routes...
get('auth/register',     ['as'   =>  'getRegister', 'uses' =>   'Auth\AuthController@getRegister']);
post('auth/register',    ['as'   =>  'postRegister', 'uses' =>   'Auth\AuthController@postRegister']);


resource('events',      'EventsController');
resource('comments',    'CommentsController', ['except' => ['create']]);
resource('posts',       'PostsController');
resource('profile',     'ProfileController', ['except' => ['index']]);

Route::group(['middleware' => 'auth'], function(){

    get('dashboard',                ['as' => 'dashboard',       'uses' => 'DashboardController@index']);
    get('dashboard/my-events',      ['as' => 'my-events',       'uses' => 'DashboardController@index']);
    get('dashboard/my-questions',   ['as' => 'my-questions',    'uses' => 'DashboardController@index']);

    resource('profile',     'ProfileController',    ['except' => ['index']]);
    resource('events',      'EventsController',     ['except' => ['index', 'show']]);
    resource('posts',       'PostsController',      ['except' => ['index', 'show']]);
    post('events/{id}',                     ['as' => 'attend',          'uses' => 'EventsController@postAttend']);
    get('/events/delete-confirm/{id}',      ['as' => 'event-delete-confirm',    'uses' => 'EventsController@delete_confirm']);
    get('/events/delete/{id}',                      ['as' => 'event-delete', 'uses' => 'EventsController@delete']);

    get('/question/delete-confirm/{id}',      ['as' => 'post-delete-confirm',   'uses' => 'PostsController@delete_confirm']);
    get('/question/delete/{id}',              ['as' => 'post-delete',           'uses' => 'PostsController@delete']);

    get('/answer/delete-confirm/{id}',      ['as' => 'comment-delete-confirm',  'uses' => 'CommentsController@delete_confirm']);
    get('/answer/delete/{id}',              ['as' => 'comment-delete',          'uses' => 'CommentsController@delete']);

    post('/dashboard/{id}',          ['as' => 'follow',          'uses' => 'DashboardController@postFollow']);
    get('/comments/create/{id}',    [ 'as' => 'answer',         'uses' => 'CommentsController@create']);
    post('/comments/post-vote',      ['as' => 'postVote',        'uses' =>  'CommentsController@postVote']);

});


//SEARCH

get('/{tag}',       ['as' => 'tag-search',  'uses' => 'SearchController@index']);
post('search',      ['as' => 'search',      'uses' => 'SearchController@index']);
get('search-json',  ['as' => 'search-json', 'uses' => 'SearchController@getAutocomplete']);

//Extra routes
get('image/{id}/{size}',        ['as'=>'getImage', 'uses' => 'ProfileController@getImage' ]);
