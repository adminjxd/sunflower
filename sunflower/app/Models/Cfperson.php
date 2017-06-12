<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cfperson extends Model
{
    protected $table = 'cf_person';

    /**
     *添加身份信息数据 
     */  
    public function getAdd($data)
    {
    	// var_dump($data['pname']);
    	$bool = DB::table($this->table)->insert(['cf_pname'=>$data['pname'],'cf_idcard'=>$data['idcard'],'cf_area'=>$data['cmbProvince'].','.$data['cmbCity'].','.$data['cmbArea'],'cf_tel'=>$data['tel'],'cf_service'=>$data['service'],'cf_service_tel'=>$data['service_tel'],'cf_protype'=>$data['protype'],'cf_cardup'=>$data['imgPath'],'cf_carddown'=>$data['imgPaths'],'cf_consume_status'=>$data['consume_status']
            ]);
		return $bool;
    }

}