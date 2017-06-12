 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> - 还款列表</title>
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
                    <h5>还款列表</h5>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-info btn-sm">还款记录</button>
                        <br><br>
                        <table class="table table-bordered">
                        	<tr>
                            <td><input type="text" style="width:60px;" name='loan_id' placeholder='贷款id'></td>
                            <td><input type="text" style="width:60px;" name='real_name' placeholder='真实姓名'></td>
                            <td><input type="text" style="width:60px;" name='phone' placeholder='手机号'></td>
                            <td>
				<input type="text" onclick='WdatePicker()' class='Wdate' tyle="width:60px;" name='start_time' placeholder='开始时间'/>-<input type="text" onclick='WdatePicker()' class='Wdate' tyle="width:60px;" name='end_time' placeholder='结束时间'/>
                </td>
                            <td colspan='2'>
                            <select name="" id="repayment_status">
                            <option value="0">未还款</option>
                            <option value="1">已还款</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <th>贷款Id</th>
                            <th>真实姓名</th>
                            <th>电话</th>
                            <th>贷款时间</th>
                            <th>还款期限</th>
                            <th>还款时间</th>
                            <th>还款金额</th>
                            <th>还款类型</th>
                        </tr>
                        <tbody id='body'>
                        @foreach($loan as $key=>$val)
                        	<tr>
                                <td>{{$val['loan_id']}}</td>
                                <td>{{$val['real_name']}}</td>
                                <td>{{$val['phone']}}</td>
                                <td>{{date('Y-m-d H:i:s',$val['loan_addtime'])}}</td>
                                <td>{{date('Y-m-d H:i:s',$val['last_day'])}}</td>
                                <td><?php if($val['time']){echo date('Y-m-d H:i:s',$val['time']);}else{echo "暂无还款";}?></td>
                                <td>{{$val['payment_amount']}}</td>
                                <td><?php if($val['replay_type']==1){echo '正常还款';}else{echo "提前还款";}?></td>
                        	</tr>
                            @endforeach
                        </tbody>
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
    $("input[name='loan_id']").blur(function(){
        search();
    });
    $("input[name='real_name']").blur(function(){
        search();
    });
    $("input[name='phone']").blur(function(){
        search();
    });
    $("input[name=start_time]").blur(function(){
        search();
    });
    $("input[name=end_time]").blur(function(){
        search();
    });
    $("#repayment_status").change(function(){
        search();
    });
    function search()
    {
        var loan_id =$("input[name=loan_id]").val();
        var real_name =$("input[name=real_name]").val();
        var phone =$("input[name=phone]").val();
        var start_time =$("input[name=start_time]").val();
        var end_time =$("input[name=end_time]").val();
        var repayment_status =$("#repayment_status").val();
        $.ajax({
            url:loacal+searchrecord,
            type:'post',
            data:{
                '_token':"{{csrf_token()}}",
                'loan_id':loan_id,
                'real_name':real_name,
                'phone':phone,
                'start_time':start_time,
                'end_time':end_time,
                'repayment_status':repayment_status
            },
            dataType:'json',
            success:function(result){
                if (result.error==1) {
                    var str = '';
                    $.each(result.content,function(k,v){
                    str+="<tr>";
                        str+="<td>"+v.loan_id+"</td>";
                        str+="<td>"+v.real_name+"</td>";
                        str+="<td>"+v.phone+"</td>";
                        str+="<td>"+v.loan_addtime+"</td>";
                        str+="<td>"+v.last_day+"</td>";
                        str+="<td>"+v.time+"</td>";
                        str+="<td>"+v.payment_amount+"</td>";
                        str+="<td>"+v.replay_type+"</td>";
                    str+="</tr>";                                               
                });
                $("#body").html(str);
                }else{
                    alert(result.msg)
                }
            }
        })
    }
    </script>
    <!-- 自定义js -->
    <script src="{{ URL::asset('admin/js/content.js?v=1.0.0') }}"></script>

    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>
