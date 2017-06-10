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
    <style type="text/css">
		.invest-tab .on  a{color:#fff;}
	</style>
    <div class="personal-main">
      <div class="personal-investnote">
        <h3><i>投资记录</i></h3>
        <div class="investnote-money"> <span><b class="fb">累计投资</b><br>
          <i><?=$u['invest_all']?></i> 元 </span> <span><b class="fb">累计收益</b><br>
          <i class="c-pink"><?=$u['a_earnings']?></i> 元 </span>
            <span class="none"><b class="fb">待收收益</b><br>
          <i><?=$u['f_earnings']?></i> 元 </span> </div>
        <form id="form" name="form" method="post" action="">
          <script type="text/javascript">clearPage = function() {PrimeFaces.ab({source:'form:j_idt82',formId:'form',process:'form:j_idt82',params:arguments[0]});}</script>
          <span id="form:dataTable">
          <div class="invest-tab">
            <ul>
              <li class="on"><span><a href="#" title="散标">散标记录 </a> </span> </li>
            </ul>
          </div>
          <div class="investnote-list">
            <div class="investnote-contitle"> <span class="investnote-w1 fb">交易时间</span> <span class="investnote-w2 fb">项目</span> <span class="investnote-w3 fb">状态</span> <span class="investnote-hbw4 fb">我的投资</span> <span class="investnote-hbw5 fb">我的收益</span> </div>
            <ul>

                @foreach($u['invest'] as $k=>$v)
                    <li><span class="investnote-w1"><?=$v->invest_time?></span>
                        <span class="investnote-w2"><?=$v->loan_name?></span>
                        <span class="investnote-w3">
                                                        <?php if($v->status){?>进行中<?php }else{?>已结束<?php }?>

                        </span>
                        <span class="investnote-hbw4"><?=$v->invest_money?></span>
                        <span class="investnote-hbw5"><?=$v->total_num*$v->return_money?></span>
                    </li>
                @endforeach

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