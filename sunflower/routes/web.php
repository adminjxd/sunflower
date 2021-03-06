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
//检测用户名是否存在
Route::post('register/check_name', 'Home\RegisterController@checkName');
//注册执行
Route::post('register/reg_do', 'Home\RegisterController@regDo');
//注册成功
Route::get('register/reg_success/{username}', 'Home\RegisterController@regSuccess');
// 验证码验证
Route::post('register/check_yzm', 'Home\RegisterController@checkYzm');
// 手机发送验证码
Route::post('register/phone_send', 'Home\RegisterController@phoneSend');


//登录
Route::get('login/login', ['uses'=>'Home\LoginController@login','as'=>'login/login']);
//登陆验证
Route::post('login/login_check', 'Home\LoginController@loginCheck');
//退出
Route::get('login/loginout', 'Home\LoginController@loginout');
//更换验证码
Route::post('login/change_captcha', 'Home\LoginController@changeCaptcha');

//第三方登陆
Route::get('login/oauth_login', 'Home\LoginController@oauthLogin');
//绑定帐号
Route::get('login/bind_user', 'Home\LoginController@bindUser');
//绑定执行
Route::post('login/bind_do', 'Home\LoginController@bindDo');

//我要投资
Route::get('invest/index', ['uses'=>'Home\InvestController@index','as'=>'invest/index']);
//支付同步
Route::get('invest/returns', ['uses'=>'Home\InvestController@returns','as'=>'invest/returns']);
//支付异步
Route::get('invest/notify', ['uses'=>'Home\InvestController@notify','as'=>'invest/notify']);
//散标详情
Route::get('invest/infor', ['uses'=>'Home\InvestController@infor','as'=>'invest/infor']);
//账户投资
Route::any('invest/zhInvest', ['uses'=>'Home\InvestController@zhInvest','as'=>'invest/zhInvest']);
//检测是否登陆
Route::any('invest/getUID', ['uses'=>'Home\InvestController@getUID','as'=>'invest/getUID']);
//投资展示
Route::any('invest/{action}', function($action='invest'){
    return view("home.invest.$action");
});
Route::get('invest/info', ['uses'=>'Home\InvestController@info','as'=>'invest/info']);
//安全保障
Route::get('safe/help', ['uses'=>'Home\SafeController@help','as'=>'safe/help']);


//上传头像
Route::post('ucenter/upload', ['uses'=>'Home\UcenterController@upload','as'=>'ucenter/upload']);
//支付宝支付处理路由
Route::get('ucenter/alipay','Home\UcenterController@Alipay');  // 发起支付请求
Route::any('ucenter/notify','Home\UcenterController@AliPayNotify'); //服务器异步通知页面路径
Route::any('ucenter/return','Home\UcenterController@AliPayReturn');  //页面跳转同步通知页面路径

//支付宝异步处理测试
Route::get('ucenter/test', ['uses'=>'Home\UcenterController@test','as'=>'ucenter/test']);

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
//充值成功返回信息处理数据
Route::get('ucenter/addmoney', ['uses'=>'Home\UcenterController@addmoney','as'=>'ucenter/addmoney']);
//提现
Route::get('ucenter/withdrawdeposit', ['uses'=>'Home\UcenterController@withdrawdeposit','as'=>'ucenter/withdrawdeposit']);
//获取账户余额
Route::post('ucenter/moneytype', ['uses'=>'Home\UcenterController@moneytype','as'=>'ucenter/moneytype']);
//提现记录
Route::post('ucenter/moveMoney', ['uses'=>'Home\UcenterController@moveMoney','as'=>'ucenter/moveMoney']);
//我的红包
Route::get('ucenter/redpacket', ['uses'=>'Home\UcenterController@redpacket','as'=>'ucenter/redpacket']);
//前台，CDKEY兑换红包
Route::post('redpacket/exchange', 'Home\UcenterController@redpacket_exchange');
//前台，幸运大转盘
Route::get('ucenter/lucky', 'Home\UcenterController@lucky');
//前台，用户抽奖行为
Route::post('redpacket/lucky_do', 'Home\UcenterController@lucky_do');
//兑换历史
Route::get('ucenter/changehistory', ['uses'=>'Home\UcenterController@changehistory','as'=>'ucenter/changehistory']);
//系统消息
Route::get('ucenter/systeminfo', ['uses'=>'Home\UcenterController@systeminfo','as'=>'ucenter/systeminfo']);
//账户设置
Route::get('ucenter/accountset', ['uses'=>'Home\UcenterController@accountset','as'=>'ucenter/accountset']);
//身份证验证
Route::post('ucenter/authentication', ['uses'=>'Home\UcenterController@authentication','as'=>'ucenter/authentication']);
//修改密码
Route::post('ucenter/update_pwd', 'Home\UcenterController@updatePwd');
//修改手机之发送短信
Route::post('ucenter/phone_send', 'Home\UcenterController@phoneSend');
//修改手机之短信验证
Route::post('ucenter/check_phone_msg', 'Home\UcenterController@checkPhoneMsg');


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
//众筹列表
Route::get('crowdfunding/cflist', ['uses'=>'Home\CrowdfundingController@cflist','as'=>'crowdfunding/cflist']);
//发起众筹
Route::get('crowdfunding/cfstart', ['uses'=>'Home\CrowdfundingController@cfstart','as'=>'crowdfunding/cfstart']);
//个人发起众筹
Route::get('crowdfunding/cfperson', ['uses'=>'Home\CrowdfundingController@cfperson','as'=>'crowdfunding/cfperson']);
//发起众筹项目
Route::get('crowdfunding/cfproduct', ['uses'=>'Home\CrowdfundingController@cfproduct','as'=>'crowdfunding/cfproduct']);
//处理发起众筹项目数据
Route::any('crowdfunding/cfdoproduct', ['uses'=>'Home\CrowdfundingController@cfdoproduct','as'=>'crowdfunding/cfdoproduct']);
//处理个人发起众筹数据
Route::any('crowdfunding/docfperson', ['uses'=>'Home\CrowdfundingController@docfperson','as'=>'crowdfunding/docfperson']);
//机构发起众筹数据
Route::get('crowdfunding/cfgroup', ['uses'=>'Home\CrowdfundingController@cfgroup','as'=>'crowdfunding/cfgroup']);
//处理机构发起众筹数据
Route::any('crowdfunding/docfgroup', ['uses'=>'Home\CrowdfundingController@docfgroup','as'=>'crowdfunding/docfgroup']);
//重抽详情页
Route::get('crowdfunding/cfdesc', ['uses'=>'Home\CrowdfundingController@cfdesclist','as'=>'crowdfunding/cfdesc']);
//错误页面
Route::get('crowdfunding/cferror', ['uses'=>'Home\CrowdfundingController@cferror','as'=>'crowdfunding/cferror']);

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
//利率展示
Route::get('aloan/interest_rate_list', 'Admin\LoanController@interestRateList');
//利率修改
Route::post('aloan/updateRate', 'Admin\LoanController@updateRate');
//借贷记录列表
Route::get('aloan/borrowing_list', 'Admin\LoanController@borrowingList');
//借贷记录搜索列表
Route::post('aloan/search', 'Admin\LoanController@searchloan');
//借贷记录详情
Route::get('aloan/loanInfo', 'Admin\LoanController@loanInfo');
//放款
Route::post('aloan/success', 'Admin\LoanController@success');
//回访验证
Route::post('aloan/call', 'Admin\LoanController@call');
//还款记录列表
Route::get('aloan/repayment_list', 'Admin\LoanController@repaymentList');
//还款记录搜索列表
Route::post('aloan/searchrecord', 'Admin\LoanController@searchRecord');

//后台积分模块
Route::get('aintegral/ticket_list', 'Admin\IntegralController@ticketList');
Route::get('aintegral/ticket_status', 'Admin\IntegralController@coupons_status');
Route::get('aintegral/add_goods', 'Admin\IntegralController@addGoods');
Route::get('aintegral/goods_uplist/{id}', 'Admin\IntegralController@goods_uplist');
Route::get('aintegral/goods_order', 'Admin\IntegralController@goodsOrder');
Route::get('aintegral/coupons_true/{name}', 'Admin\IntegralController@coupons_true');
Route::get('aintegral/goods_list', 'Admin\IntegralController@goods_list');
Route::post('aintegral/goods_add', 'Admin\IntegralController@goods_add');
Route::post('aintegral/goods_up', 'Admin\IntegralController@goods_up');
Route::post('aintegral/goods_ajax_img', 'Admin\IntegralController@goods_ajax_img');
Route::post('aintegral/goods_del', 'Admin\IntegralController@goods_del');
Route::post('aintegral/goods_ajax_sta', 'Admin\IntegralController@goods_ajax_sta');
Route::post('aintegral/coupons_true_add', 'Admin\IntegralController@coupons_true_add');
Route::post('aintegral/coupons_add','Admin\IntegralController@coupons_add');
Route::post('aintegral/coupons_del','Admin\IntegralController@coupons_del');


//后台众筹模块
Route::get('acrowd/category_list', 'Admin\CrowdfundingController@categoryList');
Route::get('acrowd/add_category', 'Admin\CrowdfundingController@addCategory');
Route::get('acrowd/projects_list', 'Admin\CrowdfundingController@projectsList');
Route::get('acrowd/projects_order', 'Admin\CrowdfundingController@projectsOrder');


//后台投资资金模块
Route::get('ainvest/capital_pool', 'Admin\InvestController@capitalPool');

