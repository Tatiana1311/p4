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


Route::get('/classes', function() {
    echo Paste\Pre::render(get_declared_classes(),'');
});
/**
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


## Ajax examples
Route::get('/meetup/search', 'MeetupController@getSearch');
Route::post('/meetup/search', 'MeetupController@postSearch');

/**
* Debug
* (Implicit Routing)
*/
//Route::controller('debug', 'DebugController');


/**
* Demos
* (Explicit Routing)
*/

/*Route::get('/demo/ping-log-file', 'DemoController@pingLogFile');
Route::get('/demo/new-user-welcome-email', 'DemoController@newUserWelcomeEmail');
Route::get('/demo/csrf-example', 'DemoController@csrf');
Route::get('/demo/collections', 'DemoController@collections');
Route::get('/demo/js-vars', 'DemoController@jsVars');

Route::get('/demo/crud-create', 'DemoController@crudCreate');
Route::get('/demo/crud-read', 'DemoController@crudRead');
Route::get('/demo/crud-update', 'DemoController@crudUpdate');
Route::get('/demo/crud-delete', 'DemoController@crudDelete');

Route::get('/demo/collections', 'DemoController@collections');
Route::get('/demo/query-without-constraints', 'DemoController@queryWithoutConstraints');
Route::get('/demo/query-with-constraints', 'DemoController@queryWithConstraints');
Route::get('/demo/query-responsibility', 'DemoController@queryResponsibility');
Route::get('/demo/query-with-order', 'DemoController@queryWithOrder');

Route::get('/demo/query-relationships-language', 'DemoController@queryRelationshipslanguage');
Route::get('/demo/query-relationships-tags', 'DemoController@queryRelationshipstags');
Route::get('/demo/query-eager-loading-languages', 'DemoController@queryEagerLoadinglanguages');
Route::get('/demo/query-eager-loading-tags-and-languages', 'DemoController@queryEagerLoadingTagsAndlanguages');

Route::get('/demo/simple-ajax', 'DemoController@getSimpleAjax');
Route::post('/demo/simple-ajax', 'DemoController@postSimpleAjax'); */
