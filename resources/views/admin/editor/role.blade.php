@extends('admin.masters.app')
@section('title')
    iBook - 修改角色
@endsection
@section('content')

    <section id="map-overlay">

        <div class="container clearfix">

            <!-- Contact Form Overlay
            ============================================= -->
            <div id="contact-form-overlay" class="clearfix">

                <div class="fancy-title title-dotted-border">
                    <h3>修改角色</h3>
                </div>

                <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                <!-- Contact Form
                ============================================= -->
                <form class="nobottommargin" id="template-contactform"
                      name="template-contactform" action="{{ route('role.update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col_half">
                        <label for="role_name">角色名 <small>*</small></label>
                        <input type="text" id="role_name" value="{{ $roles->role_name }}" name="role_name" class="sm-form-control" required/>
                    </div>
                    <div class="col_half">
                        <label for="role_status">状态<small>*</small></label>
                        <select id="role_status" name="role_status" class="sm-form-control">
                            <option value="激活">激活</option>
                            <option value="禁用">禁用</option>
                        </select>
                    </div>
                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="role_power">详细描述</label>
                        <textarea class="required sm-form-control" id="role_power"
                                  name="role_power" rows="6" cols="30">{{ $roles->role_power }}</textarea>
                    </div>
                    <div class="col_full">
                        <input type="hidden" value="{{ $roles->role_id }}" name="id">
                        <button class="button button-3d nomargin" type="submit" name="role-insert-submit" value="submit">修改</button>
                    </div>

                </form>

            </div><!-- Contact Form Overlay End -->

        </div>

    </section><!-- Contact Form & Map Overlay Section End -->

@endsection
