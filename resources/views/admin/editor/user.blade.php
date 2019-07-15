@extends('admin.masters.app')
@section('title')
    iBook - 用户管理
@endsection
@section('content')

    <section id="map-overlay">

        <div class="container clearfix">

            <!-- Contact Form Overlay
            ============================================= -->
            <div id="contact-form-overlay" class="clearfix">

                <div class="fancy-title title-dotted-border">
                    <h3>修改用户</h3>
                </div>

                <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>
            @foreach( $user as $value)
                <!-- Contact Form
                ============================================= -->
                    <form class="nobottommargin" id="type-insert" name="type-insert" action="{{ route('user.update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col_half">
                            <label for="type-insert-name">状态<small>*</small></label>
                            <select id="template-contactform-service" name="status" class="sm-form-control">
                                <option value="激活">激活</option>
                                <option value="禁用">禁用</option>
                            </select>
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
