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
                    <h3>添加管理员</h3>
                </div>

                <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                <!-- Contact Form
                ============================================= -->
                <form class="nobottommargin" id="template-contactform" name="template-contactform" action="{{ route('adminAdd') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col_half">
                        <label for="username">账号 <small>*</small></label>
                        <input type="text" id="username" name="username" class="sm-form-control" required/>
                    </div>

                    <div class="col_half">
                        <label for="password">密码 <small>*</small></label>
                        <input type="password" id="password" name="password" class="sm-form-control" required/>
                    </div>
                    <div class="col_half col_last">
                        <label for="role_id">角色<small>*</small></label>
                        <select id="role_id" name="role_id" class="sm-form-control" required>
                            <option value="">-- Select One --</option>
                            @foreach( $roles as $role)
                            <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col_full">
                        <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">添加</button>
                    </div>

                </form>

            </div><!-- Contact Form Overlay End -->

        </div>

    </section><!-- Contact Form & Map Overlay Section End -->

@endsection
