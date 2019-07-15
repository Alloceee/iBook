<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link rel="alternate icon" type="image/png" href="{{ URL::asset('home/static/i/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/dark.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/style2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/font-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/amazeui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/jquery.tagsinput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/icons.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/lib/layer/2.4/skin/layer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/lib/webuploader-0.1.5/webuploader.css') }}">
    <link rel="stylesheet" type="text/css"
          href="http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.css">
    @yield('css')
    <style type="text/css">

        .secondary li {
            float: left;
        }

        a {
            color: rgb(14, 165, 123);
        }

        a:hover {
            color: rgb(15, 193, 142);

        }
    </style>
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script src="{{ URL::asset('home/static/js/jquery.1.11.1.js') }}"></script>
    <script src="{{ URL::asset('home/static/js/plugins.js') }}"></script>
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=3.0&ak=Lu782Qwi7yU9zRwecc6VWH5r3MVFAgDU"></script>


    <!-- Document Title
    ============================================= -->
    <title>@yield('title')</title>

</head>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<body class="stretched side-header device-md">

<div id="wrapper" class="animation-duration: 1.5s; opacity: 1;">
    <header id="header" class="no-sticky">
        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('welcome') }}" class="standard-logo"><h5><span>后台管理</span></h5></a>
                    <a href="{{ route('welcome') }}" class="retina-logo"><h5><span>后台管理</span></h5></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">
                    <ul>
                        <li><a href="#" class="page-scroll">基础管理</a>
                            <ul>
                                @if( session('power')==1||session('power')==0)
                                    <li><a href="{{ route('userManager') }}" class="page-scroll">用户管理</a></li>
                                @endif
                                @if(session('power')==3||session('power')==0)
                                    <li><a href="{{ route('articleManager') }}" class="page-scroll">书籍管理</a></li>
                                @endif
                                @if(session('power')==4||session('power')==0)
                                    <li><a href="{{ route('typeManager') }}" class="page-scroll">分类管理</a></li>
                                @endif
                                @if(session('power')==2||session('power')==0)
                                    <li><a href="{{ route('commentManager') }}" class="page-scroll">评论管理</a></li>
                                @endif
                            </ul>
                        </li>
                        <li><a href="#" class="page-scroll">系统监控</a>
                            <ul>
                                @if( session('power')==0)
                                    <li><a href="" class="page-scroll">系统日志</a>
                                        <ul>
                                            <li><a href="{{ route('userLog') }}">用户日志</a></li>
                                            <li><a href="{{ route('adminLog') }}">管理员日志</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="" class="page-scroll">你不是超级管理员没有权限</a></li>
                                @endif
                            </ul>
                        </li>
                        <li><a href="#" class="page-scroll">超级管理</a>
                            <ul>
                                @if( session('power')==0)
                                    <li><a href="{{ route('adminAddShow') }}">管理员添加</a></li>
                                    <li><a href="{{ route('adminManager') }}">管理员管理</a></li>
                                    <li><a href="{{ route('powerManager') }}">角色管理</a></li>
                                @else
                                    <li><a href="" class="page-scroll">你不是超级管理员没有权限</a></li>
                                @endif
                            </ul>
                        </li>
                        <li><a href="{{ route('rolePower') }}" class="page-scroll">角色权限概览</a></li>

                    </ul>
                </nav>

                <!-- /.navbar-collapse -->
            </div>
        </div>
    </header>
    <section id="page-title">
        <div class="container clearfix">
            <h1>iBook</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('userHome',['username'=>session('admin')]) }}">
                        <img src="{{ URL::asset('admin/static/images/user.png') }}" class="img-circle" width="40px">
                    </a></li>
                <li class="active">{{ session('admin') }}</li>
                <li class="active">{{ session('grade') }}</li>
                <li class="active"><a href="{{ url('admin/logout') }}">退出</a></li>
            </ol>
        </div>
    </section>
@yield('content')

<!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">
        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2019 华东交通大学理工学院16级软件工程.<br>
                    <div class="copyright-links"><a href="{{ url('home/about') }}">关于我们</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="am-icon-qq"></i>
                            <i class="am-icon-qq"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="am-icon-wechat"></i>
                            <i class="am-icon-wechat"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="am-icon-weibo"></i>
                            <i class="am-icon-weibo"></i>
                        </a>


                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> 1184465220@qq.com <span class="middot">&middot;</span> <i
                            class="icon-headphones"></i> 18855109072 <span class="middot">&middot;</span> <i
                            class="am-icon-wechat"></i> 18855109072
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->
</div>
<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<script src="{{ URL::asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('home/static/js/functions.js') }}"></script>
<script src="{{ URL::asset('home/static/js/jquery.validate.js') }}"></script>
<script src="{{ URL::asset('home/static/js/jquery.tagsinput.js') }}"></script>
<script src="{{ URL::asset('home/static/js/mo.min.js') }}"></script>
<script src="{{ URL::asset('home/static/js/demo.js') }}"></script>
<script src="{{ URL::asset('home/lib/layer/2.4/layer.js') }}"></script>
<script src="http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js"></script>
@yield('js')
</body>
</html>
