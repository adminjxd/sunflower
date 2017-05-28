 <!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--信息详细--> 
<script>
var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "{{ URL::asset('loan/js/hm.js')}}?7e312442576c2e48ecf30db4128822fa";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
</script>
  <div class="pc-lp-banner"> 
   <div class="marginAuto"> 
   <input type="hidden"name='_token' value="{{csrf_token()}}" id="token"> 
    <div class="pc-lp-banner-input"> 
     <h3>立即申请借款</h3> 
     <ul class="lp-input-ul clearfix"> 
     <li><span>借款类型:</span>
       <div class="lp-input-month-cont" id='loan_type'>
        <span class="lp-input-month-cont-curr" id="lp-input-span-type" data-v="<?= $type[0]['type_id']?>"><?= $type[0]['type_name']?></span>
        <a href="javascript:void(0);" class="lp-input-month-cont-down-a"></a>
        <input type="hidden" value="" id="lp-input-type" />
        <div class="lp-input-month-cont-ul" id='lp_type'>
        @foreach($type as $key=>$val)
         <p data-v="<?= $val['type_id']?>"><?= $val['type_name']?></p>
         @endforeach
        </div>
       </div></li>
      <li><span>借款金额:</span><input type="text" placeholder="请输入您想申请的金额" id="lp-amount" /><b class="lp-input-yuan">元</b></li> 
      <li><span>借款期限:</span><input type="text" placeholder="请输入您贷款的时长" id="lp-month" /><b class="lp-input-yuan">月</b></li>
      <li><span>还款类型:</span>
       <div class="lp-input-month-cont" id='loan_method'>
        <span class="lp-input-month-cont-curr" id="lp-input-span-method" data-v="<?= $method[0]['method_id']?>"><?= $method[0]['method_name']?></span>
        <a href="javascript:void(0);" class="lp-input-month-cont-down-a"></a>
        <input type="hidden" value="" id="lp-input-method" />
        <div class="lp-input-month-cont-ul" id='lp_method'>
        @foreach($method as $key=>$val)
         <p data-v="<?= $val['method_id']?>"><?= $val['method_name']?></p>
         @endforeach
        </div>
       </div></li>
      <!--<li><span>借款期限:</span>
       <div class="lp-input-month-cont">
        <span class="lp-input-month-cont-curr" id="lp-input-span-month">12个月</span>
        <a href="javascript:void(0);" class="lp-input-month-cont-down-a"></a>
        <input type="hidden" value="" id="lp-input-month" />
        <div class="lp-input-month-cont-ul">
         <p data-m="12">12个月</p>
         <p data-m="18">18个月</p>
         <p data-m="24">24个月</p>
         <p data-m="36">36个月</p>
         <p data-m="48">48个月</p>
        </div>
       </div></li>--> 
      <li><span>手机号:</span><input type="text" placeholder="请输入您的手机号" id="lp-mobile" /></li> 
     </ul>
     <p class="lp-input-tips"></p>
     <a href="javascript:void(0);" class="lp-input-subimt-btn"></a>
    </div>
   </div>
  </div>
  <div class="pc-lp-banner2"></div>
  <div class="pc-lp-banner3">
   <div class="marginAuto">
    <a href="javascript:;" id="pc-lp-banner3a"><img src="{{ URL::asset('loan/images/pc-lp-btnImg.png')}}?v=58abdfe4801cb" alt="" /></a>
    <p class="pc-lp-m-tips-a">挑选贷款太复杂？轻松帮你推荐贷款，<a href="//landingpage.yirendai.com/119/4/information.html">点击挑选&gt;&gt;</a></p>
   </div>
  </div>
  <div class="pc-lp-calculator-main">
   <div class="pc-lp-calculator-cont marginAuto">
    <h3><img src="{{ URL::asset('loan/images/pc-lp-titile.png')}}?v=58abdfe4801cb" alt="" /></h3>
    <div class="pc-lp-calculator-s">
     <div class="pc-lp-calculator-amount">
      <span>每月还款：</span>
      <b id="pcLpCalculator"></b>
     </div>
     <div class="pc-lp-calculator-items clearfix">
      <div class="lp-price-left clearfix">
       <div class="lp-price-left-top clearfix">
        <span>金 额</span>
        <p class="lp-prices"><a href="javascript:void(0);" data-price="20000" class="curr clearfix">2万</a><a href="javascript:void(0);" data-price="30000">3万</a><a href="javascript:void(0);" data-price="50000">5万</a><a href="javascript:void(0);" data-price="80000">8万</a><a href="javascript:void(0);" data-price="0">其它</a><input type="text" value="20000" id="lpPrice" class="lpPrice" disabled="" /></p>
       </div>
       <div class="lp-price-left-top clearfix">
        <span>借多久</span>
        <p class="lp-price-time"><a href="javascript:void(0);" data-month="12" class="curr clearfix">12个月</a><a href="javascript:void(0);" data-month="18">18个月</a><a href="javascript:void(0);" data-month="24">24个月</a><a href="javascript:void(0);" data-month="36">36个月</a><a href="javascript:void(0);" data-month="48">48个月</a></p>
       </div>
       <a href="javascript:void(0);" class="lp-price-left-btn" id="calbtn"></a>
      </div>
     </div>
    </div>
    <a href="javascript:;" class="pc-lp-calculator-cont-a"><img src="{{ URL::asset('loan/images/pc-lp-cc-btn.png')}}?v=58abdfe4801cb" alt="" class="pc-lp-cc-btn" /></a>
   </div>
  </div>
  <div class="pc-lp-banner4"></div>
  
  <div class="lp-d-main">
   <div class="lp-d-cont">
    <div class="title">
     <h4>验证账户名</h4>
     <span id="fixedClose"></span>
    </div>
    <div class="content">
     <div class="dialog_content">
      <p class="dialog_content-tips">为确认您的手机可用，校验码已发送到您的手机，10分钟内输入有效。</p>
      <div class="lp-control_group">
       手机号:
       <span>123222222</span>
      </div>
      <div class="lp-fixed-input">
       <span>验证码:</span>
       <input type="text" placeholder="请输入验证码" id="fixCode" />
       <a href="javascript:;" id="fixCodeBtn">重新获取验证码</a>
       <b>59秒后再次获取</b>
       <i class="lp-fixed-tips"></i>
      </div>
      <div class="lp-fixed-input-p">
       <p>1. 网络通讯异常可能会造成短信丢失，请重新获取或稍后再试</p>
       <p>2. 请核实手机是否已欠费停机，或者安装了某些软件屏蔽了系统短信</p>
      </div>
      <div class="lp-fixed-input-submit">
       <a href="javascript:;" id="lp-fixed-submit">确定</a>
      </div>
     </div>
    </div>
   </div>
  </div>
  <script type="text/javascript" src="{{ URL::asset('loan/js/jquery-1.12.2.min.js')}}?v=58abdfe47fa65"></script>
  <script type="text/javascript" src="{{ URL::asset('loan/js/calculator.js')}}?v=58abdfe47fa65"></script>
  <script type="text/javascript" src="{{ URL::asset('loan/js/calculation.js')}}?v=58abdfe47fa65"></script>
  <script type="text/javascript" src="{{ URL::asset('loan/js/index.js')}}?v=58abdfe47fa65"></script>
  <script type="text/javascript" id="inspectletjs"> window.__insp = window.__insp || [];
    __insp.push(['wid', 186128753]);
    (function() {
        function __ldinsp(){var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js')}}'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); }
        if (window.attachEvent) window.attachEvent('onload', __ldinsp);
        else window.addEventListener('load', __ldinsp, false);
    })();</script>
  <script type="text/javascript"> (function(){function a(){function d(){return(((1+Math.random())*65536)|0).toString(16).substring(1)}return(d()+d()+"-"+d()+"-"+d()+"-"+d()+"-"+d()+d()+d())}var c=document.cookie.split(";"),e=false,b;for(b=0;b<c.length;b++){if(c[b].split("=")[0].replace(/^\s+|\s+$/g, '')==="yrd_cid"){e=true}}if(!e){var g=a(),f=new Date();f.setFullYear(f.getFullYear()+10);document.cookie="yrd_cid="+encodeURIComponent(g)+";Expires="+f.toUTCString()+";Domain=.yirendai.com;path=/"}})();</script>
@endsection