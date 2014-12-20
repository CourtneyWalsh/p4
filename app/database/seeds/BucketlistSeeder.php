<?php
 
class BucketlistSeeder extends Seeder {
 
  public function run()
  {
  
 	$user = new User;
		$user->email      = 'cnw353@gmail.com';
		$user->password   = Hash::make('Courtney1');
		$user->first_name = 'Courtney';
		$user->last_name  = 'Walsh';
		$user->save();

  }
 
}