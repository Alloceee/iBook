@extends('home.masters.user')
@section('title')
    iBook - 404
@endsection
@section('content')
    <!-- Page Title
        ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>找不到页面</h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">首页</a></li>
                <li><a href="{{ route('user',['username'=>session('username')]) }}">个人中心</a></li>
                <li class="active">404</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_half nobottommargin">
                    <div class="error404 center">404</div>
                </div>

                <div class="col_half nobottommargin col_last">

                    <div class="heading-block nobottomborder">
                        <h4>额，该页面可能走丢了.</h4>
                        <span>你可以快速通过下列连接去你想去的页面:</span>
                    </div>

                    <form action="#" method="get" role="form" class="nobottommargin">
                           {{ csrf_field() }}
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="搜索页面..." name="key">
                            <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">搜索</button>
                            </span>
                        </div>
                    </form>

                    <div class="col_one_third widget_links topmargin nobottommargin">
                        <ul>
                            <li><a href="{{ url('/') }}">首页</a></li>
                            <li><a href="{{ url('about') }}">关于我们</a></li>
                            <li><a href="{{ url('help') }}">帮助</a></li>
                        </ul>
                    </div>

                    <div class="col_one_third widget_links topmargin nobottommargin">
                        <ul>
                            <li><a href="{{ route('write') }}">上传文章</a></li>
                            <li><a href="{{ route('allArticle') }}">查看书籍</a></li>
                            <li><a href="{{ route('contact') }}">联系我们</a></li>
                        </ul>
                    </div>

                    <div class="col_one_third widget_links topmargin nobottommargin col_last">
                        <ul>
                            <li><a href="{{ route('listArticles') }}">文章管理</a></li>
                            <li><a href="{{ route('myItems') }}">栏目管理</a></li>
                            <li><a href="{{ route('myComments') }}">评论管理</a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
