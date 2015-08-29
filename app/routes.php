<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('register', 'UsersController@register');
Route::post('save-user', 'UsersController@saveUser');
Route::get('login', 'UsersController@login');
Route::get('/', array('uses' => 'HomeController@index', 'as' => 'home'));
Route::post('login-user', 'UsersController@loginUser');
Route::get('confirm/{user_id}/{token}', 'UsersController@confirmRegistration');
Route::get('create-product', 'ProductsController@createProduct');
Route::get('all-products', 'ProductsController@allProducts');
Route::post('save-product', 'ProductsController@saveProduct');
Route::post('save-product-image', 'ProductsController@saveProductImage');
Route::get('view-product/{id}', 'ProductsController@viewProduct');
Route::post('logout', 'UsersController@logout');