@extends('home.masters.user')
@section('title')
    iBook - Search
@endsection
@section('content')
    <!-- Page Title
        ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>搜索结果</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Search</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                @if( count($res)==0 )
                    <h2>暂无搜索结果</h2>
                @else
                    @foreach( $res as $re)
                        <div class="col_full clearfix">
                            <div class="entry-title title-dotted-border">
                                <h2><a href="{{ route('article',['id'=>$re->aid]) }}" target="_blank">
                                        {{ $re->title }}</a></h2>
                                <ul class="entry-meta clearfix">
                                    <li><i class="icon-calendar3"></i> {{ $re->created_at }}</li>
                                    <li><a href="{{ route('user',['username'=>$re->author]) }}" target="_blank"><i
                                                    class="icon-user"></i>
                                            {{ $re->author }}</a></li>
                                    <li><a href="{{ route('article',['id'=>$re->aid]) }}#comment"><i class="icon-comments"></i>
                                            {{ $re->commentCount }}</a></li>
                                    <li><a href="{{ route('article',['id'=>$re->aid]) }}"><i class="icon-heart"></i>
                                            {{ $re->collectionCount }}</a></li>
                                    <li><a href="{{ route('article',['id'=>$re->aid]) }}"><i class="icon-thumbs-up"></i>
                                            {{ $re->likeCount }}</a></li>
                                </ul>
                            </div>
                            <p style="font-size: 14px; line-height: 22px;">
                                <img src="{{ URL::asset($re->cover) }}" height="170px" width="125px"
                                     class="alignright notopmargin" alt="{{ $re->title }}"
                                     title="{{ $re->title }}" data-animate="fadeInRight"/> {{ $re->brief }}</p>
                            <div class="tagcloud clearfix">
                                @foreach( explode(',',$re->tags) as $tag )
                                    <a href="{{ url('/search?q='.$tag) }}">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </section><!-- #content end -->
@endsection

