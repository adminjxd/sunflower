 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - 利率列表</title>
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
                    <h5>利率列表</h5>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-info btn-sm">借贷期限利率</button>
                        <br><br>
                        <table class="table table-bordered" data-table='date'>
                        	<tr>
                        		<th>最短日期(月)</th>
                        		<th>最长日期(月)</th>
                                <th>月利率</th>
                        		<th>滞纳金利率(日利率)</th>
                        	</tr>
                            @foreach($date as $key=>$val)
                            <tr data-id="{{$val['date_id']}}">
                                <td data-field='min' class='update_field'>{{$val['min']}}</td>
                                <td data-field='min' class='update_field'>{{$val['max']}}</td>
                                <td data-field='rate' class='update_field'>{{$val['rate']}}</td>
                                <td data-field='over_rate' class='update_field'>{{$val['over_rate']}}</td>
                            </tr>
                            @endforeach
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-info btn-sm">借贷金额利率</button>
                        <br><br>
                        <table class="table table-bordered" data-table='amount'>
                        	<tr>
                        		<th>最小金额(元)</th>
                        		<th>最大金额(元)</th>
                                <th>月利率</th>
                        		<th>滞纳金利率(日利率)</th>
                        	</tr>
                            @foreach($amount as $key=>$val)
                            <tr data-id="{{$val['amount_id']}}">
                                <td data-field='min' class='update_field'>{{$val['min']}}</td>
                                <td data-field='min' class='update_field'>{{$val['max']}}</td>
                                <td data-field='rate' class='update_field'>{{$val['rate']}}</td>
                                <td data-field='over_rate' class='update_field'>{{$val['over_rate']}}</td>
                            </tr>
                            @endforeach
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-info btn-sm">还款方式利率</button>
                        <br><br>
                        <table class="table table-bordered" data-table='amount'>
                        	<tr>
                        		<th>方式名称</th>
                                <th>月利率</th>
                        		<th>滞纳金利率(日利率)</th>
                        	</tr>
                            @foreach($method as $key=>$val)
                            <tr data-id="{{$val['method_id']}}">
                                <td data-field='method_name' class='update_field'>{{$val['method_name']}}</td>
                                <td data-field='rate' class='update_field'>{{$val['rate']}}</td>
                                <td data-field='over_rate' class='update_field'>{{$val['over_rate']}}</td>
                            </tr>
                            @endforeach
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-info btn-sm">贷款类型利率</button>
                        <br><br>
                        <table class="table table-bordered" data-table='amount'>
                        	<tr>
                        		<th>类型名称</th>
                                <th>月利率</th>
                        		<th>滞纳金利率(日利率)</th>
                        	</tr>
                            @foreach($type as $key=>$val)
                            <tr data-id="{{$val['type_id']}}">
                                <td data-field='type_name' class='update_field'>{{$val['type_name']}}</td>
                                <td data-field='rate' class='update_field'>{{$val['rate']}}</td>
                                <td data-field='over_rate' class='update_field'>{{$val['over_rate']}}</td>
                            </tr>
                            @endforeach
                            <tbody></tbody>
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
    <script>
    //点击修改数据
// $(document).on("click",".update_field",function(){
//     var obj = $(this);
//     var id = obj.parents('tr').attr('data-id');
//     var tablename =obj.parents('table').attr('data-table');
//     var filter = obj.attr('data-field');

//     // 获取当前操作文本内容  
//     var con = obj.html();  
//     // 将当前文本内容替换为文本框  
//     obj.html("<input class='filter' type=\"text\"/>");  
//     var obj1= $(".filter");  
//     // 为文本框赋值并获取焦点  
//     obj1.val("").focus().val(con); 
//     obj.removeclass('update_field');
//     // 文本框失去焦点事件  
//     obj1.blur(function () {  
//         // 获取修改后的文本框的值  
//         var new_value = obj1.val();  
//         // 此处添加ajax事件修改对应数据源中数据(此处ajax请求根据ID修改name的值) 修改数据成功后执行以下操作 赋值  
//         $.ajax({
//             type:'post',
//             url:loacal+update,
//             data:{
//                 "_token":"{{csrf_token()}}",
//                 'tablename':tablename,
//                 'id' : id,
//                 'filter':filter,
//                 'new_value':new_value
//             },
//             dataType:'json',
//             success:function(data){
//                 // if (data.error==1) {
//                 //     obj.html(new_value);

//                 // }else{
//                 //     alert(data.msg);
//                 //     obj.html(con);
//                 // }
//                 obj.addclass('update_field');
//             }
//         });
//     })
// })
    </script>
    <script src="{{ URL::asset('admin/js/content.js?v=1.0.0') }}"></script>

    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>
