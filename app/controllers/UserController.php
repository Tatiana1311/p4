<?php

class UserController extends BaseController {

    /**
    *
    */
    public function __construct() {


        # Make sure BaseController construct gets called
        parent::__construct();

        $this->beforeFilter('guest', 
            array('only' => array('getLogin','getSignup')));

    }

    public function getAuth() {

        return View::make('auth');

    }


    /**
    * Show the new user signup form
    * @return View
    */
    public function getSignup() {

        return View::make('signup');

    }

    /**
    * Process the new user signup
    * @return Redirect
    */
    public function postSignup() {

        # Step 1) Define the rules
        $rules = array(
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        );

        # Step 2
        $validator = Validator::make(Input::all(), $rules);

        # Step 3
        if($validator->fails()) {

            return Redirect::to('/signup')
                ->with('flash_message', 'Sign up failed; please fix the errors listed below.')
                ->withInput()
                ->withErrors($validator);
        }

        $user = new User;
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));

        try {
            $user->save();
        }
        catch (Exception $e) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Sign up failed; please try again.')
                ->withInput();
        }

        # Log in
        Auth::login($user);

        return Redirect::to('/')->with('flash_message', 'Welcome to Matryoshka Int!');

    }

    /**
    * Display the login form
    * @return View
    */
    public function getLogin() {

        return View::make('login');

    }

    /**
    * Process the login form
    * @return View
    */
    public function postLogin() {

        $credentials = Input::only('email', 'password');

        if (Auth::attempt($credentials, $remember = true)) {
            return Redirect::intended('/')->with('flash_message', 'Welcome Back!');
        }
        else {
            return Redirect::to('login')
                ->with('flash_message', 'Log in failed; please try again.')
                ->withInput();
        }

        return Redirect::to('/');

    }


    /**
    * Logout
    * @return Redirect
    */
    public function getLogout() {

        # Log out
        Auth::logout();

        # Send them to the homepage
        return Redirect::to('/');

    }

    public function getProfile(){
        return View::make('profile');
    }


    /**
    * Show the "Edit a user profile" form
    * @return View
    */
    public function getEdit($id) {

        return View::make('user_edit')
            ->with('user', $user)
            //->with('authors', $authors);
    }
    /**
    * Process the "Edit a book form"
    * @return Redirect
    */
    public function postEdit() {

        # http://laravel.com/docs/4.2/eloquent#mass-assignment
        $user->fill(Input::all());
        $user->save();
        return Redirect::action('UserController@getProfile')->with('flash_message','Your changes have been saved.');
    }

}