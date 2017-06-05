<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input; 
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oauth_user;

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
    public function changeCaptcha()
    {
		$builder = new CaptchaBuilder;
		$builder->build();
		$captcha = $builder->inline();  //获取图形验证码的url
		session(['piccode' => $builder->getPhrase()]);
		
		return json_encode($captcha);
	}

    /**
     * 第三方登陆
     *
     * @param
     * @return
     */
    public function oauthLogin(Request $request){
        $code = $request->input('code');
        $client_id='3465828263';
        $client_secret='233e78fcb17519226775b55fe3dac777';
        $grant_type='authorization_code';
        $redirect_uri='http://www.dev.com/login/oauth_login';
        $url='https://api.weibo.com/oauth2/access_token';
        $vars=array(
            'client_id'=>$client_id,
            'client_secret'=>$client_secret,
            'grant_type'=>$grant_type,
            'redirect_uri'=>$redirect_uri,
            'code'=>$code,
        );
        $method_post = true;

        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = true; //是否重定向
        $params[CURLOPT_USERAGENT] = 'Mozilla/5.0 (Windows NT 5.1; rv:9.0.1) Gecko/20100101 Firefox/9.0.1';

        $postfields = '';
        foreach ($vars as $key => $value){
            $postfields .= urlencode($key) . '=' . urlencode($value) . '&';  
        }

        $params[CURLOPT_POST] = true;
        $params[CURLOPT_POSTFIELDS] = $postfields;
        $params[CURLOPT_SSL_VERIFYPEER] = false;
        $params[CURLOPT_SSL_VERIFYHOST] = false;

        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        // echo '<pre>';
        $info=json_decode($content,true); //输出登录结果

        $uid = $info['uid'];
        $oauth_info = Oauth_user::where('oauth_user_id', '=', md5($uid))->first();
        if(!$oauth_info)
        {
            return redirect('login/bind_user/'.$uid);
        }
        else
        {
            $user_info = User::where('id', '=', $info['user_id'] )->first();
            // //存储session
            session(['userinfo' => $user_info->toArray()]);
            return redirect('index/index');
        }
    }

    //帐号绑定
    public function bindUser(Request $request)
    {
        // echo $uid;
        if($request->isMethod('get')){
            echo 123;
        } else {
            echo 456;
        }
        die;
        //第三方信息入库
        $data = [
            'oauth_user_id' => md5($uid),
            'oauth_id' => 1,
            'datetime' => date('Y-m-d H:i:s',time()),
        ];
        $oauth_info_id = Oauth_user::insertGetId($data);
        return view('home/login/bind', ['oau_id'=>$oau_id]);
    }

}