<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function register()
	{
		return View::make('users/register');
	}

	public function login()
	{
		//$html = 
		return View::make('users/login');
	}

	public function saveUser()
	{
		$data = Input::all();

		$validator = Validator::make($data, User::$rules);

		if($validator->passes())
		{
			$user = new User();
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->email = $data['email'];
			$user->password = Hash::make($data['password']);
			$user->confirmation_token = md5(uniqid(mt_rand(), true));
			$user->is_confirmed = 0;
			$user->save();

			Mail::send('emails.confirm-registration', array('user' => $user), function($message) use ($user)
        	{
            	$message->from('baba@yaga.com', 'Vn');
            	$message->to($user->email)->subject('Activate your account');
        	});

			return Response::json(array(
				'success' => true, 
				 'user' => $user));
		}
		
		return Response::json(array(
			'success' => false, 
			'errors' => $validator->messages()));
	}

	public function loginUser()
	{
		$data = Input::all();
		
		if (Auth::attempt(
            array(
                'email' => $data['email'],
                'password' => $data['password'],
                'is_confirmed' => 1
            ),
            true
        ))
		{
			$user = User::whereEmail($data['email'])->first();
			return Response::json(array(
				'success' => true, 
				'user' => $user));
		}

		return Response::json(array(
            'success' => false,
            'error' => 'OOPS... looks like some of the details are wrong. Please try again'
        ));
	}

	public function confirmRegistration($id, $token)
	{
		$user = User::find($id);

 		if (empty($user) || $user->confirmation_token != $token){
 			return Redirect::route('home');
 		}
 		
 		$user->is_confirmed = 1;
		$user->save();

		return View::make('users/confirm');
	}
}
