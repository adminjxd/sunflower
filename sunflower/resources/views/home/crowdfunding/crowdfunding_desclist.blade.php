<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--信息详细-->
<div class="item-detail wrap">
  <div class="breadcrumbs"> <a href="index.html">首页</a>&gt; <a href="#">众筹列表</a>&gt; <span class="cur">项目详情</span> </div>
  <div class="item-detail-head clearfix" data-target="sideMenu">
 
    <div class="hd"> 
     @foreach ($title as $val)
      <h2>{{$val->cf_title}}</h2>
      @endforeach
    </div>

    <div class="bd clearfix"  style="height:230px;">
      <div class="data">
        <ul>
        @foreach ($res as $val)
          <li> <span class="f16">所需金额</span><br>
            <span class="f30 c-333" id="account">{{ $val->cf_financing_amount }}</span>元 </li>
          <li class="relative"><span class="f16">回报方式</span><br>
            <span class="f30 c-orange" style="font-size:20px;">{{ $val->cf_reward_type }}</span> </li>
          <li><span class="f16">筹资周期</span><br>
            <span class="f30 c-333">{{ $val->cf_period }}</span>天 </li>
          
          <li class="colspan" style="margin-left:-7px;"> 
          <span class="c-888 fl"  >投标进度：</span>
            <div class="progress-bar fl" style="margin-top:25px;"> 
            <span style="width:100%"></span> 
            </div>
            <div style="margin-top:20px;"><span class="c-green"  >{{ $val->status }}</span>%</div>
            剩余<span style="color:red">{{ $val->only }}</span>天
          </li>
           <li><span class="c-888" >发标日期：</span>{{ $val->cf_start_time }}</li>
           
        @endforeach        
        </ul>
      </div>
      <div class="mod-right mod-status">
        <!-- <div class="inner"> -->
          <div class="text" style="margin-letf:-20px;margin-top:-20px;"> 
          @foreach ($res as $val)
          <img src="{{URL::asset( $val->cf_cover )}}" width="330px;" height="240px;">
          @endforeach  
          </div>
          <!-- </div> -->
      </div>
    </div>
  </div>
  <div class="item-detail-body clearfix mrt30 ui-tab">
    <div class="ui-tab-nav hd"> <i class="icon-cur" style="left: 39px;"></i>
      <ul>
        <li class="nav_li active" id="nav_1"><a href="javascript:;">借款信息</a></li>
        <li class="nav_li" id="nav_2"><a href="javascript:;">回报设置</a> <i class="icon icon-num1" style="margin-left: -15px;"> <span id="tender_times">23</span> <em></em> </i> </li>
        <!-- <li class="nav_li" id="nav_3"><a href="javascript:;">还款列表</a></li> -->
      </ul>
    </div>
    <div class="bd">
      <div class="ui-tab-item active" style="display: block;">
        <div class="borrow-info">
          <dl class="item">
            <dt>
              <h3>借款人介绍</h3>
            </dt>
            <dd>
              <div class="text">
                @foreach ($res as $val)
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 项目标题：<span>{{$val->cf_title}}</span></p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 筹款目的：<span>{{$val->cf_description}}</span></p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 项目地点：<span>{{$val->cf_site}}</span></p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 筹款金额：<span>{{$val->cf_financing_amount}}</span></p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> 筹款周期：<span>{{$val->cf_period}}</span></p>
                @endforeach        
             </div>
            </dd>
          </dl>
          <dl class="item">
            <dt>
              <h3>审核信息</h3>
            </dt>
            <dd>
              <div class="verify clearfix">
                <ul>
                  <li><i class="icon icon-4"></i><br>
                    身份证</li>
                  <li><i class="icon icon-5"></i><br>
                    户口本</li>
                  <li><i class="icon icon-6"></i><br>
                    结婚证</li>
                  <li><i class="icon icon-7"></i><br>
                    工作证明</li>
                  <li><i class="icon icon-8"></i><br>
                    工资卡流水</li>
                  <li><i class="icon icon-9"></i><br>
                    收入证明</li>
                  <li><i class="icon icon-10"></i><br>
                    征信报告</li>
                  <li><i class="icon icon-11"></i><br>
                    亲属调查</li>
                  <li><i class="icon icon-19"></i><br>
                    行驶证</li>
                  <li><i class="icon icon-20"></i><br>
                    车辆登记证</li>
                  <li><i class="icon icon-21"></i><br>
                    车辆登记发票</li>
                  <li><i class="icon icon-22"></i><br>
                    车辆交强险</li>
                  <li><i class="icon icon-23"></i><br>
                    车辆商业保险</li>
                  <li><i class="icon icon-24"></i><br>
                    车辆评估认证</li>
                </ul>
              </div>
            </dd>
          </dl>
          <dl class="item">
            <dt>
              <h3>我需要更多支持</h3>
            </dt>
            <dd>
              <div class="text">
              @foreach ($res as $val)
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> <span>{{$val->cf_reinforce_title}}</span> </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> {{$val->cf_reinforce_content}}</p>
               @endforeach 
              </div>     
            </dd>
          </dl>
          <dl class="item">
            <dt>
              <h3>我提供的项目回报</h3>
            </dt>
            <dd>
              <div class="text">
              @foreach ($res as $val)
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> <span>{{$val->cf_investreward_title}}</span> </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> {{$val->cf_investreward_content}}</p>
               @endforeach 
              </div>     
            </dd>
          </dl>
          <dl class="item">
            <dt>
              <h3>关于我们</h3>
            </dt>
            <dd>
              <div class="text">
              @foreach ($res as $val)
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"><span>{{$val->cf_aboutus_title}}</span> </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> {{$val->cf_aboutus_content}}</p>
               @endforeach 
              </div>     
            </dd>
          </dl>
          <dl class="item">
            <dt>
              <h3>视角展示</h3>
            </dt>
            <dd>
              <div class="warrant"> <span class="f14 c-888">（注：为保护借款人的个人隐私信息，实物材料对部分信息进行了隐藏处理）</span>
                <div class="album" id="album">
                  <div class="album-show">
                    <div class="loading" style="display: none;"></div>
                     @foreach ($res as $val)
                      <img src="{{ URL::asset($val->cf_desc_image) }}"> 
                      @endforeach 
                    </div>
                  <div class="album-thumb"> <a href="javascript:;" class="btn btn-prev"></a> <a href="javascript:;" class="btn btn-next"></a>
                    <div style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 1070px;" class="container" id="albumThumb">
                      <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 1926px; left: 0px;">
                      @foreach ($res as $val)
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                        <li style="overflow: hidden; float: left; width: 164px; height: 108px;"><a class="small_img" id="images/news.jpg"><img src="{{ URL::asset($val->cf_desc_image) }}"></a></li>
                      @endforeach 
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </dd>
          </dl>
        </div>
      </div>
      <div class="ui-tab-item active" style="display: block;">
        <div class="borrow-info">
          <dl class="item">
            <dt>
              <h3>回报设置</h3>
            </dt>
            <dd>
              <div class="text">
              @foreach ($res as $val)
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> <span>{{$val->cf_reward_title}}</span> </p>
                <p class="MsoNormal" style="margin-left:0cm;text-indent:0cm;"> {{$val->cf_reward_content}}</p>
               @endforeach 
              </div>     
            </dd>
          </dl>
      </div>
    </div>
  </div>
</div>
<!--网站底部-->
@endsection