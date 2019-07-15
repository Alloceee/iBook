@extends('home.masters.user')
@section('title')
    iBook - 忘记密码
@endsection
@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $("#login-form1").validate({
                errorClass: "error",
                errorElement: "span",
                wrapper: "label",
                errorContainer: $(".error"),
                rules: {
                    'forget-form-password1': {
                        required: true,
                        minlength: 5,
                        maxlength: 25,
                    },
                    'forget-form-phone': {
                        required: true,
                        remote: {
                            url: "{{ route('checkPhone') }}",
                            type: "POST",
                            data: {
                                phone: function () {
                                    return $('#forget-form-phone').val();
                                },
                                _token: '{{ csrf_token() }}'
                            }
                        }
                    }
                },
                messages: {
                    'forget-form-password1': {
                        required: "请输入密码",
                        minlength: "密码长度不能小于 5 个字母",
                        maxlength: "密码长度不能大于 25 个字母",
                    },
                    'forget-form-phone': {
                        required: "手机号不能为空",
                        remote: "该手机号未绑定用户"
                    }
                }
            });
            $("#login-form2").validate({
                errorClass: "error",
                errorElement: "span",
                wrapper: "label",
                errorContainer: $(".error2"),
                rules: {
                    'forget-form-password2': {
                        required: true,
                        minlength: 5,
                        maxlength: 25,
                    },
                    'forget-form-email': {
                        required: true,
                        remote: {
                            url: "{{ route('checkEmail') }}",
                            type: "POST",
                            data: {
                                email: function () {
                                    return $('#forget-form-email').val();
                                },
                                _token: '{{ csrf_token() }}'
                            }
                        }
                    }
                },
                messages: {
                    'forget-form-password2': {
                        required: "请输入密码",
                        minlength: "密码长度不能小于 5 个字母",
                        maxlength: "密码长度不能大于 25 个字母",
                    },
                    'forget-form-email': {
                        required: "邮箱不能为空",
                        email: "请输入合法的邮箱地址",
                        remote: "该邮箱未注册，请先注册或者查看是否写错"
                    }
                }
            });

            $('#phoneSend').click(function () {
                $.ajax({
                    data: {
                        phone: $('#forget-form-phone').val(),
                        _token: '{{ csrf_token() }}',
                    },
                    url: "{{ url('send') }}",
                    method: 'POST',
                    dataType: 'json',
                    success: function (msg) {
                        if (msg.return_code == "00000") {
                            layer.msg("验证码发送成功");
                        } else {
                            layer.msg("验证码发送错误，请联系管理员解决");
                        }
                    },
                    error: function () {
                        layer.msg('验证码发送错误');
                    }
                });
            });

            $('#emailSend').click(function () {
                $.ajax({
                    data: {
                        email: $('#forget-form-email').val(),
                        _token: '{{ csrf_token() }}',
                    },
                    url: "{{ route('sendCodeEmail') }}",
                    method: 'POST',
                    dataType: 'json',
                    session: function (msg) {
                        layer.msg(msg.message);
                    },
                    error: function () {
                        layer.msg('验证码发送错误');
                    }
                });
            });
        })
    </script>
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                     style="max-width: 500px;">
                    <ul class="tab-nav tab-nav2 center clearfix">
                        <li class="inline-block"><a href="#tab-phone">手机</a></li>
                        <li class="inline-block"><a href="#tab-email">邮箱</a></li>
                    </ul>
                    <div class="tab-container">
                        <div class="tab-content clearfix" id="tab-phone">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form1" name="login-form" class="nobottommargin"
                                          action="{{ url('editorPassword') }}"
                                          method="post">
                                        {{ csrf_field() }}
                                        <div class="col_full">
                                            <label for="forget-form-phone">手机号:</label>
                                            <input type="text" id="forget-form-phone" name="forget-form-phone"
                                                   placeholder="请输入电话号码" class="form-control"/>
                                            <a href="#" id="phoneSend"
                                               class="button button-rounded button-reveal button-large button-white button-light tright">
                                                <span>发送验证码</span>
                                                <i class="icon-circle-arrow-right"></i>
                                                <div class="error"></div>
                                            </a>
                                        </div>
                                        <div class="col_full">
                                            <label for="forget-form-code">验证码:</label>
                                            <input type="text" id="forget-form-code" name="forget-form-code"
                                                   class="form-control" required/>
                                        </div>
                                        <div class="col_full">
                                            <label for="forget-form-password1">新密码:</label>
                                            <input type="password" id="forget-form-password1"
                                                   name="forget-form-password1"
                                                   value="" class="form-control"/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="col_full nobottommargin">
                                            <button class="button button-rounded button-reveal button-large button-white button-light tright"
                                                    type="submit" id="forget-submit">
                                                <i class="icon-circle-arrow-right"></i>
                                                <span>修改</span>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content clearfix" id="tab-email">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form2" name="login-form" class="nobottommargin"
                                          action="{{ url('editorPassword') }}"
                                          method="post">
                                        {{ csrf_field() }}
                                        <div class="col_full">
                                            <label for="forget-form-email">账号:</label>
                                            <input type="email" id="forget-form-email" name="forget-form-email"
                                                   placeholder="请输入邮箱" class="form-control"/>
                                            <a href="#" id="emailSend"
                                               class="button button-rounded button-reveal button-large button-white button-light tright">
                                                <i class="icon-circle-arrow-right"></i>
                                                <span>发送验证码</span></a>
                                            <div class="error2"></div>
                                        </div>
                                        <div class="col_full">
                                            <label for="forget-form-code">验证码:</label>
                                            <input type="text" id="forget-form-code" name="forget-form-code"
                                                   class="form-control" required/>
                                        </div>
                                        <div class="col_full">
                                            <label for="forget-form-password2">新密码:</label>
                                            <input type="password" id="forget-form-password2"
                                                   name="forget-form-password2"
                                                   value="" class="form-control"/>
                                            <div class="error2"></div>
                                        </div>
                                        <div class="col_full nobottommargin">
                                            <button class="button button-rounded button-reveal button-large button-white button-light tright"
                                                    type="submit" id="forget-submit">
                                                <i class="icon-circle-arrow-right"></i>
                                                <span>修改</span>
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
