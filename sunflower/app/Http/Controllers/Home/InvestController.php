<?php

namespace App\Http\Controllers\Home;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class InvestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
     * 投资首页*/
    public function index()
    {
        $date=Carbon::yesterday();
        //昨日年化收益率
        $rate=DB::table('deposit_rate')->where('rate_date', $date)->value('rate');
        //累计投资
        $invest_total=DB::table('invest')->sum('invest_money');
        //累计收益
        $return_total=DB::table('invest_earning')->sum('money');
        //债权详情
        $loan=$this->getRights();
        //提示信息
        $msg=isset($_GET['msg'])?$_GET['msg']:'请信任我们';
        //抵押物信息  房主信息
        return view('home.invest.invest',['invest_total'=>$invest_total,'return_total'=>$return_total,'rate'=>$rate,'loan'=>$loan,'msg'=>$msg]);
    }

    /*
     * 处理债权信息*/
    protected function getRights($loan_id=''){
        //p2p 债权理财
        if($loan_id){
            $loan=DB::table('loan') ->select(DB::raw('raise,loan_id,user_id,total,loan_amount,loan_addtime,loan_period,loan_type,mortgage,payment_method,repayment_amount'))->where('loan_status','=',1)->where('payment_status','=',0)->where('loan_id','=',$loan_id)->get()->toarray();
            $user_id=$loan[0]->user_id;
            $info=$this->getUser($user_id);
        }else{
            $loan=DB::table('loan') ->select(DB::raw('raise,loan_id,user_id,total,loan_amount,loan_addtime,loan_period,loan_type,mortgage,payment_method,repayment_amount'))->where('loan_status','=',1)->where('payment_status','=',0)->get()->toarray();
            $info=$this->getUser();
        }
        foreach ($loan as $k => $v) {
            //用户信息
            foreach ($info as $kk=>$vv) {
                if($vv->sex==0){
                    $sex='先生';
                }else{
                    $sex ='女士';
                }
                if($vv->user_id==$v->user_id){
                    $loan[$k]->user=substr($vv->real_name,0,3).$sex;
                    $loan[$k]->creditpoint=$vv->creditpoint;
                    $loan[$k]->bar=round($v->raise*100/$v->loan_amount);
                }
            }
            //年利率
            $total=$v->total;
            $amount=$v->loan_amount;
            $gain=($total-$amount)*3/365;
            $loan[$k]->gain_rate=substr($gain,0,6);
            //债权类型
            if($v->loan_type==3){
                $loan[$k]->loan_type='车贷';
            }else if($v->loan_type==4){
                $loan[$k]->loan_type='房贷';
            }else{
                unset($loan[$k]);
            }
        }
        return $loan;
    }
    
    /*
     * 获取用户信息*/
    protected function getUser($user_id=''){
        if($user_id){
            $info=DB::table('user_profile') ->select(DB::raw('user_id,creditpoint,real_name,sex,balance'))->where('user_id','=',$user_id)->get()->toarray();
        }else{
            $info=DB::table('user_profile') ->select(DB::raw('user_id,creditpoint,real_name,sex,balance'))->get()->toarray();
        }
        return $info;
    }
    /**
     * Sun 存宝 存款成功 同步*/
    public function returns(){
        //调试 需 修改 T
        $status=isset($_GET['is_success'])?$_GET['is_success']:'T';
        $body=isset($_GET['body'])?$_GET['body']:'';
        if($status=='T'){
            $time = Carbon::now();
            $money = isset($_GET['total_fee']) ? $_GET['total_fee'] : 500;
            //用户id
            $u_id =$this->getUID();
            if($body=='Sun 存宝') {
                $re=$this->doSun($u_id,$time,$money);
                if($re){
                    return redirect()->route('invest', ['msg'=>'成功存入'.$money.'元人民币']);
                }
            }else{
                $re=$this->doInvest($u_id,$time,$money,$body);
                if($re){
                return redirect()->route('ucenter/investrecord');
                }
            }

        }else{
            //提示 投资失败
            return redirect()->route('InvestController@index', ['msg'=>'呜呜，操作失败了']);
        }
    }
     /**
      * Sun 存宝 存款成功 异步*/
    public function notify(){
        $post=isset($_POST)?$_POST:'no';
        $content=serialize($post);
        file_put_contents('./test.php',$content);
    }

    /*
     * 债权投资详情页*/
    public function infor(){
        $loan_id=$_GET['l'];
        //贷款详情
        $info=$this->getRights($loan_id);
        $info=$info[0];
        $bar=round($info->raise*100/$info->loan_amount);
        //投资情况
        $invest=DB::table('invest')->where('loan_id','=',$loan_id)->get()->toarray();
        $user=$this->getUser();
        $invest_total=0;
        foreach ($user as $k => $v) {
            foreach ($invest as $kk => $vv) {
                if($v->user_id==$vv->user_id){
                    $invest[$kk]->user_name=substr($v->real_name,0,3);
                    $invest_total+=$vv->invest_money;
                }
            }

        }
        //贷款记录
        $record=DB::table('record')->where('loan_id','=',$loan_id)->get()->toarray();
        foreach ($record as $k => $v) {
            $time=time();
            $residue=($record[$k]->last_day-$time)/(24*3600);
            //本期剩余天数
            $record[$k]->residue=round($residue);
            $record[$k]->time=date('Y-m-d',$v->time);
            $record[$k]->last_day=date('Y-m-d',$v->last_day);
        }
        return view('home.invest.infor',['invest_total'=>$invest_total,'info'=>$info,'record'=>$record,'bar'=>$bar,'invest'=>$invest]);
    }
    /*
     * Sun 存宝 入库*/
    protected function doSun($u_id,$time,$money){
        $detail = $time . '存入Sun 存宝' . $money . '元人名币';
        $uMoney = DB::table('deposit')->select('total_money', 'money')->where('user_id', $u_id)->first();
        //修改 存款
        if ($uMoney) {
            $oldTotal = $uMoney->total_money;
            $newTotal = $oldTotal + $money;
            $oldMoney = $uMoney->money;
            $newMoney = $oldMoney + $money;
            $re1 = DB::table('deposit')->where('user_id', $u_id)->update(['total_money' => $newTotal, 'money' => $newMoney]);
        } else {
            //首次 存款
            $re1 = DB::insert("insert into sun_deposit (`id`,`user_id`,`money`,`earnings`,`total_money`) values (null,$u_id,'$money',0,'$money')", [1, 'Dayle']);
        }
        //插入明细表
        $re2 = DB::insert("insert into sun_deposit_record (`id`,`user_id`,`date`,`total_money`,`detail`,`type`) values (null,$u_id,'$time','$newTotal','$detail',1)", [1, 'Dayle']);
        if($re1&&$re2){
            return true ;
        }else{
            return false;
        }
    }
    /*
     * */
    protected function doInvest($u_id,$time,$money,$body){
        //method
        $method='';
        $re3=0;
        //loan_id
        $loan_id=explode('/',$body);
        if(count($loan_id)>1){
            $loan_id=$loan_id[1];
            $re3=1;
        }else{
            $loan_id=$loan_id[0];
            $method='zh';
        }
        //获取贷款记录
        $info=$this->getRights($loan_id);
        $total_num=$info[0]->loan_period;
        $total_money=$info[0]->loan_amount;
        $raise_money=$info[0]->raise;
        //下期回款时间
        $return_time=date('Y-m-d',$info[0]->loan_addtime+30*24*3600);
        //每期回款金额
        $return_money=round($info[0]->total*$money/($total_num*$total_money),2);
        $sql_invest="insert into sun_invest (`id`,`user_id`,`invest_money`,`invest_time`,`loan_id`,`return_num`,`return_time`,`return_money`,`total_num`) values (null,$u_id,'$money','$time','$loan_id',0,'$return_time','$return_money','$total_num')";
        //插入投资表
        $re1 = DB::insert($sql_invest, [1, 'Dayle']);
        //修改集资金额
        $re2 = DB::table('loan')->where('loan_id', $loan_id)->update(['raise' =>$raise_money+$money]);
        if($method){
            $user=$this->getUser($u_id);
            $balance=$user[0]->balance;
            $re3=DB::table('user_profile')->where('user_id', $u_id)->update(['balance' =>$balance-$money]);
        }
        if($re1&&$re2&&$re3){
            return true ;
        }else{
            return false;
        }
    }
    /*
     * 获取当前用户ID*/
    protected function getUID(){
        //调试 修改
        session(['user_id' => '2']);
        $user_id =session('user_id');
        return $user_id;
    }

    /*
     * 账户余额投资*/
    public function zhInvest(){
        $money=$_POST['money'];
        $loan_id=$_POST['loan_id'];
        $user_id=$this->getUID();
        $time = Carbon::now();
        $re=$this->doInvest($user_id,$time,$money,$loan_id);
        if($re){
            return 1;
        }else{
            return 0;
        }
    }
}
