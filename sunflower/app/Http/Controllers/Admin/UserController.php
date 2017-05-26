<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
     * 后台首页主体页面
     *
     * @param
     * @return
     */
    public function vip()
    {
        return view('admin/user/vip');
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
