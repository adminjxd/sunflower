<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class IndexController extends Controller
{
	/**
	 * @action: index 首页
	 */
	public function index()
	{
		return view('home/index');
	}
	
}