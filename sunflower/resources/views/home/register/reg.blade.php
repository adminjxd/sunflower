<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--注册-->
<div class="wrap">
  <div class="tdbModule register">
    <div class="registerTitle">注册账户</div>
    <div class="registerLc1">
      <p class="p1">填写账户信息</p>
      <p class="p2">验证手机信息</p>
      <p class="p3">注册成功</p>
    </div>
    <div class="registerCont">
      <ul>
        <li><span class="dis">用户名:</span>
          <input type="hidden" value="{{ URL::asset('')}}" id="h_url">
          <input type="text" name="userName" id="userName" class="input _userName" maxlength="15" tabindex="1">
          <span id="userNameAlt" data-info="6-15个字符，字母开头，字母、数字下划线组成">6-15个字符，字母开头，字母、数字下划线组成</span></li>
        <li><span class="dis">密码:</span>
          <input type="password" name="user.password" id="password" class="input _password" maxlength="15" tabindex="1">
          <span id="passwordAlt" data-info="6-15个字符，英文、数字组成，区分大小写">6-15个字符，英文、数字组成，区分大小写</span></li>
        <li><span class="dis">确认密码:</span>
          <input type="password" name="repeatPassword" id="repeatPassword" class="input _repeatPassword" maxlength="15" tabindex="1">
          <span id="repeatPasswordAlt" data-info="请再次输入密码">请再次输入密码</span></li>
        <li> <span class="dis">验证码:</span>
          <input type="text" id="jpgVerify" class="input input1 _yanzhengma" name="yzm" maxlength="5" tabindex="1">
          <img src="{{$captcha}}" alt="验证码" style="cursor:pointer;" id="yzm" class="valign"> <a class="look blue _changeCapcherButton" id="look" href="javascript:void(0);">看不清？换一张</a> <span class="info" id="jpgVerifys" data-info="请输入验证码"></span> </li>
        <li class="telNumber"> <span class="dis">手机号码:</span>
          <input type="text" class="input _phoneNum" id="phone" name="phone" tabindex="1" maxlength="11">
          <a href="javascript:void(0);" class="button radius1 _getkey" id="sendPhone">获取验证码</a> <span id="phoneJy" data-info="请输入您的常用电话">请输入您的常用电话</span></li>
        <li class="telNumber"><span class="dis">短信验证码:</span>
          <input id="phonVerify" type="text" class="input input1  _phonVerify" data-_id="phonVerify" tabindex="1">
          <span class="info" id="phonVerifys" data-info="请输入手机验证码">请输入手机验证码</span></li>
        <li class="agree">
          <input name="protocol" id="protocol" type="checkbox" value="" checked="checked">
          我同意《<a href="#" target="_black">亿人宝注册协议</a>》 <span id="protocolAlt" data-info="请查看协议">请查看协议</span></li>
        <li class="btn"><a href="javascript:void(0);" class="radius1 _ajaxSubmit">下一步</a></li>
      </ul>
    </div>
  </div>
</div>
@endsection

