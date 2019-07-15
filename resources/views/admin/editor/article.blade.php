@extends('admin.masters.app')
@section('title')
    iBook - 添加管理员
@endsection
@section('content')

    <section id="map-overlay">

        <div class="container clearfix">

            <!-- Contact Form Overlay
            ============================================= -->
            <div id="contact-form-overlay" class="clearfix">

                <div class="fancy-title title-dotted-border">
                    <h3>修改文章信息</h3>
                </div>

                <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>
                @foreach( $article as $value)
                <!-- Contact Form
                ============================================= -->
                <form class="nobottommargin" action="{{ route('article.update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col_half">
                        <label for="commentCount">评论数 <small>*</small></label>
                        <input type="text" id="commentCount" name="commentCount" class="sm-form-control"
                               value="{{ $value->commentCount }}" required/>
                    </div>
                    <div class="col_half col_last">
                        <label for="likeCount">点赞数 <small>*</small></label>
                        <input type="text" id="likeCountt" name="likeCount"
                               value="{{ $value->likeCount }}" class="sm-form-control" required/>
                    </div>
                    <div class="col_half">
                        <label for="collectionCountt">收藏数 <small>*</small></label>
                        <input type="text" id="collectionCount" name="collectionCount"
                               value="{{ $value->collectionCount }}" class="sm-form-control" required/>
                    </div>
                    <input type="hidden" name="aid" value="{{ $value->aid }}">
                    <div class="col_full">
                        <button class="button button-3d nomargin" type="submit" name="type-insert-submit" value="submit">修改</button>
                    </div>

                </form>
                    @endforeach

            </div><!-- Contact Form Overlay End -->

        </div>

    </section><!-- Contact Form & Map Overlay Section End -->

@endsection
