<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cfgroup extends Model
{
    protected $table = 'cf_group';

    /**
     *获取众筹分类数据 
     */  
    public function getAdd($data)
    {
    	var_dump($data['gname']);
    	$bool = DB::table($this->table)->insert(
            ['cf_gname'=>$data['gname'],
            'cf_license_number'=>$data['license_number'],
            'cf_legalname'=>$data['legalname'],
            'cf_reg_address'=>$data['reg_address'],
            'cf_contact_name'=>$data['contact_name'],
            'cf_contact_tel'=>$data['contact_tel'],
            'cf_business_address'=>$data['business_address'],
            'cf_service_tel'=>$data['service_tel'],
            'cf_protype'=>$data['protype'],
            'cf_business_license'=>$data['license_imgpath'],
            'cf_other1'=>$data['other1_imgpath'],
            'cf_other2'=>$data['other2_imgpath'],
            'cf_consume_status'=>$data['consume_status']]
            );

		return $bool;
    }

}