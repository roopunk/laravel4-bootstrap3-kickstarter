<?php

class AuthController extends BaseController
{
	protected $layout = "layouts.auth";
	## Render login form
	public function login()
	{
		$this->layout->body = View::make('auth.login');
	}

	public function doLogin()
	{
		$username = Input::get('username');
		$password = Input::get('password');
		
		if (Auth::attempt(array('username' => $username, 'password' => $password)))
		{
			if (Auth::user()->group_id == Group::admin())
			{
				return Redirect::intended('/admin/dashboard');
			}
		}
		else
		{
			$this->layout->body = View::make('auth.login');
			$this->layout->body->error = "Invalid login credentials";
		}
	}
}