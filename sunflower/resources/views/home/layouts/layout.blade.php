<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>p2p网贷平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="Keywords" content="" />
  <link rel="stylesheet" href="{{ URL::asset('loan/css/base.css')}}?v=58abdfe48000c" /> 
  <link rel="stylesheet" href="{{URL::asset('loan/css/index.css')}}?v=58abdfe48000c" /> 
<link href="{{ URL::asset('/css/common.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('/css/index.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/css/about.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/css/register.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('/css/detail.css') }}" rel="stylesheet" type="text/css">
<!-- <link href="{{ URL::asset('/css/user.css') }}" rel="stylesheet" type="text/css"> -->
<!-- <link href="{{ URL::asset('/css/help.css') }}" rel="stylesheet" /> -->
<link href="{{ URL::asset('/css/users.css') }}" rel="stylesheet" type="text/css"  />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/jquery.datetimepicker.css') }}"/>
<script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>
<script src="{{ URL::asset('/js/login.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/user.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/ablumn.js') }}"></script>
<script src="{{ URL::asset('/js/plugins.js') }}"></script>
<script src="{{ URL::asset('/js/detail.js') }}"></script>
<script src="{{ URL::asset('/js/jquery.datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('/js/datepicker.js') }}" type="text/javascript"></script>
<style>
/*上下滚动*/
#scrollDiv {
    width: 400px;
    height: 30px;
    line-height: 30px;
    overflow: hidden;
}
#scrollDiv li {
    height: 30px;
    padding-left: 10px;
}
</style>
<script type="text/javascript">
// 上下滚动
function AutoScroll(obj) {
    $(obj).find("ul:first").animate({
                marginTop: "-25px"
            },
            500,
            function() {
                $(this).css({
                    marginTop: "0px"
                }).find("li:first").appendTo(this);
            });
}
$(document).ready(function() {
    var myar = setInterval('AutoScroll("#scrollDiv")', 3000);
    $("#scrollDiv").hover(function() {
                clearInterval(myar);
            },
            function() {
                myar = setInterval('AutoScroll("#scrollDiv")', 3000)
            }); //当鼠标放上去的时候，滚动停止，鼠标离开的时候滚动开始
});


</script>
</head>
<body>
<header>
  <div class="header-top min-width">
    <div class="container fn-clear"> <strong class="fn-left">咨询热线：400-668-6698<span class="s-time">服务时间：9:00 - 18:00</span></strong>
      <ul class="header_contact">
        <li class="c_1"> <a class="ico_head_weixin" id="wx"></a>
          <div class="ceng" id="weixin_xlgz" style="display: none;">
            <div class="cnr"> <img src="{{ URL::asset('/images/code.png') }}"> </div>
            <b class="ar_up ar_top"></b> <b class="ar_up_in ar_top_in"></b> </div>
        </li>
        <li class="c_2"><a href="#" target="_blank" title="官方QQ" alt="官方QQ"><b class="ico_head_QQ"></b></a></li>
        <li class="c_4"><a href="#" target="_blank" title="新浪微博" alt="新浪微博"><b class="ico_head_sina"></b></a></li>
      </ul>
      <ul class="fn-right header-top-ul">
        <li> <a href="{{ URL::route('index/index') }}" class="app">返回首页</a> </li>
        <li>
          <div class=""><a href="{{ URL::route('register/reg') }}" class="c-orange" title="免费注册">免费注册</a></div>
        </li>
        <li>
          <div class=""><a href="{{ URL::route('login/login') }}" class="js-login" title="登录">登录</a></div>
        </li>
      </ul>
    </div>
  </div>
  <div class="header min-width">
    <div class="container">
      <div class="fn-left logo"> <a class="" href="{{ URL::route('index/index') }}"> <img src="{{ URL::asset('/images/logo.png') }}"  title=""> </a> </div>
      <ul class="top-nav fn-clear">
        <li class="on"> <a href="{{ URL::route('index/index') }}">首页</a> </li>
        <li> <a href="{{ URL::route('invest/list') }}" class="">我要投资</a> </li>
        <li> <a href="{{ URL::route('loan/index') }}" class="">我要借贷</a> </li>
        <li> <a href="{{ URL::route('crowdfunding/cflist') }}" class="">参与众筹</a> </li>
        <li> <a href="{{ URL::route('safe/help') }}">安全保障</a> </li>
        <li class="top-nav-safe"> <a href="{{ url('ucenter/myaccount') }}">我的账户</a> </li>
        <li> <a href="{{ URL::route('aboutus/announcement') }}">关于我们</a> </li>
      </ul>
    </div>
  </div>
</header>
<!--列表-->

@yield('content')
<!--网站底部-->
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
