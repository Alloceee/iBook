<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>
        @yield('title')
    </title>
    <link rel="shortcut icon" href="{{ URL::asset('home/static/images/bitbug_favicon.ico') }}"/>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:400,700,400italic">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/fonts/linecons/css/linecons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/xenon-core.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/xenon-forms.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/xenon-components.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/xenon-skins.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('home/static/css/custom.css') }}">
    @yield('css')

    <script src="{{ URL::asset('home/static/js/jquery-1.11.1.min.js') }}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script zh_CN="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script zh_CN="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="page-body">
@yield('body')
</div>
<!-- Bottom Scripts -->
<script src="{{ URL::asset('home/static/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('home/static/js/TweenMax.min.js') }}"></script>
<script src="{{ URL::asset('home/static/js/resizeable.js') }}"></script>
<script src="{{ URL::asset('home/static/js/joinable.js') }}"></script>
<script src="{{ URL::asset('home/static/js/xenon-api.js') }}"></script>
<script src="{{ URL::asset('home/static/js/xenon-toggles.js') }}"></script>
<script src="{{ URL::asset('home/static/js/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('admin') }}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{ URL::asset('home/static/js/xenon-custom.js') }}"></script>

@yield('js')

</body>
</html>