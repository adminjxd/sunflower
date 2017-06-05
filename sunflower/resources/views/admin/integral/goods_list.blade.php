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
   
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                    <h5>礼品列表</h5>
                    </div>
                    <div class="ibox-content">

                        <br><br>
                        <table class="table table-bordered">
                            <tr>
                                <th>商品名称</th>
                                <th>剩余数量</th>
                                <th>商品图片</th>
                                <th>兑换所需积分</th>
                                <th>商品状态</th>
                                <th>操作</th>
                            </tr>
                            @foreach($data as $k=>$v)
                        	<tr goods_id="{{$v['goods_id']}}">
                        		<td><span class="goods_up" nu="goods_name">{{$v['goods_name']}}</span></td>
                        		<td><span class="goods_up" nu="goods_num">{{$v['goods_num']}}</span></td>
                                <td><img src="{{$v['goods_url']}}" class="goods_img" style="width: 100px;height: 80px;" alt="暂无"/></td>
                                <td><span class="goods_up" nu="goods_int">{{$v['goods_int']}}</span></td>
                                <td>@if($v['is_statues']==1)<a sta="1" is="1" href="javascript:" class="goods_statues">已上架</a> @else <a href="javascript:" class="goods_statues" is="1" sta="0">已下架</a>@endif </td>
                                <td><a href="javascript:void(0)" class="goods_del" is="1">X</a></td>
                        	</tr>
                            @endforeach
                            <form method="post" enctype="multipart/form-data"><input url="" name="myfile" style="display: none" type="file" id="file"/></form>

                                <tr>
                                    <td colspan="7" style="text-align: center">{!! $data->links() !!}</td>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="application/javascript">
        $(function() {
             img_obj = '';//保存对象变量
            //即点既改
            $(document).on('dblclick', '.goods_up', function () {
                var obj = $(this);
                old = obj.text();
                var nu = obj.attr('nu');
                var str = '<input statues="1" class="goods_updo" type="text" nu="' + nu + '" value="' + old + '">';
                obj.parent().html(str);
            })
            //即点既改
            $(document).on('blur', '.goods_updo', function () {
                var obj = $(this);
                var goods_id = obj.parents('tr').attr('goods_id')
                var val = obj.val();
                var statues = obj.attr('statues')
                if (statues != 1) {
                    return
                }
                obj.attr('statues', 0)
                var nu = obj.attr('nu')
                var str = '';
                var str1 = '<span class="goods_up" nu="' + nu + '">' + old + '</span>';
                if (val === old) {
                    obj.parent().html(str1);
                    return
                } else {
                    str += '<span class="goods_up" nu="' + nu + '">' + val + '</span>'
                }
                $.ajax({
                    type: 'post',
                    url: '{{ URL::asset('aintegral/goods_up')}}',
                    data: {'goods_id': goods_id, 'val': val, 'filed': nu},
                    dataType: 'json',
                    success: function (data) {
                        if (data.error == 1) {
                            obj.parent().html(str);
                        } else if (data.error == -1) {
                            alert('只能填写数字')
                            obj.parent().html(str1);
                        } else {
                            alert('修改失败')
                            obj.parent().html(str1);
                        }
                        obj.attr('statues', 1)
                    },
                    error: function () {
                        alert('未知错误，联系管理员')
                        obj.parent().html(str1);
                    }
                })

            })
            //隐藏域事件触发
            $('#file').click(function () {
            });
            //点击图片触发上传
            $('.goods_img').click(function () {
                var obj = $(this)
                var old_url = obj.attr('src')
                var goods_id = $(this).parents('tr').attr('goods_id');
                $('#file').attr('goods_id',goods_id)
                $('#file').attr('url',old_url)
                $('#file').trigger("click")
                img_obj = obj;//保存当前点击触发对象

            });
            //ajax图片上传事件
            $('#file').change(function () {
                    var goods_id = $(this).attr('goods_id')
                    var old_url = $(this).attr('url')
                    var formData = new FormData();
                    formData.append('myfile',$(this).get(0).files[0]);//这里的append是给对象添加值的属性，获取到input框的第一个对象的第一个文件的第一个文件值就是我们所需要的传输文件流。
                    formData.append('goods_id',goods_id);
                    formData.append('goods_url',old_url);
                    $.ajax({
                        url:'{{ URL::asset('aintegral/goods_ajax_img')}}',
                        type: 'POST',
                        data: formData,//这里传输这个对象
                        async: false,//异步，关闭
                        cache: false,//缓存,关闭
                        contentType: false,
                        processData: false,
                        dataType:'json',
                        success: function (data) {
                            if(data.error == 1){
                                img_obj.attr('src',data.url)
                            }else if(data.error == -1){
                               alert('尺寸或者格式不正确');
                            }else{
                                alert('上传失败')
                            }
                        },
                        error: function () {
                            alert('异常错误，请尝试刷新重新操作');
                        }
                    });
                })
            //AJAX商品状态修改
            $('.goods_statues').click(function(){
                var obj = $(this)
                var is = obj.attr('is')
                if(is != 1){
                    return
                }
                obj.attr('is',0)
                var goods_id = obj.parents('tr').attr('goods_id')
                var sta = obj.attr('sta')
                var str = '';
                if(sta == 1){
                    sta = 0
                    str = '已下架'
                }else if(sta == 0){
                    sta = 1
                    str = '已上架'
                }else{
                    alert('请刷新页面')
                    return;
                }
                $.ajax({
                    type : 'post',
                    url : '{{ URL::asset('aintegral/goods_ajax_sta')}}',
                    data : {goods_id:goods_id,sta:sta},
                    dataType : 'json',
                    success : function(data){
                        if(data.error==1){
                            obj.attr('is',1)
                            obj.attr('sta',sta)
                            obj.text(str)

                        }else{
                            alert('修改失败')
                        }
                    },
                    error : function(){
                        alert('异常错误，联系管理员')
                    }


                })

            })
            //AJAX删除商品
            $('.goods_del').click(function(){
                var obj = $(this)
                var is = obj.attr('is')
                if(is != 1){
                    return
                }obj.attr('is',0)
                var goods_id = obj.parents('tr').attr('goods_id');
                var goods_id = obj.parents('tr').attr('goods_id');
                $.ajax({
                    type : 'post',
                    url : '{{ URL::asset('aintegral/goods_del')}}',
                    data : {goods_id:goods_id},
                    dataType:'json',
                    success : function(data){
                        if(data.error == 1){
                            obj.attr('is',1)
                            obj.parents('tr').remove()
                        }else if(data.error == 0){
                            alert('删除失败')
                        }else{
                            alert('出现异常')
                        }
                    } ,
                    error : function(){
                        alert('异常错误,联系管理员')
                    }
                })
            })
        })


    </script>

    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>
