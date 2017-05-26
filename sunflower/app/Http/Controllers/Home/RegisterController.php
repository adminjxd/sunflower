<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class RegisterController extends Controller
{
	/**
	 * @action: Register 注册
	 */
	public function reg()
	{
		return view('home/register/reg');
	}
}