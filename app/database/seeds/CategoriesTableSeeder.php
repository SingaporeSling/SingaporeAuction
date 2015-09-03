<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();
		Category::create(array(
			'name' => 'Pets',
			));
		Category::create(array(
			'name' => 'Cosmetics',
			));
		Category::create(array(
			'name' => 'Clothes and shoes',
			));
		Category::create(array(
			'name' => 'Large & small appliance',
			));
		Category::create(array(
			'name' => 'IT and communications',
			));
		Category::create(array(
			'name' => 'TV and Audio',
			));
	}

}