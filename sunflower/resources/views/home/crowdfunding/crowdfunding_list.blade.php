<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--列表-->
<div class="page-filter wrap">
  <div class="breadcrumbs"><a href="{{ URL::route('index/index') }}">首页</a>&gt;<span class="cur">众筹投资列表</span></div>
  <div class="invest-filter" data-target="sideMenu">
    <div class="flexslider">
  <ul class="slides">
    <li style="background-image: url({{ URL::asset('/images/banner.jpg') }}); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1; background-position: 50% 0px; background-repeat: no-repeat no-repeat;" class=""><a href="#" target="_blank"></a></li>
    <li style="background-image: url({{ URL::asset('/images/banner.jpg') }}); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1; background-position: 50% 0px; background-repeat: no-repeat no-repeat;" class=""><a href="#" target="_blank"></a></li>
    <li style="background-image: url({{ URL::asset('/images/banner.jpg') }}); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1; background-position: 50% 0px; background-repeat: no-repeat no-repeat;" class=""><a href="#" target="_blank"></a></li>
    <li style="background-image: url({{ URL::asset('/images/banner.jpg') }}); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1; background-position: 50% 0px; background-repeat: no-repeat no-repeat;" class=""><a href="# " target="_blank"></a></li>
    <li style="background-image: url({{ URL::asset('/images/banner.jpg') }}); width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1; background-position: 50% 0px; background-repeat: no-repeat no-repeat;" class=""><a href="#" target="_blank"></a></li>
  </ul>
</div>
<script src="{{ URL::asset('/js/jquery.flexslider-min.js') }}"></script>
<script>
$(function(){
    $('.flexslider').flexslider({
        directionNav: true,
        pauseOnAction: false
    });
    //产品列表滚动
    var pLength = $('.pListContentBox > li').length;
    var cishu = pLength-4;
    var n = 0;
    $('.pListContentBox').css({'width':pLength*245+'px'});
    if(pLength>4){
        $('.pListRight').addClass('curr');
    }
    $('.pListRight').on('click',function(){
        if(cishu>0){
            //alert('1');
            n++;
            cishu--;
            $('.pListContentBox').animate({'left':'-'+n*244+'px'},500);
            if(cishu==0){
                $('.pListRight').removeClass('curr');
            }
            if(n>0){
                $('.pListLeft').addClass('curr');
            }
        }
    });
    $('.pListLeft').on('click',function(){
        if(n>0){
            n--;
            cishu++;
            $('.pListContentBox').animate({'left':'-'+n*244+'px'},500);
            if(n==0){
                $('.pListLeft').removeClass('curr');
            }
            if(cishu>0){
                $('.pListRight').addClass('curr');
            }
        }
    });
    //alert(pLength);
});
</script>
  </div>
  <div class="item">
          <ul>
           <li class="col-120-2"> <a class="ui-btn btn-gray" href="{{ URL::route('crowdfunding/cfstart') }}">+发起众筹</a> </li>
          </ul>
          </div>
  <div class="invest-list mrt30 clearfix">
    
    <div class="hd">
   
      <h3>众筹项目</h3>
      <div class="count">
        <ul>
          
          <li class="line">散标投资交易金额&nbsp;&nbsp;<span class="f20 bold">73.54亿元</span></li>
          <li>累计赚取收益&nbsp;&nbsp;<span class="f20 bold">2.52亿元</span></li>
        </ul>
      </div>
    </div>
    <div class="bd">
      <div class="invest-table clearfix">
        <div class="title clearfix">
          <ul>
            <li class="col-190">项目封面</li>
            <li class="col-190"><a href="javascript:url('order','account_up');" class="">项目标题</a> </li>
            <li class="col-110"><a href="javascript:url('order','apr_up');" class="">所需金额</a> </li>
            <li class="col-150"><a href="javascript:url('order','period_up');" class="">众筹周期</a> </li>
            <li class="col-150">回报类型</li>
            <li class="col-120"><a href="javascript:url('order','scale_up');" class="">借款进度</a></li>
            <li class="col-120-t">操作</li>
          </ul>
        </div>
        <!------------投资列表-------------->
        <div class="item" >
          <ul>
           @foreach ($data as $val)              
            <li class="col-190" style="margin-right:190px;"><a class="f18" href="{{ URL::route('crowdfunding/cfdesc',['procode'=>$val->cf_procode]) }}" target="_blank"><img src="{{URL::asset( $val->cf_cover)}}" width="100px;" style="margin-top:-10px;"></a></li>
            <li class="col-330 col-t" style="margin-left:-180px;"><a class="f18" style="margin-top:30px;" href="{{ URL::route('crowdfunding/cfdesc',['procode'=>$val->cf_procode]) }}" title="{{ $val->cf_title }}" target="_blank"> {{ $val->cf_title }} </a></li>
            <li class="col-180" style="margin-top:30px;"><span class="f20 c-333" style="margin-left:-140px;">{{ $val->cf_financing_amount }}</span>元</li>
            <li class="col-150" style="margin-top:30px;"> <span class="f20 c-333" style="margin-left:-210px;">{{ $val->cf_period }}</span>天 </li>
            <li class="col-150" style="margin-top:30px;margin-left:-260px;">{{ $val->cf_reward_type }}</li>
            <li class="col-120">
              <div class="circle">
                <div class="left progress-bar">
                  <div class="progress-bgPic progress-bfb10" style="margin-left:-60px;">
                    <div class="show-bar" style="margin-top:30px;"> <span>{{ $val->status }}</span>% </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="col-120-2" style="margin-left:-95px;"> <a class="ui-btn btn-gray" style="margin-top:30px;" href="{{ URL::route('crowdfunding/cfdesc',['procode'=>$val->cf_procode]) }}">参与众筹</a> </li>
           @endforeach
          </ul>
        </div>
        
        <!------------投资列表-------------->
      </div>
      <div class="paginations clearfix mrt30"> 
      <span class="pages">
      <a href="javascript:void(0);" onclick="">首页</a>
      <a href="javascript:void(0);" onclick="">上一页</a>&nbsp;
      <a class="curr" href="javascript:;">1</a> <a href="#">2</a> 
      <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> 
      <a href="javascript:void(0);" onclick="#">下一页</a>
      <a href="javascript:void(0);" onclick="#">尾页</a>&nbsp;<em>共2297页&nbsp;</em>
      </span>
        <dl class="page-select">
          <dt><span>1</span><i class="icon icon-down"></i></dt>
          <dd style="display: none;">
            <ul name="nump" id="jsnump">
              <li><a href="##" onclick="page_jump(&quot;this&quot;,1)">1</a></li>
              <li><a href="##" onclick="page_jump(&quot;this&quot;,2)">2</a></li>
              <li><a href="##" onclick="page_jump(&quot;this&quot;,3)">3</a></li>
            </ul>
          </dd>
        </dl>
      </div>
    </div>
  </div>
</div>
<style>
.paginations{text-align:center;color:#888;font-size:14px;}
.paginations .pages a{display:inline-block;padding:0 8px;line-height:30px;background:#efefef;margin:0 3px;color:#888;}
.paginations .pages a.curr,.paginations .pages a:hover{background:#7faf2a;color:#FFF;}
.paginations .pages a.curr,.paginations .pages a.curr:hover{cursor:default;}
.paginations .pages a.dis,.paginations .pages a.dis:hover{cursor:default;background:#efefef;color:#888;}
.paginations .pages em{padding:0 10px 0 15px;font-style:normal;}
.paginations .page-select{display:inline-block;width:78px;text-align:left;position:relative;z-index:9;vertical-align:middle;*display:inline;zoom:1;}
.paginations .page-select .icon-down{float:right;background:url(../images/g_sprite.png) -135px 0;float:right;width:16px;height:16px;margin:6px 0 0;font-size:0;}
.paginations .page-select.active .icon-down{background-position:-135px -16px;}
.paginations .page-select dt{border:1px solid #ddd;background:#efefef;height:28px;padding:0 8px;line-height:28px;}
.paginations .page-select dt span{float:left;}
.paginations .page-select dd{border:1px solid #ddd;background:#FFF; position:absolute;top:29px;left:0;width:76px;max-height:100px;overflow-x:hidden;overflow-y:auto;display:none;}
.paginations .page-select dd a{display:block;height:22px;line-height:22px;text-indent:10px;}
.paginations .page-select a{display:block;height:20px;}
.paginations .page-select a:hover{background:#7faf2a;color:#FFF;}
</style>
@endsection
