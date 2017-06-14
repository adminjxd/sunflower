<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;  
use Gregwar\Captcha\CaptchaBuilder;
use App\Models\User;
use App\Models\Profile;
use Request;
use App\Models\REST;
// use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
	/**
	 * @action: Register 注册
	 */
	public function reg()
	{
		//生成验证码
		$builder = new CaptchaBuilder;
		$builder->build();
		$captcha = $builder->inline();  //获取图形验证码的url
		//将图形验证码的值写入到session中
		session(['piccode' => $builder->getPhrase()]);

		return view('home/register/reg', ['captcha'=>$captcha]);
	}

	/**
	 * @action: checkName 验证注册用户名
	 */
	public function checkName()
	{
		//接值
        $username = Input::get('username');
        $ret = ['retCode' => '1', 'msg' => ''];
        $res = User::where('username', '=', $username )->first();
        if (!empty($res)) {
        	$ret['msg'] = '用户名已存在';
        	$ret['retCode'] = 0;
        }

        return json_encode($ret);
	}

	/**
	 * @action: regDo 注册执行
	 */
	public function regDo()
	{
		//接值
        $username = Input::get('username');
        $password = Input::get('password');
        $phone = Input::get('phone');
        $verifyCode = Input::get('verifyCode');
        $pwdlevel = Input::get('pwdlevel');
        //构建返回数组
        $ret = ['retCode' => '0', 'msg' => ''];
        //验证手机验证码的有效性
		$sess_phone = session($phone);
		if (!empty($sess_phone)) {
			$last_time = $sess_phone['send_time'];
			$code = $sess_phone['phonecode'];
			$num = time() - $last_time;
			//验证正确性及是否过期
			if ($num > 60 || $code != $verifyCode) {
				$ret['retCode'] = 2;
				$ret['msg'] = '验证码错误或已过期';
				return json_encode($ret);
			}
		} else {
			$ret['msg'] = '非法请求';
			return json_encode($ret);
		}

        //检测用户名
        $res = User::where('username', '=', $username )->first();
        if (!empty($res)) {
        	$ret['msg'] = '用户名已被注册！';
        } else {
        	// 注册信息入库
	        $user_id = User::insertGetId(['username'=>$username,'password'=>md5($password),'phone'=>$phone,'pwdlevel'=>$pwdlevel]);
	        $data = [
	        	'user_id' => $user_id,
	        	'phone' => $phone,
	        	'register_date' => date('Y-m-d H:i:s'),
	        	'last_logintime' => date('Y-m-d H:i:s'),
	        	'last_ip' => Request::getClientIp(),
	        	'head' => 'images/touxiang.png',
	        ];
	        $res = Profile::insert($data);
	        $ret['retCode'] = '1';

	        //注册之后免登陆
	        //session存储用户信息
	        $user_info = [
	        	'id' => $user_id,
	        	'username' => $username,
	        	'password' => md5($password),
	        	'phone'=>$phone,
	        	'pwdlevel'=>$pwdlevel
	        ];
	        session(['userinfo' => $user_info]);
	        session()->forget("$phone");
        }

        return json_encode($ret);
	}

	/**
	 * @action: regSuccess 注册成功
	 */
	public function regSuccess($username = '')
	{
		return view('home/register/reg1',['username' => $username]);
	}

	/**
	 * @action: checkYzm 验证码验证
	 */
	public function checkYzm()
	{
		$verifyCode = Input::get('verifyCode');
        $byName = Input::get('byName');
        $ret = ['retCode' => '1', 'msg' => '验证成功'];
        //判断验证码类型
        if ($byName == 'phonVerify') {
	        $phone = Input::get('phone');
        	$ses = session("$phone");
        	$code = $ses['phonecode'];
        	// 检测验证码是否过期
        	$num = time() - $ses['send_time'];
        	if ($num > 300) {
        		$ret['retCode'] = 0;
	        	$ret['msg'] = '验证码已过期';
	        	return json_encode($ret);
        	}
        } else {
        	//图片验证码
	        $code = session('piccode');
        }
        //检测验证码是否正确
        if ($verifyCode != $code) {
        	$ret['retCode'] = 0;
        	$ret['msg'] = '验证码错误';
        }

        return json_encode($ret);
	}

	/**
	 * @action: phoneSend 手机发送验证码
	 */
	public function phoneSend()
	{
		$phone = Input::get('phone');
        $ret = ['retCode' => '0', 'msg' => '发送成功'];
        //验证手机号是否存在
        $res = Profile::where('phone', '=', $phone )->first();
        if (!empty($res)) {
        	$ret['retCode'] = '1';
        	$ret['msg'] = '该手机号码已经注册';
        } else {
        	$time = time();
        	// 检测发短信间隔是否在一分钟内
	        $phonecode = session($phone);
	        if (!empty($phonecode)) {
	        	$last_time = $phonecode['send_time'];
	        	$num = $time - $last_time;
	        	if ($num <= 60) {
	        		$ret['retCode'] = 3;
		        	$ret['msg'] = '一分钟之内只能发送一次验证码';
	        		return json_encode($ret);
	        	}
	        }

	        //生成随机验证码
	        $p_code = rand(100000, 999999);
	        //构建短信发送数组，由验证码和时间(min)组成
			$datas = ["$p_code",'5'];
			// 初始化REST SDK
		    $rest = new REST();
		    // 发送模板短信
		    $result = $rest->sendTemplateSMS($phone,$datas);
		    if ($result['statusCode'] != 0 || $result == NULL ) {
		    	$ret['retCode'] = '2';
	        	$ret['msg'] = '发生异常，请联系管理员或稍候再试！';
		    } else {
		    	//构建手机验证码的SESSION存储数据
				$data = ['phonecode' => $p_code, 'send_time' =>$time];
		        //手机验证码存session
		        session(["$phone" => $data]);
		    }
        }

        return json_encode($ret);
	}
}