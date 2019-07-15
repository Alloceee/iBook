@extends('home.masters.user')
@section('title')
    iBook - 所有文章
@endsection
@section('content')
    <!-- Page Title
    ============================================= -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>所有文章</h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{ route('allArticle') }}">全部</a></li>
                @foreach( $types as $type)
                    <li>
                        <a href="{{ route('getArticle',['type'=>$type->typename]) }}">
                            {{ $type->typename }}</a></li>
                @endforeach
            </ol>
        </div>
    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Posts
                ============================================= -->
                <div id="posts" class="post-grid clearfix">
                    @if( count($articles))
                    @foreach( $articles as $article)
                        <div class="entry clearfix">
                            <div class="image">
                                <a href="{{ route('article',['id'=>$article->aid]) }}" target="_blank">
                                    <img class="image_fade img_book"
                                         src="{{ URL::asset($article->cover) }}"
                                         alt="{{ $article->title }}"></a>
                            </div>
                            <div class="entry-title">
                                <center>
                                    <h2 style="height: 50px;overflow: hidden"><a
                                                href="{{ route('article',['id'=>$article->aid]) }}" target="_blank">
                                            {{ $article->title }}</a></h2>
                                </center>
                            </div>
                            <ul class="entry-meta clearfix" style="height: 80px;">
                                <li><i class="icon-calendar3"></i> {{ $article->created_at }}</li>
                                <li><a href="{{ route('user',['username'=>$article->author]) }}" target="_blank"><i
                                                class="icon-user"></i>
                                        {{ $article->author }}</a></li>
                                <li><a href="{{ route('article',['id'=>$article->aid]) }}#comment" target="_blank"><i
                                                class="icon-comments"></i>
                                        {{ $article->commentCount }}</a></li>
                                <li><a href="{{ route('article',['id'=>$article->aid]) }}#likeCount"><i
                                                class="icon-heart"></i>
                                        {{ $article->collectionCount }}</a></li>
                                <li><a href="{{ route('article',['id'=>$article->aid]) }}#collectionCount"><i
                                                class="icon-thumbs-up"></i>
                                        {{ $article->likeCount }}</a></li>
                            </ul>
                            <div class="entry-content">
                                <p style="height: 55px;overflow: hidden">{{ $article->brief }}</p>
                                <a href="{{ route('article',['id'=>$article->aid]) }}" class="more-link"
                                   target="_blank">Read
                                    More</a>
                            </div>
                        </div>

                    @endforeach
                        @else
                        <h4>该分类下暂未上传文章</h4>
                    @endif
                </div><!-- #posts end -->
                {{ $articles->links() }}
            </div>
            <div class="section footer-stick">

                <h3 class="center">书籍推荐</h3>

                <div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel">
                    @foreach( $hot_art as $article)
                        <div class="oc-item">
                            <a href="{{ route('article',['id'=>$article->aid]) }}" target="_blank"
                               title="{{ $article->title }}">
                                <img class="image_fade img_book" src="{{ URL::asset($article->cover) }}"
                                     alt="{{ $article->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>

                <script type="text/javascript">

                    jQuery(document).ready(function ($) {
                        var ocClientsFull = $("#oc-clients-full");
                        ocClientsFull.owlCarousel({
                            items: 5,
                            margin: 30,
                            loop: true,
                            nav: true,
                            navText: ['<i class="icon-angle-left"></i>', '<i class="icon-angle-right"></i>'],
                            autoplay: true,
                            autoplayHoverPause: false,
                            dots: false,
                            navRewind: false,
                            responsive: {
                                0: {items: 2},
                                480: {items: 3},
                                768: {items: 4},
                                992: {items: 5},
                                1200: {items: 7},
                                1400: {items: 8}
                            }
                        });

                    });

                </script>

            </div>
        </div>

    </section><!-- #content end -->
@endsection
