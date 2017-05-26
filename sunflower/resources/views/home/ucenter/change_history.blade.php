<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="{{ URL::asset('/images/clist1.jpg') }}" width="1200" height="96"></div>
    <div id="personal-left" class="personal-left">
      <ul>
         <li class="pleft-cur"><span><a href="{{ URL::asset('/ucenter/myaccount') }}"><i class="dot dot1"></i>账户总览</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/moneyrecord') }}">资金记录</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/investrecord') }}">投资记录</a></span></li>
        <li><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/returnedmoney') }}">回款计划</a></span></li>
        <li class=""><span><a href="{{ URL::asset('/ucenter/openthirdparty') }}"><i class="dot dot02"></i>开通第三方</a> </span> </li>
        <li><span><a href="{{ URL::asset('/ucenter/recharge') }}"><i class="dot dot03"></i>充值</a></span></li>
        <li class=""><span><a href="{{ URL::asset('/ucenter/withdrawdeposit') }}"><i class="dot dot04"></i>提现</a></span></li>
        <li style="position:relative;" class=""> <span> <a href="{{ URL::asset('/ucenter/redpacket') }}"> <i class="dot dot06"></i> 我的红包 </a> </span> </li>
        <li class=""><span><a style="font-size:14px;text-align:center;width:115px;padding-right:35px;" href="{{ URL::asset('/ucenter/changehistory') }}">兑换历史</a></span></li>
        <li style="position:relative;"> <span> <a href="{{ URL::asset('/ucenter/systeminfo') }}"><i class="dot dot08"></i>系统信息 </a> </span> </li>
        <li><span><a href="{{ URL::asset('/ucenter/accountset') }}"><i class="dot dot09"></i>账户设置</a></span></li>
      </ul>
    </div>
    <label id="typeValue" style="display:none;"> </label>
    <div class="personal-main">
      <div class="personal-zqzr personal-xtxx" style="min-height: 500px;">
        <h3> <i>兑换历史</i> </h3>
        <div class="wdhb-title wdhb-dhls"> <span class="wdhb-yzm">验证码</span><span class="wdhb-con">兑换红包名称</span><span class="wdhb-deadline">兑换日期</span> </div>
        <form id="form" name="form" method="post" action="">
          <div class="zqzr-list">
            <ul>
              <li><span class="wdhb-yzm">12345678</span><span class="wdhb-con">现金红包50元</span><span class="wdhb-deadline">2015-10-1</span></li>
              <li><span class="wdhb-yzm">12345678</span><span class="wdhb-con">现金红包50元</span><span class="wdhb-deadline">2015-10-1</span></li>
              <li><span class="wdhb-yzm">12345678</span><span class="wdhb-con">现金红包50元</span><span class="wdhb-deadline">2015-10-1</span></li>
              <li><span class="wdhb-yzm">12345678</span><span class="wdhb-con">现金红包50元</span><span class="wdhb-deadline">2015-10-1</span></li>
            </ul>
          </div>
          <!--<div style="float:left; width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
					 <img src="/site/themes/default/style/../images/nondata.png" width="60" height="60"><br><br>
					   暂无兑换记录</div>-->
        </form>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
@endsection