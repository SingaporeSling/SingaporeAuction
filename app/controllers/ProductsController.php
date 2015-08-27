<?php

class ProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function createProduct()
	{
		$categories = Category::all();
		return View::make('products/create-product', array('categories' => $categories));
	}

	public function allProducts()
	{
		$products = Product::all();
		return View::make('products/all-products', array('products' => $products));
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

				if(isset($data['categories']) && !empty($data['categories']))
				{
					$product->categories()->attach($data['categories']);
				}

				if (Session::has('files'))
				{
					$files = Session::get('files'); // get session files
					foreach ($files as $key => $file)
					{
						$directory_file = public_path() . '/product_images/' . $file;

						if (File::exists( $directory_file ))
							File::move($directory_file, public_path() . '/product_images/product_' . $product->id . '_' . $key . '.jpg');
					}

					Session::forget('files');
				}

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

	/*
	 * save product image on server directory
	 * keep name in session, save it on product creation
	*/
	public function saveProductImage()
	{
		if (!Auth::guest())
		{
			$file = Input::file('file');
			$directory = public_path() . '/product_images/';
			$file_name = $file->getClientOriginalName();

			if (!File::exists( $directory . $file_name ))
				$file->move($directory, $file_name);

			if (!Session::has('files')) 
				Session::put('files', []);

			Session::push('files', $file_name);

			return Response::json(array(
				'success' => true
			));
		}

		return Response::json(array(
			'success' => false
		));
	}

	public function viewProduct($id)
	{
		$product = Product::find($id);
		$files = File::glob(public_path() . '/product_images/product_'.$product->id.'*.jpg', GLOB_MARK);
		$imagesNames = array();

		foreach($files as $file)
		{
			$imageFile = explode('product_images/', $file);
			$imageNames[] = $imageFile[1];
		}
		return View::make('products/view-product', array('product'=>$product, 'files'=>$imageNames));
	}
}
