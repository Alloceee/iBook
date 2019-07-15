@if( $noti_focus->count() )
    @foreach ( $noti_focus as $focus )
        <li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1"
            id="li-comment-{{ $focus->notifiable_id }}">

            <div id="comment-2" class="comment-wrap clearfix">
                <div class="comment-meta">
                    <div class="comment-author vcard">
                                                <span class="comment-avatar clearfix">
                                                <img alt='{{ $focus->user_name }}'
                                                     src='{{ URL::asset($focus->icon) }}'
                                                     class='avatar avatar-60 photo' height='60' width='60'/></span>
                    </div>
                </div>
                <div class="comment-content clearfix">
                    <div class="comment-author">
                        <a href='{{ route('user',['username'=>$focus->user_name]) }}'
                           rel='external nofollow' class='url'>
                            {{ $focus->user_name }}</a>
                        {{ $focus->reply_type }}了你
                        <span>
                                                            <a href="#"
                                                               title="{{ $focus->created_at }}">{{ $focus->created_at }}
                                                            </a>
                                                            </span>
                    </div>
                    <p></p>
                    <a class='comment-reply-link'
                       href="{{ url('read',['id'=>$focus->notifiable_id]) }}"
                       id="{{ $focus->notifiable_id }}">
                        <i class="icon-check" id="{{ $focus->notifiable_id }}"></i></a>
                    <script type="text/javascript">
                        $("#{{$focus->notifiable_id }}").on('click', function () {
                            $.ajax({
                                data: {
                                    id: '{{ $focus->notifiable_id }}',
                                    _token: '{{ csrf_token() }}'
                                },
                                method: 'POST',
                                dataType: 'json',
                                url: "{{ url('read') }}",
                                success: function (msg) {
                                    if (msg.code == 0) {
                                        $('#li-comment-{{ $focus->notifiable_id }}').remove();
                                    }
                                },
                                error: function (xhr) {
                                    layer.msg("发生错误，请联系管理员解决");
                                }
                            })
                        });
                    </script>
                </div>
            </div>
        </li>
    @endforeach
@endif
@if ( $notifications->count())
    @foreach ( $notifications as $notification )
        <li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1"
            id="li-comment-{{ $notification->notifiable_id }}">
            <div id="comment-2" class="comment-wrap clearfix">

                <div class="comment-meta">

                    <div class="comment-author vcard">

                                                <span class="comment-avatar clearfix">
                                                <img alt='{{ $notification->user_name }}'
                                                     src='{{ URL::asset($notification->icon) }}'
                                                     class='avatar avatar-60 photo' height='60' width='60'/></span>
                    </div>
                </div>
                <div class="comment-content clearfix">
                    <div class="comment-author">
                        <a href='{{ route('user',['username'=>$notification->user_name]) }}'
                           rel='external nofollow' class='url'>
                            {{ $notification->user_name }}</a>
                        {{ $notification->reply_type }}了你的文章
                        <a href="{{ route('article',['id'=>$notification->topic_id]) }}">
                            {{ $notification->title }}</a>

                        <span>
                                                            <a href="#"
                                                               title="{{ $notification->created_at }}">{{ $notification->created_at }}
                                                            </a>
                                                            </span>
                    </div>
                    <p></p>
                    <a class='comment-reply-link'
                       href="{{ url('read',['id'=>$notification->notifiable_id]) }}"
                       id="{{ $notification->notifiable_id }}">
                        <i class="icon-check"></i></a>
                    <script type="text/javascript">
                        $("#{{ $notification->notifiable_id }}").on('click', function () {
                            $.ajax({
                                data: {
                                    id: '{{ $notification->notifiable_id }}',
                                    _token: '{{ csrf_token() }}'
                                },
                                method: 'POST',
                                dataType: 'json',
                                url: "{{ url('read') }}",
                                success: function (msg) {
                                    if (msg.code == 0) {
                                        $('#li-comment-{{ $notification->notifiable_id }}').remove();
                                    }
                                },
                                error: function (xhr) {
                                    layer.msg("发生错误，请联系管理员解决");
                                }
                            })
                        });
                    </script>
                </div>
            </div>
        </li>
    @endforeach
@else
    <div class="empty-block">没有消息通知！</div>
@endif