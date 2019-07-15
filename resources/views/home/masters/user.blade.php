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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/lib/wangEditor-3.1.1/wangEditor-3.1.1/wangEditor-fullscreen-plugin.css') }}">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.css">

    @yield('css')
    <style type="text/css">
        a {
            color: rgb(14, 165, 123);
        }

        a:hover {
            color: rgb(15, 193, 142);

        }
        .img_book {
            height: 230px;
            box-shadow: 10px 10px 5px #8D8D8D;
            margin: 25px;
            width: 170px;
        }

        #content {
            min-height: 400px;
        }

        .upload_img {
            height: 260px;
        }

        .file-item {
            height: 250px;
            width: 170px;
            margin-left: 20px;
        }

        #allmap {
            position: relative;
            z-index: 100;
            width: 300px;
            height: 300px;
            margin: 0;
            font-family: "微软雅黑";
        }
        #add:hover{
            color: #0fc18e;
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

<body class="stretched">
<div id="wrapper" class="clearfix">
    <header id="header" class="full-header">
        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ url('/') }}" class="standard-logo"><h3>iBook</h3></a>
                    <a href="{{ url('/') }}" class="retina-logo"><h3>iBook</h3></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">
                    <ul>
                        <li><a href="{{ route('write') }}" class="page-scroll">写文章</a></li>
                        <li><a href="{{ route('allArticle') }}" class="page-scroll">热门书籍</a></li>
                        <li><a href="{{ route('listArticles') }}" class="page-scroll">文章管理</a></li>
                        <li><a href="" class="page-scroll">内容管理</a>
                            <ul>
                                <li><a href="{{ route('myItems') }}">专栏管理</a></li>
                                <li><a href="{{ route('myComments') }}">评论管理</a></li>
                            </ul>
                        </li>

                        <li><a href="{{ url('about') }}" class="page-scroll">关于我们</a></li>
                        <li><a href="{{ route('contact') }}" class="page-scroll">联系我们</a></li>
                        <li><a href="{{ url('help') }}" target="_blank">帮助</a></li>
                        @if( Session::has('username') )
                        <li><a href="{{ route('user',['username'=>session('username')]) }}" class="page-scroll">个人中心</a>
                            <ul>
                                <li><a href="{{ route('user',['username'=>session('username')]) }}"
                                    target="_blank">我的主页</a></li>
                                <li><a href="{{ route('myColl') }}" target="_blank">收藏文章</a></li>
                                <li><a href="{{ route('myFocus') }}" target="_blank">关注文章</a></li>
                                <li><a href="{{ route('myFocusUser') }}" target="_blank">我关注的人</a></li>
                                <li><a href="{{ route('logout') }}">退出</a></li>
                            </ul>
                        </li>
                            <li>
                                <a class="page-scroll"
                                   href="{{ url('notifications') }}">
                                    <i class="icon-chat"></i>
                                    {{ session('reply') }}
                                </a>
                            </li>
                            @else
                            <li><a href="{{ route('login') }}">登录</a></li>
                        @endif
                    </ul>
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="{{ url('/search') }}" method="get">
                             {{ csrf_field() }}
                            <input type="text" name="q" class="form-control" value=""
                                   placeholder="输入搜索标题、作者、栏目、标签或者简介">
                        </form>
                    </div><!-- #top-search end -->
                </nav>

                <!-- /.navbar-collapse -->
            </div>
        </div>
    </header>
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
                    <div class="copyright-links"><a href="{{ url('about') }}">关于我们</a></div>
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
<script src="{{ URL::asset('js/layer.js') }}"></script>

<script src="http://cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js"></script>

@yield('js')
</body>
</html>