<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function createProduct()
	{
		return View::make('products/create-product');
	}

	public function allProducts()
	{
		return View::make('products/all-products');
	}

	public function saveProduct()
	{
		$data = Input::all();

		if(!Auth::guest())
		{
			$validator = Validator::make($data, Product::$rules);
			
			if($validator->passes())
			{
				$user = Auth::user();
				$product = new Product();
				$product->user_id = $user->id;
				$product->product_name = $data['product_name'];
				$product->description = $data['description'];
				$product->start_price = $data['start_price'];
				$product->save();

				return Response::json(array(
					'success' => true,
					'product' => $product
				));
			}

			return Response::json(array(
				'success' => false,
				'type' => 'form_error',
				'errors' => $validator->messages()
			));
		}

		return Response::json(array(
			'success' => false,
			'type' => 'log_error',
			'error' => 'In order to save your product, please, log in!'
		));
	}

	public function saveProductImage()
	{
		$file = $_SERVER['HTTP_X_FILENAME'];
		dd($file);
		 $data = $_FILES;
		 $second_data = $_POST;
		 var_dump($data);
		var_dump($second_data);
		die;
		$file = Input::file('file');
		dd($file);
		$file->move(public_path() . '/product_images');

		return Response::json(array(
			'success' => true
			));
	}
}
