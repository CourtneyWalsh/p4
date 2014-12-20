<?php

class libraryController extends \BaseController {


	/**
	*
	*/
	public function __construct() {

		# Make sure BaseController construct gets called
		parent::__construct();

		$this->beforeFilter('auth', array('except' => ['getIndex','getDigest']));

	}

	/**
	* Display all librarys
	* @return View
	*/
	public function getIndex() {

		# Format and Query are passed as Query Strings
		$format = Input::get('format', 'html');

		# Decide on output method...
		# Default - HTML
		if($format == 'html') {
			return View::make('library_index');
		}
		# JSON
		elseif($format == 'json') {
			return Response::json($library);
		}
		# PDF (Coming soon)
		elseif($format == 'pdf') {
			return "This is the pdf (Coming soon).";
		}


	}


}