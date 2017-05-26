<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class IntegralController extends Controller
{
	/**
     * 优惠券列表
     *
     * @param
     * @return
     */
    public function ticketList()
    {
        return view('admin/integral/ticket_list');
    }

    /**
     * 优惠券使用状况
     *
     * @param
     * @return
     */
    public function ticketStatus()
    {
        return view('admin/integral/ticket_status');
    }
    
    /**
     * 查看积分商品
     *
     * @param
     * @return
     */
    public function goodsList()
    {
        return view('admin/integral/goods_list');
    }

    /**
     * 添加积分商品
     *
     * @param
     * @return
     */
    public function addGoods()
    {
        return view('admin/integral/add_goods');
    }

    /**
     * 积分商品兑换订单
     *
     * @param
     * @return
     */
    public function goodsOrder()
    {
        return view('admin/integral/goods_order');
    }
}
