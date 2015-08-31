<?php

class Product extends \Eloquent {
	protected $fillable = [];
	public $timestamps = false;
	protected $table = "products";
	public static $rules = array(
		'product_name' => 'required',
		'description' => 'required',
     	'start_price' => 'required|numeric',
	);

	public function categories()
	{
		return $this->belongsToMany('Category', 'product_categories', 'product_id', 'category_id');
	}
}