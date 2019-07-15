@extends('home.masters.user')

@section('title', 'iBook - 我关注的人')

@section('content')
    <section id="page-title">
        <div class="container clearfix">
            <h1>我关注的人</h1>
        </div>
    </section><!-- #page-title end -->
    <!-- Content
       ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <div class="card ">
                            <div class="card-body">
                                @if( $users->count() )
                                    <ol class="commentlist clearfix">
                                        @foreach ( $users as $user )
                                            <li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1"
                                                id="li-comment-2">

                                                <div id="comment-2" class="comment-wrap clearfix">
                                                    <div class="comment-meta">
                                                        <div class="comment-author vcard">
                                                <span class="comment-avatar clearfix">
                                                <img alt='{{ $user->account }}'
                                                     src='{{ URL::asset($user->icon) }}'
                                                     class='avatar avatar-60 photo' height='60' width='60'/></span>
                                                        </div>
                                                    </div>
                                                    <div class="comment-content clearfix">
                                                        <div class="comment-author">
                                                            <a href='{{ route('user',['username'=>$user->account]) }}'
                                                               rel='external nofollow' class='url' id="account">
                                                                {{ $user->account }}</a>
                                                            <span>
                                                            <a href="#"
                                                               title="{{ $user->created_at }}">{{ $user->created_at }}
                                                            </a>
                                                            </span>
                                                        </div>
                                                        <p></p>
                                                        <a class='comment-reply-link' href='' title="取消关注" id="d_focus_{{ $user->fid }}">
                                                            <i class="icon-line-circle-cross"></i></a>
                                                        <script type="text/javascript">
                                                            $('#d_focus_{{ $user->fid }}').on('click', function () {
                                                                alert('{{ $user->account }}');
                                                                $.ajax({
                                                                    data: {
                                                                        account: '{{ $user->account }}',
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
                                                </div>
                                            </li>
                                        @endforeach
                                    </ol>
                                @else
                                    <div class="empty-block">亲，你还没有关注别人哦！</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop