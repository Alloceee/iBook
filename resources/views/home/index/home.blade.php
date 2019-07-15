<!-- Posts
                   ============================================= -->
<div id="posts" class="post-timeline clearfix">
    <div class="timeline-border"></div>
    @if( count($datas)==0)
        <h2>暂无上传文章</h2>
    @else
        @foreach( $datas as $data )
            <div class="entry clearfix">
                <div class="entry-timeline">
                    {{ substr($data->created_at,8,2) }}
                    <span>{{ substr($data->created_at,5,2) }}</span>
                    <div class="timeline-divider"></div>
                </div>
                <div class="entry-image">
                </div>
                <div class="entry-title">
                    <h2><a href="{{ route('article',['id'=>$data->aid]) }}"
                           target="_blank">{{ $data->title }}</a>
                    </h2>
                </div>
                <ul class="entry-meta clearfix">
                    <li><a href="{{ route('user',['username'=>$data->author]) }}" target="_blank">
                            <i class="icon-user"></i>{{ $data->author }}</a></li>
                    <li><a href="{{ route('article',['id'=>$data->aid]) }}#comments" target="_blank">
                            <i class="icon-comments"></i>
                            {{ $data->commentCount }}</a></li>
                    <li><a href="#"><i class="icon-heart"></i>
                            {{ $data->collectionCount }}</a></li>
                    <li><a href="#"><i class="icon-thumbs-up"></i>
                            {{ $data->likeCount }}</a></li>
                </ul>
                <div class="entry-content">
                    <p>{{ $data->brief }}</p>
                    <a href="{{ route('article',['id'=>$data->aid]) }}" target="_blank"
                       class="more-link">Read More</a>
                </div>
            </div>
        @endforeach
    @endif

</div><!-- #posts end -->
@if( count($datas)>=5 )
    <div class="panel panel-default center">
        <div class="panel-body">
            <span id="add" style="cursor: pointer;">点击加载更多</span>
        </div>
    </div>
@endif