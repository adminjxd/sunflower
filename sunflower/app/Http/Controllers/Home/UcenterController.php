<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Userprofile;


class UcenterController extends Controller
{
	/**
	 * @action: Ucenter 我的账户（个人中心）
	 */
	public function myAccount()
	{
		$user_id = 1;
		 /**
         * 查询用户表的信息，遍历数据
         * 用户名，上次登录的时间
         * 判断当前时间 （1上午，0下午）温馨的提示语
         * 安全级别（正则匹配，单数字或字母类型密码级别低 两张中级  两种加长度级别高 ）
         * 账户的总金额
         */
        $userInfo = Userprofile::join('user', 'user.id', '=', 'user_profile.user_id')->where('user_id','=',1)->first()->toArray();
		//print_r($userInfo);die;
		return view('home/ucenter/myaccount',['userInfo' => $userInfo]);
	}
	
	/**
	* @上传头像
	*/
	public function upload(Request $request)
    {
        //根据用户的id修改头像
        $user_id = 1;
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
        $user=session('userinfo');
        $user_id=$user['id'];
        //sun 存宝
        $u['deposit']=DB::table('deposit')->select('money', 'earnings')->where('user_id',$user_id)->get()->toarray();
        //散标投资
        $u['invest']=DB::table('invest')->select('invest_time','invest_money', 'return_num', 'return_money','total_num','loan_name','status')->where('user_id',$user_id)->get()->toarray();
        $invest_all=0;
        $a_earnings=0;
        $f_earnings=0;
        foreach ($u as $k => $v) {
            foreach ($v as $kk=>$vv) {
                if(isset($vv->money)){
                    $invest_all+=$vv->money;
                    $a_earnings+=$vv->earnings;
                }
                if(isset($vv->invest_money)){
                    $invest_all+=$vv->invest_money;
                    $f_earnings+=$vv->return_money*($vv->total_num-$vv->return_num);
                    $a_earnings+=$vv->return_money*$vv->return_num;
                }
              }
        }
        $u['invest_all']=$invest_all;
        $u['a_earnings']=$a_earnings;
        $u['f_earnings']=$f_earnings;
//        print_r($u);die;
        return view('home/ucenter/invest_record',['u'=>$u]);
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
	/**
	 * @action: Withdraw deposit	提现
	 */
	public function withdrawDeposit()
	{
		return view('home/ucenter/withdraw_deposit');
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