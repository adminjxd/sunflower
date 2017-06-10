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
                    <h5>金额统计</h5>
                </div>
                <div class="ibox-content">
                    <button type="button" class="btn btn-info btn-sm">平台进出帐统计</button>
                    <br><br>
                    <table class="table table-bordered" data-table='date'>
                        <tr>
                            <th>Sun 存宝应出账</th>
                            <th>散标投资应出账</th>
                            <th>贷款应进账</th>
                            <th>贷款实出账</th>
                            <th>盈利</th>
                        </tr>

                        <tr>
                            <td>{{$mn['deOut']}}</td>
                            <td>{{$mn['inOut']}}</td>
                            <td>{{$mn['loIn']}}</td>
                            <td>{{$mn['myLo']}}</td>
                            <td>{{$mn['earning']}}</td>
                        </tr>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="ibox-content">
                    <button type="button" class="btn btn-info btn-sm">Sun 存宝统计</button>
                    <br><br>
                    <table class="table table-bordered" data-table='date'>
                        <tr>
                            <th>存入总金额</th>
                            <th>返利总金额</th>
                        </tr>

                            <tr>
                                <td>{{$mn['depositIn']}}</td>
                                <td>{{$mn['depositOut']}}</td>
                            </tr>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="ibox-content">
                    <button type="button" class="btn btn-info btn-sm">散标投资统计</button>
                    <br><br>
                    <table class="table table-bordered" data-table='date'>
                        <tr>
                            <th>投资总金额</th>
                            <th>应返利总金额</th>
                            <th>已返利总金额</th>
                        </tr>

                            <tr>
                                <td>{{$mn['investIn']}}</td>
                                <td>{{$mn['investFOut']}}</td>
                                <td>{{$mn['investOut']}}</td>
                            </tr>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="ibox-content">
                    <button type="button" class="btn btn-info btn-sm">贷款金额统计</button>
                    <br><br>
                    <table class="table table-bordered" data-table='date'>
                        <tr>
                            <th>贷出总金额</th>
                            <th>已回款总金额</th>
                            <th>已缴滞纳总金额</th>
                            <th>预计回款总金额</th>
                        </tr>

                            <tr>
                                <td>{{$mn['loanOut']}}</td>
                                <td>{{$mn['loanAIn']}}</td>
                                <td>{{$mn['loanOIn']}}</td>
                                <td>{{$mn['loanFIn']}}</td>
                            </tr>
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
<div id="rate7" style="display:none">
    <?php foreach ($rate7 as $k=>$v) {?>
    <span class="rate"><?=$v->rate?></span>
    <span class="rate_date"><?=substr($v->rate_date,5,5)?></span>
    <?php }?>
</div>
</html>


<!--网站底部-->
<script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
<script type="text/javascript" src="{{asset('/js/investt.js')}}"></script>
