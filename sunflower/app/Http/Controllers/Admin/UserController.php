<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Authentication;

class UserController extends Controller
{
	/**
     * 查看用户信息
     *
     * @param
     * @return
     */
    public function showUserinfo()
    {
        return view('admin/user/userinfo');
    }

    /**
     * 实名认证
     *
     * @param
     * @return
     */
    public function vip()
    {
        // $auth_info = Authentication::where('status', '=', "0")->limit(10)->get()->toArray();
        $auth_info = Authentication::where('status', '=', "0")->paginate(20);
        // echo '<pre>';
        // print_r($auth_info);
        // die;
        return view('admin/user/vip',['auth_info'=>$auth_info]);
    }

    /**
     * 信誉评估
     *
     * @param
     * @return
     */
    public function reputation()
    {
        return view('admin/user/reputation');
    }
}
