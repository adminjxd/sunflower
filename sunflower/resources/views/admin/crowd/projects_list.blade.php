 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - 项目列表</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="{{ URL::asset('admin/images/favicon.ico') }}"> 
    <link href="{{ URL::asset('admin/css/bootstrap.min.css?v=3.3.6') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/animate.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('admin/css/style.css?v=4.1.0') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/common.css') }}" rel="stylesheet" />
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    <h5>项目列表</h5>
                    </div>
                    <div class="ibox-content">
                    <ul>
                    <table>
                    <tr>
                        <th width="20%">项目封面</th>
                        <th width="15%">项目标题</th>
                        <th width="20%">项目目的</th>
                        <th width="10%">所需金额</th>
                        <th width="10%">众筹周期</th>
                        <th width="15%">回报类型</th>
                        <th>审核</th>
                    </tr>
                    <tr>
                    @foreach ($data as $val)   
                        <td><img src="{{URL::asset( $val->cf_cover )}}" width="150px;"></td>
                        <td>{{ $val->cf_title }}</td>
                        <td>{{ $val->cf_description}}</td>
                        <td><span>{{ $val->cf_financing_amount }}</span>元</td>
                        <td><span>{{ $val->cf_period }}</span>天</td>
                        <td>{{ $val->cf_reward_type }}</td>
                        <td><a href="javascript:void(0);"><img src="{{URL::asset('admin/img/x.png')}}" width="20px;" id="checks"></a></td>
                        <td><input type="hidden" value="0" id="val"></td>
                    @endforeach
                    </tr>
                    </table>
                                  
                        
                       
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 全局js -->
    <script src="{{ URL::asset('admin/js/jquery.min.js?v=2.1.4') }}"></script>
    <script src="{{ URL::asset('admin/js/bootstrap.min.js?v=3.3.6') }}"></script>

    <!-- Peity -->
    <script src="{{ URL::asset('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>

    <!-- 自定义js -->
    <script src="{{ URL::asset('admin/js/content.js?v=1.0.0') }}"></script>

    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>

