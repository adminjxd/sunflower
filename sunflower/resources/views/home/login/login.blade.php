<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')

<!--登录-->
<div class="wrap">
 <form id="LonginForm" name="LonginForm" action="" method="post">
	<div class="tdbModule loginPage">
		<div class="registerTitle">用户登录</div>
		<div class="registerCont">
			<ul>
				
				<li>
					<span class="dis">用户名：</span><input class="input" type="text" onblur="userNameJy()" name="j_username" id="userName" maxlength="24" tabindex="1" autocomplete="off"> 
				    <a id="sssdfasdfas" href="{{ URL::route('register/reg') }}" class="blue" style="color:red;">*注册用户</a>
				</li>
	                
				<li>
				   <span class="dis">密码：</span><input class="input" type="password" name="password" id="password" maxlength="24" tabindex="1" autocomplete="off">  
				   <a href="#" id="pawHide" class="blue">忘记密码</a>
				</li>
				<li>
				  <span class="dis">验证码：</span><input type="text" onkeyup="verify(this)" id="jpgVerify" style="width:166px;" class="input" name="yzm" data-msg="验证码" maxlength="4" tabindex="1" autocomplete="off">
						<img src="{{ URL::asset('/images/code.jpg') }}" id="yanzheng" alt="点击更换验证码" title="点击更换验证码" style="cursor:pointer;" class="valign">
					<a href="javascript:void(0);" onclick="changge();" class="blue">看不清？换一张</a>
				</li>
				<li class="btn"> 
					<input type="button" class="radius1" value="立即登录" id="submitBtn" onclick="sublogin()" disabled="disabled">
				</li>
			</ul>
		</div>
	</div>
 </form>
</div>
@endsection