<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cfproduct extends Model
{
    protected $table = 'cf_product';

    /**
     *添加项目信息数据 
     */  
    public function getAdd($data)
    {
    	// var_dump($data['pname']);
    	$bool = DB::table($this->table)->insert(['cf_title'=>$data['title'],'cf_description'=>$data['description'],'cf_site'=>$data['cmbProvince'].','.$data['cmbCity'].','.$data['cmbArea'],'cf_cover'=>$data['cover'],'cf_financing_amount'=>$data['financing_amount'],'cf_start_time'=>$data['start_time'],'cf_end_time'=>$data['end_time'],'cf_uid'=>$data['uid'],'cf_reinforce_title'=>$data['reinforce_title'],'cf_reinforce_content'=>$data['reinforce_content'],'cf_investreward_title'=>$data['investreward_title'],'cf_investreward_content'=>$data['investreward_content'],'cf_aboutus_title'=>$data['aboutus_title'],'cf_aboutus_content'=>$data['aboutus_content'],'cf_supportamount'=>$data['supportamount'],'cf_reward_title'=>$data['reward_title'],'cf_reward_content'=>$data['reward_content'],'cf_person_num'=>$data['person_num'],'cf_reward_period'=>$data['reward_period'],'cf_reward_type'=>$data['reward_type'],'cf_reward_image'=>$data['reward_image'],'cf_period'=>$data['period'],'cf_desc_image'=>$data['desc_image'],'cf_procode'=>$data['procode']]);
		return $bool;
    }
    
    
    /**
     *获取众筹项目数据 
     */  
    public function getSome()
    {
        $pro = DB::table($this->table)->select('cf_cover','cf_title','cf_financing_amount','cf_period','cf_reward_type','cf_procode')->get();
        return $pro;
    }

    /**
     *获取众筹项目数据 
     */  
    public function getAll($p)
    {
        $pro = DB::table($this->table)->where('cf_procode',$p)->get();
        return $pro;
    }
     /**
     *获取众筹项目数据 
     */  
    public function getTitle($p)
    {
        $pro = DB::table($this->table)->where('cf_procode',$p)->select('cf_title')->get();
        return $pro;
    }
 /**
     *获取众筹项目数据 
     */  
    public function getOrder()
    {
        $pro = DB::table('cf_product')->join('cf_order', 'cf_product.id', '=', 'cf_order.cf_pid')->select('cf_total')->get();
        return $pro;
    }
         
         

}