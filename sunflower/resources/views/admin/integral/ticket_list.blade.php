 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> - 添加优惠券</title>
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
                    <h5>添加优惠券</h5>
                    </div>
                    <div class="ibox-content">
                        <button type="button" class="btn btn-info btn-sm" id="add" statues="1">添加</button>
                        <br><br>
                        <table class="table table-bordered" id="list">
                            <tr>
                                <th>优惠券名称</th>
                                <th>优惠券金额</th>
                                <th>实体券数量</th>

                                <th><a class="btn btn-info btn-sm" id="coupons" type="javascript:">添加优惠券</a></th>
                            </tr>
                            @foreach($data as $k=>$v)
                        	<tr>
                        		<td>{{$v['coupons_name']}}</td>
                        		<td>{{$v['coupons_value']}}</td>
                                <td>{{$v['num']}}</td>
                                <td><a href="javascript:" c_name="{{$v['coupons_name']}}" class="coupons_true">生成实体券</a>/<a href="{{ URL::asset('aintegral/coupons_true/'.$v['coupons_name'])}}" title="查看实体优惠券">查看实体券</a>/<a href="javascript:" class="coupons_del" c_name="{{$v['coupons_name']}}">删除</a></td>
                        	</tr>
                            @endforeach
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="application/javascript">
        /**
         * Created by EH on 2017/6/2.
         */
        $(function(){
            $(document).on('click','#coupons',(function(){
                var obj = $(this)
                var str = '<tr>';
                str += '<td><input class="coupons_name" type="text" style="width:100px;"/></td>'
                str += '<td><input class="coupons_value" type="text" style="width:100px;"/></td>'
                str += '<td>0</td>'
                str += '<td><a class="del" type="javascript:">点错了收起</a></td>'
                str += '</tr>';
                obj.parents('tr').after(str)
            }))
            $(document).on('click','.del',function(){
                var obj = $(this)
                obj.parents('tr').remove()
            })
            //添加优惠券
            $('#add').click(function(){
                var obj = $(this) ;
                var name_len = $('.coupons_name').length
                if(name_len==0){
                    alert('请先添加数据')
                    return
                }
                if(obj.attr('statues')!=1){
                    return
                }
                obj.attr('statues',0)

                var name = '';
                var value = '';
                for(var i=0;i<name_len;i++){
                    if($('.coupons_name').eq(i).val()==''||$('.coupons_value').eq(i).val()==''){
                        continue
                    }
                    name += ','+$('.coupons_name').eq(i).val()
                    value += ','+$('.coupons_value').eq(i).val()
                }
                var coupons_name = name.substr(1).split(',')
                var coupons_value = value.substr(1).split(',')
                $.ajax({
                    type : 'post',
                    url : '{{ URL::asset('aintegral/coupons_add')}}',
                    data : {coupons_name:coupons_name,coupons_value:coupons_value},
                    dataType:'json',
                    success:function(data){
                        if(data.error==1){
                            var str = '';
                            var url = "{{ URL::asset('aintegral/coupons_true')}}";
                            $.each(data.data,function(k,v){
                                str +='<tr>';
                                str += '<td>'+v['coupons_name']+'</td>'
                                str += '<td>'+v['coupons_value']+'</td>'
                                str += '<td>0</td>'
                                str += '<td><a href="javascript:" class="coupons_true" c_name="'+v['coupons_name']+'">生成实体券</a>/<a href="'+url+'/'+v['coupons_name']+'" title="查看实体优惠券">查看实体券</a>/<a href="javascript:" class="coupons_del" c_name="'+v['coupons_name']+'" >删除</a></td>'
                                str += '</tr>';
                            })
                            obj.attr('statues',1)
                            $('.del').parents('tr').remove()
                            $('#list').append(str)
                        }else{
                            alert('请检查数据')
                        }
                    },
                    error:function(){
                        alert('请联系管理员')
                    }
                })
            })
            $(document).on('click','.coupons_del',function(){
                var obj = $(this)
                if(typeof(obj.attr('statues'))!='undefined'){
                    return
                }
                obj.attr('statues',1)
                var c_name = obj.attr('c_name')
                $.ajax({
                    type : 'post',
                    url : '{{ URL::asset('aintegral/coupons_del')}}',
                    data : {c_name:c_name},
                    success : function(data){
                        if(data == 1){
                            obj.removeAttr('statues')
                            obj.parents('tr').remove()
                        }else{
                            alert('删除失败，请联系管理员')
                        }
                    },
                    error : function(){
                        alert('异常错误');
                    }
                })
            })
            $(document).on('click','.coupons_true',(function(){
                var num = prompt('请输入生成数量')
                var obj = $(this)
                var c_name = obj.attr('c_name')
                if(num == ''){
                    return
                }else{
                    var c_num =parseInt(num)
                }
                if(isNaN(c_num)){
                    return
                }
                $.ajax({
                    type : 'post',
                    url : '{{ URL::asset('aintegral/coupons_true_add')}}',
                    data : {c_num:c_num,c_name:c_name},
                    dataType : 'json',
                    success : function(data){
                        if(data.error==1){
                            var new_num=parseInt(obj.parent().prev().text())+parseInt(data.num)
                            obj.parent().prev().text(new_num)
                        }
                    }
                })
            }))
        })
    </script>
    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>
