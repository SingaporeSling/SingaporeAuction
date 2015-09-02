<?php

class CategoriesController extends \BaseController {

	public function singleCategory($id)
	{
		$category = Category::find($id);
		if (empty($category)) return '';

		return View::make('categories/single_category', compact('category'));
	}

}