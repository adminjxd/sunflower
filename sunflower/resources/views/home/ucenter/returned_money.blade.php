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
    <div class="personal-main">
      <div class="personal-back">
        <h3><i>回款计划</i></h3>
        <form id="form" name="form" method="post" action="">
          <input type="hidden" name="form" value="form">
          <div class="back-money"> <span class="back-own"><b class="fb">待收本金</b><br>
            <i>0.00</i> 元</span> <span class="back-profit"><b class="fb">待收收益</b><br>
            <i>0.00</i> 元</span> </div>
          <div class="back-choosedate"> <span class="choosedate">筛选时间</span>
            <div id="datebox" class="select-date"> <span class="select-title" style="display:inline-block;height:25px;line-height:20px;"></span>
              <ul>
                <li>全部</li>
              </ul>
            </div>
            <span id="form:datapicker1" class="datepicker">
            <input type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all hasDatepicker" id="">
            </span> - <span id="form:datapicker2" class="datepicker">
            <input type="text" class="ui-inputfield ui-widget ui-state-default ui-corner-all hasDatepicker" id="datetimepicker20">
            </span>
            <input id="" type="hidden" name="">
            <button id="" name="" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only btn-ok btn-235 txt-right"  type="submit"><span class="ui-button-text ui-c">查询</span></button>
          </div>
          <span id="form:dataTable">
          <div class="personal-backlist">
            <div class="pmain-contitle"> <span class="pmain-titledate fb">计划回款时间</span> <span class="pmain-titleproject fb">项目</span> <span class="pmain-titletype fb">类型</span> <span class="pmain-titlemoney fb">回款金额</span> </div>
            <ul style="float:left;">
              <li> <span class="pmain-titledate">2015-10-1</span> <span class="pmain-titleproject">债权转让</span> <span class="pmain-titletype">房易贷</span> <span class="pmain-titlemoney">100000.00</span> </li>
              <li> <span class="pmain-titledate">2015-10-1</span> <span class="pmain-titleproject">债权转让</span> <span class="pmain-titletype">房易贷</span> <span class="pmain-titlemoney">100000.00</span> </li>
              <li> <span class="pmain-titledate">2015-10-1</span> <span class="pmain-titleproject">债权转让</span> <span class="pmain-titletype">房易贷</span> <span class="pmain-titlemoney">100000.00</span> </li>
              <li> <span class="pmain-titledate">2015-10-1</span> <span class="pmain-titleproject">债权转让</span> <span class="pmain-titletype">房易贷</span> <span class="pmain-titlemoney">100000.00</span> </li>
              <li> <span class="pmain-titledate">2015-10-1</span> <span class="pmain-titleproject">债权转让</span> <span class="pmain-titletype">房易贷</span> <span class="pmain-titlemoney">100000.00</span> </li>
              <!--<div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
										    <img src="images/nondata.png" width="60" height="60"><br><br>
										   暂无回款计划</div>-->
            </ul>
          </div>
          </span>
        </form>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
@endsection
