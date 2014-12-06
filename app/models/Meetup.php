<?php

class Meetup extends Eloquent {

    public function language() {
        # Meetups are linked to a language
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('Language');
    }

        public function location() {
        # Meetups are linked to a location
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('Location');
    }
}
	