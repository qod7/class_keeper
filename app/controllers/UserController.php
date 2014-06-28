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

}