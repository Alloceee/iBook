@foreach( $comments as $comment)
    <li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1"
        id="li-comment-2">

        <div id="comment-2" class="comment-wrap clearfix">

            <div class="comment-meta">

                <div class="comment-author vcard">

                     <span class="comment-avatar clearfix">
                         <img alt='{{ $comment->CUsername }}'
                              src='{{ URL::asset($comment->icon) }}'
                              class='avatar avatar-60 photo' height='60' width='60'/></span>

                </div>

            </div>

            <div class="comment-content clearfix">

                <div class="comment-author">
                    <a href='{{ route('user',['username'=>$comment->CUsername]) }}'
                       rel='external nofollow' class='url'>
                        {{ $comment->CUsername }}</a>
                    <span>
                                                    <a href="#"
                                                       title="Permalink to this comment">{{ $comment->CTime }}</a>
                                                </span>
                </div>
                <p>{{ $comment->CContent }}</p>

                <div style="float: right;cursor: pointer;">
                    <span class="icon-heart" id="{{ $comment->CID }}">
                        {{ $comment->LikeCount }}</span>
                </div>
            </div>
            <div class="clear"></div>
            <script type="text/javascript">
                var commLike_{{ $comment->CID }} = 0;
                $("#{{ $comment->CID }}").on('click', function () {
                    if (commLike_{{ $comment->CID }} <= 0) {
                        $.ajax({
                            data: {
                                id: '{{ $comment->CID }}',
                                _token: '{{ csrf_token() }}'
                            },
                            method: 'POST',
                            dataType: 'json',
                            url: "{{ route('commLike') }}",
                            success: function (msg) {
                                if (msg.code == 0) {
                                    var count = parseInt($('#{{ $comment->CID }}').text()) + 1;
                                    $('#{{ $comment->CID }}').text(count);
                                    commLike_{{ $comment->CID }} = commLike_{{ $comment->CID }} + 1;
                                }
                            },
                            error: function (xhr) {
                                if (xhr.status === 401) {
                                    layer.msg("请登录后再点赞评论");
                                } else {
                                    layer.msg("发生错误，请联系管理员解决");
                                }
                            }
                        })
                    } else {
                        layer.msg("只能点赞一次")
                    }
                });
            </script>
        </div>

    </li>
@endforeach
