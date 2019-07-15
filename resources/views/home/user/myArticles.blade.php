@extends('home.masters.user')
@section('title')
    iBook - 我的文章
@endsection
@section('content')
    <!-- Page Title
    ============================================= -->
    <section id="page-title">
        <div class="container clearfix">
            <h1>我的文章</h1>
            <ol class="breadcrumb">
                <li class="active"><a href="{{ route('listArticles') }}">全部</a></li>
                @foreach( $types as $type)
                    <li>
                        <a href="{{ route('getTypeArticles',['type'=>$type->typename]) }}">
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
                    @if( count($articles) )
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
                                        <h2 style="height: 50px;overflow: hidden">
                                            <a href="{{ route('article',['id'=>$article->aid]) }}" target="_blank">
                                                {{ $article->title }}</a></h2>
                                    </center>
                                </div>
                                <ul class="entry-meta clearfix" style="height: 80px;">
                                    <li><i class="icon-calendar3"></i> {{ $article->created_at }}</li>
                                    <li><a href="{{ route('article',['id'=>$article->aid]) }}#comment"><i
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
                                       target="_blank">Read</a>
                                    <a href="{{ route('editorShow',['id'=>$article->aid]) }}" class="more-link"
                                       target="_blank">Editor</a>
                                    <a href="{{ route('delete',['id'=>$article->aid]) }}"
                                       class="more-link">Delete</a>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <h3>
                            该分类下还未上传文章
                        </h3>
                    @endif
                </div><!-- #posts end -->
                {{ $articles->links() }}
            </div>

        </div>

    </section><!-- #content end -->
@endsection
