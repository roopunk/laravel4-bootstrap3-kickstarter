<?php

use Illuminate\Database\Migrations\Migration;

class SeedGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('user_groups')->insert(
                        array(
                                array('slug' => 'admin', 'name' => 'Administrator', 'description' => 'Super admin'),
                                array('slug' => 'subscriber', 'name' => 'Domain Subcriber', 'description' => 'Users who purchases domain names and landing pages')
                        ));
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