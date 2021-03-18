<?php

namespace App\Controllers;

class LoginController extends BaseController
{
	public function login()
	{
		return view('login/login');
	}

	public function registration()
	{
		return view('login/registration');
	}
}
