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
   <input type="hidden" id="h_url" value="{{URL::asset('')}}">
    <script type="text/javascript">
		//<![CDATA[
		function showSpan(op){
			$("#updateMonbileForm\\:updateMonbileFormauthCode").val(""); 
			if(op=='alert-updateEmail'){
				var bool = $("#authenticationMobile").val();
				if(bool=='true'){
				    $("#alert-main").css("display","none");
					$("#alert-main2").css("display","block");
				}
			}
			$("body").append("<div id='mask'></div>");
			$("#mask").addClass("mask").css("display","block");

			$("#"+op).css("display","block");
		}

		function displaySpan(op){
			clearInputValue(); 
			$("#mask").css("display","none");
			$("#"+op).css("display","none");
		}
		
		function displaySpan2(){
			$("#mask").css("display","none");
			$("#alert-updateEmail").css("display","none");
			
			$("body").append("<div id='mask'></div>");
			$("#mask").addClass("mask").css("display","block");

			$("#alert-checkMobile").css("display","block");
		}
		var flag = false;
		//验证码发送消息提示
		function sCode(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode").hide();
				$("#sendCodeGrey").show();
				/* if(flag && $("#sendCode").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#checkMonbileForm\\:mobileNumber").val().replace(/(^\s*)|(\s*$)/g,"");
				if("dx" == args2){
					$("#mobileMsg7").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg7").css({"display": ""});
					$("#authCodeMsg8").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg8").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg7").css({"display": "none"});
					$("#authCodeMsg8").css({"display": ""});
				}
				timer("sendAuthCodeBtn1", {
					"count" : 60,
					"animate" : true,
					initTextBefore : "后可重新操作",
					initTextAfter : "秒",
					callback:function(){
						$("#sendCode").show();
						$("#sendCodeGrey").hide();
						flag = false;
						$("#authCodeMsg7").css({"display": "none"});
						$("#authCodeMsg8").css({"display": "none"});
					}
				}).begin();
			}
		}
		//验证码发送消息提示
		function s2Code(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode1").hide();
				$("#sendCodeGrey1").show();
				/* if(flag && $("#sendCode1").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#updateMonbileForm\\:mobileNumber2").val().replace(/(^\s*)|(\s*$)/g,"");
				if("dx" == args2){
					$("#mobileMsg3").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg3").css({"display": ""});
					$("#authCodeMsg4").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg4").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg3").css({"display": "none"});
					$("#authCodeMsg4").css({"display": ""});
				}
				timer("sendAuthCodeBtn2", {
					"count" : 60,
					"animate" : true,
					initTextBefore : "后可重新操作",
					initTextAfter : "秒",
					callback:function(){
						$("#sendCode1").show();
						$("#sendCodeGrey1").hide();
						flag = false;
						$("#authCodeMsg3").css({"display": "none"});
						$("#authCodeMsg4").css({"display": "none"});
					}
				}).begin();
			}
		}
		
		//验证码发送消息提示
		function s3Code(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode2").hide();
				$("#sendCodeGrey2").show();
				/* if(flag && $("#sendCode2").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#mobile").val();
				if("dx" == args2){
					$("#mobileMsg5").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg5").css({"display": ""});
					$("#authCodeMsg6").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg6").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg5").css({"display": "none"});
					$("#authCodeMsg6").css({"display": ""});
				}
				timer("sendAuthCodeBtn3", {
					"count" : 60,
					"animate" : true,
					initTextBefore : "后可重新操作",
					initTextAfter : "秒",
					callback:function(){
						$("#sendCode2").show();
						$("#sendCodeGrey2").hide();
						flag = false;
						$("#authCodeMsg5").css({"display": "none"});
						$("#authCodeMsg6").css({"display": "none"});
					}
				}).begin();
			}
		}
		//清空验证码
		function clearValue(element)
		{
			$(element).val("");
		}
		
		function getUrlParam(){
			/* var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");	 
			var r = window.location.search.substr(1).match(reg);	 
			if (r!=null) return unescape(r[2]); 
			return null; */
			var type=""
			return type;
		}
		function clearInputValue(){
			$("#checkMonbileForm\\:mobileNumber").val(""); 
			$("#checkMonbileForm\\:authCode").val(""); 
			$("#checkMonbileForm\\:mobileNumber_message").remove();
			$("#checkMonbileForm\\:authCode_message").remove();
			
			//修改手机号-验证原手机号
			$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
			$("#checkOldMobileForm\\:checkOldMobileFormauthCode").val("");

			$("#updateMonbileForm\\:mobileNumber2").val(""); 
			$("#updateMonbileForm\\:updateMonbileFormauthCode").val(""); 
			$("#updateMonbileForm\\:mobileNumber2_message").remove();
			$("#updateMonbileForm\\:updateMonbileFormauthCode_message").remove();
			

			$("#changeEmailForm\\:newEmail").val(""); 
			$("#changeEmailForm\\:changeEmailFormauthCode").val(""); 
			$("#changeEmailForm\\:newEmail_message").remove();
			$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
			
			//修改密码提示消息
			$("#updatePassForm\\:oldPassword").val(""); 
			$("#updatePassForm\\:password").val(""); 
			$("#updatePassForm\\:repassword").val(""); 
			
			$("#updatePassForm\\:oldPassword_message").remove();
			$("#updatePassForm\\:password_message").remove();
			$("#repassword_message").remove();

			//清除原手机号验证信息
			$('#phoneJy').html('');
			$('#oldphone_code').val('');
			//清除新密码提示信息
			$("#passwordErrorDiv").html('');
		}
		//]]>
	</script>
    <style type="text/css">
		.txt235{height:38px;border:1px solid #ccc;}
		#div1{
	    	display:none;
	    	height: 100%;
	    	width: 100%;
	    	background:black;
	    	position: absolute;
	    	/*left: 50%;*/
	    	/*top: 50%;*/
	    	/*margin-left: -500px;*/
	    	/*margin-top: -250px;*/
	    	z-index: 1;
	    	opacity: 0.1;
	    }
	    #div2{
	    	display:none;
	    	height: 200px;
	    	width: 400px;
	    	border:1px solid red;
	    	background:white;
	    	position: absolute;
	    	left: 50%;
	    	top: 50%;
	    	margin-left: -200px;
	    	margin-top: -100px;
	    	z-index: 2;
	    	opacity: 1;
	    }
	</style>
	<div id="div1"></div>
	<div id="div2">
		<table cellspacing="0">
			<tr bgcolor="red">
				<th width=150 height=30 align="left">
				<font color='white'>请填写真实信息：</font></th>
				<th width=250 style="text-align:right;">
				<input type="submit" onclick="close1()" style="cursor:hand;" value="×" >
				<!--<button onclick="close1()" style="cursor:hand;">
				×</button>-->
				</th>
			</tr>
			<tr>
				<td align="right" height=60>姓名：</td>
				<td>
				<input type="text" id="username"><span id="checkusername"></span>
				</td>
			</tr>
			<tr>
				<td align="right" height=30 valign="top">身份证：</td>
				<td valign="top">
				<input type="text" id="cordid"><span id="checknumber"></span>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" valign="top">
				<input type="button" id="getadd" value="提交">
				<input type="button" value="取消" onclick="close1()">
				</td>
			</tr>
		</table>
	</div>
	<script>
		function lick(){
			document.getElementById('div1').style.display="block";
			document.getElementById('div2').style.display="block";
		}
		function close1(){
			document.getElementById('div1').style.display="none";
			document.getElementById('div2').style.display="none";
		}
	</script>
    <script type="text/javascript">
        var flag = false;
		var flag1 = false; 
		//姓名，身份证号验证
		$("#username").blur(function(){
			var reg = /^[\u4E00-\u9FA5]{2,4}$/;
			var username = $(this).val();
			if(username == "")
			{
				$("#checkusername").html("<font color='red'>不能为空</font>");
			}
			else
			{
		 	    if(!reg.test(username))
				{
					$("#checkusername").html("<font color='red'>姓名为2-4个汉字</font>");
				}
				else
				{
					$("#checkusername").hide();
					flag = true;
				}
			}
		})
    	$("#cordid").blur(function(){
			var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|x)$)/; 
			var cordid = $(this).val();
	    	if(cordid == "")
			{
				$("#checknumber").html("<font color='red'>不能为空</font>");
			}
			else
			{
				if(!reg.test(cordid))
				{								 
					$("#checknumber").html("<font color='red'>证件号错误</font>");
				}
				else
				{								
					$("#checknumber").hide();
					flag1 = true;
				}
			}
		})
        $(document).on("click","#getadd",function(){
			var username = $("#username").val();
			var cordid = $("#cordid").val();
			if(flag == true && flag1 == true)
			{
			 	$.ajax({
					type:"POST",
					url:"{{asset('ucenter/authentication')}}",
					data:{username:username,cordid:cordid},
					dataType:"json",
					success:function(data){
						if(data.status == 1)
						{
							$("#div1").hide();
							$("#div2").hide();
							var str = '<i class="grzxbg p-danger"></i><span class="zhsz-span1">身份认证</span><span class="zhsz-span2">认证中</span><span class="zhsz-span3">待审核';
							$("#cordnumber").html(str);
						}else if(data.status == 2)
						{
							alert(data.message);
						}
						else if(data.status == 3)
						{
							alert(data.message);
						}
					}
			    })
			}
		})
		//<![CDATA[
		$(function(){
			var  type = getUrlParam();
			if(type =='2'){
				showSpan('alert-updateMobile');//绑定手机号
			}else if(type =='3'){
				showSpan('alert-activeEmail');//激活邮箱
			}else if(type =='4'){
				showSpan('alert-activeEmailMsg');//激活邮箱后提醒
			}else if(type=='5')
			{
				showSpan('alert-checkOldMobile');
			}
			else if(type=='6')
			{
				showSpan('alert-updateEmail');
			}

			//进度条样式
			if($.browser.mozilla) 
			{ 
				$("i[class='grzxbg level3']").css(
						{
						backgroundPosition: "0px -550px",
						border:"none",
						margin :"37px 0px 0px 20px",
						height:"17px"
						}
				);
		    }else { 
		    	$("i[class='grzxbg level3']").css(
		    			{
		    				border:"none",
		    				margin :"37px 0px 0px 20px",
		    				height:"17px"
		    			}
		    	);
		    	$("i[class='grzxbg level3']").css({
		    		"background-position-x":"0px",
		    		"background-position-y":"-550px"
		    	});
	        }
			//$("#activeEmail\\:activeEmailemail").attr({"readOnly":"true"});
			"";
		});
		//]]>
	</script>
    <div class="personal-main">
      <div class="personal-zhsz">
        <h3><i>账户设置</i></h3>
        <div class="personal-level"> <span class="wzd">您的账户完整度</span><i class="grzxbg level3" style="border: none; margin: 37px 0px 0px 20px; height: 17px; background-position: 0px -550px;"></i><span class="state">[中]</span> <i id="zhwzd" class="markicon fl mt35"></i><span class="arrow-personal">请尽快完成账户安全设置，以确保您的账户安全</span><span class="grzxbg icon-personal"></span> </div>
        <ul>
          <li><i class="grzxbg p-right"></i><span class="zhsz-span1">手机号</span><span class="zhsz-span2">{{$authentication['phone']}}</span><span class="zhsz-span3"><a href="javascript:void(0)" onclick="showSpan('alert-checkOldMobile')">更改</a></span></li>
          <input type="hidden" value="false" id="authenticationMobile">
          <li id="cordnumber">
          <?php if($authentication['status'] == 0){ ?>
				<i class="grzxbg p-danger"></i><span class="zhsz-span1">身份认证</span><span class="zhsz-span2">未认证</span><span class="zhsz-span3"><a href="javascript:void(0)" onclick="lick()" >认证</a>
          <?php }else if($authentication['status'] == 1){ ?>
          <i class="grzxbg p-right"></i><span class="zhsz-span1">身份认证</span><span class="zhsz-span2">{{$authentication['cardid']}}</span><span class="zhsz-span3"><font color=green>已认证</font>
			<?php }else{ ?>
			<i class="grzxbg p-danger"></i><span class="zhsz-span1">身份认证</span><span class="zhsz-span2">认证中</span><span class="zhsz-span3">待审核
			<?php } ?>
			</span></li>
          <!--<li><i class="grzxbg p-danger"></i><span class="zhsz-span1">第三方支付</span><span class="zhsz-span2">未开通</span><span class="zhsz-span3"><a href="#">开通</a></span></li>-->
          <li> <i class="grzxbg p-right"></i> <span class="zhsz-span1">电子邮箱</span> <span class="zhsz-span2">{{$authentication['email']}}</span> <span class="zhsz-span3"> <a href="#" onclick="showSpan('alert-updateEmail')">更改</a> </span> </li>
          <li><i class="grzxbg p-right"></i><span class="zhsz-span1">登录密码</span><span class="zhsz-span2"></span><span class="zhsz-span3"><a href="javascript:void(0)" onclick="showSpan('alert-updatePass')">更改</a></span></li>
        </ul>
      </div>
    </div>
    <script type="text/javascript">
		//<![CDATA[
        //验证手机号是否为空
        function checkCheckMobileFormMoible()
        {
    	    var mobile=$("#checkMonbileForm\\:mobileNumber").val();
    	    var nullFlag=(mobile=="");
    	    if(nullFlag)
   			{
   				$("#checkMonbileForm\\:mobileNumber_message").remove();
   				var $span = $("<span id=checkMonbileForm\:mobileNumber_message class=error>请输入手机号</span>");
   				$("#mobileNumberErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var mobileError=$("#mobileNumberErrorDiv").text();
   				if(mobileError=='请输入手机号')
   				{
   					$("#checkMonbileForm\\:mobileNumber_message").remove();
   				}
   			}
    	    return true;
        }
        //验证验证码是否为空
        function checkCheckMobileFormAuthCode()
        {
    	    var authCodeRegex="^[0-9]{4,4}$";
    	    var authCode=$("#checkMonbileForm\\:authCode").val();
    	    var nullFlag=(authCode=="");
    	    if(nullFlag)
   			{
   				$("#checkMonbileForm\\:authCode_message").remove();
   				var $span = $("<span id=checkMonbileForm\:authCode_message class=error>请输入验证码</span>");
   				$("#authCodeErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var authCodeError=$("#authCodeErrorDiv").text();
   				if(authCodeError=='请输入验证码')
   				{
   					$("#checkMonbileForm\\:authCode_message").remove();
   				}
   			}
    	    var authCodePattern=new RegExp(authCodeRegex);
    	    var legalFlag=authCodePattern.test(authCode);
    	    if(!legalFlag)
   			{
   				$("#checkMonbileForm\\:authCode_message").remove();
   				var $span = $("<span id=checkMonbileForm\:authCode_message class=error>验证码错误，请重新输入!</span>");
   				$("#authCodeErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var authCodeError=$("#authCodeErrorDiv").text();
   				if(authCodeError=='请输入验证码')
   				{
   					$("#checkMonbileForm\\:authCode_message").remove();
   				}
   			}
    	   return true;
        }
        function checkMobileAll()
        {
    	    checkCheckMobileFormMoible();
    	    checkCheckMobileFormAuthCode();
    	    var mobileErrorFlag=($("#mobileNumberErrorDiv").text().length == 0);
    	    var authCodeErrorFlag=($("#authCodeErrorDiv").text().length == 0);
    	    return mobileErrorFlag&&authCodeErrorFlag;
        }
	    $(document).ready(function(){
			var bdsjValiCodeError = $("#bdsjValiCodeError").val();
			if(bdsjValiCodeError.length > 0){
				$("#authCodeErrorDiv").html("");
				$("#updateMonbileFormauthCodeErrorDiv").html("");
				var $span = $("<span id=checkMonbileForm\:authCode_message class=error>"+bdsjValiCodeError+"</span>");
				if(!$("#authCodeErrorDiv").is(":hidden")){
					$("#authCodeErrorDiv").append($span);
				}else{
					$("#updateMonbileFormauthCodeErrorDiv").append($span);
				}
			}
   		});
		//]]>
	</script>
    <div class="alert-450" id="alert-checkMobile" style="display:none;">
      <div class="alert-title">
        <h3>绑定手机</h3>
        <span class="alert-close" onclick="displaySpan('alert-checkMobile')"></span></div>
      <div class="alert-main">
        <form id="checkMonbileForm" name="checkMonbileForm" method="post" action="#" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="checkMonbileForm" value="checkMonbileForm">
          <ul>
            <li>
              <label class="txt-name">手机号</label>
              <span class="txt240">
              <input id="checkMonbileForm:mobileNumber" type="text" name="checkMonbileForm:mobileNumber" autocomplete="off" value="15055100139" class="txt240" maxlength="35" onblur="jsf.util.chain(this,event,'return checkCheckMobileFormMoible()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入手机号">
              </span>
              <div id="mobileNumberErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">验证码</label>
              <input id="checkMonbileForm:authCode" type="text" name="checkMonbileForm:authCode" class="txt110" maxlength="8" onblur="jsf.util.chain(this,event,'return checkCheckMobileFormAuthCode()','mojarra.ab(this,event,\'blur\',0,\'@this\')')" placeholder="请输入验证码">
              <span id="sendCode"><a id="checkMonbileForm:sendAuthCodeBtn" href="#" onclick="jsf.util.chain(this,event,'return validateBindPhoneSMS();','PrimeFaces.ab({source:this,event:\'action\',process:\'checkMonbileForm:sendAuthCodeBtn checkMonbileForm:mobileNumber\',oncomplete:function(xhr,status,args){sCode(xhr, status, args, \'dx\');}}, arguments[1]);');return false" class="btn-code">免费获取校验码</a><a id="checkMonbileForm:sendAuthCodeBtn4" href="#" style="display:none;" onclick="mojarra.ab(this,event,'action','@this checkMonbileForm:mobileNumber',0,{'onevent':sCode2});return false" class="btn-code">免费获取校验码</a> </span> <span id="sendCodeGrey" style="display:none;"> <a href="#" id="sendAuthCodeBtn1" class="btn-codeAfter" style="cursor:default;">免费获取校验码</a> </span> </li>
            <li>
              <div id="authCodeErrorDiv" class="errorplace"></div>
              <div id="authCodeMsg7" style="display:none;" class="yzmplace"> 验证码已发送到您手机<span id="mobileMsg7"></span>，如果收不到短信，请 <a id="checkMonbileForm:sendAuthCodeBtn11" href="#" style="color:blue;" onclick="PrimeFaces.ab({source:this,event:'action',process:'checkMonbileForm:sendAuthCodeBtn11 checkMonbileForm:mobileNumber',oncomplete:function(xhr,status,args){sCode(xhr, status, args, 'yy');}}, arguments[1]);;return false">语音获取</a> </div>
              <div id="authCodeMsg8" style="display:none;" class="yzmplace"> 您的手机<span id="mobileMsg8"></span>将在60秒内收到语音电话，请接听！ </div>
              <input type="submit" name="checkMonbileForm:j_idt119" value="确　认" class="btn-ok txt-right" onclick="return checkMobileAll()">
            </li>
          </ul>
        </form>
      </div>
    </div>
    <script type="text/javascript">
		//<![CDATA[
		//验证码发送消息提示
		function s7Code(xhr, status, args, args2) {
			if (!args.validationFailed) {
				$("#sendCode7").hide();
				$("#sendCodeGrey7").show();
				/* if(flag && $("#sendCode7").is(":hidden")){
					return;
				} */
				flag = true;
				var mobileNumber = $("#checkOldMobileForm\\:oldMobileNumber").html().replace(/(^\s*)|(\s*$)/g,"");
				if("dx" == args2){
					$("#mobileMsg").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg").css({"display": ""});
					$("#authCodeMsg2").css({"display": "none"});
				}else if("yy" == args2){
					$("#mobileMsg2").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
					$("#authCodeMsg").css({"display": "none"});
					$("#authCodeMsg2").css({"display": ""});
				}
				timer("sendAuthCodeBtn7", {
					"count" : 60,
					"animate" : true,
					initTextBefore : "后可重新操作",
					initTextAfter : "秒",
					callback:function(){
						$("#sendCode7").show();
						$("#sendCodeGrey7").hide();
						flag = false;
						$("#authCodeMsg").css({"display": "none"});
						$("#authCodeMsg2").css({"display": "none"});
					}
				}).begin();
			}
		}  
		//验证验证码是否为空
        function checkOldMobileFormAuthCode()
        {
		    var legalRegex="^[0-9]{4,4}$";
     	    var authCode=$("#checkOldMobileForm\\:checkOldMobileFormauthCode").val();
     	    var nullFlag=(authCode=="");
     	    if(nullFlag)
   			{
   				$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
   				var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=error>请输入验证码</span>");
   				$("#checkOldMobileFormauthCodeErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
				$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
				var legalPattern=new RegExp(legalRegex);
				var legalFlag=legalPattern.test(authCode);
				if(!legalFlag)
				{
					$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
	   				var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=error>验证码错误，请重新输入</span>");
	   				$("#checkOldMobileFormauthCodeErrorDiv").append($span);
	   				return false;
				}
				else
				{
					$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
				}
   			}
     	    return true;
        }	           
		function checkCheckOldMobileAll()
		{
			
			return checkOldMobileFormAuthCode();
		}
		$(document).ready(function(){
			var valiCodeError = $("#valiCodeError").val();
			if(valiCodeError.length > 0){
				$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
	   			var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=error>"+valiCodeError+"</span>");
	   			$("#checkOldMobileFormauthCodeErrorDiv").append($span);
			}
		});
		//]]>
	</script>
    <input id="valiCodeError" type="hidden" name="valiCodeError">
    <div class="alert-450" id="alert-checkOldMobile" style="display:none;">
      <div class="alert-title">
        <h3>修改手机</h3>
        <span class="alert-close" onclick="displaySpan('alert-checkOldMobile')"></span></div>
      <div class="alert-main">
        <form id="checkOldMobileForm" name="checkOldMobileForm" method="post" action="#" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="checkOldMobileForm" value="checkOldMobileForm">
          <ul>
            <li>
              <label class="txt-name">原手机号</label>
              <label id="sun_oldphone" class="txt240"> {{$phone}}</label>
            </li>
            <li>
              <label class="txt-name">验证码</label>
              <input type="text" id="oldphone_code" name="checkOldMobileForm:checkOldMobileFormauthCode" class="txt110" maxlength="8" onfocus="clearValue(this)" placeholder="请输入验证码">
              <span id="sendCode7"><a id="phonesend" href="javascript:void(0)" class="btn-code" phone_sign="0">免费获取校验码</a></span>
            </li>
            <li><span class="txt-right" id="phoneJy"></span><br>
              <input type="button" name="checkOldMobileForm:j_idt129" value="确 认" class="btn-ok txt-right" id="sun_checkphone" phone_sign="0">
            </li>
          </ul>
        </form>
      </div>
    </div>
<script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
    <script>
    	// $(document).ready(function(){
    	// 	var flag4 = 1;//是否发送验证码标识
    	// 	var _t = 60; // 倒计时时间
    	// 	var wait = 300;
    	// 	var flaghave = 0;//倒计时标识
    	// 	var isSuccess = false; //手机验证码是否发送标识
	    //     var h_url = $('#h_url').val();
	    //     var $getKey = $("#phonesend");
	    //     var $phoneMsg = $('#phoneJy');//手机提示标签
	    //     var checkdo = {
	    //         init: function() {
	    //             checkdo._bind();
	    //         },
	    //         _bind: function() {
	    //         	//获取手机验证码
	    //             $getKey.on('click', function(event) {
	    //                 event.preventDefault();
	    //                 if (flag4 == 1) {
	    //                     flag4 = 0;
	    //                     checkdo._ya($(this));
	    //                 }
	    //                 return false;
	    //             });
	    //             $("#check_oldphone").on('click', function(event) {
	    //                 event.preventDefault();
	    //                 checkdo.ajaxSubmit();
	    //                 return false;
	    //             });
	    //         },
	    //         //手机发送验证码
	    //         _ya: function(o) {
	    //             if (checkdo.phoneSend(o)) {
	    //                 if (flaghave != "1") {
	    //                     checkdo._daojishi();
	    //                 }
	    //             } else {
	    //                 flag4 = 1;
	    //             }
	    //         },
	    //         phoneSend: function(o) {
	    //             $.ajax({
	    //                 type: "post",
	    //                 dataType: "json",
	    //                 url: h_url + 'ucenter/phone_send',
	    //                 async: false,
	    //                 data: {
	    //                     phone: $("#sun_oldphone").text(),
	    //                 },
	    //                 //请求成功后的回调函数有两个参数
	    //                 success: function(data) {
	    //                     flag4 = 1;
	    //                     if(data['retCode'] == "0"){
	    //                         flag4 = 0;
	    //                         flaghave = 0;
	    //                         isSuccess = true;
	    //                         $phoneMsg.text("");
	    //                         $phoneMsg.html("<span style=color:green>"+data['msg']+"</span>");
	    //                     } else {
	    //                         wait = 300;
	    //                         flaghave = 1;
	    //                         isSuccess = false;
	    //                         $phoneMsg.text("");
	    //                         $phoneMsg.html('<i class="error-icon"></i><i class="error-tip">'+data.msg+'</i>');
	    //                     }
	    //                 },
	    //                 error: function(data, textStatus) {
	    //                     flag4 = 1;
	    //                 }
	    //             });
	    //             if (isSuccess) {
	    //                 o.val("重新发送(" + wait + ")");
	    //                 wait--;
	    //                 return true;
	    //             } else {
	    //                 return false;
	    //             }
	    //         },
	    //         _daojishi: function() {
	    //             checkdo._setti(_t);
	    //         },
	    //         _setti: function(i) {
	    //             setTimeout(function() {
	    //                 if (i == 0) {
	    //                     $getKey.html("获取验证码");
	    //                     flag4 = 1;
	    //                 } else {
	    //                     $getKey.html("重新发送(" + i + ")");
	    //                     checkdo._setti(parseInt(i - 1));
	    //                 }
	    //             }, 1000);
	    //         },
	    //         ajaxSubmit: function() {
	    //         	var code = $('#oldphone_code').val();
	    //         	var phone = $("#sun_oldphone").text();
	    //             if (code == null || code == '') {
	    //             	$phoneMsg.text("");
     //                    $phoneMsg.html('<i class="error-icon"></i><i class="error-tip">验证码不能为空</i>');
	    //             } else {
	    //                 $.ajax({
	    //                     type: "post",
	    //                     dataType: "json",
	    //                     url: h_url + 'ucenter/check_phone_msg',
	    //                     data: {
	    //                         "phone": phone,
	    //                         "code": code,
	    //                     },
	    //                     //请求成功后的回调函数有两个参数
	    //                     success: function(data) {
	    //                     	if (data.retCode == '0') {
	    //                     		alert(data.msg);
	    //                     		displaySpan('alert-checkOldMobile');
	    //                     		showSpan('alert-updateMobile')
	    //                     	} else {
	    //                     		$phoneMsg.text("");
			  //                       $phoneMsg.html('<i class="error-icon"></i><i class="error-tip">'+data.msg+'</i>');
	    //                     	}
	    //                     }
	    //                 });
	    //             }
	    //             return false;
	    //         },
	    //     };
	    //     checkdo.init();
	    // });
    	
		//<![CDATA[
        //验证手机号是否为空
        function checkUpdateMobileFormMoible()
        {
    	    var mobile=$("#updateMonbileForm\\:mobileNumber2").val();
    	    var nullFlag=(mobile=="");
    	    if(nullFlag)
   			{
   				$("#updateMonbileForm\\:mobileNumber2_message").remove();
   				var $span = $("<span id=updateMonbileForm\:mobileNumber2_message class=error>请输入手机号</span>");
   				$("#mobileNumber2ErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var mobile2="15055100139";
	        	if(mobile2==mobile){
        	   		$("#updateMonbileForm\\:mobileNumber2_message").remove();
	   				var $span = $("<span id=updateMonbileForm\:mobileNumber2_message class=error>与原手机号相同，请重新输入</span>");
	   				$("#mobileNumber2ErrorDiv").append($span);
	   				$("#sendCode1").hide();
	   				$("#sendAuthCodeBtn2").css("background-color","#FF736C");
	   				$("#sendCodeGrey1").show();
	   				return false;
	        	}
	        	else
	        	{
	        		$("#sendCode1").show();
	        		$("#sendAuthCodeBtn2").css("background-color","#c0c0c0");
	   				$("#sendCodeGrey1").hide();
	        	}
   				
   				var mobileError=$("#mobileNumber2ErrorDiv").text();
   				if(mobileError=='请输入手机号')
   				{
   					$("#updateMonbileForm\\:mobileNumber2_message").remove();
   				}
   			}
    	    return true;
        }
        //验证验证码是否为空
        function checkUpdateMonbileFormAuthCode()
        {
    	    var mobile=$("#updateMonbileForm\\:updateMonbileFormauthCode").val();
    	    var nullFlag=(mobile=="");
    	    $("#updateMonbileFormauthCodeErrorDiv").html("");
    	    if(nullFlag)
   			{
   				$("#updateMonbileForm\\:updateMonbileFormauthCode_message").remove();
   				var $span = $("<span id=updateMonbileForm\:updateMonbileFormauthCode_message class=error>请输入验证码</span>");
   				$("#updateMonbileFormauthCodeErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var authCodeError=$("#updateMonbileFormauthCodeErrorDiv").text();
   				if(authCodeError=='请输入验证码')
   				{
   					$("#updateMonbileForm\\:updateMonbileFormauthCode_message").remove();
   				}
   			}
    	    return true;
        }
        //验证所有
        function updateMobileAll()
        {
    	    checkUpdateMobileFormMoible();
    	    checkUpdateMonbileFormAuthCode();
    	    var mobileErrorFlag=$("#mobileNumber2ErrorDiv").text()=="";
    	    var authCodeErrorFlag=$("#updateMonbileFormauthCodeErrorDiv").text()=="";
    	    return mobileErrorFlag&&authCodeErrorFlag;
        }
		//]]>
	</script>
    <div class="alert-450" id="alert-updateMobile" style="#display:none;">
      <div class="alert-title">
        <h3>修改手机</h3>
        <span class="alert-close" onclick="displaySpan('alert-updateMobile')"></span></div>
      <div class="alert-main">
        <form id="updateMonbileForm" name="updateMonbileForm" method="post" action="/user/managemyInfo" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="updateMonbileForm" value="updateMonbileForm">
          <ul>
            <li>
              <label class="txt-name">新手机号</label>
              <input id="new_phone" type="text" name="updateMonbileForm:mobileNumber2" autocomplete="off" class="txt240" maxlength="11" placeholder="请输入手机号">
              <div id="mobileNumber2ErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">验证码</label>
              <input id="newphone_code" type="text" name="updateMonbileForm:updateMonbileFormauthCode" class="txt110" maxlength="8" onfocus="clearValue(this)" placeholder="请输入验证码">
              <span id="sendCode1"><a id="phonesend1" href="javascript:void(0)" class="btn-code" phone_sign="1">免费获取校验码</a></span>
              <div id="updateMonbileFormauthCodeErrorDiv" class="alert-error120"></div>
            </li>
            <li><span class="txt-right" id="phoneJy1"></span>
              <input type="button" name="updateMonbileForm:j_idt139" value="确 认" class="btn-ok txt-right" id="sun_checkphone" phone_sign="1">
            </li>
          </ul>
        </form>
      </div>
    </div>
    <script type="text/javascript">
    	$(document).ready(function(){
    		var flag3 = 1;//验证旧手机是否发送验证码标识
    		var flag4 = 1;//验证新手机是否发送验证码标识
    		var _t = 60; // 倒计时时间
    		var wait = 300;
    		var flaghave = 0;//倒计时标识
    		var flaghave1 = 0;//新手机倒计时标识
    		// var isSuccess = false; //手机验证码是否发送标识
    		var isSuccess1 = false; //新手机验证码是否发送标识
	        var h_url = $('#h_url').val();
	        var flag = 1;//手机号验证
	        var upphone = {
	            init: function() {
	                upphone._bind();
	            },
	            _bind: function() {
	            	//旧号码获取手机验证码
	                $("#phonesend").on('click', function(event) {
	                    event.preventDefault();
	                    var phone_sign = $(this).attr('phone_sign');
                    	if (flag3 == 1) {
	                        flag3 = 0;
	                        upphone._ya($(this),phone_sign);
	                    }
	                    return false;
	                });
	            	//新号码获取手机验证码
	                $("#phonesend1").on('click', function(event) {
	                    event.preventDefault();
	                    var phone_sign = $(this).attr('phone_sign');
                    	if (flag4 == 1) {
	                        flag4 = 0;
	                        upphone._ya($(this),phone_sign);
	                    }
	                    return false;
	                });

	                $("#sun_checkphone").on('click', function(event) {
	                    event.preventDefault();
	                    upphone.ajaxSubmit($(this));
	                    return false;
	                });
	                //手机号验证
	                $("#new_phone").on('blur keyup', function(event) {
	                    event.preventDefault();
	                    upphone.phoneYz();
	                    return false;
	                });
	            },
	            phoneYz: function() { // 手机号验证
	            	var $phoneMsg = $('#phoneJy1');
	                var utel = $("#new_phone");
	                var str = utel.val();
	                var old_phone = parseInt($("#sun_oldphone").text());
	                var regPartton = /^1[3-9]\d{9}$/;
	                if (!str || str == null) {
	                    $phoneMsg.text("");
	                    $phoneMsg.append('<i class="error-icon"></i><i class="error-tip">手机号不可为空</i>');
	                    return false;
	                } else if (!regPartton.test(str)) {
	                    $phoneMsg.text("");
	                    $phoneMsg.append('<i class="error-icon"></i><i class="error-tip">手机号格式不正确</i>');
	                    return false;
	                } else if (parseInt(str)==old_phone) {
	                	$phoneMsg.text("");
	                    $phoneMsg.append('<i class="error-icon"></i><i class="error-tip">新手机号与原手机号相同</i>');
	                    return false;
	                } else {
	                    $phoneMsg.text("");
	                    flag = 0;
	                    return true;
	                }
	            },
	            //手机发送验证码
	            _ya: function(o,phone_sign) {
	                if (upphone.phoneSend(o,phone_sign)) {
	                    if (flaghave != "1") {
	                        upphone._daojishi(o);
	                    }
	                } else {
	                    flag4 = 1;
	                }
	            },
	            phoneSend: function(o,phone_sign) {
	            	var isSuccess = false;
	            	if(phone_sign==0){
	            		var phone = $("#sun_oldphone").text();
	            		var $phoneMsg = $('#phoneJy');
	            	} else {
		            	var phone = $("#new_phone").val();
		            	var $phoneMsg = $('#phoneJy1');
	            	}
	                $.ajax({
	                    type: "post",
	                    dataType: "json",
	                    url: h_url + 'ucenter/phone_send',
	                    async: false,
	                    data: {
	                        'phone': phone,
	                    },
	                    //请求成功后的回调函数有两个参数
	                    success: function(data) {
	                        flag3 = 1;
	                        flag4 = 1;
	                        if(data['retCode'] == "0"){
	                        	if(phone_sign==0){
		                            flag3 = 0;
		                            flaghave = 0;
	                        	} else {
		                            flag4 = 0;
	                        		flaghave1 = 0;
	                        	}
	                            isSuccess = true;
	                            $phoneMsg.text("");
	                            $phoneMsg.html("<span style=color:green>"+data['msg']+"</span>");
	                        } else {
	                            wait = 300;
	                            if(phone_sign==0){
		                            flaghave = 0;
	                        	} else {
	                        		flaghave1 = 0;
	                        	}
	                            isSuccess = false;
	                            $phoneMsg.text("");
	                            $phoneMsg.html('<i class="error-icon"></i><i class="error-tip">'+data.msg+'</i>');
	                        }
	                    },
	                    error: function(data, textStatus) {
	                    	if(phone_sign==0){
	                            flag3 = 1;
                        	} else {
	                            flag4 = 1;
                        	}
	                    }
	                });
	                if (isSuccess) {
	                    o.val("重新发送(" + wait + ")");
	                    wait--;
	                    return true;
	                } else {
	                    return false;
	                }
	            },
	            _daojishi: function(ob) {
	            	
	                upphone._setti(_t,ob);
	            },
	            _setti: function(i,obj) {
	                setTimeout(function() {
	                    if (i == 0) {
	                        obj.html("获取验证码");
	                        flag4 = 1;
	                    } else {
	                        obj.html("重新发送(" + i + ")");
	                        upphone._setti(parseInt(i - 1),obj);
	                    }
	                }, 1000);
	            },
	            ajaxSubmit: function(obj) {
	            	var phone_sign = obj.attr('phone_sign');
	            	alert(phone_sign);
	            	return;
	            	if(phone_sign==0) {
	            		var code = $('#oldphone_code').val();
		            	var phone = $("#sun_oldphone").text();
		            	var $phoneMsg = $('#phoneJy');
	            	} else {
		            	var code = $('#newphone_code').val();
		            	var phone = $("#new_phone").val();
		            	var $phoneMsg = $('#phoneJy1');
		            	if (flag) {
		            		$phoneMsg.text("");
	                        $phoneMsg.html('<i class="error-icon"></i><i class="error-tip">手机号错误</i>');
	                        return false;
		            	}
	            	}
	                if (code == null || code == '') {
	                	$phoneMsg.text("");
                        $phoneMsg.html('<i class="error-icon"></i><i class="error-tip">验证码不能为空</i>');
	                } else {
	                    $.ajax({
	                        type: "post",
	                        dataType: "json",
	                        url: h_url + 'ucenter/check_phone_msg',
	                        data: {
	                            "phone": phone,
	                            "code": code,
	                            "phone_sign": phone_sign,
	                        },
	                        //请求成功后的回调函数有两个参数
	                        success: function(data) {
	                        	if (data.retCode == '0') {
	                        		if(phone_sign==0) {
	                        			alert(data.msg);
		                        		displaySpan('alert-checkOldMobile');
		                        		showSpan('alert-updateMobile');
	                        		}else{
		                        		alert(data.msg+'，手机号已修改');
		                        		displaySpan('alert-updateMobile');
	                        		}
	                        	} else {
	                        		$phoneMsg.text("");
			                        $phoneMsg.html('<i class="error-icon"></i><i class="error-tip">'+data.msg+'</i>');
	                        	}
	                        }
	                    });
	                }
	                return false;
	            },
	        };
	        upphone.init();
	    });
	//<![CDATA[
           //验证手机号是否为空
           function checkchangeEmailFormNewEmail()
           {
        	   var email=$("#changeEmailForm\\:newEmail").val();
        	   var nullFlag=(email=="");
        	   if(nullFlag)
	   			{
	   				$("#changeEmailForm\\:newEmail_message").remove();
	   				var $span = $("<span id=changeEmailForm\:newEmail_message class=error>请输入新邮箱</span>");
	   				$("#newEmailErrorDiv").append($span);
	   				return false;
	   			}
	   			else
	   			{
	   				var emailError=$("#newEmailErrorDiv").text();
	   				if(emailError=='请输入新邮箱')
	   				{
	   					$("#changeEmailForm\\:newEmail_message").remove();
	   				}
	   			}
        	   return true;
           }
           //验证验证码是否为空
           function checkchangeEmailFormAuthCode()
           {
        	   var mobile=$("#changeEmailForm\\:changeEmailFormauthCode").val();
        	   var nullFlag=(mobile=="");
        	   if(nullFlag)
	   			{
	   				$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
	   				var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=error>请输入验证码</span>");
	   				$("#changeEmailFormauthCodeErrorDiv").append($span);
	   				return false;
	   			}
	   			else
	   			{
	   				var mobileError=$("#changeEmailFormauthCodeErrorDiv").text();
	   				if(mobileError=='请输入验证码')
	   				{
	   					$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
	   				}
	   			}
        	   return true;
           }
           //验证所有
           function changeEmailFormAll()
           {
        	   checkchangeEmailFormNewEmail();
        	   checkchangeEmailFormAuthCode();
        	   var emailErrorFlag=$("#newEmailErrorDiv").text()=="";
        	   var authCodeErrorFlag=$("#changeEmailFormauthCodeErrorDiv").text()=="";
        	   return emailErrorFlag&&authCodeErrorFlag;
           }
           $(document).ready(function(){
   			var valiChangeEamilError = $("#valiChangeEamilError").val();
   			if(valiChangeEamilError.length > 0){
   				$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
   	   			var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=error>"+valiChangeEamilError+"</span>");
   	   			$("#changeEmailFormauthCodeErrorDiv").append($span);
   			}
   		});
   	 //]]>
    </script>
    <input id="valiChangeEamilError" type="hidden" name="valiChangeEamilError">
    <div class="alert-450" id="alert-updateEmail" style="display:none;">
      <div class="alert-title">
        <h3>修改邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-updateEmail')"></span></div>
      <div class="alert-main" id="alert-main">
        <form id="changeEmailForm" name="changeEmailForm" method="post" action="/user/managemyInfo" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="changeEmailForm" value="changeEmailForm">
          <ul>
            <li>
              <label class="txt-name">请输入新邮箱</label>
              <input type="hidden" value="15055100139" id="mobile">
              <input id="changeEmailForm:newEmail" type="text" name="changeEmailForm:newEmail" class="txt235" onblur="jsf.util.chain(this,event,'return checkchangeEmailFormNewEmail()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入邮箱">
              <div id="newEmailErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">手机验证码</label>
              <input id="changeEmailForm:changeEmailFormauthCode" type="text" name="changeEmailForm:changeEmailFormauthCode" class="txt110" maxlength="8" onblur="mojarra.ab(this,event,'blur',0,0)" placeholder="请输入手机验证码">
              <span id="sendCode2"><a id="changeEmailForm:sendAuthCodeBtn" href="#" onclick="jsf.util.chain(this,event,'return validateMailSMS(\'15055100139\');','PrimeFaces.ab({source:this,event:\'action\',process:\'changeEmailForm:sendAuthCodeBtn changeEmailForm:newEmail\',oncomplete:function(xhr,status,args){s3Code(xhr, status, args, \'dx\');}}, arguments[1]);');return false" class="btn-code">免费获取校验码</a><a id="changeEmailForm:sendAuthCodeBtn6" href="#" style="display:none;" onclick="mojarra.ab(this,event,'action','@this changeEmailForm:newEmail',0,{'onevent':sCode3});return false" class="btn-code">免费获取校验码</a> </span> <span id="sendCodeGrey2" style="display:none;"> <a href="#" id="sendAuthCodeBtn3" class="btn-codeAfter" style="cursor:default;">免费获取校验码</a> </span> </li>
            <li>
              <div id="changeEmailFormauthCodeErrorDiv" class="errorplace"></div>
              <div id="authCodeMsg5" style="display:none;" class="yzmplace1"> 验证码已发送到您手机<span id="mobileMsg5"></span>，如果收不到短信，请 <a id="changeEmailForm:sendAuthCodeBtn4" href="#" style="color:blue;" onclick="PrimeFaces.ab({source:this,event:'action',process:'changeEmailForm:sendAuthCodeBtn4 changeEmailForm:newEmail',oncomplete:function(xhr,status,args){s3Code(xhr, status, args, 'yy');}}, arguments[1]);;return false">语音获取</a> </div>
              <div id="authCodeMsg6" style="display:none;" class="yzmplace1"> 您的手机<span id="mobileMsg6"></span>将在60秒内收到语音电话，请接听！ </div>
              <input type="submit" name="changeEmailForm:j_idt150" value="确　认" class="btn-ok txt-right" onclick="return changeEmailFormAll()">
            </li>
          </ul>
          <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="6247899183375709698:8256389782682127070" autocomplete="off">
        </form>
      </div>
      <div class="alert-main" id="alert-main2" style="display:none;text-align:center;">
        <div class="about-con">
          <ul>
            <li> <br>
              <span style="margin-left:80px;">请您先完成手机绑定，再进行邮箱更改！</span> </li>
            <li>
              <input type="submit" name="j_idt153" value="确认" style="margin:20px 0 20px 80px;" class="btn-ok txt-right2" onclick="displaySpan2()">
            </li>
          </ul>
        </div>
      </div>
    </div>
    <script type="text/javascript">
		//<![CDATA[
        //验证邮箱是否为空
        function checkbandingEmailFormEmail()
        {
    	    var mobile=$("#bandingEmail\\:bandingEmailemail").val();
    	    var nullFlag=(mobile=="");
    	    if(nullFlag)
   			{
   				$("#bandingEmail\\:bandingEmailemail_message").remove();
   				var $span = $("<span id=bandingEmail\:bandingEmailemail_message class=error>请先输入邮箱</span>");
   				$("#bandingEmailemailErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var error=$("#bandingEmailemailErrorDiv").text();
   				if(error=='请先输入邮箱')
   				{
   					$("#bandingEmail\\:bandingEmailemail_message").remove();
   				}
   			}
    	    return true;
        }
        //验证所有
        function bandingEmailAll()
        {
    	    checkbandingEmailFormEmail();
    	    var emailErrorFlag=$("#bandingEmailemailErrorDiv").text()=="";
    	    return emailErrorFlag;
        }
	//]]>
	</script>
    <div class="alert-450" id="alert-bandingEmail" style="display:none;">
      <div class="alert-title">
        <h3>绑定邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-bandingEmail')"></span></div>
      <div class="alert-main">
        <form id="bandingEmail" name="bandingEmail" method="post" action="" enctype="application/x-www-form-urlencoded">
          <ul>
            <li>
              <label class="txt-name">绑定邮箱</label>
              <input id="bandingEmail:bandingEmailemail" type="text" name="bandingEmail:bandingEmailemail" value="348705622@qq.com" class="txt235" onblur="jsf.util.chain(this,event,'return checkbandingEmailFormEmail()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入邮箱">
              <div id="bandingEmailemailErrorDiv" class="alert-error120"></div>
            </li>
            <input type="submit" name="bandingEmail:j_idt158" value="确认并激活邮箱" class="btn-ok txt-right" onclick="return bandingEmailAll()">
          </ul>
        </form>
      </div>
    </div>
    <script type="text/javascript">
		//<![CDATA[
        //验证邮箱是否为空
        function checkactiveEmailFormEmail()
        {
    	   var email=$("#activeEmail\\:activeEmailemail").val();
    	   var nullFlag=(email=="");
    	   if(nullFlag)
   			{
   				$("#activeEmail\\:activeEmailemail_message").remove();
   				var $span = $("<span id=activeEmail\:activeEmailemail_message class=error>请输入邮箱</span>");
   				$("#activeEmailemailErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var error=$("#activeEmailemailErrorDiv").text();
   				if(error=='请输入邮箱')
   				$("#activeEmail\\:activeEmailemail_message").remove();
   			}
    	   return true;
       }
       //验证所有
       function checkActiveEmailAll()
       {
    	   var emailErrorFlag=$("#activeEmailemailErrorDiv").text()=="";
    	   return emailErrorFlag;
       }
		//]]>
	</script>
    <div class="alert-450" id="alert-activeEmail" style="display:none;">
      <div class="alert-title">
        <h3>激活邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-activeEmail')"></span></div>
      <div class="alert-main">
        <form id="activeEmail" name="activeEmail" method="post" action="" enctype="application/x-www-form-urlencoded">
          <ul>
            <li>
              <label class="txt-name">邮箱</label>
              <input id="activeEmail:activeEmailemail" type="text" name="activeEmail:activeEmailemail" value="348705622@qq.com" class="txt235" onblur="jsf.util.chain(this,event,'return checkactiveEmailFormEmail()','mojarra.ab(this,event,\'blur\',0,0)')">
              <div id="activeEmailemailErrorDiv" class="alert-error120"></div>
            </li>
            <input type="submit" name="activeEmail:j_idt163" value="立即激活邮箱" class="btn-ok txt-right" onclick="return checkActiveEmailAll()">
          </ul>
        </form>
      </div>
    </div>
    <div class="alert-450 alert-h220" id="alert-activeEmailMsg" style="display:none;">
      <div class="alert-title">
        <h3>激活邮箱</h3>
        <span class="alert-close" onclick="displaySpan('alert-activeEmailMsg')"></span></div>
      <div class="alert-main">
        <form id="activeEmailMsg" name="activeEmailMsg" method="post" action="" enctype="application/x-www-form-urlencoded" target="_blank">
          <input type="hidden" name="activeEmailMsg" value="activeEmailMsg">
          <p class="msg5" style="margin-top:0;">我们已经向您的注册邮箱发送了一封验证邮件<br>
            验证邮件有效期为<i class="c-red">24小时</i>，请及时查收。</p>
          <p class="msg-a">
            <input type="submit" name="activeEmailMsg:j_idt167" value="立即验证" class="btn-ok btn-145">
          </p>
        </form>
      </div>
    </div>
    <script type="text/javascript">
	//<![CDATA[
       //验证原密码
       function checkupdatePassFormOldPassword()
       {
    	    var oldPassword=$("#updatePassForm\\:oldPassword").val();
    	    var nullFlag=(oldPassword=="");
    	    if(nullFlag)
   			{
   				$("#updatePassForm\\:oldPassword_message").remove();
   				var $span = $("<span id=updatePassForm\:oldPassword_message class=error>请输入密码</span>");
   				$("#oldPasswordErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				var oldPasswordError=$("#oldPasswordErrorDiv").text();
   				if(oldPasswordError=='请输入密码')
   				{
   					$("#updatePassForm\\:oldPassword_message").remove();
   				}
   			}
    	    return true;
       }
       //验证输入密码框
       function checkPassword()
       {
    	    var password=$("#updatePassForm\\:password").val();
    	    var nullFlag=(password=="");
    	    if (password == null || password == '') {
                $("#updatePassForm\\:password_message").remove();
   				var $span = $("<span id=updatePassForm\:password_message class=error>请输入新密码</span>");
   				$("#passwordErrorDiv").append($span);
   				return false;
            } else if (password.length < 6 || password.length > 15) {
            	$("#updatePassForm\\:password_message").remove();
   				var $span = $("<span id=updatePassForm\:password_message class=error>密码小于6位或者大于15位</span>");
   				$("#passwordErrorDiv").append($span);
                return false;
            } else if (!/^[a-zA-Z0-9]*$/.test(password)) {
                $("#updatePassForm\\:password_message").remove();
   				var $span = $("<span id=updatePassForm\:password_message class=error>密码只能是数字和字母</span>");
   				$("#passwordErrorDiv").append($span);
                return false;
            } else {
   				var oldpassword=$("#updatePassForm\\:oldPassword").val();
   				var errorMessage=$("#oldPasswordErrorDiv").text();
   				
   				var nullOldFlag=(oldpassword=="");
   				var errorFlag=(errorMessage=="");
   				if(!nullOldFlag&&errorFlag&&(oldpassword==password))
   				{
   					$("#updatePassForm\\:password_message").remove();
	   				var $span = $("<span id=updatePassForm\:password_message class=error>输入密码不能与原密码相同</span>");
	   				$("#passwordErrorDiv").append($span);
	   				return false;
   				}
				var pwdlevel = 0;
				var level_msg = '';
                if(/^[0-9]*$|^[a-z]*$|^[A-Z]*$/.test(password)){
                    level_msg = '<font color=red>密码等级：弱</font>';
                } else if(/^[0-9a-z]*$|^[0-9A-Z]*$|^[a-zA-Z]*$/.test(password)){
                    pwdlevel = 1;
                    level_msg = '<font color=orange>密码等级：中</font>';
                } else if(/^[0-9a-zA-Z]*$/.test(password)){
                    pwdlevel = 2;
                    level_msg = '<font color=green>密码等级：强</font>';
                }
                $("#updatePassForm\\:password").attr('pwdlevel',pwdlevel);
				$("#updatePassForm\\:password_message").remove();
				$("#pwd_msg").remove();
                var msg = "<span id='pwd_msg'><br /><br /><font color=green>&nbsp;&nbsp;&nbsp;√</font>&nbsp;&nbsp;&nbsp;"+level_msg+"</span>";
				$("#passwordErrorDiv").append(msg);
   			}
    	    return true;
        }
        //验证重输密码框
        function checkRepassword()
	    {
   			var password=$("#updatePassForm\\:password").val();
   			var repassword=$("#updatePassForm\\:repassword").val();
   			var flag=(password==repassword);
   			var nullFlag=(repassword=="");
   			if(nullFlag)
   			{
   				$("#repassword_message").remove();
   				var $span = $("<span id=repassword_message class=error>请输入确认密码</span>");
   				$("#repasswordErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				$("#repassword_message").remove();
   			}
   			if(flag==false)
   			{
   				$("#repassword_message").remove();
   				var $span = $("<span id=repassword_message class=error>两次密码不同</span>");
   				$("#repasswordErrorDiv").append($span);
   				return false;
   			}
   			else
   			{
   				$("#repassword_message").remove();
   			}
   			return true;
		   }
        function checkupdatePassFormAll()
        {
    	    var oldPasswordFlag = checkupdatePassFormOldPassword();
    	    var passwordFlag = checkPassword();
    	    var repasswordFlag = checkRepassword();
    	    if(oldPasswordFlag&&passwordFlag&&repasswordFlag){
    	    	var oldPassword=$("#updatePassForm\\:oldPassword").val();
    	    	var password=$("#updatePassForm\\:password").val();
    	    	var pwdlevel=$("#updatePassForm\\:password").attr('pwdlevel');
    	    	var h_url = $('#h_url').val();
    	    	$.ajax({
                    url: h_url + 'ucenter/update_pwd',
                    type: "post",
                    data:{'oldpwd':oldPassword,'pwd':password,'pwdlevel':pwdlevel},
                    dataType: "json",
                    success: function(data) {
                        alert(data.msg);
                        if (data.retCode == '1') {
                    		 displaySpan('alert-updatePass');
                        }
                    }
                });
    	    }
	    	return false;
       }
			//]]>
	</script>
    <div class="alert-450" id="alert-updatePass" style="display: none;">
      <div class="alert-title">
        <h3>修改密码</h3>
        <span class="alert-close" onclick="displaySpan('alert-updatePass')"></span></div>
      <div class="alert-main">
        <form id="updatePassForm" name="updatePassForm" method="post" action="" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="updatePassForm" value="updatePassForm">
          <ul>
            <li>
              <label class="txt-name">请输入原密码</label>
              <input id="updatePassForm:oldPassword" type="password" name="updatePassForm:oldPassword" value="" maxlength="20" onblur="checkupdatePassFormOldPassword()" class="txt235">
              <div id="oldPasswordErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">请输入新密码</label>
              <input id="updatePassForm:password" type="password" name="updatePassForm:password" value="" maxlength="20" onblur="checkPassword()" class="txt235" pwdlevel="0">
              <div id="passwordErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <label class="txt-name">请确认新密码</label>
              <input id="updatePassForm:repassword" type="password" name="updatePassForm:repassword" value="" maxlength="20" onblur="checkRepassword()" class="txt235">
              <div id="repasswordErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <input type="submit" name="updatePassForm:j_idt174" value="确 认" class="btn-ok btn-235 txt-right" onclick="return checkupdatePassFormAll()">
            </li>
          </ul>
        </form>
      </div>
      <script type="text/javascript">
		//<![CDATA[
    	if(window.ActiveXObject)
	    {
	        var browser=navigator.appName;
	        var b_version=navigator.appVersion;
	        var version=b_version.split(";"); 
	        var trim_Version=version[1].replace(/[ ]/g,""); 

	        if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0") 
	        { 
	        	$("#checkMonbileForm\\:sendAuthCodeBtn4").css("display","block");
	        	$("#checkMonbileForm\\:sendAuthCodeBtn").css("display","none");
	        	$("#updateMonbileForm\\:sendAuthCodeBtn5").css("display","block");
	        	$("#updateMonbileForm\\:sendAuthCodeBtn").css("display","none");
	        	$("#changeEmailForm\\:sendAuthCodeBtn6").css("display","block");
	        	$("#changeEmailForm\\:sendAuthCodeBtn").css("display","none");
	        	$("#checkOldMobileForm\\:sendAuthCodeBtn7").css("display","block");
	        	$("#checkOldMobileForm\\:sendAuthCodeBtn").css("display","none");
	        } 
        }
        function sCode2(){
        	var mobile = $("#checkMonbileForm\\:mobileNumber").val();
        	var mobileRegex="^1[3|4|5|7|8][0-9]{9}$";
        	var mobilePattern = new RegExp(mobileRegex);
			var mobileFlag=mobilePattern.test(mobile);
			
			if(!mobileFlag){
				return;
			} 
        	$("#sendCode").hide();
			$("#sendCodeGrey").show();
			if(flag && $("#sendCode").is(":hidden")){
				return;
			}
			flag = true;
			timer("sendAuthCodeBtn1", {
				"count" : 60,
				"animate" : true,
				initTextBefore : "后可重新操作",
				initTextAfter : "秒",
				callback:function(){
					$("#sendCode").show();
					$("#sendCodeGrey").hide();
					flag = false;
				}
			}).begin();
        }
        function sCode3(){
        	var email = $("#changeEmailForm\\:newEmail").val();
        	if(email=="") {
        		return;
        	}
    		var emailRegex="^([a-zA-Z0-9]+[_|\-|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$";
        	var emailPattern = new RegExp(emailRegex);
			var emailFlag=emailPattern.test(email);
			if(!emailFlag){
				return;
			}
			
        	$("#sendCode2").hide();
			$("#sendCodeGrey2").show();
			if(flag && $("#sendCode2").is(":hidden")){
				return;
			}
			flag = true;
			timer("sendAuthCodeBtn3", {
				"count" : 60,
				"animate" : true,
				initTextBefore : "后可重新操作",
				initTextAfter : "秒",
				callback:function(){
					$("#sendCode2").show();
					$("#sendCodeGrey2").hide();
					flag = false;
				}
			}).begin();
        }
        function sCode4(){
        	var mobile = $("#updateMonbileForm\\:mobileNumber2").val();
        	var mobileRegex="^1[3|4|5|7|8][0-9]{9}$";
        	var mobilePattern = new RegExp(mobileRegex);
			var mobileFlag=mobilePattern.test(mobile);
			
			if(!mobileFlag){
				return;
			} 
        	$("#sendCode1").hide();
			$("#sendCodeGrey1").show();
			if(flag && $("#sendCode1").is(":hidden")){
				return;
			}
			flag = true;
			timer("sendAuthCodeBtn2", {
				"count" : 60,
				"animate" : true,
				initTextBefore : "后可重新操作",
				initTextAfter : "秒",
				callback:function(){
					$("#sendCode1").show();
					$("#sendCodeGrey1").hide();
					flag = false;
				}
			}).begin();
        }
        function sCode7()
        {
        	$("#sendCode7").hide();
			$("#sendCodeGrey7").show();
			if(flag && $("#sendCode7").is(":hidden")){
				return;
			}
			flag = true;
			timer("sendAuthCodeBtn7", {
				"count" : 60,
				"animate" : true,
				initTextBefore : "后可重新操作",
				initTextAfter : "秒",
				callback:function(){
					$("#sendCode7").show();
					$("#sendCodeGrey7").hide();
					flag = false;
				}
			}).begin();
        }
        var ua = navigator.userAgent; 
		if(ua.indexOf("Windows NT 5")!=-1) { 
		    if(window.ActiveXObject)
		    {
		        var browser=navigator.appName 
		        var b_version=navigator.appVersion 
		        var version=b_version.split(";"); 
		        var trim_Version=version[1].replace(/[ ]/g,""); 
		        if(browser=="Microsoft Internet Explorer" && (trim_Version=="MSIE8.0" || trim_Version=="MSIE7.0")) 
		        { 
		        	$("#checkMonbileForm\\:sendAuthCodeBtn4").css("display","block");
		        	$("#checkMonbileForm\\:sendAuthCodeBtn").css("display","none");
		        	$("#updateMonbileForm\\:sendAuthCodeBtn5").css("display","block");
		        	$("#updateMonbileForm\\:sendAuthCodeBtn").css("display","none");
		        	$("#changeEmailForm\\:sendAuthCodeBtn6").css("display","block");
		        	$("#changeEmailForm\\:sendAuthCodeBtn").css("display","none");
		        	$("#checkOldMobileForm\\:sendAuthCodeBtn7").css("display","block");
		        	$("#checkOldMobileForm\\:sendAuthCodeBtn").css("display","none");
		        } 
	        }
		}

		var second = 0;
        var internal;
        /** 校验修改手机验证码 */
		function validateModifyPhoneSMS(mobileNumber){
			$("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
			if(mobileNumber == '请输入手机号'){
                return;
			}
			var returnResult = false;
			$.ajax({
			    url: "/valiSms",
			    async:false,
			    data:{'phone':mobileNumber},
			    success: function(data){
				    if(data.flag == 'NO'){
					   $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
					   var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
			   		   $("#checkOldMobileFormauthCodeErrorDiv").append($span);
					   second = data.second;
					   clearInterval(internal);
					   internal = setInterval(function(){
                          if(second == 0){
                        	  $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
                          }else{
                        	  second = second -1;
                        	  $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").find('b').html(second);
                          }
					   },1000);
					   returnResult = false;
				    }else if(data.flag == 'NO1'){
					   $("#checkOldMobileForm\\:checkOldMobileFormauthCode_message").remove();
					   var $span = $("<span id=checkOldMobileForm\:checkOldMobileFormauthCode_message class=alerterror>"+data.smsVali+"</span>");
			   		   $("#checkOldMobileFormauthCodeErrorDiv").append($span);
					   returnResult = false;
				    }else{
					   returnResult = true;
				    }
			    }
		    });
            return returnResult;
		}

		 /** 校验修改邮箱验证码 */
		function validateMailSMS(mobileNumber){
			$("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
			if(mobileNumber == '请输入手机号'){
                return;
			}
			var returnResult = false;
			$.ajax({
				   url: "/valiSms",
				   async:false,
				   data:{
						mobileNumber:mobileNumber
				   },
				   success: function(data){
					   if(data.flag == 'NO'){
						   $("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
				   		   var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
		   				   $("#changeEmailFormauthCodeErrorDiv").append($span);
						   second = data.second;
						   clearInterval(internal);
						   internal = setInterval(function(){
                              if(second == 0){
                            	  $("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
                              }else{
                            	  second = second -1;
                            	  $("#changeEmailForm\\:changeEmailFormauthCode_message").find('b').html(second);
                              }
						   },1000);
						   returnResult = false;
					   }else if(data.flag == 'NO1'){
				   		   $("#changeEmailForm\\:changeEmailFormauthCode_message").remove();
				   		   var $span = $("<span id=changeEmailForm\:changeEmailFormauthCode_message class=alerterror>"+data.smsVali+"</span>");
		   				   $("#changeEmailFormauthCodeErrorDiv").append($span);
						   returnResult = false;
					   }else{
						   returnResult = true;
					   }
				   }
			    });
               return returnResult;
		}

		/** 绑定手机 */
		function validateBindPhoneSMS(){
			
			$("#checkMonbileForm\\:authCode_message").remove();
			var mobileNumber = $("#checkMonbileForm\\:mobileNumber").val();
			if(mobileNumber == '请输入手机号'){
                return;
			}
			var returnResult = false;
			$.ajax({
				   url: "/valiSms",
				   async:false,
				   data:{
						mobileNumber:mobileNumber
				   },
				   success: function(data){
					   if(data.flag == 'NO'){
						   $("#checkMonbileForm\\:authCode_message").remove();
		   				   var $span = $("<span id=checkMonbileForm\:authCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
		   				   $("#authCodeErrorDiv").append($span);
						   second = data.second;
						   clearInterval(internal);
						   internal = setInterval(function(){
                              if(second == 0){
                            	  $("#checkMonbileForm\\:authCode_message").remove();
                              }else{
                            	  second = second -1;
                            	  $("#checkMonbileForm\\:authCode_message").find('b').html(second);
                              }
						   },1000);
						   returnResult = false;
					   }else if(data.flag == 'NO1'){
		   				   $("#checkMonbileForm\\:authCode_message").remove();
		   				   var $span = $("<span id=checkMonbileForm\:authCode_message class=alerterror>"+data.smsVali+"</span>");
		   				   $("#authCodeErrorDiv").append($span);
						   returnResult = false;
					   }else{
						   returnResult = true;
					   }
				   }
			    });
               return returnResult;
		}
				
	//]]>
	</script>
    </div>
    <div class="clear"></div>
  </div>
</div>
@endsection