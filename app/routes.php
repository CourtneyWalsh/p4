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

/*
|--------------------------------------------------------------------------
| Index
|--------------------------------------------------------------------------
*/

Route::get('/', 'IndexController@getIndex');


/*
|--------------------------------------------------------------------------
| User (Explicit Routing)
|--------------------------------------------------------------------------
*/

Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );


/*
|--------------------------------------------------------------------------
| Bucket (Explicit Routing)
|--------------------------------------------------------------------------
*/

Route::get('/bucket', 'BucketController@getIndex');

Route::get('/bucket/edit/{id}', 'BucketController@getEdit');
Route::post('/bucket/edit', 'BucketController@postEdit');

Route::get('/bucket/create', 'BucketController@getCreate');
Route::post('/bucket/create', 'BucketController@postCreate');

Route::post('/bucket/delete', 'BucketController@postDelete');

Route::get('/bucket/digest', 'BucketController@getDigest');

Route::get('/bucket/list', 'BucketController@getList');

/*
|--------------------------------------------------------------------------
| List
|--------------------------------------------------------------------------
*/

Route::get('/library', 'libraryController@getIndex');

/*
|--------------------------------------------------------------------------
| Debug (Implicit Routing)
|--------------------------------------------------------------------------
*/

Route::controller('debug', 'DebugController');

/*
|--------------------------------------------------------------------------
| Testing
|--------------------------------------------------------------------------
*/

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

/*
|--------------------------------------------------------------------------
CRUD
|--------------------------------------------------------------------------
*/

Route::get('/practice-creating', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    # Set 
     $bucket->title = '#';
    $bucket->category = '#';
    $bucket->icon = '#';
    # This is where the Eloquent ORM magic happens

    $bucket->save();

    return 'A new bucket has been added! Check your database to see...';
});

Route::get('/practice-reading', function() {

    # The all() method will fetch all the rows from a Model/table
    $buckets = bucket::all();

    # Make sure we have results before trying to print them...
    if($buckets->isEmpty() != TRUE) {

        # Typically we'd pass $buckets to a View, but for quick and dirty demonstration, let's just output here...
        foreach($buckets as $bucket) {
            echo $bucket->title.'<br>';
        }
    }
    else {
        return 'No buckets found';
    }

});

Route::get('/practice-reading-one-bucket', function() {

    $bucket = bucket::where('category', 'LIKE', '%Travel%')->first();

    if($bucket) {
        return $bucket->title;
    }
    else {
        return 'bucket not found.';
    }

});

Route::get('/practice-updating', function() {

    # First get a bucket to update
    $bucket = bucket::where('category', 'LIKE', '%Travel%')->first();

    # If we found the bucket, update it
    if($bucket) {

        # Give it a different title
        $bucket->title = 'To Paris I Go';

        # Save the changes
        $bucket->save();

        return "Update complete; check the database to see if your update worked...";
    }
    else {
        return "bucket not found, can't update.";
    }

});

Route::get('/practice-deleting', function() {

    # First get a bucket to delete
    $bucket = bucket::where('category', 'LIKE', '%Travel%')->first();

    # If we found the bucket, delete it
    if($bucket) {

        # Goodbye!
        $bucket->delete();

        return "Deletion complete; check the database to see if it worked...";

    }
    else {
        return "Can't delete - bucket not found.";
    }

});


/*
|--------------------------------------------------------------------------
| Images
|--------------------------------------------------------------------------
*/ 



Route::get('/paris', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket(); 

    $bucket->title = 'Go to Paris';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://2.bp.blogspot.com/-rF5QVuEE4vo/UiPuMNgSpbI/AAAAAAAAAVA/hAMAn_pKo3k/s320/before-i-die-bucket-list-france-go-to-paris-paris-Favim.com-458313_original.jpg';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});

Route::get('/million', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Make a million dollars';
    $bucket->category = 'Financial';
    $bucket->icon = 'http://40.media.tumblr.com/tumblr_luq4r8XelH1r29t5yo1_500.png';

    $bucket->save();
   return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/model', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Become a model';
    $bucket->category = 'Personal';
    $bucket->icon = 'http://data2.whicdn.com/images/24587101/tumblr_m0nzgpjRwq1rr16spo1_500_large.jpg';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});


Route::get('/masters', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Get my masters degree';
    $bucket->category = 'Educational';
    $bucket->icon = 'http://36.media.tumblr.com/tumblr_mbi63c5Vbm1r9043bo1_500.jpg';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/marathon', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Run a marathon';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://media-cache-ec0.pinimg.com/736x/8e/53/52/8e5352a2d070580488fc4704cdd05844.jpg';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});


Route::get('/world', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket(); 

    $bucket->title = 'Travel the world';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://media.tumblr.com/tumblr_ltlo4yFSNC1qg3aas.png';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});

Route::get('/skydive', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Go sky diving';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://media.tumblr.com/tumblr_m5qspumTDb1qi6dl1.jpg';

    $bucket->save();
   return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/road', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Go on a road trip with friends';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://data2.whicdn.com/images/17005942/large.png';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});


Route::get('/fly', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Fly first class';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://d2tq98mqfjyz2l.cloudfront.net/image_cache/1359206107850341.jpg';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/castle', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Visit a castle';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://28.media.tumblr.com/tumblr_ltc2p8urxY1r29t5yo1_500.png';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});

Route::get('/panda', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket(); 

    $bucket->title = 'Pet a panda';
    $bucket->category = 'Personal';
    $bucket->icon = 'http://27.media.tumblr.com/tumblr_ls5px77fRN1r29t5yo1_r1_500.png';
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});

Route::get('/nyc', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Go to fashion week in nyc';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://26.media.tumblr.com/tumblr_ltc54deMzW1r29t5yo1_500.png';

    $bucket->save();
   return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/marry', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Marry the love of my life';
    $bucket->category = 'Personal';
    $bucket->icon = 'http://media-cache-ec0.pinimg.com/736x/b2/f9/ba/b2f9bae060bbad0fa76ea2d66e1f97c7.jpg';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});


Route::get('/spanish', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Learn Spanish';
    $bucket->category = 'Educational';
    $bucket->icon = 'http://data2.whicdn.com/images/47992632/large.jpg';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/pool', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Jump in the pool with clothes on';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://s5.favim.com/orig/53/bucket-list-girl-pool-Favim.com-496675.jpg';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});


Route::get('/cliff', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket(); 

    $bucket->title = 'Go cliff diving';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://data2.whicdn.com/images/24692592/large.jpg';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});

Route::get('/surf', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Learn how to surf';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://s5.favim.com/orig/74/blue-cute-dear-bucket-list-dearbucketlist.tumblr.com-Favim.com-756338.jpg';

    $bucket->save();
   return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/sled', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Try sled dogging';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://27.media.tumblr.com/tumblr_ls9gyng0cJ1r29t5yo1_r1_500.png';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});


Route::get('/try', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Go on the chicago sky deck';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://media.tumblr.com/tumblr_ltmpu9M0Sw1qg3aas.png';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/para', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Go Paragliding';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://yourhappyplaceblog.files.wordpress.com/2013/01/tumblr_lw1v04hvmd1r29t5yo1_500.png';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});

Route::get('/universal', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Go to Universal studios';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://cdnpix.com/show/imgs/b0cfa9b0a930a186cc0c8bbafbb3f4a4.jpg';

    $bucket->save();
   return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/adopt', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Adopt a hedgehog';
    $bucket->category = 'Personal';
    $bucket->icon = 'http://25.media.tumblr.com/tumblr_lthqepAQia1r29t5yo1_500.png';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});


Route::get('/study', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Study abroad';
    $bucket->category = 'Travel';
    $bucket->icon = 'http://30.media.tumblr.com/tumblr_ltjl69bm5J1r29t5yo1_500.png';
    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');
});

Route::get('/sharks', function() {

    # Instantiate a new bucket model class
    $bucket = new bucket();

    $bucket->title = 'Swim with sharks';
    $bucket->category = 'Athletics';
    $bucket->icon = 'http://3.bp.blogspot.com/-9k_FnsTeDeg/UDQNZSWXWlI/AAAAAAAADVQ/7VscXaw4kF4/s1600/tumblr_m4z50ysyeg1rxs7qjo1_500.png';

    $bucket->save();
    return Redirect::to('/library')->with('flash_message', 'A new goal has been added to your bucket list! Why not add more?');

});


