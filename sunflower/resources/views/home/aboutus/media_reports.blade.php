<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<!--关于我们-->
<div class="bg">
  <div class="contain" id="tabs" style="margin:0 auto;">
    <div class="text-nav">
      <ul class="clearfix">
        <li class="selected"> <a class="text-link" href="{{ URL::route('aboutus/notice') }}">网站公告</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/reports') }}">媒体报道</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/profile') }}">公司简介</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/manageteam') }}">管理团队</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/partner') }}">合作伙伴</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/teamstyle') }}">团队风采</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/legalpolicy') }}">法律政策</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/legalnotice') }}">法律声明</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/descriptioncharges') }}">资费说明</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/recruitment') }}">招贤纳士</a> </li>
        <li> <a class="text-link" href="{{ URL::route('aboutus/contactus') }}">联系我们</a> </li>
      </ul>
    </div>
    <div class="text-box">
			<div class="text-content" id="text-content">
				<h1 class="title">网站公告</h1>
				<ul class="clearfix mt20 new-list">
					<li class="clearfix list-item">
						<a href="公司公告详细.html">9月14日最新理财产品预告</a>
						<span>2015-09-12</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">豆兑换规则</a>
						<span>2015-09-12</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">9月12日最新理财产品介绍</a>
						<span>2015-09-12</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">9月11日最新理财产品介绍</a>
						<span>2015-09-11</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">9月10日最新理财产品预告</a>
						<span>2015-09-09</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">9月9日最新理财产品介绍</a>
						<span>2015-09-09</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">9月8日最新理财产品预告</a>
						<span>2015-09-07</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">9月7日最新理财产品预告</a>
						<span>2015-09-06</span>
					</li><li class="clearfix list-item">
						<a href="公司公告详细.html">9月6日最新理财产品预告</a>
						<span>2015-09-05</span>
					</li>				</ul>
				<div class="page">
<span class="all">共有163条信息</span><span class="count"></span><div class="fr pages"><span data-page="1" class="currents">1</span><a data-page="2" href="#">2</a><a data-page="3" href="#">3</a><a data-page="4" href="#">4</a><a data-page="5" href="#">5</a><a data-page="6" href="#">6</a><span>...</span><a data-page="16" href="#">16 </a><a data-page="17" href="#">17 </a><a data-page="2" class="next" href="#">下一页</a><a data-page="17" class="last" href="#">尾页</a></div>
</div>
			</div>
		</div>
  </div>
</div>
@endsection