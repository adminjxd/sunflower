<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="Keywords" content="" />
<link href="{{ URL::asset('/css/common.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('/css/index.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/css/about.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/css/register.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/css/detail.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/css/users.css') }}" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/jquery.datetimepicker.css') }}"/>
<script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>
<script src="{{ URL::asset('/js/bind.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/user.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/ablumn.js') }}"></script>
<script src="{{ URL::asset('/js/plugins.js') }}"></script>
<script src="{{ URL::asset('/js/detail.js') }}"></script>
<script src="{{ URL::asset('/js/jquery.datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/datepicker.js') }}" type="text/javascript"></script>
</head>
<body>
<header>
  <div class="header min-width">
    <div class="container">
      <div class="fn-left logo"> <a class="" href="{{ URL::route('index/index') }}"> <img src="{{ URL::asset('/images/logo.png') }}"  title=""></a> </div>
    </div>
  </div>
</header>

<!--帐号绑定-->
<div class="wrap">
  <div class="tdbModule register">
    <div class="registerTitle">请完善个人信息，成功后可使用账号密码或新浪微博进行登录！</div>
    <div class="registerLc1">
      <p class="p1">没有sun账户</p>
      <p class="p2">验证手机信息</p>
      <p class="p3">已有sun账户</p>
    </div>
    <div class="registerCont" id='bind_p1'>
      <ul>
        <li><span class="dis">用户名:</span>
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
          <img src="{{$captcha}}" alt="验证码" style="cursor:pointer;" id="yzm" class="valign"> <a class="look blue _changeCapcherButton" id="look" href="javascript:void(0);" b_sign="1">看不清？换一张</a> <span class="info" id="jpgVerifys" data-info="请输入验证码"></span>
        </li>
        <li class="telNumber"> <span class="dis">手机号码:</span>
          <input type="text" class="input _phoneNum" id="phone" name="phone" tabindex="1" maxlength="11">
          <a href="javascript:void(0);" class="button radius1 _getkey" id="sendPhone">获取验证码</a> <span id="phoneJy" data-info="请输入您的常用电话">请输入您的常用电话</span></li>
        <li class="telNumber"><span class="dis">短信验证码:</span>
          <input id="phonVerify" type="text" class="input input1  _phonVerify" data-_id="phonVerify" tabindex="1">
          <span class="info" id="phonVerifys" data-info="请输入手机验证码">请输入手机验证码</span></li>
        <li class="agree">
          <input name="protocol" id="protocol" type="checkbox" value="" checked="checked">
          我同意《<a href="#" target="_black">亿人宝注册协议</a>》 <span id="protocolAlt" data-info="请查看协议">请查看协议</span></li>
        <li class="btn"><a href="javascript:void(0);" class="radius1 _ajaxSubmit" b_sign="1">立即绑定</a></li>
      </ul>
    </div>
    <div class="registerCont" id='bind_p3' style="display:none;">
      <ul>
        <li>
          <span class="dis">用户名：</span><input class="input" type="text" name="b_username" id="b_username" maxlength="15" tabindex="1" autocomplete="off" placeholder="用户名/手机号/邮箱">
          <span id="b_username_sign"></span>
        </li>
                  
        <li>
           <span class="dis">密码：</span><input class="input" type="password" name="b_password" id="b_password" maxlength="15" tabindex="1" autocomplete="off">
           <a href="#" id="pawHide" class="blue">忘记密码</a>
           <span id="b_password_sign"></span>
        </li>
        <li>
          <span class="dis">验证码：</span><input type="text" id="b_captcha" style="width:166px;" class="input" name="yzm" data-msg="验证码" maxlength="5" tabindex="1" autocomplete="off">
          <img src="{{$captcha}}" id="yanzheng" alt="点击更换验证码" title="点击更换验证码" style="cursor:pointer;" class="valign">
          <a class="_changeCapcherButton" href="javascript:void(0);" b_sign="2" id="look1">看不清？换一张</a>
          <span id="b_captcha_sign"></span>
        </li>
        <li class="btn">
          <input type="button" class="radius1" value="立即绑定" id="submitBtn" b_sign="2">
        </li>
      </ul>
    </div>
  </div>
  <input type="hidden" value="{{ URL::asset('')}}" id="h_url">
  <input type="hidden" value="{{$uid}}" id="uid">
</div>
<script>
    $(document).on('click','.p1',function(){
        $(this).parent().attr('class','registerLc1');
        $('#bind_p3').hide();
        $('#bind_p1').show();
    })

    $(document).on('click','.p3',function(){
        $(this).parent().attr('class','registerLc3');
        $('#bind_p1').hide();
        $('#bind_p3').show();
    })
</script>

<div id="footer" class="ft">
    <div class="ft-inner clearfix">
        <div class="ft-helper clearfix">
            <dl>
                <dt>关于我们</dt>
                <dd><a href="{{ URL::route('aboutus/profile') }}">公司简介</a><a href="{{ URL::route('aboutus/manageteam') }}">管理团队</a><a href="{{ URL::route('aboutus/notice') }}">网站公告</a></dd>
            </dl>
            <dl>
                <dt>相关业务</dt>
                <dd><a href="{{ URL::route('invest') }}">我要投资</a><a href="#">我要借款</a></dd>
            </dl>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="{{ URL::route('safe/help') }}">新手入门</a><a href="{{ URL::route('ucenter/myaccount') }}">我的账户</a><a href="{{ URL::route('invest/info') }}">债权转让</a></dd>
            </dl>
            <dl>
                <dt>联系我们</dt>
                <dd><a href="{{ URL::route('aboutus/contactus') }}">联系我们</a></dd>
            </dl>
        </div>
        <div class="ft-service">
            <dl>
                <dd>
                    <p><strong>400-660-1268</strong><br>
                        工作日 9:00-22:00<br>
                        官方交流群:<em>12345678</em><br>
                        工作日 9:00-22:00 / 周六 9:00-18:00<br>
                    </p>
                    <div class="ft-serv-handle clearfix"><a class="icon-hdSprite icon-ft-sina a-move a-moveHover" title="亿人宝新浪微博" target="_blank" href="#"></a><a class="icon-hdSprite icon-ft-qqweibo a-move a-moveHover" title="亿人宝腾讯微博" target="_blank" href="#"></a><a class="icon-ft-qun a-move a-moveHover" title="亿人宝QQ群" target="_blank" href="#"></a><a class="icon-hdSprite icon-ft-email a-move a-moveHover mrn" title="阳光易贷email" target="_blank" href="mailto:xz@yirenbao.com"></a></div>
                </dd>
            </dl>
        </div>
        <div class="ft-wap clearfix">
            <dl>
                <dt>官方二维码</dt>
                <dd><span class="icon-ft-erweima"><img src="{{ URL::asset('/images/code.png') }}" style="display: inline;"></span></dd>
            </dl>
        </div>
    </div>
    <div class="ft-record">
        <div class="ft-approve clearfix"><a class="icon-approve approve-0 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-1 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-2 fadeIn-2s" target="_blank" href="#"></a><a class="icon-approve approve-3 fadeIn-2s" target="_blank" href="#"></a></div>
        <div class="ft-identity">©2015 亿人宝 All rights reserved&nbsp;&nbsp;&nbsp;<span class="color-e6">|</span>&nbsp;&nbsp;&nbsp;安徽省亿人宝投资管理有限公司&nbsp;&nbsp;&nbsp;<span class="color-e6">|</span>&nbsp;&nbsp;&nbsp;<a target="_blank" href="http://www.miitbeian.gov.cn/">皖ICP备12345678号-1</a></div>
    </div>
</div>
</body>
</html>
