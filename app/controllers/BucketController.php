<?php

class BucketController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		$this->beforeFilter('auth', array('except' => ['getIndex','getDigest']));

	}




	/**
	* Process the searchform
	* @return View
	*/
	public function getSearch() {

		return View::make('bucket_search');

	}


	/**
	* Display all buckets
	* @return View
	*/
	public function getIndex() {

		# Format and Query are passed as Query Strings
		$format = Input::get('format', 'html');

		$query  = Input::get('query');

		$buckets = bucket::search($query);

		# Decide on output method...
		# Default - HTML
		if($format == 'html') {
			return View::make('bucket_index')
				->with('buckets', $buckets)
				->with('query', $query);
		}
		# JSON
		elseif($format == 'json') {
			return Response::json($buckets);
		}
		# PDF (Coming soon)
		elseif($format == 'pdf') {
			return "This is the pdf (Coming soon).";
		}


	}


	/**
	* Show the "Add a bucket form"
	* @return View
	*/
	public function getCreate() {

		$categories = Category::getIdTypePair();

    	return View::make('bucket_add')->with('categories',$categories);

	}


	/**
	* Process the "Add a bucket form"
	* @return Redirect
	*/
	public function postCreate() {

		# Instantiate the bucket model
		$bucket = new bucket();

		$bucket->fill(Input::all());
		$bucket->save();

		# Magic: Eloquent
		$bucket->save();

		return Redirect::action('BucketController@getIndex')->with('flash_message','Your bucket has been added.');

	}


	/**
	* Show the "Edit a bucket form"
	* @return View
	*/
	public function getEdit($id) {

		try {
		    $bucket    = bucket::findOrFail($id);
		    $categories = Category::getIdTypePair();
		}
		catch(exception $e) {
		    return Redirect::to('/bucket')->with('flash_message', 'bucket not found');
		}

    	return View::make('bucket_edit')
    		->with('bucket', $bucket)
    		->with('categories', $categories);

	}


	/**
	* Process the "Edit a bucket form"
	* @return Redirect
	*/
	public function postEdit() {

		try {
	        $bucket = bucket::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/bucket')->with('flash_message', 'bucket not found');
	    }

	    # http://laravel.com/docs/4.2/eloquent#mass-assignment
	    $bucket->fill(Input::all());
	    $bucket->save();

	   	return Redirect::action('BucketController@getIndex')->with('flash_message','Your changes have been saved.');

	}


	/**
	* Process bucket deletion
	*
	* @return Redirect
	*/
	public function postDelete() {

		try {
	        $bucket = bucket::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/bucket/')->with('flash_message', 'Could not delete bucket - not found.');
	    }

	    bucket::destroy(Input::get('id'));

	    return Redirect::to('/bucket/')->with('flash_message', 'bucket deleted.');

	}


	/**
	* Process a bucket search
	* Called w/ Ajax
	*/
	public function postSearch() {

		if(Request::ajax()) {

			$query  = Input::get('query');

			# We're demoing two possible return formats: JSON or HTML
			$format = Input::get('format');

			# Do the actual query
	        $buckets  = bucket::search($query);

	        # If the request is for JSON, just send the buckets back as JSON
	        if($format == 'json') {
		        return Response::json($buckets);
	        }
	        # Otherwise, loop through the results building the HTML View we'll return
	        elseif($format == 'html') {

		        $results = '';
				foreach($buckets as $bucket) {
					# Created a "stub" of a view called bucket_search_result.php; all it is is a stub of code to display a bucket
					# For each bucket, we'll add a new stub to the results
					$results .= View::make('bucket_search_result')->with('bucket', $bucket)->render();
				}

				# Return the HTML/View to JavaScript...
				return $results;
			}
		}
	}



}