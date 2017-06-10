 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if IE]>  
    <script src=""></script>  
    <![endif]-->  
    <style>  
        article, aside, figure, footer, header, hgroup,  
        menu, nav, section { display: block;}  
    </style> 
    <title> - 添加积分商品</title>
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
                    <h5>添加积分礼品</h5>
                    </div>
                    <div class="ibox-content">
                        <br><br>

                        <form action="{{ URL::asset('aintegral/goods_add') }}" method="post" enctype="multipart/form-data">
                        <table class="table table-bordered">
                        	<tr>
                        		<td>礼品名称:</td>
                        		<td><input type="text" name="goods_name"/></td>
                        	</tr>
                            <tr>
                                <td>兑换所需积分:</td>
                                <td><input type="text" name="goods_int"/></td>
                            </tr>
                            <tr>
                                <td>数量:</td>
                                <td><input type="text" name="goods_num"/></td>
                            </tr>
                            <tr>
                                <td>礼品图片:</td>
                                <td>
                                    <input id="file" name="goods_url" type='file' onchange="readURL(this);"/>
                                    <img id="img_prev" src="#" alt="图片展示" />
                                </td>

                            </tr>
                            <tr>
                                <td>礼品状态:</td>
                                <td><input type="radio" value="1" name="is_statues" checked/>上架&nbsp&nbsp
                                    <input type="radio" value="0" name="is_statues"/>下架
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center">
                                    <input type="submit" value="添加"/>
                                    <input type="reset" value="取消"/>
                                </td>
                            </tr>
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        </table>
                        </form>
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img_prev')
                            .attr('src', e.target.result)
                            .width(50)
                            .height(50);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>  

    <!-- iCheck -->
    <script src="{{ URL::asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>
</body>

</html>
