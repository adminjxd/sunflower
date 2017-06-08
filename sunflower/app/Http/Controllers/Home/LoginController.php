<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input; 
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Oauth_user;
use App\Models\Profile;
// use Request;

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
        // 接值
        $username = Input::get('username');
        $captcha = Input::get('captcha');
        $pwd = Input::get('password');
        $ret = ['retCode' => '0', 'msg' => ''];
        $piccode = session('piccode');
        if ($captcha != $piccode) {
        	$ret['msg'] = '验证码错误';
        } else {
	        //验证帐号密码的正确性 
	        $res = User::where('username', '=', $username )->orWhere('phone', '=', $username )->orWhere('email', '=', $username )->where('password', '=', md5($pwd))->first();
	        if (!$res) {
	        	$ret['msg'] = '用户名密码错误，请重新登陆';
	        } else {
                $user_info = $res->toArray();
                $profile_data = [
                    'last_logintime' => date('Y-m-d H:i:s'),
                    'last_ip' => Oauth_user::getIp(),
                ];
                Profile::where('user_id', '=', $user_info['id'])->update($profile_data);
		        // //存储session
		        session(['userinfo' => $user_info]);
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

		return json_encode(['cap_url'=>$captcha]);
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
        $info=json_decode($content,true); //输出登录结果

        $uid = $info['uid'];
        $oauth_info = Oauth_user::where('oauth_user_id', '=', md5($uid))->first();
        if(!$oauth_info)
        {
            return redirect('login/bind_user?uid='.$uid);
        }
        else
        {
            $user_info = User::where('id', '=', $oauth_info['user_id'] )->first();
            $profile_data = [
                'last_logintime' => date('Y-m-d H:i:s'),
                'last_ip' => Oauth_user::getIp(),
            ];
            Profile::where('user_id', '=', $oauth_info['user_id'])->update($profile_data);
            // //存储session
            session(['userinfo' => $user_info->toArray()]);
            return redirect('index/index');
        }
    }

    //帐号绑定
    public function bindUser(Request $request)
    {
        $uid = $request->input('uid');
        $builder = new CaptchaBuilder;
        $builder->build();
        $captcha = $builder->inline();  //获取图形验证码的url
        //将图形验证码的值写入到session中
        session(['piccode' => $builder->getPhrase()]);
        return view('home/register/bind_user', ['captcha'=>$captcha,'uid'=>$uid]);
    }

    //帐号绑定执行
    public function bindDo()
    {
        //接值
        $username = Input::get('username');
        $captcha = Input::get('captcha');
        $password = Input::get('password');
        $b_sign = Input::get('b_sign');
        $uid = Input::get('uid');
        $ret = ['retCode' => '0', 'msg' => ''];
        //判断是绑定注册帐号还是已有帐号
        if ($b_sign == '1') {
            $piccode = session('piccode');
            if ($captcha != $piccode) {
                $ret['retCode'] = '3';
                $ret['msg'] = '验证码错误';
                return json_encode($ret);
            }
            //接值
            $phone = Input::get('phone');
            $verifyCode = Input::get('verifyCode');
            $pwdlevel = Input::get('pwdlevel');
            //验证手机验证码的有效性
            $sess_phone = session($phone);
            if (!empty($sess_phone)) {
                $last_time = $sess_phone['send_time'];
                $code = $sess_phone['phonecode'];
                $num = time() - $last_time;
                //验证正确性及是否过期
                if ($num > 300 || $code != $verifyCode) {
                    $ret['msg'] = '手机验证码错误或已过期';
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
                    'last_ip' => Oauth_user::getIp(),
                    'head' => 'images/touxiang.png',
                ];
                $res = Profile::insert($data);

                //注册之后免登陆
                //session存储用户信息
                $user_info = [
                    'id' => $user_id,
                    'username' => $username,
                    'password' => md5($password),
                ];
                session(['userinfo' => $user_info]);
                session()->forget("$phone");
            }
        } else {
            $piccode = session('piccode');
            if ($captcha != $piccode) {
                $ret['msg'] = '验证码错误';
                return json_encode($ret);
            } else {
                //验证帐号密码的正确性 
                $res = User::where('username', '=', $username )->orWhere('phone', '=', $username )->orWhere('email', '=', $username )->where('password', '=', md5($pwd))->first();
                if (!$res) {
                    $ret['msg'] = '用户名密码错误';
                    return json_encode($ret);
                } else {
                    $user_info = $res->toArray();
                    $user_id = $user_info['id'];
                    //检测该帐号是否绑定过
                    $oauth_info = Oauth_user::where('user_id', '=', $user_id )->first();
                    if ($oauth_info) {
                        $ret['msg'] = '该帐号已绑定';
                        return json_encode($ret);
                    } else {
                        $profile_data = [
                            'last_logintime' => date('Y-m-d H:i:s'),
                            'last_ip' => Oauth_user::getIp(),
                        ];
                        Profile::where('user_id', '=', $user_id)->update($profile_data);
                        // //存储session
                        session(['userinfo' => $user_info]);
                    }
                }
            }
        }

        //绑定帐号
        //第三方信息入库
        $data = [
            'oauth_user_id' => md5($uid),
            'oauth_id' => 1,
            'user_id' => $user_id,
            'datetime' => date('Y-m-d H:i:s',time()),
        ];
        Oauth_user::insert($data);
        //存储session
        $ret['retCode'] = 1;
        $ret['msg'] = '绑定成功';

        return json_encode($ret);
    }

}