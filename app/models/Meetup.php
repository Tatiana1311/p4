<?php

class Meetup extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

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

    /**
    * Search among meetups and languages
    * @return Collection
    */
    public static function search($query) {
        # If there is a query, search the library with that query
        if($query) {
            # Eager load locations and language
            $meetups = Meetup::with('language')
            ->whereHas('language', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhere('location', 'LIKE', "%$query%")
            ->orWhere('name', 'LIKE', "%$query%")
            ->orWhere('date', 'LIKE', "%$query%")
            ->get();
            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.
        }
        # Otherwise, just fetch all meetups
        else {
            # Eager loadlanguage
            $meetups = Meetup::with('language')->get();
        }
        return $meetups;
    }
}
	