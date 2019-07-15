@extends('home.masters.user')
@section('title')
    iBook - 收藏文章
@endsection
@section('content')
    <section id="page-title">
        <div class="container clearfix">
            <h1>我收藏的文章</h1>
            <ol class="breadcrumb">
                <li class="active">全部</li>
                <li>小说</li>
                <li>随笔</li>
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
                    @foreach( $articles as $article)
                        <div class="entry clearfix">
                            <div class="image">
                                <a href="{{ URL::asset($article->cover) }}" data-lightbox="image">
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
                                <li><a href="{{ route('article',['id'=>$article->aid]) }}#comment"><i class="icon-comments"></i>
                                        {{ $article->commentCount }}</a></li>
                                <li><a href="{{ route('article',['id'=>$article->aid]) }}#likeCount"><i class="icon-heart"></i>
                                        {{ $article->collectionCount }}</a></li>
                                <li><a href="{{ route('article',['id'=>$article->aid]) }}#collectionCount"><i class="icon-thumbs-up"></i>
                                        {{ $article->likeCount }}</a></li>
                            </ul>
                            <div class="entry-content">
                                <p style="height: 55px;overflow: hidden">{{ $article->brief }}</p>
                                <a href="{{ route('article',['id'=>$article->aid]) }}" class="more-link" target="_blank">Read</a>
                                <a href="" id="collectionCount" class="more-link">Delete</a>
                            </div>
                        </div>
                        <script type="text/javascript">
                            jQuery(document).ready(function () {
                                $('#collectionCount').on('click', function () {
                                    $.ajax({
                                        data: {
                                            cid: '{{ $article->cid }}',
                                            id: '{{ $article->aid }}',
                                            _token: '{{ csrf_token() }}'
                                        },
                                        method: 'POST',
                                        dataType: 'json',
                                        url: "{{ route('dColl') }}",
                                        success: function (msg) {
                                            layer.msg(msg.msg);
                                            window.location.reload();
                                        },
                                        error: function (xhr) {
                                            if (xhr.status === 401) {
                                                layer.msg("请登录后再取消收藏");
                                            } else {
                                                layer.msg("发生错误，请联系管理员解决");
                                            }
                                        }
                                    })
                                });
                            })
                        </script>
                    @endforeach
                </div><!-- #posts end -->
                {{ $articles->links() }}
            </div>

        </div>

    </section><!-- #content end -->

@endsection
