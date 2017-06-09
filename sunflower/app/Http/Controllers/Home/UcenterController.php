<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Userprofile;
use App\Models\Loan;
use App\Models\Record;
use App\Models\Overdue;
use App\Models\User;
use App\Models\Authentication;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use App\Models\REST;

class UcenterController extends Controller
{
	/**
	 * @action: Ucenter 我的账户（个人中心）
	 */
	public function myAccount()
	{
		$user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
		 /**
         * 查询用户表的信息，遍历数据
         * 用户名，上次登录的时间
         * 安全级别（正则匹配，单数字或字母类型密码级别低 两张中级  两种加长度级别高 ）
         * 账户的总金额
         */
        $userInfo = Userprofile::join('user', 'user.id', '=', 'user_profile.user_id')->where('user_id','=',$user_id)->first()->toArray();
		$userInfo['balance'] = substr($userInfo['balance'],0,-1);
		//验证密码安全级别
		if($userInfo['pwdlevel'] == 0){
			$userInfo['pwdlevel'] = "低";
		}else if($userInfo['pwdlevel'] == 1){
			$userInfo['pwdlevel'] = "中";
		}else{
			$userInfo['pwdlevel'] = "高";
		}
		//贷款记录
		$loanInfo = Loan::join('type','loan_type','=','type_id')->select('loan_amount','type_name','loan_addtime','loan_period')->where('user_id','=',$user_id)->get()->toarray();
		//还款记录
		$reloanInfo = Record::join('loan','record.loan_id','=','loan.loan_id')->join('type','loan.loan_type','=','type.type_id')->select('type_name','time','record.repayment_status','record.repayment_amount')->where('record.user_id','=',$user_id)->where('record.repayment_status','=',1)->get()->toarray();
		//滞纳金
		$overdueInfo = Overdue::where('user_id',$user_id)->get()->toarray();
		return view('home/ucenter/myaccount',['userInfo' => $userInfo,'loanInfo'=>$loanInfo,'reloanInfo'=>$reloanInfo,'overdueInfo'=>$overdueInfo]);
	}
	/**
	* @上传头像
	*/
	public function upload(Request $request)
    {
        //根据用户的id修改头像
        $user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
        if ($request->ajax()) {
            $file = $request->file('upload');
            if(!empty($file))
            {
               // 第一个参数代表目录, 第二个参数代表我上方自己定义的一个存储媒介
               $path = $file->store('head', 'uploads');
               $imgPath = "uploads/".$path;
               $users = DB::table('user_profile')->where('user_id',$user_id)->update(['head' =>$imgPath]);
               return response()->json(array('msg' => $path));
            }   
        }
    }



	/**
	 * @action: Money record 资金记录
	 */
	public function moneyRecord()
	{
		return view('home/ucenter/money_record');
	}
	/**
	 * @action: Invest record 投资记录
	 */
	public function investRecord()
	{
		return view('home/ucenter/invest_record');
	}
	/**
	 * @action: Returned Money 回款计划
	 */
	public function returnedMoney()
	{
		return view('home/ucenter/returned_money');
	}
	/**
	 * @action: Open thirdparty 开通第三方
	 */
	public function openThirdparty()
	{
		return view('home/ucenter/open_thirdparty');
	}
	/**
	 * @action: Recharge	充值
	 */
	public function recharge()
	{
		return view('home/ucenter/recharge');
	}
    // 发起支付请求
	public function Alipay()
	{
		$user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
        //支付所需的订单号（用户id + 当前时间戳+4位随机数）
        $Ordernumber = $user_id . time().rand(1000,9999);
		$alipay = app('alipay.web');
		//订单号
		$alipay->setOutTradeNo($Ordernumber);
		//支付金额
		$alipay->setTotalFee($_GET['WIDtotal_fee']);
		$alipay->setSubject('sunFlower金融平台充值');
		$alipay->setBody('sunFlower金融平台充值');
		$alipay->setQrPayMode('5'); //该设置为可选1-5，添加该参数设置，支持二维码支付。

		// 跳转到支付页面。
		return redirect()->to($alipay->getPayLink());
    }
    // 异步通知支付结果
	public function addmoney()
	{
		//支付成功处理表数据
	}
	//支付宝 异步请求测试
	public function test()
	{
		//print_r($_GET);die;
		//用户id
		$user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
		if(!empty($_GET))
		{
			$userInfo = Userprofile::select('balance')->where('user_id','=',$user_id)->first()->toarray();
			$sumMoney = $userInfo['balance'] + $_GET['total_fee'];
			$updateInfo = DB::table('user_profile')->where('user_id', $user_id)->update(['balance' =>$sumMoney]);
			var_dump($updateInfo);die;
		}
	}
	/**
	 * @action: Withdraw deposit	提现
	 */
	public function withdrawDeposit()
	{
		//当前用户id
		$user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
		$userInfo = Userprofile::select('balance')->where('user_id','=',$user_id)->first()->toarray();
		$userInfo = substr($userInfo['balance'],0,-1);
		return view('home/ucenter/withdraw_deposit',['balance' => $userInfo]);
	}
	/**
	* @action: Withdraw deposit	提现记录
	*/
    public function moveMoney()
	{         		
		$user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
		$userInfo = Userprofile::select('balance')->where('user_id','=',$user_id)->first()->toarray();
		//账户总金额
		$countMoney = substr($userInfo['balance'],0,-1);
		//提现金额
		$sumMoney = Input::get('actualMoney');
		//实际到账金额
		$ActualMoney = $sumMoney - ceil(($sumMoney*0.01)*100)/100;
		//收款方账户
		$account = Input::get('phone');
		//创建时间
		$newTime = date("Y-m-d H:i:s");
		if($countMoney >= $sumMoney)
		{
			$res = DB::table('alipay')->insert(['accounts' =>$account, 'create_time' =>$newTime ,'amount_money'=>$ActualMoney]);
			if($res)
			{
				$money = $countMoney - $sumMoney;
				$remoney = DB::table('user_profile')->where('user_id', $user_id)->update(['balance' => $money]);
				$data = [];
				if($remoney)
				{
					$data['message'] = "提现申请已提交,预计2-3个工作日";
					$data['status'] = 1;
				}
				return json_encode($data);
			}
		}
	}
	/**
	 * @action: Red packet	我的红包
	 */
	public function redPacket()
	{
		return view('home/ucenter/red_packet');
	}
	/**
	 * @action: Change history	兑换历史
	 * 
	 */
	public function changeHistory()
	{
		return view('home/ucenter/change_history');
	}
	/**
	 * @action: Systeminfo	系统消息
	 * 
	 */
	public function systeminfo()
	{
		return view('home/ucenter/systeminfo');
	}
	/**
	 * @action: Account settings	账户设置
	 * 
	 */
	public function accountSet()
	{
	    $user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
		$Authentication = Userprofile::select("phone","email","status","pay_pwd","cardid","real_name")->where('user_id','=',$user_id)->first()->toarray();
		return view('home/ucenter/accountset',['authentication' =>$Authentication,'phone'=>$Authentication['phone']]);
	}
	/**
	* @action: authentication	身份认证
	*
	*/
	public function authentication()
	{		
		$user_info = session('userinfo');
		if (empty($user_info)) {
			return view('message',['msg'=>'请先登录','url'=>asset('login/login')]);
		}
		$user_id = $user_info['id'];
		$username = $_POST['username'];
		$cordid = $_POST['cordid'];
		$data = [];
		$Authenticationmsg = Authentication::where('username','=',$username)->where('idnumber','=',$cordid)->first();
		if(!$Authenticationmsg == true)
		{
			$authenticationInfo = DB::table('authentication')->insert(['username' => $username, 'idnumber' => $cordid, 'user_id'=>$user_id]);
			if($authenticationInfo == true)
			{
				$infomsg = DB::table('user_profile')->where('user_id', $user_id)->update(['status' => 2]);
				if($infomsg == true)
				{
					$data['message'] = "认证信息已提交";
					$data['status'] = 1;				
				}
			}		
		}
		else
		{
			if($Authenticationmsg['status'] == 1)
			{
				$data['message'] = "该身份已被使用";
			    $data['status'] = 2;
			}
			else
			{
				$data['message'] = "该身份已被使用,审核中";
			    $data['status'] = 3;
			}
		}
		return json_encode($data);
	}

	/**
	* @action: updatePwd 修改密码
	*
	*/
	public function updatePwd()
	{
		$oldpwd = Input::get('oldpwd');
		$pwd = Input::get('pwd');
		$pwdlevel = Input::get('pwdlevel');
		$ret = ['retCode' => '0', 'msg' => '修改成功'];
		$userinfo = session('userinfo');
		//验证原密码是否正确
		if ($userinfo['password'] != md5($oldpwd)) {
			$ret['msg'] = '原密码错误';
		} else {
			//修改密码
			$user_data = [
                'password' => md5($pwd),
                'pwdlevel' => $pwdlevel,
            ];
			User::where('id', '=', $userinfo['id'])->update($user_data);
			$userinfo['password'] = md5($pwd);
			$userinfo['pwdlevel'] = $pwdlevel;
			session(['userinfo' => $userinfo]);
	        $ret['retCode'] = 1;
		}
		return json_encode($ret);
	}

	/**
	* @action: phoneSend 发送短信
	*
	*/
	public function phoneSend()
	{
		$phone = Input::get('phone');
        $ret = ['retCode' => '0', 'msg' => '短信发送成功'];
        return json_encode($ret);
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

        return json_encode($ret);
	}

	/**
	* @action: checkPhoneMsg 短信验证
	*
	*/
	public function checkPhoneMsg()
	{
		$phone = Input::get('phone');
		$code = Input::get('code');
		$phone_sign = Input::get('phone_sign');
    	$ses = session("$phone");
    	$phonecode = $ses['phonecode'];
    	$ret = ['retCode' => '0', 'msg' => '验证成功'];
    	// 检测验证码是否过期
    	$num = time() - $ses['send_time'];
    	return json_encode($ret);
    	if ($num > 300) {
    		$ret['retCode'] = 1;
        	$ret['msg'] = '验证码已过期，请重新发送';
        	return json_encode($ret);
    	}
    	//检测验证码是否正确
        if ($code != $phonecode) {
        	$ret['retCode'] = 1;
        	$ret['msg'] = '验证码错误';
        }
        // session()->forget("$phone");

        return json_encode($ret);
	}
}