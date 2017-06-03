<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Models\Loan;
use App\Models\Record;
use App\Models\Overdue;
use App\Models\Date;
use App\Models\Method;
use App\Models\Type;
use App\Models\Amount;
use App\Models\Profile;
use App\Models\User;

class LoanController extends Controller
{
	/**
     * 利率列表
     *
     * @param
     * @return
     */
    public function interestRateList()
    {
        $date = Date::get()->toarray();
        $amount = Amount::get()->toarray();
        $date = $this->returnArray($date,'date_range');
        $amount = $this->returnArray($amount,'amount_range');
        $method = Method::get()->toarray();
        $type = Type::get()->toarray();
        return view('admin/loan/interest_rate_list',['date'=>$date,'amount'=>$amount,'method'=>$method,'type'=>$type]);
    }

    /**
     * 贷款列表
     *
     * @param
     * @return
     */
    public function borrowingList()
    {
        $loan = Loan::get()->toarray();
        $user = User::get()->toarray();
        $Profile = Profile::get()->toarray();
        $type = Type::get()->toarray();
        $user = $this->withJoin($Profile,$user,'user_id','id');
        $loan = $this->withJoin($loan,$user,'user_id','user_id');
        $loan = $this->withJoin($loan,$type,'loan_type','type_id');
        return view('admin/loan/borrowing_list',['loan'=>$loan,'type'=>$type]);
    }

     /**
     * 贷款搜索列表
     *
     * @param
     * @return
     */
    public function searchloan()
    {
        $data = Input::get();
        $time = time();
        $start_time = empty($data['start_time'])?$time:strtotime($data['start_time']);
        $end_time = empty($data['end_time'])?$time:strtotime($data['end_time']);
        $where[] = ['loan_status','=',$data['loan_status']];
        $where[] = ['is_call','=',$data['is_call']];
        if (!empty($data['loan_id'])) {
            $where[] =["loan_id",'=',$data['loan_id']];
        }
        if (!empty($data['loan_type'])) {
            $where[] =["loan_type",'=',$data['loan_type']];
        }
        if (!empty($where)) {
            $loan = Loan::where($where);
        }else{
            $loan = Loan::where(1,'=',1);
        }
        if ($time==$start_time&&$time==$end_time) {
            $loan = $loan->get()->toarray();
        } else {
            if($end_time<$start_time){
                $arr['error'] = 0;
                $arr['msg'] = '时间查询有误';
                return json_encode($arr);
            }else{
            $loan = $loan->whereBetween('loan_addtime', [$start_time,$end_time])->get()->toarray();
            }
        }
        $user_where = [];
        if (!empty($data['real_name'])) {
            $user_where[] = ['real_name','=',"'$data[real_name]'"];
        }
        if (!empty($data['phone'])) {
            $user_where[] = ['phone','=',"'$data[phone]'"];
        }
        if (!empty($user_where)) {
            $Profile = Profile::where($user_where)->get()->toarray();
        }else{
            $Profile = Profile::get()->toarray();
        }
        $type = Type::get()->toarray();
        $loan = $this->withJoin($Profile,$loan,'user_id','user_id');
        $loan = $this->withJoin($loan,$type,'loan_type','type_id');
        if (!empty($loan)) {
            $arr['error'] = 1;
            $arr['msg'] = ''; 
            foreach ($loan as $key => $val) {
                $loan[$key]['loan_addtime'] = date('Y-m-d H:i:s',$val['loan_addtime']);
                $loan[$key]['loan_status'] = $val['loan_status']==1?'审核通过':'审核未通过';
                $loan[$key]['is_call'] = $val['is_call']==1?'已验证':'未验证';
            }
            $arr['content'] = $loan;
        } else {
            $arr['error'] = 0;
            $arr['msg'] = '查询无数据，请重新查询';
        }
        return json_encode($arr);
    }

    
    /**
     * 还款列表
     *
     * @param
     * @return
     */
    public function repaymentList()
    {
        $loan = Loan::get()->toarray();
        $user = User::get()->toarray();
        $Profile = Profile::get()->toarray();
        $type = Type::get()->toarray();
        $record = Record::get()->toarray();
        $user = $this->withJoin($Profile,$user,'user_id','id');
        $loan = $this->withJoin($loan,$user,'user_id','user_id');
        $loan = $this->withJoin($loan,$type,'loan_type','type_id');
        $loan = $this->withJoin($loan,$record,'loan_id','loan_id');
        return view('admin/loan/repayment_list',['loan'=>$loan]);
    }

    /**
     * 还款搜索列表
     *
     * @param
     * @return
     */
    public function searchRecord()
    {
        //接值
        $data = Input::get();
        $time = time();
        $start_time = empty($data['start_time'])?$time:strtotime($data['start_time']);
        $end_time = empty($data['end_time'])?$time:strtotime($data['end_time']);
        $where[] = [];
        //查询贷款记录
        if (!empty($data['loan_id'])) {
            $loan = Loan::where('loan_id','=',$data['loan_id'])->get()->toarray();
        } else {
            $loan = Loan::get()->toarray();
        }
        //查询还款记录
        $record = Record::where('repayment_status','=',$data['repayment_status']);
        if ($time==$start_time&&$time==$end_time) {       
            $record = $record->get()->toarray();
        } else {
            if($end_time<$start_time){
                $arr['error'] = 0;
                $arr['msg'] = '时间查询有误';
                return json_encode($arr);
            }else{
            $record = $record->whereBetween('loan_addtime', [$start_time,$end_time])->get()->toarray();
            }
        }
        $Profile = Profile::get()->toarray();
        //查询用户信息
        if (!empty($data['real_name'])&&empty($data['phone'])) {
            $Profile = Profile::where('real_name','=',"$data[real_name]")->get()->toarray();
        }
        if (!empty($data['phone'])&&empty($data['real_name'])) {
            $Profile = Profile::where('phone','=',"$data[phone]")->get()->toarray();
        }
        if (!empty($data['phone'])&&!empty($data['real_name'])) {
            $Profile = Profile::where('real_name','=',"'$data[real_name]'")->where('phone','=',"'$data[phone]'")->get()->toarray();
        }
        $loan = $this->withJoin($Profile,$loan,'user_id','user_id');
        $loan = $this->withJoin($loan,$record,'loan_id','loan_id');
        if (!empty($loan)) {
            $arr['error'] = 1;
            $arr['msg'] = ''; 
            foreach ($loan as $key => $val) {
                $loan[$key]['time'] = empty($val['time'])?'暂无还款':date('Y-m-d H:i:s',$val['time']);
                $loan[$key]['last_day'] = date('Y-m-d H:i:s',$val['last_day']);
                $loan[$key]['replay_type'] = $val['replay_type']==1?'正常还款':'提前还款';
            }
            $arr['content'] = $loan;
        } else {
            $arr['error'] = 0;
            $arr['msg'] = '查询无数据，请重新查询';
        }
        return json_encode($arr);
    }
    /**
     * 修改利率
     *
     * @param
     * @return
     */
    public function updateRate(){}

    /**
     * 展示贷款详情
     *
     * @param
     * @return
     */
    public function loanInfo()
    {
        $loan_id = $_GET['loan_id'];
        $loan = Loan::where('loan_id','=',$loan_id)->first()->toarray();
        $user = User::where('id','=',$loan['user_id'])->first()->toarray();
        $profile = Profile::where('user_id','=',$loan['user_id'])->first()->toarray();
        $loan = array_merge($loan,$user);
        $loan = array_merge($loan,$profile);
        $method = Method::where('method_id','=',$loan['payment_method'])->first()->toarray();
        $loan = array_merge($loan,$method);
        return view('admin/loan/loan_info',['loan'=>$loan]);

    }

    /**
     * 即点即改修改是否回访验证
     *
     * @param
     * @return
     */
    public function call()
    {
        $loan_id = Input::get('loan_id');
          if ($loan = Loan::where('loan_id', $loan_id)->update(['is_call'=>1])) {
            $arr['error'] = 1;
            $arr['msg'] = '修改成功';
          }else{
            $arr['error'] = 0;
            $arr['msg'] = '修改失败';
          }
        return json_encode($arr);

    }

    /**
     * 审核通过放款
     *
     * @param
     * @return
     */
    //放款成功
    function success()
    {
        $loan_id = Input::get('loan_id');
        $loan = Loan::where('loan_id', $loan_id)
               ->first()->toarray();
        if ($loan['loan_status']==1) {
            $arr['error'] = 0;
            $arr['msg'] = '已经放款';
            return json_encode($arr);
        }
        $admininfo = session('admininfo');
        //开启事务 
        DB::beginTransaction();
        try{ 
        $time = time();
        $record = new record;
        $record->user_id = $loan['user_id'];
        $record->loan_id = $loan['loan_id'];
        if ($loan['payment_method']==1) {
         $month = $loan['loan_amount']*$loan['loan_rate']*pow((1+$loan['loan_rate']),$loan['loan_period'])/(pow((1+$loan['loan_rate']),$loan['loan_period'])-1);   
        } else {
        $month=$loan['loan_amount']/$loan['loan_period']+$loan['loan_amount']*$loan['loan_rate'];
        }
        $record->payment_amount = $month;
        $record->last_day =strtotime(date("Y-m-d"),$time)+30*3600*24;
        if (!$record->save()) {
            throw new \Exception('1');
        }
        //中间逻辑代码 
        $loan = Loan::where('loan_id', $loan_id)
               ->update(['admin_id'=>$admininfo['id'],'loan_status'=>1]);
        $arr['error'] = 1;
        $arr['msg'] = '放款成功';
        DB::commit();
        }catch (\Exception $e) {
        
        $arr['error'] = 0;
        $arr['msg'] = '放款失败';
        //接收异常处理并回滚 
        DB::rollBack(); 
        return $e->getMessage();
        }
        return json_encode($arr);
    }

    /**
     * 还款记录列表
     *
     * @param
     * @return
     */
    public function record(){}

    /**
     * 循环数组
     *
     * @param
     * @return
     */
    public function returnArray($arr,$type){
        foreach ($arr as $key=>$val) {
            $arr1 = [];
            $arr1 = explode('~',$val[$type]);
            $arr[$key]['min'] = $arr1[0];
            $arr[$key]['max'] = $arr1[1];
        }
        return $arr;
    }
    //两个表的数据关联成一个数组
    function withJoin($arr1,$arr2,$id,$join_id)
    {
        $arr = [];
        foreach ($arr1 as $key=>$val) {
            foreach($arr2 as $k => $v){
                if ($v[$join_id]==$val[$id]) {
                $arr[] = array_merge($v,$val);
                }        
            }
        }
        return $arr;
    }

}
