<?php
class Language extends Eloquent { 

    public function meetup() {
        # Language is associated with many Meetups
        # Define a one-to-many relationship.
        return $this->hasMany('Meetup');
    }

    /**
	* When editing or adding a new meetup, we need a select dropdown of languages to choose from
	* A select is easy to generate when you have a key=>value pair to work with
	* This method will generate a key=>value pair of language id => language name
	*
	* @return Array
	*/
    public static function getIdNamePair() {
		$languages = Array();
		$collection = language::all();
		foreach($collection as $language) {
			$languages[$language->id] = $language->name;
		}
		return $languages;
	}
}