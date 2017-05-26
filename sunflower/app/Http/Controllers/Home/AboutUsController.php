<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;


class AboutUsController extends Controller
{
	/**
	 * @action: Company announcement 公司公告
	 */
	public function announcement()
	{
		return view('home/aboutus/announcement');
	}
	/**
	 * @action: Company profile 公司简介
	 */
	public function profile()
	{
		return view('home/aboutus/company_profile');
	}
	/**
	 * @action: Management team 管理团队
	 */
	public function manageTeam()
	{
		return view('home/aboutus/management_team');
	}
	/**
	 * @action:  Notice 网站公告
	 */
	public function notice()
	{
		return view('home/aboutus/notice');
	}
	/**
	 * @action:  Contact us 联系我们
	 */
	public function contactUs()
	{
		return view('home/aboutus/contactus');
	}
	/**
	 * @action:  Partner    合作伙伴
	 */
	public function partner()
	{
		return view('home/aboutus/partner');
	}
	/**
	 * @action:  Media reports  媒体报道
	 */
	public function reports()
	{
		return view('home/aboutus/media_reports');
	}
	/**
	 * @action:  Team style  团队风采
	 */
	public function teamStyle()
	{
		return view('home/aboutus/team_style');
	}
	/**
	 * @action:  Legal policy  法律政策
	 */
	public function legalPolicy()
	{
		return view('home/aboutus/legal_policy');
	}
	/**
	 * @action:  Legal notice  法律声明
	 */
	public function legalNotice()
	{
		return view('home/aboutus/legal_notice');
	}
	/**
	 * @action:  Description charges  资费说明
	 */
	public function descriptionCharges()
	{
		return view('home/aboutus/description_charges');
	}
	/**
	 * @action:  Recruitment  招贤纳士
	 */
	public function recruitment()
	{
		return view('home/aboutus/recruitment');
	}
}