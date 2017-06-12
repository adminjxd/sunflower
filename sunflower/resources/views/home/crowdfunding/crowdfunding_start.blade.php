<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<link rel="shortcut icon" href="favicon.ico"> <link href="{{ URL::asset('/css/bootstrap.min.css?v=3.3.6') }}css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="{{ URL::asset('/css/font-awesome.css?v=4.4.0') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/animate.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/summernote.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/summernote-bs3.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/style.css?v=4.1.0') }}" rel="stylesheet">
 <!-- 全局js -->
<script src="{{ URL::asset('/js/jquery.min.js?v=2.1.4') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.min.js?v=3.3.6') }}"></script>

<!-- 自定义js -->
<script src="{{ URL::asset('/js/content.js?v=1.0.0') }}"></script>

<!-- jQuery UI -->
<script src="{{ URL::asset('/js/jquery-ui-1.10.4.min.js') }}"></script>

<!-- From Builder -->
<script src="{{ URL::asset('/js/beautifyhtml.js') }}"></script>

<!--登录-->
<div class="wrap">
 <form id="LonginForm" name="LonginForm" action="" method="post">
	<div class="tdbModule loginPages">
		<div class="registerTitle">请选择您的众筹身份</div>
			<div class="registerCont">
				<div class="col-sm-12 col-sm-offset-3">

					<div class="person" >
						<div class="person-left" style="float: left;">
							<h1 style="color:#9966cc;margin-left:-245px;font-weight:bold;">奖励众筹</h1>
							<h3 style="color:#9966cc;margin-left:-245px;">需设置截止日期，并向支持者发放回报。</h3>
			               <dl style="color:#999999;margin-left:-245px;font-size:15px;margin-top:50px;">
		                    <dd><img src="{{ URL::asset('/images/fj.png') }}"/>电脑端发起<span style="margin-left:300px;"><img src="{{ URL::asset('/images/rl.png') }}">筹资天数10-59天</span></dd>
		                    <dd><img src="{{ URL::asset('/images/bz.png') }}"/>通过审核后在平台展示<span style="margin-left:230px;"><img src="{{ URL::asset('/images/nz.png') }}">按7:3分两次结算</span></dd>
		                    <dd><img src="{{ URL::asset('/images/jb.png') }}"/>一定时间内达到目标金额才算成功<span style="margin-left:155px;"><img src="{{ URL::asset('/images/bjb.png') }}">项目成功结束后按承诺时间发货</span></dd>
			               </dl>
			            </div>
		                <div class="person-right" style="float:left; margin-left:20px;margin-top:15px;">
		                	<img src="{{ URL::asset('/images/per.png') }}"/><br/>
		                	
	                    	<a href="{{ URL::route('crowdfunding/cfperson') }}" class="siteM_fqBtn btn_ALink js-checkLogin"style="margin-left:90px;"><button class="btn btn-primary" type="button">个人</button></a>
							
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-sm-offset-3">
					<div class="organization" style="float:clear;">
							<div class="organization-left" style="float: left;">
								<h1 style="color:#ffcc99;margin-left:-245px;font-weight:bold;">奖励众筹</h1>
								<h3 style="color:#ffcc99;margin-left:-245px;">需设置截止日期，并向支持者发放回报。</h3>
				               <dl style="color:#999999;margin-left:-245px;font-size:15px;margin-top:50px;">
			                    <dd><img src="{{ URL::asset('/images/fj.png') }}"/>电脑端发起<span style="margin-left:300px;"><img src="{{ URL::asset('/images/rl.png') }}">筹资天数10-59天</span></dd>
			                    <dd><img src="{{ URL::asset('/images/bz.png') }}"/>通过审核后在平台展示<span style="margin-left:230px;"><img src="{{ URL::asset('/images/nz.png') }}">按7:3分两次结算</span></dd>
			                    <dd><img src="{{ URL::asset('/images/jb.png') }}"/>一定时间内达到目标金额才算成功<span style="margin-left:155px;"><img src="{{ URL::asset('/images/bjb.png') }}">项目成功结束后按承诺时间发货</span></dd>
				               </dl>
				            </div>
			                <div class="organization-right" style="float:left; margin-left:20px;margin-top:15px;">
			                	<img src="{{ URL::asset('/images/o.png') }}"/><br/>
			                	
		                    	<a href="{{ URL::route('crowdfunding/cfgroup') }}" class="siteM_fqBtn btn_ALink js-checkLogin"style="margin-left:90px;"><button class="btn btn-orange" type="button">机构</button></a>
								
							</div>
					</div>

				</div>
			</div>	
		</div>
	</div>
 </form>
</div>
@endsection