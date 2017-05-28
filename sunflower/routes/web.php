<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//首页
Route::get('index/index', ['uses'=>'Home\IndexController@index','as'=>'index/index']);
Route::get('/', ['uses'=>'Home\IndexController@index','as'=>'index/index']);
//注册
Route::get('register/reg', ['uses'=>'Home\RegisterController@reg','as'=>'register/reg']);
//登录
Route::get('login/login', ['uses'=>'Home\LoginController@login','as'=>'login/login']);
//我要投资
Route::get('invest/list', ['uses'=>'Home\InvestController@list','as'=>'invest/list']);
//投资详情
Route::get('invest/info', ['uses'=>'Home\InvestController@info','as'=>'invest/info']);
//安全保障
Route::get('safe/help', ['uses'=>'Home\SafeController@help','as'=>'safe/help']);
//我的账户
Route::get('ucenter/myaccount', ['uses'=>'Home\UcenterController@myaccount','as'=>'ucenter/myaccount']);
//资金记录
Route::get('ucenter/moneyrecord', ['uses'=>'Home\UcenterController@moneyrecord','as'=>'ucenter/moneyrecord']);
//投资记录
Route::get('ucenter/investrecord', ['uses'=>'Home\UcenterController@investrecord','as'=>'ucenter/investrecord']);
//回款计划
Route::get('ucenter/returnedmoney', ['uses'=>'Home\UcenterController@returnedmoney','as'=>'ucenter/returnedmoney']);
//开通第三方
Route::get('ucenter/openthirdparty', ['uses'=>'Home\UcenterController@openthirdparty','as'=>'ucenter/openthirdparty']);
//充值
Route::get('ucenter/recharge', ['uses'=>'Home\UcenterController@recharge','as'=>'ucenter/recharge']);
//提现
Route::get('ucenter/withdrawdeposit', ['uses'=>'Home\UcenterController@withdrawdeposit','as'=>'ucenter/withdrawdeposit']);
//我的红包
Route::get('ucenter/redpacket', ['uses'=>'Home\UcenterController@redpacket','as'=>'ucenter/redpacket']);
//兑换历史
Route::get('ucenter/changehistory', ['uses'=>'Home\UcenterController@changehistory','as'=>'ucenter/changehistory']);
//系统消息
Route::get('ucenter/systeminfo', ['uses'=>'Home\UcenterController@systeminfo','as'=>'ucenter/systeminfo']);
//账户设置
Route::get('ucenter/accountset', ['uses'=>'Home\UcenterController@accountset','as'=>'ucenter/accountset']);
//关于我们
Route::get('aboutus/announcement', ['uses'=>'Home\AboutUsController@announcement','as'=>'aboutus/announcement']);
//公司简介
Route::get('aboutus/profile', ['uses'=>'Home\AboutUsController@profile','as'=>'aboutus/profile']);
//管理团队
Route::get('aboutus/manageteam', ['uses'=>'Home\AboutUsController@manageteam','as'=>'aboutus/manageteam']);
//网站公告
Route::get('aboutus/notice', ['uses'=>'Home\AboutUsController@notice','as'=>'aboutus/notice']);
//联系我们
Route::get('aboutus/contactus', ['uses'=>'Home\AboutUsController@contactus','as'=>'aboutus/contactus']);
//合作伙伴
Route::get('aboutus/partner', ['uses'=>'Home\AboutUsController@partner','as'=>'aboutus/partner']);
//媒体报道
Route::get('aboutus/reports', ['uses'=>'Home\AboutUsController@reports','as'=>'aboutus/reports']);
//团队风采
Route::get('aboutus/teamstyle', ['uses'=>'Home\AboutUsController@teamstyle','as'=>'aboutus/teamstyle']);
//法律政策
Route::get('aboutus/legalpolicy', ['uses'=>'Home\AboutUsController@legalpolicy','as'=>'aboutus/legalpolicy']);
//法律声明
Route::get('aboutus/legalnotice', ['uses'=>'Home\AboutUsController@legalnotice','as'=>'aboutus/legalnotice']);
//资费说明
Route::get('aboutus/descriptioncharges', ['uses'=>'Home\AboutUsController@descriptioncharges','as'=>'aboutus/descriptioncharges']);
//招贤纳士
Route::get('aboutus/recruitment', ['uses'=>'Home\AboutUsController@recruitment','as'=>'aboutus/recruitment']);
//众筹
Route::get('crowdfunding/cflist', ['uses'=>'Home\CrowdfundingController@cflist','as'=>'crowdfunding/cflist']);


//借贷首页
Route::get('loan/index', ['uses'=>'Home\LoanController@index','as'=>'loan/index']);
//借贷信息处理
Route::post('loan/wapRegister', ['uses'=>'Home\LoanController@wapRegister','as'=>'loan/wapRegister']);
//借贷发送短信验证
Route::post('loan/wapSendMsg', ['uses'=>'Home\LoanController@wapSendMsg','as'=>'loan/wapSendMsg']);
Route::post('loan/wapReSendMsg', ['uses'=>'Home\LoanController@wapReSendMsg','as'=>'loan/wapReSendMsg']);
Route::get('loan/test', ['uses'=>'Home\LoanController@test','as'=>'loan/test']);



//后台
Route::get('aindex/index', 'Admin\IndexController@index');
Route::any('aindex/home', [ 'as' => 'aindex/home', 'uses' => "Admin\IndexController@home"]);

//后台登陆模块
// Route::get('alogin/login', 'Admin\LoginController@login');
Route::get('alogin/login', function () {
    return view('admin/login/login');
});
Route::post('alogin/login_check', 'Admin\LoginController@loginCheck');
Route::get('alogin/loginout', 'Admin\LoginController@loginout');

//后台用户模块
Route::get('auser/vip', 'Admin\UserController@vip');
Route::get('auser/show_userinfo', 'Admin\UserController@showUserinfo');
Route::get('auser/reputation', 'Admin\UserController@reputation');

//后台借贷模块
Route::get('aloan/interest_rate_list', 'Admin\LoanController@interestRateList');
Route::get('aloan/borrowing_list', 'Admin\LoanController@borrowingList');
Route::get('aloan/repayment_list', 'Admin\LoanController@repaymentList');

//后台积分模块
Route::get('aintegral/ticket_list', 'Admin\IntegralController@ticketList');
Route::get('aintegral/ticket_status', 'Admin\IntegralController@ticketStatus');
Route::get('aintegral/goods_list', 'Admin\IntegralController@goodsList');
Route::get('aintegral/add_goods', 'Admin\IntegralController@addGoods');
Route::get('aintegral/goods_order', 'Admin\IntegralController@goodsOrder');

//后台众筹模块
Route::get('acrowd/category_list', 'Admin\CrowdfundingController@categoryList');
Route::get('acrowd/add_category', 'Admin\CrowdfundingController@addCategory');
Route::get('acrowd/projects_list', 'Admin\CrowdfundingController@projectsList');
Route::get('acrowd/projects_order', 'Admin\CrowdfundingController@projectsOrder');


