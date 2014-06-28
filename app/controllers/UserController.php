<?php

class UserController extends BaseController {
	public function getLogin()
	{
		if(!Auth::check())
			return View::make('login');
		else
			return Redirect::route('home');
	}

	public function postLogin()
	{
		$username=Input::get('username');
		$password=Input::get('password');

		if (Auth::attempt(array('username' => $username, 'password' => $password)))
		{
			return Redirect::route('home');
		}
		else
			return View::make('login',array('message' => 'Invalid username or password'));
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('login');
	}

	public function getTeacher()
	{
		return View::make('addteacher');
	}

	public function postTeacher()
	{
		$input = Input::all();
		$validator = Validator::make($input,
			array(
				'name' => 'required',
				'username' => 'required|unique:users',
				'schoolid' => 'required|exists:school,id'
				));

		if (!$validator->fails())
		{
			$user= new User();
			$user->name=$input['name'];
			$user->username=$input['username'];
			$user->save();

			return Redirect::route('addteacher');
		}
		else
		{
			$errors = $validator->messages()->all();
			return View::make('addteacher',array('errors' => $errors));
		}	
	}

}