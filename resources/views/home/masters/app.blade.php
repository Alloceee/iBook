<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        @yield('title')
    </title>

    <link rel="alternate icon" type="image/png" href="{{ URL::asset('home/static/i/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{ URL::asset('home/static/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('home/static/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
          href="i{{ URL::asset('home/static/img/apple-touch-icon-114x114.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('home/static/fonts/font-awesome/css/font-awesome.css') }}">


    <!-- Stylesheet
        ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/font-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/nivo-lightbox/nivo-lightbox.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/static/css/nivo-lightbox/default.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <script type="text/javascript"
            src="http://api.map.baidu.com/api?v=3.0&ak=Lu782Qwi7yU9zRwecc6VWH5r3MVFAgDU"></script>

    @yield('css')
    <style type="text/css">
        .img_book {
            box-shadow: 10px 10px 5px rgba(71, 100, 246, 0.71);
            height: 280px;
            width: auto;
        }

        .content {
            height: 40px;
            overflow: hidden;
        }

        /* 消息通知 */
        .notification-badge .badge {
            font-size: 12px;
            margin-top: 14px;
        }

        .notification-badge .badge-secondary {
            background-color: #EBE8E8;
        }

        .notification-badge .badge-hint {
            background-color: #d15b47 !important;;
        }

    </style>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
@yield('nav')
@yield('body')
<!-- Footer Section -->
@include('home.comm.footer')
<!-- Bottom Scripts -->
<script src="{{ URL::asset('home/static/js/jquery.1.11.1.js') }}"></script>
<script src="{{ URL::asset('home/static/js/bootstrap.js') }}"></script>
<script src="{{ URL::asset('home/static/js/SmoothScroll.js') }}"></script>
<script src="{{ URL::asset('home/static/js/nivo-lightbox.js') }}"></script>
<script src="{{ URL::asset('home/static/js/jqBootstrapValidation.js') }}"></script>
<script src="{{ URL::asset('home/static/js/main.js') }}"></script>
@yield('js')

</body>
</html>