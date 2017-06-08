<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redis; 
use App\Models\Loan;
use App\Models\Record;
use App\Models\Overdue;
use App\Models\date;
use App\Models\method;
use App\Models\type;
use App\Models\amount;
use App\Models\Profile;
use App\Models\User;
use App\Models\REST;

class loanController extends Controller
{
    //借贷首页
    function index()
    {
        $date = date::all()->toarray();
        $type = type::all()->toarray();
        $amount = amount::all()->toarray();
        $method = method::all()->toarray();
    	return view('home/loan/index',['date'=>$date,'type'=>$type,'amount'=>$amount,'method'=>$method]);
    }
    //随机生成用户名
    function randName()
    {
        $arr = ['A','B', 'C', 'D', 'E', 'F', 'G','H', 'I','J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q','R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l' ,'m' ,'n', 'o', 'p', 'q','r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',1,2,3,4,5,6,7,8,9];
        $rand = rand(6,15);
        $name = '';
        for ($i=0;$i<$rand;$i++) {
            if ($i!=0) {
                $name.=$arr[rand(0,60)];
            } else {
                $name.=$arr[rand(0,51)];
            }        
        }
        return $name;
    }
    //记录添加，用户生成
    function wapRegister()
    {
        //防止xss攻击
        //防止sql注入
        $post = Input::get();
        unset($post['_token']);
        foreach ($post as $key=>$val) {
            //$post[$key] = clean($val);//防止xss攻击
            if (!is_numeric($val)) {
                $arr['error']['code'] = 1;
                $arr['error']['message'] = '请重新正确输入信息';
                return json_encode($arr);
            }
        }
        //短信验证
        $sess_phone = session($post['phone']);
		if (!empty($sess_phone)) {
			$last_time = $sess_phone['send_time'];
			$code = $sess_phone['phonecode'];
			$num = time() - $last_time;
			//验证正确性及是否过期
			if ($num > 600 || $code != $post['msg']) {
				$arr['error']['code'] = 1;
				$arr['error']['msg'] = '验证码错误或已过期';
				return json_encode($arr);
			}
            //判断用户是否已注册
            $profile = Profile::where('phone',$post['phone'])->first();
            if ($profile!='') {
                $user_id = $profile->user_id;
            }else{
                //替用户注册
                $user = new User;
                $user->username = $this->randName();
                $user->password = md5('123456');
                $user->phone = $post['phone'];
                $user->save();
                $profile = new Profile;
                $profile->user_id = $user->id;
                $profile->phone = $post['phone'];
                $profile->save();
                $user_id = $user->id;
            }
            //调用插入贷款记录方法
            if ($this->loanAdd($post,$user_id)) {
                $arr['error']['code'] = 0;
                $arr['error']['message'] = '';
            } else {
                $arr['error']['code'] = 1;
                $arr['error']['message'] = '生成记录失败，请您与管理员联系';
            } 
		} else {
            $arr['error']['code'] = 1;
			$arr['error']['msg'] = '非法请求';
		}

        return json_encode($arr);
    }

    /**
	 * @action: phoneSend 手机发送验证码
	 */
	public function wapSendMsg()
	{
        //17768579986
        //$ret['error'] = ['code' => '0', 'msg' => '发送成功'];
        //return json_encode($ret);
		$phone = Input::get('phone');
        $ret['error'] = ['code' => '0', 'msg' => '发送成功'];
        $time = time();
        // 检测发短信间隔是否在一分钟内
        $phonecode = session($phone);
        if (!empty($phonecode)) {
            $last_time = $phonecode['send_time'];
            $num = $time - $last_time;
            if ($num <= 60) {
                $ret['error']['code'] = 3;
                $ret['error']['msg'] = '一分钟之内只能发送一次验证码';
                return json_encode($ret);
            }
        }
	        //生成随机验证码
	        $p_code = rand(100000, 999999);
	        //构建短信发送数组，由验证码和时间(min)组成
			$datas = ["$p_code",'10'];
			// 初始化REST SDK
		    $rest = new REST();
		    // 发送模板短信
		    $result = $rest->sendTemplateSMS($phone,$datas);
		    if ($result['statusCode'] != 0 || $result == NULL ) {
		    	$ret['error']['code'] = '2';
	        	$ret['error']['msg'] = '发生异常，请联系管理员或稍候再试！';
		    } else {
		    	//构建手机验证码的SESSION存储数据
				$data = ['phonecode' => $p_code, 'send_time' =>$time];
		        //手机验证码存session
		        session(["$phone" => $data]);
		    }

        return json_encode($ret);
	}

    //重新发送短信
    function wapReSendMsg()
    {
        //发送短信进行手机号验证
        //将短信内容进行存储cookie
        $arr['error']['code'] = 0;
        return json_encode($arr);               
    }

    //插入贷款记录
    function loanAdd($post,$user_id)
    {
        $loan = new Loan;
    	$loan->user_id = $user_id;
    	$loan->loan_amount = $post['loan_amount'];//贷款金额

        $loan_rate = 0;
        $over_rate = 0;
        $type = Type::where('type_id',$post['loan_type'])->first()->toarray();
        $method = Method::where('method_id',$post['payment_method'])->first()->toarray();
        $loan_rate += $type['rate'];
        $loan_rate += $method['rate'];
        $over_rate += $type['over_rate'];
        $over_rate += $method['over_rate'];
        //判断期限
        $date = date::all()->toarray();
    	foreach($date as $key=>$val){
            $arr = explode('~',$val['date_range']);
            if ($post['loan_period']<$arr[1]&&$post['loan_period']>$arr[0]) {
                $loan_rate += $val['rate'];
                $over_rate += $val['over_rate'];
            }
        }
        //判断贷款金额
        $amount = Amount::all()->toarray();
        foreach($amount as $key=>$val){
            $arr = explode('~',$val['amount_range']);
            if ($post['loan_period']<$arr[1]&&$post['loan_period']>$arr[0]) {
                $loan_rate += $val['rate'];
                $over_rate += $val['over_rate'];
            }
        }
        $loan->over_rate = $over_rate;
        $loan->loan_rate = $loan_rate;
    	$loan->loan_period = $post['loan_period'];//贷款期限
    	$loan->loan_type = $post['loan_type'];
    	$loan->loan_addtime = time();
        $loan->payment_method = $post['payment_method'];//还款方式
        if ($loan->payment_method==1) {
            //等额本息计算公式
        //每月应还款
        $month = $post['loan_amount']*$loan_rate*pow((1+$loan_rate),$post['loan_period'])/(pow((1+$loan_rate),$post['loan_period'])-1);
        $loan->total = $month*$post['loan_period'];
        } else {
            //等额本金计算公式
        $str=0;
        for($i=0;$i<$post['loan_period'];$i++){
            $month=$post['loan_amount']/$post['loan_period'];
            $str+=$month;
            $str+=($post['loan_amount']-$i*$month)*$loan_rate;
        }
        $loan->total = $str;
        }
    	return $loan->save();
    }
    
    //测试
    function test()
    {
        $data = Profile::where('phone',15124573360)->first();
        if ($data!='') {
            var_dump($data);
        }else{
            return 2;
        }
        
    }

     //redis测试
    function redis()
    {
        Redis::set('test','hello world');
        $user = Redis::get('test');
        print_r($user);
    }
}
