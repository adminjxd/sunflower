<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Accountdesc;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
     /**
    * @记录账户资金的流动
    * 用户ID  $user_id
    * 金额    $money
    * 流动类型 $pay_type (1支出2收入)
    */
    public function accountdesc($user_id="",$money="",$pay_type="")
    {
        return $Accountdesc = Accountdesc::insert(['user_id' =>$user_id , 'amount_money' => $money,'pay_type'=>$pay_type]);
    }
}
