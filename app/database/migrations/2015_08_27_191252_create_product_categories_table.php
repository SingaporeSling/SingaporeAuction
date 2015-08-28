<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->integer('product_id')->unsigned();

			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			
			$table->unique(array('product_id', 'category_id'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_categories');
	}

}
