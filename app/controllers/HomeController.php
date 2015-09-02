<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$categories = Category::all();

		if (Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			$user = new User();
			$user->first_name = 'stranger';
		}

		return View::make('main', array(
			'categories' => $categories,
			'user' => $user
		));
	}

	public function getHome()
	{
		$products = Product::all();

		if (Auth::check())
		{
			$user = Auth::user();
		}
		else
		{
			$user = new User();
			$user->first_name = 'stranger';
		}

		return View::make('home', array(
			'products' => $products,
			'user' => $user,
		));
	}

}
