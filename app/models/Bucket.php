<?php

class Bucket extends Eloquent {

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');

    /**
    * bucket belongs to category
    * Define an inverse one-to-many relationship.
    */
	public function category() {

        return $this->belongsTo('Category');

    }

    /**
    * Search among buckets, categorys and tags
    * @return Collection
    */
    public static function search($query) {

        # If there is a query, search the library with that query
        if($query) {

            # Eager load tags and category
            $buckets = bucket::with('category')
            ->whereHas('category', function($q) use($query) {
                $q->where('category', 'LIKE', "%$query%");
            })
            ->orWhere('title', 'LIKE', "%$query%")
            ->get();

            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.

        }
        # Otherwise, just fetch all buckets
        else {
            # Eager load tags and category
            $buckets = bucket::with('category')->get();
        }

        return $buckets;
    }



    /**
    * Searches and returns any buckets added in the last 24 hours
    *
    * @return Collection
    */
    public static function getbucketsAddedInTheLast24Hours() {

        # Timestamp of 24 hours ago
        $past_24_hours = strtotime('-1 day');

        # Convert to MySQL timestamp
        $past_24_hours = date('Y-m-d H:i:s', $past_24_hours);

        $buckets = bucket::where('created_at','>',$past_24_hours)->get();

        return $buckets;

    }


    /**
    *
    *
    * @return String
    */
    public static function sendDigests($users,$buckets) {

        $recipients = '';

        $data['buckets'] = $buckets;

        foreach($users as $user) {

            $data['user'] = $user;

            /*
            Mail::send('emails.digest', $data, function($message) {

                $recipient_email = $user->email;
                $recipient_name  = $user->first_name.' '.$user->last_name;
                $subject  = 'Foobuckets Digest';

                $message->to($recipient_email, $recipient_name)->subject($subject);

            });
            */

            $recipients .= $user->email.', ';

        }

        $recipients = rtrim($recipients, ',');

        return $recipients;

    }


}