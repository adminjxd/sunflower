<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--注册-->
<div class="wrap">
  <div class="tdbModule register">
    <div class="registerTitle">注册账户</div>
    <div class="registerLc3">
      <p class="p1">填写账户信息</p>
      <p class="p2">验证手机信息</p>
      <p class="p3">注册成功</p>
    </div>
    <div class="registerCont">
      <ul>
        <li class="scses"> {{$username}}， 恭喜您注册成功！<a class="blue" href="#" target="_blank">请立即开通--双乾支付账户,即可投资！</a></li>
        <li class="rz"><a href="#" class="btn">立即开通</a><a href="#" class="blue">进入我的账户</a></li>
      </ul>
    </div>
  </div>
</div>
@endsection
