<?php
class Location extends Eloquent { 

    public function meetup() {
        # Location is associated with many Meetups
        # Define a one-to-many relationship.
        return $this->hasMany('Meetup');
    }
}