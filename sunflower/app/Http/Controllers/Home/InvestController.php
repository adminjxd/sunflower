<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class InvestController extends Controller
{
	/**
	 * @action: Invest 投资
	 */
	public function list()
	{
		return view('home/invest/invest_list');
	}
	/**
	 * @action: info 投资详情页
	 */
	public function info()
	{
		return view('home/invest/invest_info');
	}
}