<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Userprofile;
use App\Models\Loan;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;


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
		
		//print_r($loanInfo);die;
		return view('home/ucenter/myaccount',['userInfo' => $userInfo,'loanInfo'=>$loanInfo]);
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
				print_r(json_encode($data));
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
		return view('home/ucenter/accountset');
	}
}