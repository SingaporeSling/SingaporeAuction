<?php

class Category extends \Eloquent {
	protected $fillable = ['name'];
	public $timestamps = false;
	protected $table = 'categories';
}