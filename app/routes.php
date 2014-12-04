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

/*Route::get('/', function()
{
	return View::make('hello');
}); */

#Homepage
Route::get('/', function() {

	return View::make('index');
});

Route::get('/practice-Pre', function() {

    $fruit = Array('Apples', 'Oranges', 'Pears');

    echo Pre::render($fruit,'Fruit');

});

Route::get('/languages', function() {
    return 'Here are all the languages currently available';
}); 

Route::get('/languages/{category}', function($category) {
        return 'Here are all the languages available in '.$category;
}); 

Route::get('/new-sth', function() {

    $view  = '<form method="POST">';
    $view .= 'Title: <input type="text" name="title">';
    $view .= '<input type="submit">';
    $view .= '</form>';
    return $view;

});

Route::post('/new-sth', function() {

    $input =  Input::all();
    print_r($input);

});

Route::get('/practice', function() {

    echo 'Hello World!';

});

Route::get('/profile/{name_id}', function($name_id) {

    //$name = User::get($name_id);

    return View::make('profile')
        ->with('name', 'Tanya');

});

//list all events/search
Route::get('/list/{query?}', function($query){

	return 'List all the events';
});

//Display the form for a new event
Route::get('/add', function() {

});

//Process the form for a new event
Route::post('/add', function() {

});

//Display the form to edit an event
Route::get('/edit/{title}', function($title) {

});

//Process the form to edit the event
Route::post('/edit', function() {

});