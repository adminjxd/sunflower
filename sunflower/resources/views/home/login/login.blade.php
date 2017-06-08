<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')

<!--登录-->
<div class="wrap">
 <form id="LonginForm" name="LonginForm" action="" method="post">
	<div class="tdbModule loginPage">
		<div class="registerTitle">用户登录</div>
		<div class="registerCont">
			<ul>
				<li>
					<span class="dis">用户名：</span><input class="input" type="text" name="username" id="username" maxlength="24" tabindex="1" autocomplete="off" placeholder="用户名/手机号/邮箱">
					<span id="username_sign"></span>
				</li>
	                
				<li>
				   <span class="dis">密码：</span><input class="input" type="password" name="password" id="password" maxlength="24" tabindex="1" autocomplete="off">
				   <input type="hidden" id="h_url" value="{{ URL::asset('') }}">
				   <a href="#" id="pawHide" class="blue">忘记密码</a>
				   <span id="password_sign"></span>
				</li>
				<li>
				  <span class="dis">验证码：</span><input type="text" id="captcha" style="width:166px;" class="input" name="yzm" data-msg="验证码" maxlength="5" tabindex="1" autocomplete="off">
						<img src="{{$captcha}}" id="yanzheng" alt="点击更换验证码" title="点击更换验证码" style="cursor:pointer;" class="valign">
					<a href="javascript:void(0);" class="blue" id="change_captcha">看不清？换一张</a>
					<span id="captcha_sign"></span>
				</li>
                <li>
                    <span class="dis"></span>
                    <a href="https://api.weibo.com/oauth2/authorize?client_id=3465828263&redirect_uri=http://www.dev.com/login/oauth_login"><img src="{{ URL::asset('/images/sina.gif') }}" alt=""></a>
                </li>
				<li class="btn">
					<input type="button" class="radius1" value="立即登录" id="submitBtn">
				</li>
			</ul>
		</div>
	</div>
 </form>
</div>
@endsection
<script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
<script>
	//更换验证码
	$(document).on('click','#change_captcha',function(){
		var h_url = $('#h_url').val();
		$.ajax({
            type: "post",
            dataType: "json",
            url: h_url + 'login/change_captcha', //发送请求地址
            data:{},
            //请求成功后的回调函数有两个参数
            success: function(data) {
                $('#yanzheng').attr('src',data.cap_url);
            }
        });
	})

	//登陆验证
    $(document).ready(function() {
        var h_url = $('#h_url').val();
        var logindo = {
            init: function() {
                logindo._bind();
            },
            _bind: function() {
                $("#username").on('blur', function(event) {
                    event.preventDefault();
                    logindo.strVerify($(this));
                    return false;
                });
                $("#password").on('blur', function(event) {
                    event.preventDefault();
                    logindo.strVerify($(this));
                    return false;
                });
                $("#captcha").on('blur', function(event) {
                    event.preventDefault();
                    logindo.strVerify($(this));
                    return false;
                });
                $("#submitBtn").on('click', function(event) {
                    event.preventDefault();
                    logindo.ajaxSubmit();
                    return false;
                });
            },
            strVerify: function(event) {
                var strName = event.attr('id');
                var strVal = event.val();
                // alert(strVal.length);
                var ids = '#' + strName + '_sign';
                //验证用户名
                if (strName == 'username') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff0000>用户名不能为空</span>");
                        return false;
                    } else {
                    	$(ids).text("");
                    }
                }
                //验证密码
                if (strName == 'password') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff0000>密码不能为空</span>");
                        return false;
                    } else {
                        $(ids).text("");
                    }
                }
                //验证验证码
                if (strName == 'captcha') {
                    if (strVal == null || strVal == '') {
                        $(ids).text("");
                        $(ids).append("<span style=color:#ff0000>验证码不能为空</span>");
                        return false;
                    } else {
                        $(ids).text("");
                    }
                }
            },
            ajaxSubmit: function() {
                if ($("#username").val() == null || $("#username").val() == '') {
                    $('#username_sign').text("");
                    $('#username_sign').append("<span style=color:#ff0000>用户名不能为空</span>");
                    return false;
                } else if ($('#password').val() == null || $('#password').val() == '') {
                    $('#password_sign').text("");
                    $('#password_sign').append("<span style=color:#ff0000>密码不能为空</span>");
                    return false;
                } else if ($('#captcha').val() == null || $('#captcha').val() == '') {
                    $('#captcha_sign').text("");
                    $('#captcha_sign').append("<span style=color:#ff0000>验证码不能为空</span>");
                    return false;
                } else {
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        url: h_url + 'login/login_check', //发送请求地址
                        data: {
                            "username": $('#username').val(),
                            "password": $('#password').val(),
                            "captcha": $('#captcha').val(),
                        },
                        //请求成功后的回调函数有两个参数
                        success: function(data) {
                            if (data.retCode == '1') {
			            		window.location = h_url + "index/index";
			                } else {
			                    alert(data.msg);
			                    $.ajax({
						            type: "post",
						            dataType: "json",
						            url: h_url + 'login/change_captcha', //发送请求地址
						            data:{},
						            //请求成功后的回调函数有两个参数
						            success: function(data) {
						                $('#yanzheng').attr('src',data.cap_url);
						            }
						        });
			                }
                        }
                    });
                }
            },
        };
        logindo.init();
    });
</script>