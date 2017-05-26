<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class CrowdfundingController extends Controller
{
	/**
	 * @action: Crowdfunding 众筹
	 */
	public function cfList()
	{
		return view('home/crowdfunding/crowdfunding_list');
	}
}