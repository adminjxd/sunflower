<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input; 
use App\Models\Loan;
use App\Models\Record;
use App\Models\Overdue;
use App\Models\date;
use App\Models\method;
use App\Models\type;
use App\Models\amount;
use App\Models\Profile;
use App\Models\User;

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
        //短信验证
        //if(clean($post['msg'])){
            unset($post['msg']);
            unset($post['_token']);
            foreach ($post as $key=>$val) {
                //$post[$key] = clean($val);//防止xss攻击
                if (!is_numeric($val)) {
                    $arr['error']['code'] = 1;
                    $arr['error']['message'] = '请重新正确输入信息';
                    return json_encode($arr);
                }
            }
            //判断用户是否已注册
            $profile = Profile::where('phone',$post['phone'])->first();
            if ($profile!='') {
                $user_id = $profile->user_id;
            }else{
                //替用户注册
                $user = new User;
                $user->username = $this->randName();
                $user->password = $this->randName();
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
        //}else{
            // $arr['error']['code'] = 1;
            // $arr['error']['message'] = '短信验证不正确，请您重新验证';
        //}
        return json_encode($arr);
    }

    //发送短信
    function wapSendMsg()
    {
        //发送短信进行手机号验证
        //将短信内容进行存储cookie
        $arr['error']['code'] = 0;
        return json_encode($arr);               
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
    function test()
    {
        $data = Profile::where('phone',15124573360)->first();
        if ($data!='') {
            var_dump($data);
        }else{
            return 2;
        }
        
    }
}
