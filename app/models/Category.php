<?php

class Category extends \Eloquent {
	protected $fillable = ['name'];
	public $timestamps = false;
	protected $table = 'categories';

	public function products()
	{
		return $this->belongsToMany("Product", 'product_categories', 'category_id', 'product_id')->whereClosed(0);
	}
}