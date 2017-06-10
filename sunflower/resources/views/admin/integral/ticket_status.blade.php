 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - 优惠券使用状况</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="{{ URL::asset('admin/images/favicon.ico') }}"> 
    <link href="{{ URL::asset('admin/css/bootstrap.min.css?v=3.3.6') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/animate.css') }}" rel="stylesheet">
	<link href="{{ URL::asset('admin/css/style.css?v=4.1.0') }}" rel="stylesheet">
   
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    <h5>优惠券使用状况</h5>
                    </div>
                    <div class="ibox-content">
                        <br><br>
                        <table class="table table-bordered">
                            <tr>
                                <th>所属兑换券</th>
                                <th>面值</th>
                                <th>兑换码</th>
                                <th>开始日期</th>
                                <th>截止日期</th>
                                <th>是否使用</th>
                                <th>使用者账户</th>
                            </tr>
                            @foreach($info as $k=>$v)
                                <tr>
                                    <td>{{$v['c_name']}}</td>
                                    <td>{{$v['c_value']}}</td>
                                    <td>{{$v['CDKEY']}}</td>
                                    @if(empty($v['start_time']))
                                        <td>永久</td>
                                    @else
                                        <td>{{date('Y-m-d',$v['start_time'])}}</td>
                                    @endif
                                    @if(empty($v['end_time']))
                                        <td>永久</td>
                                    @else
                                        <td>{{date('Y-m-d',$v['end_time'])}}</td>
                                    @endif
                                    @if($v['is_statues']==0)
                                        <td>暂未使用</td>
                                    @else
                                        <td>已经使用</td>
                                    @endif
                                    @if(empty($v['user_name']))
                                        <td>没人兑换</td>
                                    @else
                                        <td>{{$v['user_name']}}</td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td style="text-align:center" colspan="5"> {!! $info->links() !!}</td>
                            </tr>
                        </table>
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
