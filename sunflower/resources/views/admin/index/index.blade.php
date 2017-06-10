<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> sunflower- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="{{ URL::asset('admin/images/favicon.ico') }}"> 
    <link href="{{ URL::asset('admin/css/bootstrap.min.css?v=3.3.6') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('admin/css/style.css?v=4.1.0') }}" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">sunflower</strong>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">sunflower
                        </div>
                    </li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope">分类</span>
                    </li>
                    <li>
                        <a class="J_menuItem" href="">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">主页</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">用户管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="{{ URL::asset('auser/show_userinfo') }}">用户信息列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{ URL::asset('auser/reputation') }}">信誉评估</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="{{ URL::asset('auser/vip') }}">会员中心</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">借贷管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="#">利率管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aloan/interest_rate_list') }}">利率列表</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="fontawesome.html">添加利率</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="J_menuItem" href="#">贷款管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aloan/borrowing_list') }}">贷款列表</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="J_menuItem" href="#">还款管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aloan/repayment_list') }}">还款列表</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">众筹管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="#">分类管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('acrowd/category_list') }}">分类列表</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('acrowd/add_category') }}">添加分类</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="J_menuItem" href="#">项目管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('acrowd/projects_list') }}">项目列表</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="J_menuItem" href="#">订单管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('acrowd/projects_order') }}">订单列表</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">投资理财</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="#">资金管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('ainvest/capital_pool') }}">查看资金池</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">产品管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="fontawesome.html">产品列表</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="glyphicons.html">添加产品</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="iconfont.html">下架产品</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">积分商城</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">优惠券管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aintegral/ticket_list') }}">添加优惠券</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aintegral/ticket_status') }}">优惠券使用状况</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">积分商品管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aintegral/goods_list') }}">积分商品列表</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aintegral/add_goods') }}">添加积分商品</a>
                                    </li>
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aintegral/goods_order') }}">兑换订单</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">平台管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">团队管理 <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a class="J_menuItem" href="{{ URL::asset('aintegral/ticket_list') }}">团队列表</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="line dk"></li>
                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            欢迎<font color=red>{{$admininfo['username']}}</font>登陆！
                        </li>
                        <li class="dropdown">
                            <a href="{{ URL::asset('alogin/loginout') }}">退出</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe id="J_iframe" scrolling="auto" width="100%" height="100%" src="{{ URL::route('aindex/home') }}" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>

    <!-- 全局js -->
    <script src="{{ URL::asset('admin/js/jquery.min.js?v=2.1.4') }}"></script>
    <script src="{{ URL::asset('admin/js/bootstrap.min.js?v=3.3.6') }}"></script>
    <script src="{{ URL::asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ URL::asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('admin/js/plugins/layer/layer.min.js') }}"></script>

    <!-- 自定义js -->
    <script src="{{ URL::asset('admin/js/hAdmin.js?v=4.1.0') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('admin/js/index.js') }}"></script>

</body>

</html>
