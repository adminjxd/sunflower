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
    <script>
		//<![CDATA[
			function showSpan(op){
				$("body").append("<div id='mask'></div>");
				$("#mask").addClass("mask").css("display","block");
	
				$("#"+op).css("display","block");
			}
	
			function displaySpan(op){
				$("#mask").css("display","none");
				$("#"+op).css("display","none");
			}
		//]]>
		</script>
    <script type="text/javascript">
		//<![CDATA[
			function checkActualMoney()
			{
				//提现金额
				var actualMoney=Number($("#form\\:actualMoney").val());

				var actualMessage=$("#actualMoney_message");
				var nullFlag=actualMoney=="";
				if(nullFlag==true)
				{
					$(actualMessage).text("请输入您要提现的金额");
					$(actualMessage).show();
					return false;
				}
				else
				{
					$(actualMessage).hide();
				}
				var numberFlag=isNaN(actualMoney);
				
				if(numberFlag==true)
				{
					$(actualMessage).text("提现金额必须大于2.00 元，单笔不超过50 万");
					$(actualMessage).show();
					return false;
				}
				else
				{
					$(actualMessage).hide();
				}
				var legalFlag1=actualMoney>2;
				var legalFlag2=actualMoney<=500000;
				if(!legalFlag1||!legalFlag2)
				{
					$(actualMessage).text("提现金额必须大于2.00 元，单笔不超过50 万");
					$(actualMessage).show();
					return false;
				}
				else
				{
					$(actualMessage).hide();
				}
				//提现金额小数位
				var legalRegex="^(([1-9]+[0-9]*)|((([1-9]+[0-9]*)|0)\\.[0-9]{1,2}))$";
				var legalPattern=new RegExp(legalRegex);
				var legalFlag3=legalPattern.test(actualMoney);
				if(!legalFlag3)
				{
					$(actualMessage).text("小数位最多两位!");
					$(actualMessage).show();
					return false;
				}
				else
				{
					$(actualMessage).hide();
				}
				var balance= Number($("#form\\:blance").html());
				
				//提现金额小于余额 
				var legalFlag=(actualMoney-balance).toFixed(2)<=0;
			
				if(!legalFlag)
				{
					$(actualMessage).text("余额不足");
					$(actualMessage).show();
					return false;
				}
				else
				{
					$(actualMessage).hide();
				}
				return true;
			}
			
			function amount(th){
			    var regStrs = [
			        ['^0(\\d+)$', '$1'], //禁止录入整数部分两位以上，但首位为0
			        ['[^\\d\\.]+$', ''], //禁止录入任何非数字和点
			        ['\\.(\\d?)\\.+', '.$1'], //禁止录入两个以上的点
			        ['^(\\d+\\.\\d{2}).+', '$1'] //禁止录入小数点后两位以上
			    ];
			    for(i=0; i<regStrs.length; i++){
			        var reg = new RegExp(regStrs[i][0]);
			        th.value = th.value.replace(reg, regStrs[i][1]);
			    }
			    if(th.value>500000){
			    	th.value = th.value.substr(0,th.value.length-1);
			    }
			}
			//]]>
		</script>
    <div class="personal-main">
      <div class="personal-deposit">
        <h3><i>提现</i></h3>
        <form id="form" name="form" method="post" action="/user/withdraw" enctype="application/x-www-form-urlencoded" target="_blank">
          <input type="hidden" name="form" value="form">
          <div class="deposit-form" style="margin-top:0px;border-top:0px none;">
            <h6>填写提现金额</h6>
            <ul>
              <li> <span class="deposit-formleft">可用金额</span> <span class="deposit-formright"> <i>
                <label id="form:blance">{{$balance}}</label>
                </i>元 </span> </li>
              <li> <span class="deposit-formleft">提现金额</span> <span class="deposit-formright">
                <input id="form:actualMoney" type="text" name="form:actualMoney" class="deposite-txt" maxlength="10">
                元 </span> <span id="actualMoneyErrorDiv"><span id="actualMoney_message" style="display:none" class="error"></span></span> </li>
               <li> <span class="deposit-formleft">收款账户</span> <span class="deposit-formright">
                <input id="phone" type="text" name="form:actualMoney" class="deposite-txt" maxlength="11">
                </span> <span id="actualMoneyErrorDiv"><span id="actualMoney_messages" style="display:none" class="error"></span></span> </li>
							<li> <span class="deposit-formleft">提现费用</span> <em id="txfy" class="markicon fl"></em> <span class="deposit-formright deposit-formright1"> <i>
                <label id="form:fee"> 0.00</label>
                </i>元 </span> <span class="txarrow-show">提现金额的0.1%，最低不低于2元，最高100元封顶</span><span class="txicon-show"></span> </li>
              <li><span class="deposit-formleft">实际到账金额</span> <em id="dzje" class="markicon fl"></em> <span class="deposit-formright deposit-formright1"> <i>
                <label id="form:cashFine"> 0.00</label>
                </i> 元</span> <span class="dzarrow-show">提现金额 - 提现费用</span><span class="dzicon-show"></span> </li>
              <li>
                <input type="button" name="form:j_idt78" value="提现" class="btn-depositok" onclick="return checkActualMoney()">
              </li>
            </ul>
          </div>
        </form>
        <div class="deposit-tip"> 温馨提示：<br>
          1、用户需在完成身份认证、开通丰付托管账户并绑定银行卡后，方可申请提现；<br>
          2、请务必在提现时使用持卡人与身份认证一致的银行卡号，且确保填写信息准确无误；<br>
          3、工作日当天16:00前提交的提现申请将在当天处理，默认为T+1到账；<br>
          4、提现金额单笔上限为50万元，单日累计总额不可超过100万元；<br>
          5、提现手续费为提现金额的0.1%，最低每笔2元，100元封顶，手续费由第三方托管账户收取，用户自行承担。<br>
        </div>
      </div>
    </div>
    <script type="text/javascript">
		  //计算实际提现的金额
		  $("#form\\:actualMoney").keyup(function(){
				var sum=Number($("#form\\:blance").html());
				var actualMoney=Number($("#form\\:actualMoney").val());
				var withdrawals = Math.ceil((actualMoney*0.01)*100)/100;
				var actual = actualMoney - withdrawals ;
				var actualMessage=$("#actualMoney_message");
				if(actualMoney<=sum)
				{
					$("#form\\:cashFine").html(actual);
				  $("#form\\:fee").html(withdrawals);
					$(actualMessage).hide();
				}
				else
				{					  
						$(actualMessage).text("余额不足,最大金额"+sum);
						$(actualMessage).show();
				}
				
			})
			//提现
			$(".btn-depositok").click(function(){
				var actualMessage=$("#actualMoney_messages");
				//账户总金额
				var sumMoney = $("#form\\:blance").html();
				//提现金额
				var actualMoney=Number($("#form\\:actualMoney").val());
				//实际到账金额
        var withdrawals = $("#form\\:cashFine").html();
				//收款方账户
				var phone = $('#phone').val();
				if(phone == "")
				{
						$(actualMessage).text("收款方账户不能为空");
						$(actualMessage).show();
				}
				else
				{
					 var reg= /^1[34578]\d{9}$/;
					 if(reg.test(phone))
					 {
							if(sumMoney >= actualMoney && actualMoney>0)
				      {
								$(actualMessage).hide();
								$.ajax({
											type:"POST",
											data:{actualMoney:actualMoney,withdrawals:withdrawals,phone,phone,sumMoney:sumMoney},
											url:"{{asset("ucenter/moveMoney")}}",
											dataType:"json",
											success:function(data){
												alert(data.message);
												if(data.status == 1)
												{
													$("#form\\:blance").html(Number(sumMoney -actualMoney))
												}
											}
									})
				      }
					 }
					 else
					 {
						 	$(actualMessage).text("您输入的账户有误");
					   	$(actualMessage).show();
					 }
				}
			})			
				function keyUpcheck()
				{
					$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial"});
				}
			</script>
    <div class="clear"></div>
  </div>
</div>
@endsection
