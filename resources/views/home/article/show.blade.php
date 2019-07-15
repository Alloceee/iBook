@extends('home.masters.user')
@foreach( $articles as $article)
@section('title')
    {{ $article->title }}
@endsection

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix">

                    <div class="single-post nobottommargin">

                        <!-- Single Post
                        ============================================= -->
                        <div class="entry clearfix">
                            <!-- Entry Title
                            ============================================= -->
                            <div class="entry-title">
                                <h2>{{ $article->title }}</h2>
                            </div><!-- .entry-title end -->

                            <!-- Entry Meta
                            ============================================= -->
                            <ul class="entry-meta clearfix">
                                <li><i class="icon-calendar3"></i>{{ $article->created_at  }}</li>
                                <li><a href="{{ route('user',['username'=>$article->author]) }}" target="_blank"
                                       id="author">
                                        <i class="icon-user"></i>{{ $article->author }}</a></li>
                                <li><a href="#comments">
                                        <span class="icon-comments">{{ $article->commentCount }} </span></a></li>
                                <li><a href="#" class="collClick"><span class="icon-heart" id="coll1">
                                            {{ $article->collectionCount }}</span>
                                    </a></li>
                                <li><a href="#" class="likeClick"><span class="icon-thumbs-up" id="like1">
                                            {{ $article->likeCount }} </span>
                                    </a></li>
                            </ul><!-- .entry-meta end -->

                            <!-- Entry Content
                            ============================================= -->
                            <div class="entry-content notopmargin">

                                <!-- Entry Image
                                ============================================= -->
                                <p>{{ readfile(URL::asset($article->content)) }}</p>
                                <!-- Post Single - Content End -->

                                <!-- Tag Cloud
                                ============================================= -->
                                <div class="tagcloud clearfix bottommargin">
                                    <a href="#"><i class="icon-tags"></i>标签</a>
                                    @foreach( explode(',',$article->tags) as $value )
                                        <a href="{{ url('/search?q='.$value) }}" target="_blank">
                                            {{ $value }}</a>
                                    @endforeach
                                    <ol id="grid" class="entry-meta clearfix grid" style="float: right">
                                        <li class="grid__item">
                                            <button class="icobutton icobutton--thumbs-up likeClick"
                                                    id="2_likeCount"><span
                                                        class="icon icon-thumbs-up"
                                                        id="like2">{{ $article->likeCount }}</span>
                                            </button>
                                        </li>
                                        <li class="grid__item">
                                            <button class="icobutton icobutton--heart collClick" id="2_collectionCount"><span
                                                        class="icon icon-heart"
                                                        id="coll2">{{ $article->collectionCount }}</span>
                                            </button>
                                        </li>
                                    </ol>
                                </div><!-- .tagcloud end -->

                                <!-- Post Single - Share
                                ============================================= -->
                                <div class="si-share noborder clearfix">
                                    <span>分享文章:</span>
                                    <div>
                                        <a title="分享到qq"
                                           onclick="javascript:bShare.share(event,'qqim',0);return false;"
                                           class="social-icon si-borderless si-facebook">
                                            <i class="am-icon-qq"></i>
                                            <i class="am-icon-qq"></i>
                                        </a>
                                        <a title="分享到qq空间"
                                           onclick="javascript:bShare.share(event,'qzone',0);return false;"
                                           class="social-icon si-borderless si-facebook">
                                            <i class="am-icon-user-plus"></i>
                                            <i class="am-icon-user-plus"></i>
                                        </a>
                                        <a title="分享到新浪微博"
                                           onclick="javascript:bShare.share(event,'sinaminiblog',0);return false;"
                                           class="social-icon si-borderless si-facebook">
                                            <i class="am-icon-weibo"></i>
                                            <i class="am-icon-weibo"></i>
                                        </a>
                                        <a title="分享到微信"
                                           onclick="javascript:bShare.share(event,'weixin',0);return false;"
                                           class="social-icon si-borderless si-facebook">
                                            <i class="am-icon-wechat"></i>
                                            <i class="am-icon-wechat"></i>
                                        </a>
                                        <a title="更多平台" onclick="javascript:bShare.more(event);return false;"
                                           class="social-icon si-borderless si-facebook"/>
                                        <i class="icon-plus"></i>
                                        <i class="icon-plus"></i>
                                        </a>
                                    </div>
                                    <script type="text/javascript" charset="utf-8"
                                            src="http://static.bshare.cn/b/button.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script>
                                    <a class="bshareDiv" onclick="javascript:return false;"></a>
                                    <script type="text/javascript" charset="utf-8"
                                            src="http://static.bshare.cn/b/bshareC0.js"></script>
                                </div>

                            </div><!-- Post Single - Share End -->

                        </div>
                    </div><!-- .entry end -->

                    <h4>相关文章:</h4>

                    <div class="row">
                        @foreach( $links as $link)
                            <div class="col-sm-6">
                                <div class="mpost clearfix">
                                    <div class="image">
                                        <a href="{{ route('article',['id'=>$link->aid]) }}" target="_blank">
                                            <img class="image_fade img_book"
                                                 src="{{ URL::asset($link->cover) }}"
                                                 alt="{{ $link->title }}"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="{{ route('article',['id'=>$link->aid]) }}">
                                                    {{ $link->title }}</a></h4>
                                        </div>
                                        <ul class="entry-meta clearfix">
                                            <li><i class="icon-calendar3"></i>{{ $link->created_at }}</li>
                                            <li><a href="{{ route('article',['id'=>$link->aid]) }}#comment">
                                                    <i class="icon-comments"></i>{{ $link->commentCount }}</a></li>
                                        </ul>
                                        <div class="entry-content" style="height: 50px;overflow: hidden">
                                            {{ $link->brief }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!-- Comments
               ============================================= -->
                    <div id="comments" class="clearfix">
                        <h3 id="comments-title">评论</h3>
                        <!-- Comment Form
                        ============================================= -->
                        <div id="respond" class="clearfix">
                            @if(empty(session('username')))
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        请<a href="{{ url('login') }}">登录</a>后再发表评论，没有账号
                                        <a href="{{ url('login') }}">注册</a>一个
                                    </div>
                                </div>
                            @else
                                <form class="clearfix" id="commentform">
                                    <div class="col_full">
                                        <label for="comment">评论</label>
                                        <textarea id="comment" cols="58" rows="7" tabindex="4"
                                                  class="sm-form-control" required></textarea>
                                    </div>

                                    <div class="col_full nobottommargin">
                                        <button type="button" id="submit-button" tabindex="5"
                                                value="Submit" class="button button-3d nomargin">评论
                                        </button>
                                    </div>
                                </form>
                            @endif
                            <hr>
                            <script type="text/javascript">
                                jQuery(document).ready(function () {
                                    var like = 0;
                                    var count = 1;
                                    $.ajax({
                                        data: {
                                            id: '{{ $article->aid }}',
                                            count: count,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        method: 'GET',
                                        dataType: 'text',
                                        url: "{{ route('getComments') }}",
                                        success: function (msg) {
                                            $('.commentlist').html(msg);
                                        },
                                    });
                                    $('#add').on('click', function () {
                                        count = count + 1;
                                        $.ajax({
                                            data: {
                                                id: '{{ $article->aid }}',
                                                count: count,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            method: 'GET',
                                            dataType: 'text',
                                            url: "{{ route('getComments') }}",
                                            success: function (msg) {
                                                $('.commentlist').html(msg);
                                            },
                                        });
                                    });

                                    $('#submit-button').on('click', function () {
                                        var comment = $('#comment').val();
                                        if (comment == "") {
                                            layer.msg('请填写评论内容');
                                        } else {
                                            $.ajax({
                                                data: {
                                                    id: '{{ $article->aid }}',
                                                    comment: comment,
                                                    author: '{{ $article->author }}',
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                method: 'POST',
                                                dataType: 'text',
                                                url: "{{ route('comment') }}",
                                                success: function (msg) {
                                                    $('#comment').val('');
                                                    $('.commentlist').html(msg);
                                                },
                                            })
                                        }

                                    });
                                    $('.likeClick').on('click', function () {
                                        if (like <= 0) {
                                            $.ajax({
                                                data: {
                                                    id: '{{ $article->aid }}',
                                                    author: $('#author').text(),
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                method: 'POST',
                                                dataType: 'json',
                                                url: "{{ route('like') }}",
                                                success: function (msg) {
                                                    if (msg.code == "0") {
                                                        var count = parseInt($('#like1').text()) + 1;
                                                        $('#like1').text(count);
                                                        $('#like2').text(count);
                                                        like = like + 1;
                                                    }
                                                },
                                                error: function (xhr) {
                                                    if (xhr.status === 401) {
                                                        layer.msg("请登录后再点赞");
                                                    } else {
                                                        layer.msg("发生错误，请联系管理员解决");
                                                    }
                                                }
                                            })
                                        } else {
                                            layer.msg("只能点赞1次")
                                        }
                                    });
                                    $('.collClick').on('click', function () {
                                        $.ajax({
                                            data: {
                                                id: '{{ $article->aid }}',
                                                author: $('#author').text(),
                                                _token: '{{ csrf_token() }}'
                                            },
                                            method: 'POST',
                                            dataType: 'json',
                                            url: "{{ route('coll') }}",
                                            success: function (msg) {
                                                if (msg.code == "0") {
                                                    var count = parseInt($('#coll1').text()) + 1;
                                                    $('#coll1').text(count);
                                                    $('#coll2').text(count);
                                                } else {
                                                    layer.msg("该文章已收藏");
                                                }
                                            },
                                            error: function (xhr) {
                                                if (xhr.status === 401) {
                                                    layer.msg("请登录后再收藏");
                                                } else {
                                                    layer.msg("发生错误，请联系管理员解决");
                                                }
                                            }
                                        })
                                    });

                                })

                            </script>

                        </div>

                        <div class="clear"></div>
                        <!-- #respond end -->
                        <!-- Comments List
                        ============================================= -->
                        <ol class="commentlist clearfix">

                        </ol><!-- .commentlist end -->
                        <div class="panel panel-default center">
                            <div class="panel-body">
                                <span id="add" style="cursor: pointer;">点击加载更多</span>
                            </div>
                        </div>
                    </div>

                </div><!-- .postcontent end -->
                <!-- Sidebar
                                                      ============================================= -->
                <div class="sidebar nobottommargin col_last clearfix">
                    <div class="sidebar-widgets-wrap">
                        @foreach( $users as $user)
                            <div class="widget widget-twitter-feed clearfix">
                                <!-- Post Author Info
                            ============================================= -->
                                <div class="author-image">
                                    <a href="{{ route('user',['username'=>$user->username]) }}" target="_blank">
                                       <span class="comment-avatar clearfix">
                               <img alt='{{ $user->username }}'
                                    src='{{ URL::asset($user->icon) }}'
                                    class='avatar avatar-60 photo avatar-default' height='60'
                                    width='60'/></span>

                                    </a>

                                </div>
                                @if( $user->username != session('username'))
                                    @if( $fans==0 )
                                        <a href="" title="关注" id="focus"
                                           class="button button-rounded button-3d button-leaf button-light">
                                            <i class="icon-plus"></i>关注</a>
                                    @else
                                        <a href="" title="取消关注" id="d_focus"
                                           class="button button-rounded button-3d btn btn-success button-light">
                                            <i class="icon-minus"></i>已关注</a>
                                    @endif
                                    <script type="text/javascript">
                                        $('#focus').on('click', function () {
                                            @if( session('username'))
                                            $.ajax({
                                                data: {
                                                    account: '{{ $user->username }}',
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                method: "POST",
                                                dataType: 'json',
                                                url: "{{ route('focus') }}",
                                                success: function (msg) {
                                                    window.location.reload();
                                                },
                                                error: function () {
                                                    layer.msg("用户未登录");
                                                }
                                            })
                                            @else
                                            layer.msg("您还未登录")
                                            @endif

                                        });
                                        $('#d_focus').on('click', function () {
                                            $.ajax({
                                                data: {
                                                    account: '{{ $user->username }}',
                                                    _token: '{{ csrf_token() }}'
                                                },
                                                method: "POST",
                                                dataType: 'json',
                                                url: "{{ route('d_focus') }}",
                                                success: function (msg) {
                                                    window.location.reload();
                                                },
                                                error: function () {
                                                    layer.msg("用户未登录");
                                                }
                                            })
                                        })
                                    </script>
                                @endif
                                {{--关注--}}

                            </div>

                            <div class="widget clearfix">
                                <p>{{ $user->profile }}</p>
                            </div>
                        @endforeach
                        <div class="widget clearfix">

                            <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                                <ul class="tab-nav clearfix">
                                    <li><a href="#tabs-1">热门</a></li>
                                    <li><a href="#tabs-2">最新</a></li>
                                    <li><a href="#tabs-3"><i class="icon-comments-alt norightmargin"></i></a></li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tabs-1">
                                        <div id="popular-post-list-sidebar">

                                            @foreach( $hot_art as $hot_value)
                                                <div class="spost clearfix">
                                                    <div class="entry-image">
                                                        <a href="{{ route('article',['id'=>$hot_value->aid]) }}"
                                                           target="_blank"
                                                           class="nobg">
                                                            <img class="img-circle"
                                                                 src="{{ URL::asset($hot_value->cover) }}"
                                                                 alt="{{ $hot_value->title }}"></a>
                                                    </div>
                                                    <div class="entry-c">
                                                        <div class="entry-title">
                                                            <h4>
                                                                <a href="{{ route('article',['id'=>$hot_value->aid]) }}">{{ $hot_value->title }}</a>
                                                            </h4>
                                                        </div>
                                                        <ul class="entry-meta">
                                                            <li>
                                                                <i class="icon-comments-alt"></i>{{ $hot_value->commentCount }}
                                                            </li>
                                                        </ul>
                                                        <div class="entry-content">
                                                            <p style="height: 150px;overflow: hidden">{{ $hot_value->brief }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-content clearfix" id="tabs-2">
                                        <div id="recent-post-list-sidebar">
                                            @foreach( $new_art as $new_value)
                                                <div class="spost clearfix">
                                                    <div class="entry-image">
                                                        <a href="{{ route('article',['id'=>$new_value->aid]) }}"
                                                           class="nobg">
                                                            <img class="img-circle"
                                                                 src="{{ URL::asset($new_value->cover) }}"
                                                                 alt="{{ $new_value->title }}"></a>
                                                    </div>
                                                    <div class="entry-c">
                                                        <div class="entry-title">
                                                            <h4>
                                                                <a href="{{ route('article',['id'=>$new_value->aid]) }}">
                                                                    {{ $new_value->title }}</a>
                                                            </h4>
                                                        </div>
                                                        <ul class="entry-meta">
                                                            <li>
                                                                <i class="icon-comments-alt"></i>{{ $new_value->commentCount }}
                                                            </li>
                                                        </ul>
                                                        <div class="entry-content">
                                                            <p style="height: 150px;overflow: hidden">{{ $new_value->brief }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-content clearfix" id="tabs-3">
                                        <div id="recent-post-list-sidebar">
                                            @foreach( $comm as $value)
                                                <div class="spost clearfix">
                                                    <div class="entry-image">
                                                        <a href="{{ route('user',['username'=>$value->username]) }}"
                                                           class="nobg"><img class="img-circle"
                                                                             src="{{ URL::asset( $value->icon) }}"
                                                                             alt=""></a>
                                                    </div>
                                                    <div class="entry-c">
                                                        <strong>{{ $value->CUsername }}:</strong>
                                                        <p style="height: 150px;overflow: hidden">{{ $value->CContent }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="widget clearfix">

                            <h4>所有标签文章</h4>
                            <div class="tagcloud">
                                @foreach( $tags as $tag)
                                    <a href="{{ url('/search?q='.$tag) }}" target="_blank">
                                        {{ $tag }}</a>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div><!-- .sidebar end -->
            </div>

        </div>

    </section><!-- #content end -->
@stop
@endforeach

