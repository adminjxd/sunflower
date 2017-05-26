<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;  
use App\Models\Admin;

class LoginController extends Controller
{
	/**
     * 登陆
     *
     * @param
     * @return
     */
    public function loginCheck()
    {
        //接值
        $data = Input::get();  
        $username = $data['username'];  
        $pwd = md5($data['pwd']);
        
        //验证帐号密码的正确性 
        $res = Admin::where('username', '=', $username )->where('password', '=', $pwd)->first();
        if (!$res) {
            echo "<script>alert('用户名密码错误，请重新登陆');location.href='" . asset('alogin/login') . "';</script>";
            die;
        }

        //存储session
        session(['admininfo' => $res->toArray()]);
        return redirect('aindex/index');
    }
    
    /**
     * 退出
     *
     * @param
     * @return
     */
    public function loginout()
    {
        //销毁session
        session()->forget('admininfo');
        echo "<script>alert('退出成功');location.href='" . asset('alogin/login') . "';</script>";
    }



}
