<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class LoginController extends Controller
{
	/**
	 * @action: Login 登录
	 */
	public function login()
	{
		return view('home/login/login');
	}
}