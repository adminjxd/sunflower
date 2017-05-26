<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title> - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{ URL::asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/font-awesome.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/login.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="{{ URL::asset('alogin/login_check') }}">
                    <h4 class="no-margins"><font color=black>登录：</font></h4>
                    <p class="m-t-md">登录到sunflower后台</p>
                    <input type="text" class="form-control uname" placeholder="用户名" name="username"/>
                    <input type="password" class="form-control pword m-b" placeholder="密码" name="pwd"/>
                    {{ csrf_field() }}
                    <a href="">忘记密码了？</a>
                    <button class="btn btn-success btn-block">登录</button>
                    <!-- <input type="submit" class="btn btn-success btn-block"> -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>
