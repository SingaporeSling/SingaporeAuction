<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();
		Category::create(array(
			'name' => 'test',
			));
		Category::create(array(
			'name' => 'other',
			));
		Category::create(array(
			'name' => 'test2',
			));
		Category::create(array(
			'name' => 'test3',
			));
		Category::create(array(
			'name' => 'test4',
			));
		Category::create(array(
			'name' => 'test5',
			));
	}

}