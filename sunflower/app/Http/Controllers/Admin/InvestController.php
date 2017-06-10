<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class InvestController extends Controller
{
    /**
     * 后台首页入口
     *
     * @param
     * @return
     */
    public function capitalPool()
    {
        //投资进池
        $mn['investIn']=DB::table('invest')->sum('invest_money');
        //投资利息   投资利息返回用户账户---未做
        $mn['investOut']=DB::table('invest_earning') ->sum('money')->group('invest_date');
        //存款进池
        $mn['depositIn']=DB::table('deposit')->sum('money');
        //存款利息支出
        $mn['depositOut']=DB::table('deposit')->sum('earnings');
        //贷款金额总数支出
        $mn['loanOut']=DB::table('loan')->sum('loan_amount');
        //贷款预计回收总额
        $mn['loanFIn']=DB::table('loan')->sum('total');
        //贷款利息已进池(实际还款金额)
        $mn['loanAIn']=DB::table('record')->sum('repayment_amount');
        //贷款利息滞纳金额已进池(实际还款金额)
        $mn['loanOIn']=DB::table('overdue')->sum('overdue_amount');
        //账户金池
        $mn['loanOIn']=DB::table('user_profile')->sum('balance');
        //投资利息   投资利息返回用户账户---未做
        $investOut=DB::table('invest') ->select(DB::raw('total_num,return_money'))->get()->toarray();
        $mn['investFOut']=0;
        foreach ($investOut as $k => $v) {
            $mn['investFOut']+=$v->total_num *$v->return_money;
       }
        //散标投资应出账
        $mn['inOut']=$mn['investFOut']-$mn['investIn'];
        //Sun 存宝应出账
        $mn['deOut']=$mn['depositOut'];
        //贷款应进账
        $mn['loIn']=$mn['loanFIn']-$mn['loanOut'];
        //贷款实出账
        $mn['myLo']=$mn['loanOut']-$mn['investIn']-$mn['depositIn'];
        //盈利
        $mn['earning']=$mn['loIn']-$mn['deOut']-$mn['inOut'];
        return view('admin/invest/capital_pool',['mn'=>$mn]);
    }

    /**
     * 后台首页主体页面
     *
     * @param
     * @return
     */
    public function home()
    {
        return view('admin/index/home');
    }
}
