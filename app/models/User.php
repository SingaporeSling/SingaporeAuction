<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	public $timestamps = false;
	public static $rules = array(
		'first_name' => 'required|alpha',
		'last_name' => 'required|alpha',
		'email' => 'required|email|unique:users',
		'password' =>  array('required', 'confirmed', 'regex:/\S*(\S*([a-zA-Z]\S*[0-9])|([0-9]\S*[a-zA-Z]))\S*/'),
     	'password_confirmation' => 'required',
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getSexAttribute($value)
	{
		$sex = 'female';
		if ($value == 0) $sex = 'male';
		return $sex;
	}

}
