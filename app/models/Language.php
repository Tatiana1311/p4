<?php
class Language extends Eloquent { 

    public function meetup() {
        # Language is associated with many Meetups
        # Define a one-to-many relationship.
        return $this->hasMany('Meetup');
    }
}