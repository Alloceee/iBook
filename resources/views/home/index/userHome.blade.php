@extends('home.masters.user')
@section('title')
    {{ $username }}的空间
@endsection
@section('content')
    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>个人中心</h1>
            <ol class="breadcrumb">
                <li>个人中心</li>

            </ol>
        </div>

    </section><!-- #page-title end -->
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var count = 1;

            $.ajax({
                data: {
                    username:'{{ $user->username }}',
                    count: count,
                    _token: '{{ csrf_token() }}'
                },
                method: 'GET',
                dataType: 'text',
                url: "{{ route('getUserArticle') }}",
                success: function (msg) {
                    $('.postcontent').html(msg);
                },
            });

            $('#add').on('click', function () {
                count = count + 1;
                $.ajax({
                    data: {
                        username:'{{ $user->username }}',
                        count: count,
                        _token: '{{ csrf_token() }}'
                    },
                    method: 'GET',
                    dataType: 'text',
                    url: "{{ route('getUserArticle') }}",
                    success: function (msg) {
                        $('.postcontent').html(msg);
                    },
                });
            });
        })
    </script>
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin col_last clearfix">

                </div><!-- .postcontent end -->

                <div class="sidebar nobottommargin clearfix">
                    <div class="sidebar-widgets-wrap">
                        <div class="widget widget-twitter-feed clearfix">

                            <!-- Post Author Info
                            ============================================= -->
                            <div class="author-image">
                                <span class="comment-avatar clearfix">
                                    <img alt='{{ $user->username }}' src="{{ URL::asset($user->icon) }}"
                                         class='avatar avatar-60 photo avatar-default' height='60'
                                         width='60'/>
                                </span>

                            </div>
                            @if( session('username')!= $user->username )
                                @if( $fans==0 )
                                    <a href="" title="关注" id="focus"
                                       class="button button-rounded button-3d button-leaf button-light">
                                        <i class="icon-plus"></i>关注</a>
                                @else
                                    <a href="" title="取消关注" id="d_focus"
                                       class="button button-rounded button-3d btn btn-success button-light">
                                        <i class="icon-minus"></i>已关注</a>
                                @endif
                            @endif
                            {{--关注--}}
                            <script type="text/javascript">
                                $('#focus').on('click', function () {
                                    $.ajax({
                                        data: {
                                            account: '{{ $user->username }}',
                                            _token: '{{ csrf_token() }}'
                                        },
                                        method: "POST",
                                        dataType: 'json',
                                        url: "{{ route('focus') }}",
                                        success: function (msg) {
                                            layer.msg(msg.msg);
                                            window.location.reload();
                                        },
                                        error: function () {
                                            layer.msg("发生错误。请及时联系管理员");
                                        }
                                    })
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
                                            layer.msg(msg.msg);
                                            window.location.reload();
                                        },
                                        error: function () {
                                            layer.msg("发生错误。请及时联系管理员");
                                        }
                                    })
                                })
                            </script>
                        </div>

                        <div class="widget clearfix">
                            <p>{{ $user->profile }}</p>
                            @if( session('username')== $user->username )
                                <a href="{{ route('updateProfile') }}" target="_blank"
                                   class="button button-rounded button-3d button-white button-light tright">
                                    <i class="icon-pencil"></i>修改
                                </a>
                            @endif
                        </div>
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

                                            @foreach( $hot_art as $value)
                                                <div class="spost clearfix">
                                                    <div class="entry-image">
                                                        <a href="{{ route('article',['id'=>$value->aid]) }}"
                                                           class="nobg">
                                                            <img class="img-circle"
                                                                 src="{{ URL::asset($value->cover) }}"
                                                                 alt="{{ $value->title }}"></a>
                                                    </div>
                                                    <div class="entry-c">
                                                        <div class="entry-title">
                                                            <h4>
                                                                <a href="{{ route('article',['id'=>$value->aid]) }}">{{ $value->title }}</a>
                                                            </h4>
                                                        </div>
                                                        <ul class="entry-meta">
                                                            <li>
                                                                <i class="icon-comments-alt"></i>{{ $value->commentCount }}
                                                            </li>
                                                        </ul>
                                                        <div class="entry-content">
                                                            <p style="height: 150px;overflow: hidden">{{ $value->brief }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-content clearfix" id="tabs-2">
                                        <div id="recent-post-list-sidebar">
                                            @foreach( $new_art as $value)
                                                <div class="spost clearfix">
                                                    <div class="entry-image">
                                                        <a href="{{ route('article',['id'=>$value->aid]) }}"
                                                           class="nobg">
                                                            <img class="img-circle"
                                                                 src="{{ URL::asset($value->cover) }}"
                                                                 alt="{{ $value->title }}"></a>
                                                    </div>
                                                    <div class="entry-c">
                                                        <div class="entry-title">
                                                            <h4>
                                                                <a href="{{ route('article',['id'=>$value->aid]) }}">{{ $value->title }}</a>
                                                            </h4>
                                                        </div>
                                                        <ul class="entry-meta">
                                                            <li>
                                                                <i class="icon-comments-alt"></i>{{ $value->commentCount }}
                                                            </li>
                                                        </ul>
                                                        <div class="entry-content">
                                                            <p style="height: 150px;overflow: hidden">{{ $value->brief }}</p>
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
@endsection
