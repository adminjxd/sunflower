<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

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
        return view('admin/loan/interest_rate_list');
    }

    /**
     * 贷款列表
     *
     * @param
     * @return
     */
    public function borrowingList()
    {
        return view('admin/loan/borrowing_list');
    }
    
    /**
     * 还款列表
     *
     * @param
     * @return
     */
    public function repaymentList()
    {
        return view('admin/loan/repayment_list');
    }
}
