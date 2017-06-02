<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Input; 
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
	/**
	 * @action: Login 登录
	 */
	public function login()
	{
		$builder = new CaptchaBuilder;
		$builder->build();
		$captcha = $builder->inline();  //获取图形验证码的url
		//将图形验证码的值写入到session中
		session(['piccode' => $builder->getPhrase()]);

		return view('home/login/login', ['captcha'=>$captcha]);
	}

	/**
     * 登陆验证
     *
     * @param
     * @return
     */
    public function loginCheck()
    {
        //接值
        $username = Input::get('username');
        $captcha = Input::get('captcha');
        $pwd = Input::get('password');
        $ret = ['retCode' => '0', 'msg' => ''];
        $piccode = session('piccode');
        if ($captcha != $piccode) {
        	$ret['msg'] = '验证码错误';
        } else {
	        //验证帐号密码的正确性 
	        $res = User::where('username', '=', $username )->where('password', '=', md5($pwd))->first();
	        if (!$res) {
	        	$ret['msg'] = '用户名密码错误，请重新登陆';
	        } else {
		        // //存储session
		        session(['userinfo' => $res->toArray()]);
		        $ret['retCode'] = 1;
	        }
        }

        return json_encode($ret);
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
        session()->forget('userinfo');
        // session()->flush();
        return view('message',['msg'=>'退出成功','url'=>asset('login/login')]);
    }

    /**
     * 更换验证码
     *
     * @param
     * @return
     */
    public function changeCaptcha(){
		$builder = new CaptchaBuilder;
		$builder->build();
		$captcha = $builder->inline();  //获取图形验证码的url
		session(['piccode' => $builder->getPhrase()]);
		
		return json_encode($captcha);
	}
}