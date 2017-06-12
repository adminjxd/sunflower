 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - 贷款列表</title>
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
                    <h5>贷款详细列表</h5>
                    </div>
                    <div class="ibox-content">
                        <a href="{{ URL::asset('aloan/borrowing_list') }}"><button type="button" class="btn btn-info btn-sm">点击返回贷款记录</button></a>
                        <br><br>
                        <button type="button" class="btn btn-info btn-sm" id='success' data-id="{{$loan['loan_id']}}">审核通过放款</button>
                        <br><br>
                        <table class="table table-bordered">
                        <tr>
                            <th>用户昵称</th>
                            <th>贷款金额</th>
                            <th>贷款期限</th>
                            <th>月利率(月)</th>
                            <th>滞纳金利率(日)</th>
                            <th>还款方式</th>
                            <th>抵押物</th>
                        </tr>
                        	<tr>
                                <td>{{$loan['username']}}</td>
                                <td>{{$loan['loan_amount']}}</td>
                                <td>{{$loan['loan_period']}}</td>
                                <td>{{$loan['loan_rate']}}</td>
                                <td>{{$loan['over_rate']}}</td>
                                <td>{{$loan['method_name']}}</td>
                                <td><?php if($loan['mortgage']){ echo'无';}else{echo $loan['mortgage'];}?></td>
                        	</tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="h_url" value="{{ URL::asset('') }}">
    <!-- 全局js -->
    <script src="{{ URL::asset('admin/js/jquery.min.js?v=2.1.4') }}"></script>
    <script src="{{ URL::asset('admin/js/bootstrap.min.js?v=3.3.6') }}"></script>

    <!-- Peity -->
    <script src="{{ URL::asset('admin/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script>
    $(function(){
        $(document).on('click','#success',function(){
            var obj = $(this);
            var loan_id = obj.attr('data-id');
            $.ajax({
                url:loacal+success,
                type:'post',
                data:{
                    '_token':"{{csrf_token()}}",
                    'loan_id':loan_id,
                },
                dataType:'json',
                success:function(result){
                    alert(result.msg);
                }
            });
        })
    })
    </script>
    <!-- 自定义js -->
    <script src="{{ URL::asset('admin/js/content.js?v=1.0.0') }}"></script>

    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>
