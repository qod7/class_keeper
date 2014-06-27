<?php

class UserController extends BaseController {
	public function getLogin()
	{
		if(!Auth::check())
			return View::make('login');
		else
			return Redirect::route('logout');
	}

	public function postLogin()
	{
		$username=Input::get('username');
		$password=Input::get('password');

		if (Auth::attempt(array('username' => $username, 'password' => $password)))
		{
			//
		}
		else
			return View::make('login',array('message' => 'Invalid username or password'));
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

	public function getSignup()
	{
		return View::make('signup');
	}

	public function postSignup()
	{
		Input::flash();
		$input = Input::all();
		$validator = Validator::make($input,
			array(
				'username' => 'required|min:6|unique:users',
				'password' => 'required|min:6',
				'repassword' => 'required|min:6',
				'email' => 'required|email|unique:users',
				'first_name' => 'required|min:3',
				'last_name' => 'required|min:3'
				));

		if ($validator->fails())
		{
			$errors = $validator->messages()->all();
			return View::make('login',array('signuperrors' => $errors));
		}

		if($input['password'] != $input['repassword'])
			$errors[]="Passwords do not match";

		if(isset($errors))
			return View::make('login',array('signuperrors' => $errors));

		else
		{

			$user= new User();
			$user->username= htmlentities(Input::get('username'));
			$user->password= Hash::make(Input::get('password'));
			$user->email=Input::get('email');
			$user->type=Input::get('type');
			$user->first_name=htmlentities(Input::get('first_name'));
			$user->last_name=htmlentities(Input::get('last_name'));
			$user->gender=htmlentities(Input::get('gender'));
			$user->dob=Input::get('dob');
			$user->contact_no=htmlentities(Input::get('contact_no'));
			$user->address=htmlentities(Input::get('address'));
			$user->save();
		}
	}
}