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

Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);

Route::post('/signup', 
    array(
        'before' => 'csrf', 
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            # Try to add the user 
            try {
                $user->save();
            }
            # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);

            return Redirect::to('/home')->with('flash_message', 'Welcome to Matryoshka Int!');

        }
    )
);

Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);

Route::post('/login', 
    array(
        'before' => 'csrf', 
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/home')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);

Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});

Route::get('/addmeetup', function() {

	# Instantiate a new Meetup model class
    $meetup = new Meetup();

    # Set 
    $meetup->name = 'Dos Mundos';
    $meetup->language = 'Spanish';
    $meetup->date = '10/15/2013';
    $meetup->location = 'Miami, FL';
    $meetup->city_link = 'http://en.wikipedia.org/wiki/Miami';

    # This is where the Eloquent ORM magic happens
    $meetup->save();

    return 'Fun! You successfully added a new meetup';
});

Route::get('/test', function (){
	/*$language = new Language();
	$language->name = 'Turkish';
	$language->save();

	$meetup = new Meetup();
	$meetup->name = 'Muhtesem';
	$meetup->language_id = $language->id;

	$meetup->save();*/
	$meetup = Meetup::first();

	echo $meetup->name. "<br>";
	echo "The language spoken: ";
	echo $meetup->language->name;
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

Route::get('/home', 
	array(
	'before' => 'auth',
	function() {

    return View::make('home');
	}
	)
);

//list all events/search
Route::get('/list/{format?}', function($format = 'html'){

	$query = Input::get('query');
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

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

Route::get('/practice-creating', function() {

    # Instantiate a new Meetup model class
    $meetup = new Meetup();

    # Set 
    $meetup->name = 'Dos Mundos';
    $meetup->language_id = 3;
    $meetup->date = '10/15/2013';
    $meetup->location = 'Miami, FL';
    $meetup->city_link = 'http://en.wikipedia.org/wiki/Miami';

    # This is where the Eloquent ORM magic happens
    $meetup->save();

    return 'Fun! A new event has just been added!';

});

Route::get('/practice-reading', function() {

    # The all() method will fetch all the rows from a Model/table
    $meetups = Meetup::all();

    # Make sure we have results before trying to print them...
    if($meetups->isEmpty() != TRUE) {

        # Typically we'd pass $meetups to a View, but for quick and dirty demonstration, let's just output here...
        foreach($meetups as $meetup) {
            echo $meetup->name.'<br>';
        }
    }
    else {
        return 'Boring! No events found =(';
    }

});

Route::get('/practice-reading-one-meetup', function() {

    $meetup = Meetup::where('language', 'LIKE', '%Spanish%')->first();

    if($meetup) {
        return $meetup->name;
    }
    else {
        return 'No events found... Maybe learn another language?';
    }

});

Route::get('/practice-updating', function() {

    # First get a meetup to update
    $meetup = Meetup::where('language', 'LIKE', '%Spanish%')->first();

    # If we found the meetup, update it
    if($meetup) {

        # Give it a different title
        $meetup->name = 'Tres Mundos';

        # Save the changes
        $meetup->save();

        return "Update complete; check the database to see if your update worked...";
    }
    else {
        return "Event not found, can't update.";
    }
});

Route::get('/practice-deleting', function() {

    # First get a meetup to delete
    $meetup = Meetup::where('language', 'LIKE', '%Spanish%')->first();

    # If we found the meetup, delete it
    if($meetup) {

        # Goodbye!
        $meetup->delete();

        return "Deletion complete; check the database to see if it worked...";

    }
    else {
        return "Can't delete - meetup not found.";
    }
});


Route::get('/practice-collection-array', function() {
$collection = Meetup::all();

# loop through the Collection and access just the data
foreach($collection as $meetup) {
    echo $meetup['name']."<br>";
	}
});

Route::get('/practice-collection-object', function() {
$collection = Meetup::all();

foreach($collection as $meetup) {
    echo $meetup->name."<br>";
}
});

# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});