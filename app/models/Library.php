<?php

class library extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * library belongs to category
    * Define an inverse one-to-many relationship.
    */
	public function category() {

        return $this->belongsTo('Category');

    }

    /**
    * Search among librarys, categorys and tags
    * @return Collection
    */
    public static function search($query) {

        # If there is a query, search the library with that query
        if($query) {

            # Eager load tags and category
            $librarys = library::with('category')
            ->whereHas('category', function($q) use($query) {
                $q->where('category', 'LIKE', "%$query%");
            })
            ->orWhere('title', 'LIKE', "%$query%")
            ->get();

            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.

        }
        # Otherwise, just fetch all librarys
        else {
            # Eager load tags and category
            $librarys = library::with('category')->get();
        }

        return $librarys;
    }



    /**
    * Searches and returns any librarys added in the last 24 hours
    *
    * @return Collection
    */
    public static function getlibrarysAddedInTheLast24Hours() {

        # Timestamp of 24 hours ago
        $past_24_hours = strtotime('-1 day');

        # Convert to MySQL timestamp
        $past_24_hours = date('Y-m-d H:i:s', $past_24_hours);

        $librarys = library::where('created_at','>',$past_24_hours)->get();

        return $librarys;

    }
}