<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cfprocategory;
use App\Models\Cfproduct;
use Illuminate\Http\Request;
class CrowdfundingController extends Controller
{
	/**
     * 分类列表
     *
     * @param
     * @return
     */
    public function categoryList()
    {
        return view('admin/crowd/category_list');
    }

    /**
     * 添加分类
     *
     * @param
     * @return
     */
    public function addCategory()
    {
        return view('admin/crowd/add_category');
    }
    
    /**
     * 查看众筹项目
     *
     * @param
     * @return
     */
    public function projectsList()
    {
        $product=new Cfproduct();
        $data=$product->getAll();
        return view('admin/crowd/projects_list',['data'=>$data]);
    }
    

    /**
     * 积分商品兑换订单
     *
     * @param
     * @return
     */
    public function projectsOrder()
    {
        return view('admin/crowd/projects_order');
    }
}
