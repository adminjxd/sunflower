<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class SafeController extends Controller
{
	/**
	 * @action: Safe 安全保障
	 */
	public function help()
	{
		return view('home/safe/safe');
	}
}