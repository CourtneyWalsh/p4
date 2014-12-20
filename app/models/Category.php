<?php

class Category extends Eloquent {

	/**
	* Identify relation between Author and bucket
	*/
	public function bucket() {
        # Author has many buckets
        # Define a one-to-many relationship.
        return $this->hasMany('bucket');
    }

    /**
	* When editing or adding a new bucket, we need a select dropdown of authors to choose from
	* A select is easy to generate when you have a key=>value pair to work with
	* This method will generate a key=>value pair of author id => author name
	*
	* @return Array
	*/
    public static function getIdTypePair() {

		$categories = Array();

		$collection = Category::all();

		foreach($collection as $category) {
			$categories[$category->id] = $category->type;
		}

		return $categories;
	}


}