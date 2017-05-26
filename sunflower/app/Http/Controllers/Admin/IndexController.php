<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	/**
     * 后台首页入口
     *
     * @param
     * @return
     */
    public function index()
    {
        $admininfo = session('admininfo');
        if (empty($admininfo)) {
            echo "<script>alert('请先登陆');location.href='" . asset('alogin/login') . "';</script>";
            die;
        }
        return view('admin/index/index',['admininfo' => $admininfo]);
    }

    /**
     * 后台首页主体页面
     *
     * @param
     * @return
     */
    public function home()
    {
        return view('admin/index/home');
    }
}
