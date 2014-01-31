<?php

use Illuminate\Database\Migrations\Migration;

class SeedUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('users')->insert(
								   array('group_id' => '1', 
			                             'username' => 'admin', 
			                             'password' => Hash::make('admin'), 
			                             'first_name' => 'Albert', 
			                             'last_name' => 'Maranian',
			                             'email' => 'albertmaranian@gmail.com')
								   );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}