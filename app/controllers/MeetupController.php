<?php

class MeetupController extends BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		# Only logged in users should have access to this controller
		$this->beforeFilter('auth');

	}


	/**
	* Process the searchform
	* @return View
	*/
	public function getSearch() {

		return View::make('meetup_search');

	}

		public function getSearchtest() {

		return View::make('search_test');

	}

	/**
* Demonstration of Ajax
* http://localhost/meetup/search
*/
/*public function postSearch() {

    if(Request::ajax()) {

        $query  = Input::get('query');

        # Do the actual query
        $meetups  = Meetup::search($query);

		{

            $results = '';          
            foreach($meetups as $meetup) {
                # Created a "stub" of a view called meetup_search_result.php; all it is is a stub of code to display a meetup
                # For each meetup, we'll add a new stub to the results
                $results .= View::make('meetup_search_result')->with('meetup', $meetup)->render();   
            }

            # Return the HTML/View to JavaScript...
            return $results;
        }
    }
}
*/

	/**
	* Display all meetups
	* @return View
	*/
	public function getIndex() {

		# Format and Query are passed as Query Strings
		//$format = Input::get('format', 'html');

		$query  = Input::get('query');

		$meetups = Meetup::search($query);


			return View::make('meetup_index')
				->with('meetups', $meetups)
				->with('query', $query);
	}


	/**
	* Show the "Add a meetup form"
	* @return View
	*/
	public function getCreate() {

		$languages = Language::getIdNamePair();

    	return View::make('addmeetup')->with('languages',$languages);

	}


	/**
	* Process the "Add a meetup form"
	* @return Redirect
	*/
	public function postCreate() {

		# Instantiate the meetup model
		$meetup = new Meetup();

		$meetup->fill(Input::all());
		$meetup->save();

		# Magic: Eloquent
		$meetup->save();

		return Redirect::action('MeetupController@getIndex')->with('flash_message','A new MeetUp has been added.');

	}


	/**
	* Show the "Edit a meetup form"
	* @return View
	*/
	public function getEdit($id) {

		try {
		    $meetup = Meetup::findOrFail($id);
		    $languages = Language::getIdNamePair();
		}
		catch(exception $e) {
		    return Redirect::to('/meetup')->with('flash_message', 'MeetUp not found');
		}

    	return View::make('meetup_edit')
    		->with('meetup', $meetup)
    		->with('languages', $languages);

	}

	/**
	* Process the "Edit a meetup form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
	        $meetup = Meetup::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/meetup')->with('flash_message', 'MeetUp not found');
	    }

	    try {
	    # http://laravel.com/docs/4.2/eloquent#mass-assignment
	    $meetup->fill(Input::all());
	    $meetup->save();

	   	return Redirect::action('MeetupController@getIndex')->with('flash_message','Your changes have been saved.');
	   }
	   catch(exception $e) {
	   	return Redirect::to('/meetup')->with('flash_message', 'Error saving changes');
	   }
	}


	/**
	* Process meetup deletion
	*
	* @return Redirect
	*/
	public function postDelete() {
		try {
	        $meetup = Meetup::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/meetup/')->with('flash_message', 'Could not delete meetup - not found.');
	    }
	    Meetup::destroy(Input::get('id'));
	    return Redirect::to('/meetup/')->with('flash_message', 'Meetup successfully deleted.');
	}

}