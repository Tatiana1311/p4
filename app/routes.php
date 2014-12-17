<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
*Route::get('/classes', function() {
*   echo Paste\Pre::render(get_declared_classes(),'');
*});
*
* Index
*/
//Route::get('/', 'IndexController@getIndex');

Route::get('/', array('before' => 'auth',
            'uses' => 'IndexController@getIndex'));

Route::get('/search_test', 'MeetupController@getSearchtest');
/**
* User
* (Explicit Routing)
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );
Route::get('/auth', 'UserController@getAuth');

Route::get('/profile', array('before' => 'auth',
            'uses' => 'UserController@getProfile'));
/**
* MeetUp
* (Explicit Routing)
*/
Route::get('/meetup', 'MeetupController@getIndex');

Route::get('/meetup/edit/{id}', 'MeetupController@getEdit');
Route::post('/meetup/edit', 'MeetupController@postEdit');

Route::get('/meetup/create', 'MeetupController@getCreate');
Route::post('/meetup/create', 'MeetupController@postCreate');

Route::post('/meetup/delete', 'MeetupController@postDelete');

Route::get('/contact', 'MeetupController@getContact');
Route::post('/contact', 'MeetupController@postContact');


/**
* Debug
* (Implicit Routing)
*/
Route::controller('debug', 'DebugController');


