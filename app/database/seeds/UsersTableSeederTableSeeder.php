<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeederTableSeeder extends Seeder {

	public function run()
	{
		$user = User::whereIsAdmin(1)->get()->first();

		if (empty($user))
		{
			$user = new User();
			$user->first_name = 'Auction';
			$user->last_name = 'Admin';
			$user->email = 'staff@singapore-sling.com';
			$user->password = Hash::make('singapore-sling-123');
			$user->confirmation_token = md5(uniqid(mt_rand(), true));
			$user->is_confirmed = 1;
			$user->is_admin = 1;
			$user->save();
		}
	}

}