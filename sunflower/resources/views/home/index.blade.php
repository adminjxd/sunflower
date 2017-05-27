<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--banner-->
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
<!--注册登陆模块-->
<!--<div class="login_float">
  <div class="index_login">
    <div class="login_name">亿人宝年化收益率</div>
    <div class="login_num">10<font>%</font>~17<font>%</font></div>
    <div class="login_info"> <span class="login_info1"><font>3~4倍</font>定期存款收益</span> <span class="login_info2"><font>30倍</font>活期存款收益</span> </div>
    <div class="clear"></div>
    <div class="login_btn"><a href="register.html">立即注册</a></div>
    <p class="login_reg">已有账号，<a href="login.html">立即登录</a></p>
  </div>
</div>-->
<script type="text/javascript">
var gaintop;
$(function(){
	gaintop = $(".login_float").css("top");
	$(".login_float").css("top",-695);
	$(".login_float").show();
	$(".login_float").animate({top: gaintop,opacity:1},800);
    $(".login_float").animate({top: '-=12px',opacity:1},200);
    $(".login_float").animate({top: gaintop,opacity:1},200);
    $(".login_float").animate({top: '-=6px',opacity:1},200);
    $(".login_float").animate({top: gaintop,opacity:1},200);
    $(".login_float").animate({top: '-=2px',opacity:1},100);
    $(".login_float").animate({top: gaintop,opacity:1},100);
});

</script>

<div class="ipubs"><span class="o1">累计投资金额:<strong>1,047,288,128.79</strong>元</span> <span class="o2">已还本息:<strong>400,507,750.81</strong>元</span><span class="o2">余额:<strong>677,679,983.07</strong>元</span><span class="o4">注册人数:<strong>20649</strong>人</span></div>
<div class="feature"> <a class="fea1" href="#"> <i></i>
  <h3>高收益</h3>
  <span>年化收益率最高达“20%<br>
  50元起投，助您轻松获收益</span> </a> <a class="fea2" href="#"> <i></i>
  <h3>安全理财</h3>
  <span>100%本息保障<br>
  实物质押，多重风控审核</span> </a> <a class="fea3" href="#"> <i></i>
  <h3>随时赎回</h3>
  <span>两步赎回您的资金<br>
  最快当日到账</span> </a> <a class="fea4" href="#"> <i></i>
  <h3>随时随地理财</h3>
  <span>下载手机客户端<br>
  随时随地轻松理财</span> </a> </div>
<!--中间内容-->
<div class="main clearfix mrt30" data-target="sideMenu">
  <div class="wrap">
    <div class="page-left fn-left">
      <div class="mod-borrow">
        <div class="hd">
          <h2 class="pngbg"><i class="icon icon-ttyx"></i>推荐项目</h2>
          <div class="fn-right f14 c-888">常规发标时间每天<span class="c-555">10:00，13:00和20:00</span>，其余时间根据需要随机发</div>
        </div>
        <div class="bd">
          <div class="des"><span class="fn-left">期限1-29天，期限短，收益见效快</span><a href="{{ URL::route('invest') }}" class="fn-right">查看更多&gt;&gt;</a></div>
          <div class="borrow-list">
            <ul>
              <li>
                <div class="title"><a href="{{ URL::route('invest/info') }}" target="_blank"><i class="icon icon-zhai" title="债权贷"></i></a><a href="{{ URL::route('invest/info') }}" class="f18" title="金女士债权质押借款1万元" target="_blank">金女士债权质押借款1万元</a></div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="260">借款金额<span class="f24 c-333">10000.00</span>元</td>
                      <td width="165">年利率<span class="f24 c-333">10.70% </span></td>
                      <td width="180" align="center">期限<span class="f24 c-orange">4</span>天</td>
                      <td><div class="circle">
                          <div class="left progress-bar">
                            <div class="progress-bgPic progress-bfb5">
                              <div class="show-bar"> 56.3% </div>
                            </div>
                          </div>
                        </div></td>
                      <td align="right"><a class="ui-btn btn-gray" href="{{ URL::route('invest/info') }}">还款中</a> </td>
                    </tr>
                  </tbody>
                </table>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="mod-borrow mrt20">
        <div class="hd">
          <h2 class="pngbg"><i class="icon icon-yyyz"></i>政信贷</h2>
          <div class="fn-right f14 c-888">参与人次：<span class="c-555">61.37万次</span>&nbsp;&nbsp;&nbsp;平均满标时间：<span class="c-555">1小时24分11秒</span> </div>
        </div>
        <div class="bd">
          <div class="des"><span class="fn-left">期限1-12月，收益更高</span><a href="{{ URL::route('invest') }}" class="fn-right">查看更多&gt;&gt;</a></div>
          <div class="borrow-list">
            <ul>
              <li>
                <div class="title"><a href="#" target="_blank"><i class="icon icon-che" title="车易贷"></i></a><a href="{{ URL::route('invest/info') }}" class="f18" title="毕先生宝马320汽车质押贷款10万元" target="_blank">毕先生宝马320汽车质押贷款10万元</a></div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="260">借款金额<span class="f24 c-333">100000.00</span>元</td>
                      <td width="165">年利率<span class="f24 c-orange relative">12.00%
                        <!--公益标 20150724 lj-->
                        <!--公益标 20150724 lj-->
                        </span></td>
                      <td width="180" align="center">期限<span class="f24 c-333">1</span>个月</td>
                      <td><div class="circle">
                          <div class="left progress-bar">
                            <div class="progress-bgPic progress-bfb10">
                              <div class="show-bar"> 100% </div>
                            </div>
                          </div>
                        </div></td>
                      <td align="right"><a class="ui-btn btn-gray" href="{{ URL::route('invest/info') }}">还款中</a> </td>
                    </tr>
                  </tbody>
                </table>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="mod-borrow mrt20">
        <div class="hd">
          <h2 class="pngbg"><i class="icon icon-nnyy"></i>实时变现</h2>
          <div class="fn-right f14 c-888">参与人次：<span class="c-555">8.35万次</span>&nbsp;&nbsp;&nbsp;平均满标时间：<span class="c-555">1小时41分19秒</span> </div>
        </div>
        <div class="bd">
          <div class="des"> <span class="fn-left">期限12-60月，打理更加容易</span><a href="{{ URL::route('invest') }}" class="fn-right">查看更多&gt;&gt;</a></div>
          <div class="borrow-list">
            <ul>
              <li>
                <div class="title"><a href="{{ URL::route('invest/info') }}" target="_blank"><i class="icon icon-che" title="车易贷"></i></a><a href="{{ URL::route('invest/info') }}" class="f18" title="朱先生比亚迪S6汽车抵押贷款4.5万元" target="_blank">朱先生比亚迪S6汽车抵押贷款4.5万元</a></div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="260">借款金额<span class="f24 c-333">45000.00</span>元</td>
                      <td width="165">年利率<span class="f24 c-orange relative">13.80%
                        <!--公益标 20150724 lj-->
                        <!--公益标 20150724 lj-->
                        </span></td>
                      <td width="180" align="center">期限<span class="f24 c-333">18</span>个月</td>
                      <td><div class="circle">
                          <div class="left progress-bar">
                            <div class="progress-bgPic" style="background-position: -610px -40px;">
                              <div class="show-bar"> 100% </div>
                            </div>
                          </div>
                        </div></td>
                      <td align="right"><a class="ui-btn btn-gray" href="{{ URL::route('invest/info') }}">还款中</a> </td>
                    </tr>
                  </tbody>
                </table>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="mod-borrow mrt20">
        <div class="hd">
          <h2 class="pngbg"><i class="icon icon-ssbx"></i>债权转让</h2>
          <div class="fn-right f14 c-888">参与人次：<span class="c-555">8.06万次</span> &nbsp;&nbsp;&nbsp;平均转让用时：<span class="c-555">03小时06分22秒</span> </div>
        </div>
        <div class="bd">
          <div class="des"><span class="fl">其他投资人折价转让，转让项目会随时更新，惊喜不断</span><a href="{{ URL::route('invest') }}" class="fn-right">查看更多&gt;&gt;</a></div>
          <div class="borrow-list">
            <ul>
              <li>
                <div class="title"><a href="{{ URL::route('invest/info') }}" target="_blank"><i class="icon icon-zhuan" title="债权转让"></i></a><a href="{{ URL::route('invest/info') }}" title="汪女士债权质押借款1万元" class="f18" target="_blank">汪女士债权质押借款1万元</a></div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td width="260" height="60">剩余期限<span class="f24 c-333"> 2月8天 </span></td>
                      <td width="200">预期收益率<span class="f24"><a href="javascript:;" class="tx-line c-orange" onClick="showCalculator(this,12.42,84890,10068.17)" title="点击查看纯收益率">12.42%</a></span></td>
                      <td width="280" align="center">转让价格<span class="f24 c-333">10,068.17</span>元</td>
                      <td width="88" align="right" class="time"><a href="{{ URL::route('invest/info') }}" class="ui-btn btn-gray" target="_blank">已转让</a>
                        <p class="f12"> 用时：48秒 </p></td>
                    </tr>
                  </tbody>
                </table>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="page-right fn-right" style="top: 0px;">
      <div class="mod-risk-tip"><i class="icon icon-tip"></i><a href="#" class="c-orange">收益与风险并存，请理性选择平台</a></div>
      <div class="mod mod-notice mrt20">
        <div class="hd">
          <h3>网站公告</h3>
          <a href="{{ URL::route('aboutus/announcement') }}" class="fn-right">更多&gt;</a></div>
        <div class="bd">
          <div class="article-list clearfix">
            <ul>
              <li><a href="#" title="关于“金融产品”产品的说明">关于“金融产品”产品的说明</a><span class="date">06-19</span></li>
              <li><a href="#" title="2015年9月10日发标预告">2015年9月10日发标预告</a><span class="date">09-10</span></li>
              <li><a href="#" title="关于平台“纪念抗战胜利70周年”9月3日***">关于平台“纪念抗战胜利70周年***</a><span class="date">09-02</span></li>
              <li><a href="#" title="关于P2P理财平台新系统升级的公告">关于P2P理财平台新系统***</a><span class="date">09-02</span></li>
              <li><a href="#" title="关于债权贷新规调整实施的公告">关于债权贷新规调整实施的公告</a><span class="date">08-25</span></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="mod mod-rank clearfix ui-tab mrt20">
        <div class="hd">
          <h3>排行榜</h3>
          <div class="ui-tab-nav"> <i class="icon icon-cur"></i>
            <ul>
              <li class="active"><a href="#">收益</a></li>
              <li><a href="#">投资</a></li>
            </ul>
            <a href="#" class="fn-right">更多&gt;</a> </div>
        </div>
        <div class="bd">
          <div class="ui-tab-cont">
            <div class="ui-tab-item active">
              <ul class="rank-list">
                <li><span class="fl"><em class="n1">01</em>gz******</span><span class="fr">￥1,115,461.07</span></li>
                <li><span class="fl"><em class="n2">02</em>米克******</span><span class="fr">￥1,003,890.04</span></li>
                <li><span class="fl"><em class="n3">03</em>灵儿******</span><span class="fr">￥895,618.71</span></li>
                <li><span class="fl"><em class="n4">04</em>li******</span><span class="fr">￥795,154.06</span></li>
                <li><span class="fl"><em class="n5">05</em>豆芽******</span><span class="fr">￥747,154.44</span></li>
              </ul>
            </div>
            <div class="ui-tab-item">
              <ul class="rank-list">
                <li><span class="fl"><em class="n1">01</em>黄世******</span><span class="fr">￥78,714,974.00</span></li>
                <li><span class="fl"><em class="n2">02</em>一诺******</span><span class="fr">￥58,428,720.00</span></li>
                <li><span class="fl"><em class="n3">03</em>hj******</span><span class="fr">￥57,844,191.00</span></li>
                <li><span class="fl"><em class="n4">04</em>老马******</span><span class="fr">￥38,808,064.00</span></li>
                <li><span class="fl"><em class="n5">05</em>写意******</span><span class="fr">￥31,341,159.00</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="mod mod-report ui-tab clearfix mrt20">
        <div class="hd">
          <div class="ui-tab-nav"> <i class="icon icon-cur"></i>
            <ul>
              <li class="active"><a href="javascript:;">媒体报道</a></li>
              <li class=""><a href="javascript:;">理财知识</a></li>
            </ul>
          </div>
        </div>
        <div class="bd">
          <div class="ui-tab-cont">
            <div class="ui-tab-item active">
              <div class="headlines"> <img src="{{ URL::asset('/images/news.jpg') }}"> <a title="平台遭遇P2P滑稽抄袭" target="_blank" href="#">平台遭遇P2P滑稽抄袭</a><br>
                <span class="des">抄袭者居然把被抄袭者的名字一起抄下来，这样的乌龙抄袭你见过没...</span> </div>
              <div class="article-list">
                <ul>
                  <li>[凤凰网]<a href="#" title="平台携手哈工大关爱毕节留守儿童" target="_blank">平台携手哈工大关爱毕节留守儿童</a></li>
                  <li>[21CN财经]<a href="#" title="接受网贷之家专访" target="_blank">接受网贷之家专访</a></li>
                  <li>[和讯网]<a href="#" title="受邀参加中国财经峰会 斩获行业最具品牌影响力等两项大奖" target="_blank">受邀参加中国财经峰会 斩获行业最具品牌影响力等两项大奖</a></li>
                </ul>
              </div>
            </div>
            <div class="ui-tab-item">
              <div class="article-list">
                <ul>
                  <li>[<a href="#">P2P网贷</a>]<a href="#" title="随着互联网金融的快速发展，越来越多的人开始加入到p2p网贷投资行列，作为一种相对来说还比较新兴的理财产品" target="_blank"> 合肥p2p网贷哪家好，投资新人该如何选择p2p网贷平台</a></li>
                  <li>[<a href="#">外汇</a>]<a href="#" title="投资者应知道，外汇交易市场是一个保证金交易市场，投资者可以利用外汇保证金交易进行更有收益空间的交易" target="_blank"> 什么是外汇保证金交易有哪些方式</a></li>
                  <li>[<a href="#">外汇</a>]<a href="#" title="很多的投资者都听说过外汇保证金交易，他们都知道该交易方式可以让投资者有机会进行更有收益空间的交易" target="_blank"> 外汇保证金交易开户有什么样的具体优势呢？</a></li>
                  <li>[<a href="#">保险理财</a>]<a href="#" title="保险理财因为其特殊性而对人员专业知识、道德标准以及人生阅历提出了较高要求。但是我国的保险业人才还存在很多问题" target="_blank"> 保险公司存在的人才需求问题</a></li>
                  <li>[<a href="#">保险理财</a>]<a href="#" title="保险理财的专业人士缺乏已经成为我国保险公司个人理财业务发展的一大瓶颈，保险公司的员工要能够成为一个好的客户经理" target="_blank"> 保险理财产品销售人员需要具备的基本素质</a></li>
                  <li>[<a href="#">外汇</a>]<a href="#" title="外货期货也叫货币期货，所谓期货自然与现货有着明显的区别，外汇期货除了价格表现形式上与现货有所差异之外，外汇期货交易是用一种货币按照汇率兑换成另一种货币的期货合约" target="_blank"> 什么是外汇期货及其套利形式介绍</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mrt20 mod"> <a href="#"><img src="{{ URL::asset('/images/pic_home_js.jpg') }}" width="300" height="80" alt="收益计算器" class="pic"></a></div>
    </div>
  </div>
</div>
<script src="{{ URL::asset('/js/index.js') }}"></script>
<div class="partners wrap clearfix mrb30">
  <div class="partners-inner ui-tab">
    <div class="hd">
      <div class="ui-tab-nav"> <i class="icon icon-cur" style="left: 151px;"></i>
        <ul>
          <li class=""><a href="#">合作机构</a></li>
          <li class="active"><a href="#">友情链接</a></li>
        </ul>
      </div>
    </div>
    <div class="bd">
      <div class="ui-tab-cont">
        <div class="ui-tab-item active">
          <div class="img-scroll">
            <div class="container">
              <ul>
                <li><img src="{{ URL::asset('/images/logo_sbcvc.png') }}" width="152" height="52" alt="软银"></li>
                <li><img src="{{ URL::asset('/images/logo_abc.png') }}" width="152" height="52" alt="农业银行"></li>
                <li><img src="{{ URL::asset('/images/logo_wdzj.png') }}" width="152" height="52" alt="网贷之家"></li>
                <li><img src="{{ URL::asset('/images/logo_baidu.png') }}" width="152" height="52" alt="百度"></li>
                <li><img src="{{ URL::asset('/images/logo_aqb.png') }}" width="152" height="52" alt="安全宝"></li>
                <li><img src="{{ URL::asset('/images/logo_gds.png') }}" width="152" height="52" alt="万国数据"></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="ui-tab-item">
          <div class="links"> <a target="_blank" href="http://www.wd361.com">网贷互联</a> <a target="_blank" href="http://www.bjzq.com.cn">北京证券网</a> <a target="_blank" href="http://v.yidai.com/">易贷微理财</a> <a target="_blank" href="http://www.wangdaicaifu.com">P2P</a> <a target="_blank" href="http://www.p2pchina.com">网贷中国</a> <a target="_blank" href="http://www.wangdaibangshou.com">网贷帮手</a> <a target="_blank" href="https://www.okcoin.cn">比特币网</a> <a target="_blank" href="http://www.p2p110.com">网贷110</a> <a target="_blank" href="http://www.zcmall.com">招财猫理财</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
