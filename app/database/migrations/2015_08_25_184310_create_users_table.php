<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
    		$table->increments('id');
    		$table->string('first_name');
    		$table->string('last_name');
    		$table->string('email');
    		$table->string('password');
    		$table->string('remember_token');
    		$table->string('confirmation_token');
    		$table->boolean('is_confirmed');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
