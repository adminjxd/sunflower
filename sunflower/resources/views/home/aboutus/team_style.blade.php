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
				<ul class="r-list">
					<li class="clearfix">
						<a href="">
							<img src="{{ URL::asset('/images/2015062506.jpg') }}" width="300" height="171">
						</a>
						<div class="record">
							<h5>
								<a href="#">服务民生</a>
							</h5>
							<p class="text">
								设立公益书友会，斥资购买图书并向市民免费开放，这也和2015年政府工作报告提出要“倡导全民阅读 ，建设书香社会”的号召不谋而合。公益书友会将是一个交流互动的乐园，书友会将不定期举办多种活动，发挥石狮首家互联网金融公司的所长，帮助市民了解金融法规、投资理财等相关知识，为发展普惠金融做出自己的贡献。
							</p>
							<p class="time">活动时间：2015年6月</p>
						</div>
					</li>
					<li class="clearfix">
						<a href="">
							<img src="{{ URL::asset('/images/2015062506.jpg') }}" width="300" height="171">
						</a>
						<div class="record">
							<h5>
								<a href="#">服务民生</a>
							</h5>
							<p class="text">
								设立公益书友会，斥资购买图书并向市民免费开放，这也和2015年政府工作报告提出要“倡导全民阅读 ，建设书香社会”的号召不谋而合。公益书友会将是一个交流互动的乐园，书友会将不定期举办多种活动，发挥石狮首家互联网金融公司的所长，帮助市民了解金融法规、投资理财等相关知识，为发展普惠金融做出自己的贡献。
							</p>
							<p class="time">活动时间：2015年6月</p>
						</div>
					</li>
					<li class="clearfix">
						<a href="">
							<img src="{{ URL::asset('/images/2015062506.jpg') }}" width="300" height="171">
						</a>
						<div class="record">
							<h5>
								<a href="#">服务民生</a>
							</h5>
							<p class="text">
								设立公益书友会，斥资购买图书并向市民免费开放，这也和2015年政府工作报告提出要“倡导全民阅读 ，建设书香社会”的号召不谋而合。公益书友会将是一个交流互动的乐园，书友会将不定期举办多种活动，发挥石狮首家互联网金融公司的所长，帮助市民了解金融法规、投资理财等相关知识，为发展普惠金融做出自己的贡献。
							</p>
							<p class="time">活动时间：2015年6月</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
  </div>
</div>
@endsection