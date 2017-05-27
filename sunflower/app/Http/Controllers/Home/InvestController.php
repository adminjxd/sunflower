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
    public function index()
    {
        $date=Carbon::yesterday();
        //昨日年化收益率
        $rate=DB::table('deposit_rate')->where('rate_date', $date)->value('rate');

        //p2p 债权理财
        $loan=DB::table('loan') ->select(DB::raw('user_id,total,loan_amount,loan_addtime,loan_period,loan_type'))->where('loan_status','=',1)->where('payment_status','=',0)->get()->toarray();
        foreach ($loan as $k => $v) {
            if($v->loan_type==3){
                $loan[$k]->loan_type='车贷';
            }else if($v->loan_type==4){
                $loan[$k]->loan_type='房贷';
            }else{
                unset($loan[$k]);
            }
        }
        $msg=isset($_GET['msg'])?$_GET['msg']:'请信任我们';
        //抵押物信息  房主信息
        return view('home.invest.invest',['rate'=>$rate,'loan'=>$loan,'msg'=>$msg]);
    }
    /**
     * Sun 存宝 存款成功 同步*/
    public function returns(){
        //调试 需 修改 T
        $status=isset($_GET['is_success'])?$_GET['is_success']:'T';
        if($status=='T'){
            $money=isset($_GET['total_fee'])?$_GET['total_fee']:1000;
            $time=Carbon::now();
            $detial=$time.'存入Sun 存宝'.$money.'元人名币';
            $request=new Request();
            //用户id  //调试 需 修改
//            $u_id = $request->session()->get('user_id');
            if(!isset($u_id)){
                $u_id=1;
            }
            //插入Sun 存包记录表 & 明细表
            $re1=DB::insert("insert into sun_deposit (`id`, `user_id`,`money`,`earnings`,`total_money`) values (null,$u_id,'$money',0,'$money')", [1, 'Dayle']);
            $re2=DB::insert("insert into sun_deposit_record (`user_id`, `rate`,`date`,`new_money`,`earning`,`detail`) values ($u_id,0,'$time',$money,0,'$detial')", [1, 'Dayle']);
            if($re1&&$re2){
//                return redirect()->route('UcenterController@investRecord', ['msg'=>'成功存入'.$money.'元人民币']);
                  return redirect()->route('invest', ['msg'=>'成功存入'.$money.'元人民币']);
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


}
