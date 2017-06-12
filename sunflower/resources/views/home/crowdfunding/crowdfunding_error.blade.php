<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--列表-->
<div class="page-filter wrap">
  <div class="breadcrumbs"><a href="{{ URL::route('index/index') }}">首页</a></div>
</div>
  
<div class="invest-list mrt30 clearfix">
   
    
    <div class="bd">
      <p style="margin-left:600px;margin-top:100px;"><img src="{{URL::asset('images/cry.png')}}"></p>
      <p style="margin-left:490px;color:#999999;font-size:35px;margin-top:50px;">请返回重新填写身份信息<span style="margin-left:20px"><a href="{{ URL::route('crowdfunding/cfstart') }}"><img src="{{URL::asset('images/out.png')}}" width="35px;"></a></span></p>
    </div>
    
    
       
</div>

@endsection
