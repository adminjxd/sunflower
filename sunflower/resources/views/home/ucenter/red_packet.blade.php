<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')

<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="{{ URL::asset('/images/clist1.jpg')}}" width="1000" height="80"></div>
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
          <li style="position:relative;" class=""> <span> <a href="{{ URL::asset('/ucenter/lucky ') }}"> <i class="dot dot06"></i> 幸运转盘 </a> </span> </li>
          <li style="position:relative;"> <span> <a href="{{ URL::asset('/ucenter/systeminfo') }}"><i class="dot dot08"></i>系统信息 </a> </span> </li>
        <li><span><a href="{{ URL::asset('/ucenter/accountset') }}"><i class="dot dot09"></i>账户设置</a></span></li>
        <li><span><a href="{{ URL::asset('/redpacket/session') }}"><i class="dot dot09"></i>设置session</a></span></li>
      </ul>
    </div>
    <label id="typeValue" style="display:none;"> </label>
    <style type="text/css">
			.wdhb-tab .on  a{color:#fff;}
		</style>
    <div class="personal-main">
      <div class="personal-zqzr personal-xtxx" style="min-height: 500px;">
        <h3><i>我的红包</i></h3>
        <div class="lx-wdhb"> <span class="pay-title">兑换红包</span> <span class="pay-number">
          <form id="codeForm" name="codeForm" method="post" action="javascript:">
            <input id="codeForm:code" type="text" name="codeForm:code" class="pay-money-txt">
            <input id="codeChange" sta="1" type="button" name="codeForm:j_idt73" value="兑换" class="btn-dh">
            <span class="cz-error" style="display:none;"> <span class="error">红包兑换码不能为空！</span> </span>
          </form>
          <script>
	        //<![CDATA[  
	          	$(function(){
	          		if(true){
	          			$("#codeForm\\:code").val("输入验证码，兑换相应面值的红包");
	          		}
	          		$("#codeForm\\:code").blur(function(){
	          			var code = $(this).val();
	          			if(undefined == code || null == code || "" == code || "输入验证码，兑换相应面值的红包" == code){
	          				$(this).val("输入验证码，兑换相应面值的红包");
	          				$(".cz-error").css({"display": "block"});
	          			}
	          		});
	          		$("#codeForm\\:code").focus(function(){
	          			$(".cz-error").css({"display": "none"});
	          			var code = $(this).val();
	          			if(undefined != code && null != code && "输入验证码，兑换相应面值的红包" == code){
	          				$(this).val("");
	          			}
	          		});
                    $("#codeChange").click(function(){
                        var code = $("#codeForm\\:code").val()
                        var obj = $(this)
                        if(obj.attr('sta') != 1){
                            return
                        }obj.attr('sta',0)
                        if(undefined == code || null == code || "" == code || "输入验证码，兑换相应面值的红包" == code){
                            $(".cz-error").css({"display": "block"});
                            return
                        }
                        $.ajax({
                            type : 'post',
                            url : '{{ URL::asset('redpacket/exchange')}}',
                            data : {code:code},
                            dataType : 'json',
                            success : function(data){
                            if(data.error == 1){
                                var str = '';
                                var v =data.info
                                    str += '<li class="len">';
                                    str +='  <span class="wdhb-name">'+ v.c_name+'</span>';
                                    str += ' <span class="wdhb-con">'+ v.c_value+'</span>';
                                    str += ' <span class="wdhb-deadline">'+ v.end_time+'</span>';
                                    str += ' <span class="wdhb-status"><a href="#">'+ v.is_statues+'</a></span>';
                                    str += '</li>';
                                alert('兑换成功')
                                var len = $('.len').length
                                if(len < 2){
                                    $('#info').append(str)
                                }
                            }else if(data.error == -1){
                                alert('该券不存在或已被使用')
                            }
                                obj.attr('sta',1)
                            }
                        })
                    })
	          	})
	          	//]]>
	          </script>
          </span> </div>
        <form id="form" name="form" method="post" action="">
          <script type="text/javascript">clearPage = function() {PrimeFaces.ab({source:'form:j_idt76',formId:'form',process:'form:j_idt76',params:arguments[0]});}</script>
          <span id="form:dataTable">
          <div  class="wdhb-tab">
            <ul>
              <li class="on"><a href="#" title="未使用">展示 </a> </li>
            </ul>
          </div>

          <div class="wdhb-title"><span class="wdhb-name">红包名称</span><span class="wdhb-con">红包金额</span><span class="wdhb-deadline">截止日期</span> <span class="wdhb-status">状态</span> </div>
          <div class="zqzr-list">
            <ul id="info">
                @foreach($info as $v)
              <li class="len"><span class="wdhb-name">{{$v['c_name']}}</span>
                  <span class="wdhb-con">{{$v['c_value']}}</span>
                  <span class="wdhb-deadline">{{date('Y-m-d',$v['end_time'])}}</span>
                  <span class="wdhb-status"><a href="#">@if($v['is_statues']==0)未使用@else已经使用@endif</a></span>
              </li>
                @endforeach
            </ul>
           {!! $info->links() !!}
          </div>

          <!--<div style="float:left; width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
					 <img src="images/nondata.png" width="60" height="60"><br><br>
					   暂无红包记录</div>-->
          </span>
        </form>
      </div>

    </div>

    <div class="clear"></div>
  </div>
</div>

@endsection
