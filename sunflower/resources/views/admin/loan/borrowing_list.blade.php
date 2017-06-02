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
                    <h5>贷款审核列表</h5>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-info btn-sm">贷款记录</button>
                        <br><br>
                        <table class="table table-bordered">
                        <tr>
                            <td><input type="text" style="width:60px;" name='loan_id'></td>
                            <td><input type="text" style="width:60px;" name='real_name'></td>
                            <td><input type="text" style="width:60px;" name='phone'></td>
                            <td>
                            <select name="" id="loan_type">
                            <option value="">请选择</option>
                            @foreach($type as $key=>$val)
                            <option value="{{$val['type_id']}}">{{$val['type_name']}}</option>
                            @endforeach
                            </select>
                            </td>
                            <td>
				<input type="text" onclick='WdatePicker()' class='Wdate' tyle="width:60px;" name='start_time'/>-<input type="text" onclick='WdatePicker()' class='Wdate' tyle="width:60px;" name='end_time'/>
                </td>
                            <td>
                            <select name="" id="loan_status">
                            <option value="0">未通过审核</option>
                            <option value="1">已通过审核</option>
                            </select>
                            </td>
                            <td colspan='2'>
                            <select name="" id="is_call">
                            <option value="0">未验证</option>
                            <option value="1">已验证</option>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <th>贷款Id</th>
                            <th>真实姓名</th>
                            <th>电话</th>
                            <th>贷款类型</th>
                            <th>贷款时间</th>
                            <th>审核状态</th>
                            <th>是否验证</th>
                            <th>操作</th>
                        </tr>
                        <tbody id='body'>
                        @foreach($loan as $key=>$val)
                        	<tr>
                                <td>{{$val['loan_id']}}</td>
                                <td>{{$val['real_name']}}</td>
                                <td>{{$val['phone']}}</td>
                                <td>{{$val['type_name']}}</td>
                                <td>{{date('Y-m-d H:i:s',$val['loan_addtime'])}}</td>
                                <td><?php if($val['loan_status']){ echo'审核通过';}else{echo '审核未通过';}?></td>
                                <td><span class='is_call' data-id="{{$val['loan_id']}}"><?php if($val['is_call']){ echo'已验证';}else{echo '未验证';}?></span></td>
                                <td><a href="{{ URL::asset('aloan/loanInfo') }}?loan_id={{$val['loan_id']}}" data-id="{{$val['loan_id']}}" class='loan_info'>详情</a></td>
                        	</tr>
                            @endforeach
                        </tbody>
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
    $("#loan_type").change(function(){
        search();
    });
    $("input[name=start_time]").blur(function(){
        search();
    });
    $("input[name=end_time]").blur(function(){
        search();
    });
    $("#loan_status").change(function(){
        search();
    });
    $("#is_call").change(function(){
        search();
    });
    function search()
    {
        var data = {};
        var loan_id =$("input[name=loan_id]").val();
        var real_name =$("input[name=real_name]").val();
        var phone =$("input[name=phone]").val();
        var loan_type =$("#loan_type").val();
        var start_time =$("input[name=start_time]").val();
        var end_time =$("input[name=end_time]").val();
        var loan_status =$("#loan_status").val();
        var is_call =$("#is_call").val();
        $.ajax({
            url:loacal+searc,
            type:'post',
            data:{
                '_token':"{{csrf_token()}}",
                'loan_id':loan_id,
                'real_name':real_name,
                'phone':phone,
                'loan_type':loan_type,
                'start_time':start_time,
                'end_time':end_time,
                'loan_status':loan_status,
                'is_call':is_call,
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
                        str+="<td>"+v.type_name+"</td>";
                        str+="<td>"+v.loan_addtime+"</td>";
                        str+="<td>"+v.loan_status+"</td>";
                        str+="<td><span class='is_call' data-id='"+v.loan_id+"'>"+v.is_call+"</span></td>";
                        str+="<td><a href='"+loacal+loanInfo+"?loan_id="+v.loan_id+"' data-id='"+v.loan_id+"' class='loan_info'>详情</a></td>";
                    str+="</tr>";                                               
                });
                $("#body").html(str);
                }else{
                    alert(result.msg)
                }
            }
        })
    }
    //修改是否验证
    $(function(){
        $(document).on('click','.is_call',function(){
            var obj = $(this);
            if (obj.html()=='已验证') {
                alert('不可修改');
                return ;
            }
            var loan_id = obj.attr('data-id');
            $.ajax({
                url:loacal+is_call,
                type:'post',
                data:{
                    '_token':"{{csrf_token()}}",
                    'loan_id':loan_id,
                },
                dataType:'json',
                success:function(result){
                    if (result.error==1) {
                        obj.html('已验证');
                    }else{
                        alert(result.msg)
                    }
                }
            });
        })
    })
    //即点即改
    //     $(document).on('click','.loan_info',function(){
    //         var obj = $(this);
    //         var loan_id = obj.attr('data-id');
    //         $.ajax({
    //             url:loacal+loanInfo,
    //             type:'post',
    //             data:{
    //                 '_token':"{{csrf_token()}}",
    //                 'loan_id':loan_id,
    //             },
    //             dataType:'json',
    //             success:function(result){
    //                 alert(result);
    //             }
    //         });
    //     })
    // })
    </script>

    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
    <!--时间插件-->
    <script type="text/javascript" src="{{ URL::asset('admin/js/jquery-1.8.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/wdatePicker.js') }}"></script>
</body>

</html>
