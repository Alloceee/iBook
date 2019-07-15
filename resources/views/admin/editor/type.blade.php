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
                    <h3>修改类型</h3>
                </div>

                <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>
                @foreach( $type as $value)
                <!-- Contact Form
                ============================================= -->
                <form class="nobottommargin" action="{{ route('type.update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col_half">
                        <label for="typename">类型名 <small>*</small></label>
                        <input type="text" id="typename" name="typename" class="sm-form-control"
                               value="{{ $value->typename }}" required/>
                    </div>
                    <div class="col_half">
                        <label for="count">文章数 <small>*</small></label>
                        <input type="text" id="count" name="count"
                               value="{{ $value->count }}" class="sm-form-control" required/>
                    </div>
                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="detailed">详细描述</label>
                        <textarea class="required sm-form-control" id="detailed"
                                  name="detailed" rows="6" cols="30">{{ $value->detailed }}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{ $value->id }}">
                    <div class="col_full">
                        <button class="button button-3d nomargin" type="submit" name="type-insert-submit" value="submit">修改</button>
                    </div>

                </form>
                    @endforeach

            </div><!-- Contact Form Overlay End -->

        </div>

    </section><!-- Contact Form & Map Overlay Section End -->

@endsection
