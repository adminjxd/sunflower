<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Input;  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cfprocategory;
use App\Models\Cfperson;
use App\Models\Cfgroup;
use App\Models\Cfproduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class CrowdfundingController extends Controller
{
	/**
	 * @action: Crowdfunding 众筹列表
	 */
	public function cfList()
	{
		$product=new Cfproduct();
		$data=$product->getSome();
		$total=$product->getOrder();
		// echo "<pre>";
		// print_r($data);die;
		foreach ($data as $val) 
		{
			foreach ($total as $key=>$v) 
			{
				$val->total=$v->cf_total;
				$val->status=($v->cf_total)/($val->cf_financing_amount)*100;
				// var_dump($val->status);die;
			}
		}
		return view('home/crowdfunding/crowdfunding_list',['data'=>$data]);
	}
	/**
	 * @action: Start Crowdfunding 发起众筹
	 */
	public function cfStart()	
	{
		return view('home/crowdfunding/crowdfunding_start');
	}
	/**
	 * @action: Start Crowdfunding Person 个人发起众筹
	 */
	public function cfperson()
	{
		//调用model层查询分类渲染到前台
		$cat=new Cfprocategory();
		$data=$cat->getAll();
		// $cat = DB::table('cf_procategory')->get();
		// print_r($cat);die;
		// foreach ($data as $user)
		// {
		// var_dump($user->cf_cname);
		// }
		return view('home/crowdfunding/crowdfunding_person',['data' => $data]);
	}

	/**
	 * @action: Start Crowdfunding Person 处理个人发起众筹数据
	 */
	public function doCfperson(Request $request)
	{
		//调用model层
		$person= new Cfperson();
		//接值
		
		$pname=$request->input('cf_pname');
		$idcard=$request->input('cf_idcard');
		$tel=$request->input('cf_tel');
		$cmbProvince=$request->input('cmbProvince');
		$cmbCity=$request->input('cmbCity');
		$cmbArea=$request->input('cmbArea');
		$service=$request->input('cf_service');
		$service_tel=$request->input('cf_service_tel');
		$protype=$request->input('cf_protype');
		$cardup=$request->file('cf_cardup');
		$carddown=$request->file('cf_carddown');
		$consume_status=$request->input('cf_consume_status');
		
		 //判断文件是否上传成功
		if($cardup->isValid() && $carddown->isValid())
		{	
			
	        $path = $cardup->store('cf', 'uploads');
           	$imgPath = "uploads/".$path;
           	$paths = $carddown->store('cf', 'uploads');
           	$imgPaths = "uploads/".$paths;
	        // print_r($cardup); 
	        // print_r($imgPath);echo "<br/>";
	        // print_r($imgPaths);
	    }
	    $data=['pname'=>$pname,'idcard'=>$idcard,'tel'=>$tel,'cmbProvince'=>$cmbProvince,'cmbCity'=>$cmbCity,'cmbArea'=>$cmbArea,'service'=>$service,'service_tel'=>$service_tel,'protype'=>$protype,'imgPath'=>$imgPath,'imgPaths'=>$imgPaths,'consume_status'=>$consume_status];
		// echo "<pre>";
		// print_r($data);die;
	    $res=$person->getAdd($data);	
	    if($res)
	    {
	    	return redirect()->route('crowdfunding/cfproduct');
	    }	
	    else
	    {
	    	return redirect()->route('crowdfunding/error');
	    }
	}

	/**
	 * @action: Crowdfunding  Group 发起众筹项目
	 */
	public function cfGroup()
	{
		//调用model层查询分类渲染到前台
		$cat=new Cfprocategory();
		$data=$cat->getAll();
		return view('home/crowdfunding/crowdfunding_group',['data'=>$data]);
	}
	/**
	 * @action: Start Crowdfunding Group 处理机构发起众筹数据
	 */
	public function doCfgroup(Request $request)
	{
		//调用model层
		$group= new Cfgroup();
		//接值
		$gname=$request->input('cf_gname');
		$license_number=$request->input('cf_license_number');
		$legalname=$request->input('cf_legalname');
		$reg_address=$request->input('cf_reg_address');
		$contact_name=$request->input('cf_contact_name');
		$contact_tel=$request->input('cf_contact_tel');
		$business_address=$request->input('cf_business_address');
		$service_tel=$request->input('cf_service_tel');
		$protype=$request->input('cf_protype');
		$business_license=$request->file('cf_business_license');
		$other1=$request->file('cf_other1');
		$other2=$request->file('cf_other2');
		$consume_status=$request->input('cf_consume_status');
		// echo "<pre>";
		// print_r($other1);
		// print_r($other2);
		// $a=strlen($license_number);
		// var_dump($a);die;
		//判断文件是否上传成功
		if($business_license->isValid() && $other1->isValid() && $other2->isValid())
		{	
	        $license_savepath = $business_license->store('cf', 'uploads');
           	$license_imgpath = "uploads/".$license_savepath;
           	$other1_savepath = $other1->store('cf', 'uploads');
           	$other1_imgpath = "uploads/".$other1_savepath;
           	$other2_savepath = $other2->store('cf', 'uploads');
           	$other2_imgpath = "uploads/".$other2_savepath;
           	
	        // print_r($license_imgpath); echo "<br/>";
	        // print_r($other1_imgpath);echo "<br/>";
	        // print_r($other2_imgpath);
	    }
	    $data=['gname'=>$gname,'license_number'=>$license_number,'legalname'=>$legalname,'reg_address'=>$reg_address,'contact_name'=>$contact_name,'contact_tel'=>$contact_tel,'business_address'=>$business_address,'service_tel'=>$service_tel,'protype'=>$protype,'license_imgpath'=>$license_imgpath,'other1_imgpath'=>$other1_imgpath,'other2_imgpath'=>$other2_imgpath,'consume_status'=>$consume_status];
		// echo "<pre>";
		// print_r($data);die;
		//传参
	    $res=$group->getAdd($data);	
	    if($res)
	    {
	    	return redirect()->route('crowdfunding/cfproduct');
	    }	
	    else
	    {
	    	return redirect()->route('crowdfunding/error');
	    }
	}
	/**
	 * @action: Crowdfunding Pro发起众筹项目
	 */
	public function cfProduct()
	{

		return view('home/crowdfunding/crowdfunding_product');
	}
	/**
	 * @action: Crowdfunding Pro发起众筹项目
	 */
	public function cfDoproduct(Request $request)
	{
		$userinfo = session('userinfo');
		$uid=$userinfo['id'];
		// $uid=1;
		$day=date("Y-m-d");
		$title=$request->input('cf_title');
		$description=$request->input('cf_description');
		$financing_amount=$request->input('cf_financing_amount');
		$start_time=$request->input('cf_start_time');
		$end_time=$request->input('cf_end_time');
		$reinforce_title=$request->input('cf_reinforce_title');
	    $reinforce_content=$request->input('cf_reinforce_content');
		$investreward_title=$request->input('cf_investreward_title');
		$aboutus_title=$request->input('cf_aboutus_title');
		$supportamount=$request->input('cf_supportamount');
		$reward_title=$request->input('cf_reward_title');
		$reward_content=$request->input('cf_reward_content');
		$investreward_content=$request->input('cf_investreward_content');
		$aboutus_content=$request->input('cf_aboutus_content');
		$person_num=$request->input('cf_person_num');
		$reward_period=$request->input('cf_reward_period');
		$reward_type=$request->input('cf_reward_type');
		$cover=$request->file('cf_cover');
		$cmbProvince=$request->input('cmbProvince');
		$cmbCity=$request->input('cmbCity');
		$cmbArea=$request->input('cmbArea');
		$reward_image=$request->file('cf_reward_image');
		$desc_image=$request->file('cf_desc_image');
		$procode=md5($title.$day);
		// echo "<pre>";
		// // print_r($cover);
		// // print_r($reward_image);
		// print_r($desc_image);
		// print_r($title);
		$period=round((strtotime($end_time)-strtotime($start_time))/86400);	
		// var_dump($period);die;
		foreach ($desc_image as  $val) 
		{

			// $desc_img=$val;
			// $desc_img=$val;
			// var_dump($desc_img);die;
			 if($cover->isValid() && $reward_image->isValid() && $val->isValid())
			{	
		        $cover_savepath = $cover->store('cf', 'uploads');
	           	$cover_imgpath = "uploads/".$cover_savepath;
	           	$reward_savepath = $reward_image->store('cf', 'uploads');
	           	$reward_imgpath = "uploads/".$reward_savepath;
	           	$desc_savepath = $val->store('cf', 'uploads');
	           	$desc_imgpath = "uploads/".$desc_savepath;
	           	
		        // print_r($cover_imgpath); echo "<br/>";
		        // print_r($reward_imgpath);echo "<br/>";
		        // print_r($desc_imgpath);echo "<br/>";
		    }
		}
		
		$product= new Cfproduct();
	    $data=['uid'=>$uid,'procode'=>$procode,'period'=>$period,'title'=>$title,'description'=>$description,'financing_amount'=>$financing_amount,'start_time'=>$start_time,'end_time'=>$end_time,'reinforce_title'=>$reinforce_title,'investreward_title'=>$investreward_title,'investreward_content'=>$investreward_content,'aboutus_title'=>$aboutus_title,'aboutus_content'=>$aboutus_content,'reward_title'=>$reward_title,'reward_content'=>$reward_content,'reinforce_content'=>$reinforce_content,'supportamount'=>$supportamount,'person_num'=>$person_num,'reward_type'=>$reward_type,'reward_period'=>$reward_period,'cmbProvince'=>$cmbProvince,'cmbCity'=>$cmbCity,'cmbArea'=>$cmbArea,'cover'=>$cover_imgpath,'reward_image'=>$reward_imgpath,'desc_image'=>$desc_imgpath];
		// echo "<pre>";
		// print_r($data);die;
		//传参
	    $res=$product->getAdd($data);	
	    if($res)
	    {
	    	return redirect()->route('crowdfunding/cflist');
	    }	
	    else
	    {
	    	return redirect()->route('crowdfunding/error');
	    }
	}
	/**
	 * @action: Crowdfunding desclist 详情页面
	 */
	public function cfDesclist(Request $request)
	{
		$procode=$request->get('procode');
		// var_dump($procode);die;
		$product=new Cfproduct();
		$data=$product->getAll($procode);
		$title=$product->getTitle($procode);
		$total=$product->getOrder();	
		
		foreach ($data as $val) 
		{
			$start=strtotime($val->cf_start_time);
			$today=strtotime(date('Y-m-d'));
			$only=$val->cf_period-round(($today-$start)/86400);
			$val->only=$only;
			foreach ($total as $key=>$v) 
			{
				$val->total=$v->cf_total;
				$val->status=($v->cf_total)/($val->cf_financing_amount)*100;
				// var_dump($val->status);die;
			}
		}
		// echo "<pre>";
		// print_r($data);
		// print_r($title);die;

            return view('home/crowdfunding/crowdfunding_desclist',['title'=>$title,'res'=>$data]);
        
	}
	/**
	 * @action: Crowdfunding error 报错页面
	 */
	public function cfError()
	{
		return view('home/crowdfunding/crowdfunding_error');
	}
}