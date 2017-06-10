<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> - 积分商品列表</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{ URL::asset('admin/images/favicon.ico') }}">
    <link href="{{ URL::asset('admin/css/bootstrap.min.css?v=3.3.6') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/style.css?v=4.1.0') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('time/laydate/laydate.js') }}"></script>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><font color="red">{{$coupons_name}}</font>兑换券的实体券展示</h5>
                </div>
                <div class="ibox-content">
                    <br><br>

                    <div style="width:970px; margin:5px auto;">
                        <b>可以设置有效期的数量:</b> <font color="red" id="co">{{$nu}}</font>
                        <br/>
                        <b>设置有效期:</b> <span id="error"></span> <br/>
                        开始时间:<input id="start_time" placeholder="请输入日期" class="laydate-icon" onclick="laydate()">
                        <br/>
                        截止时间:<input id="end_time" placeholder="请输入日期" class="laydate-icon" onclick="laydate()">
                        <br/>
                        <b>数量</b>（有效券随机设置）：<input type="text" id="num" style="width: 40px;"/><span id="nu_error"></span> <button id="submit" type="button" class="btn btn-info btn-sm" style="height: 30px;">设置</button>
                    </div>
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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script type="text/javascript">
    $(function(){
        $('#submit').click(function(){
            var start = $('#start_time').val();
            var end = $('#end_time').val();
            var num = $('#num').val();
            var error = $('#error');
            var nu_error = $('#nu_error');
            var co = parseInt($('#co').text());
            error.html('');
            nu_error.html('');
            var time_error = '<font color="red">请设置正确时间</font>';
            var num_err = '<font color="red">请正确设置数量</font>';
            var server_num = '{{$nu}}';
            var coupons_name ='{{$coupons_name}}';
            if(start == ''|| end == ''|| start>end){
                error.html(time_error)
                return
            }
            if(num == ''||isNaN(num)){
                nu_error.html(num_err)
                return
            }
            if(num > co){
                nu_error.html('<font color="red">超过最大数字</font>');
                return
            }
            $.ajax({
                type : 'post',
                url : '{{ URL::asset('aintegral/true_time')}}',
                data : {start:start,end:end,num:num,server_num:server_num,coupons_name:coupons_name},
                dataType : 'json',
                success : function(data){
                   if(data.error==1){
                      var new_n = co - data.num
                       $('#co').text(new_n)
                   }else if(data.error==-1){
                       alert('数量超过峰值')
                   }else if(data.error==-2){
                       alert('时间顺序错误')
                   }else{
                       alert('设置失败')
                   }
                },
                error : function(){
                    alert('未知错误，请联系管理员')
                }
            })
        })
    })

</script>
<!-- iCheck -->
<script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>
