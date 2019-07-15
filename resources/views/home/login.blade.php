@extends('home.masters.user')
@section('title')
    iBook - Login
@endsection
@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $("#register-form").validate({
                errorClass: "error",
                errorElement: "span",
                wrapper: "label",
                errorContainer: $(".error"),
                rules: {
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength: 25,
                    },
                    username: {
                        remote: {
                            url: "{{ route('checkUsername') }}",
                            type: "POST",
                            data: {
                                username: function () {
                                    return $('#register-form-username').val();
                                },
                                _token: '{{ csrf_token() }}'
                            }
                        }
                    },
                    email: {
                        remote: {
                            url: "{{ route('checkUser') }}",
                            type: "POST",
                            data: {
                                email: function () {
                                    return $('#register-form-email').val();
                                },
                                _token: '{{ csrf_token() }}'
                            }
                        }
                    }
                },
                messages: {
                    username: {
                        remote: "用户名已存在，请更换用户名",
                    },
                    email: {
                        email: "请输入合法的邮箱地址",
                        remote: "该邮箱已注册",
                    },
                    password: {
                        required: "请输入密码",
                        minlength: "密码长度不能小于 5 个字母",
                        maxlength: "密码长度不能大于 25 个字母",
                    },
                }
            });
        })
    </script>
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                     style="max-width: 500px;">

                    <ul class="tab-nav tab-nav2 center clearfix">
                        <li class="inline-block"><a href="#tab-login">登录</a></li>
                        <li class="inline-block"><a href="#tab-register">注册</a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-login">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <h3>登录</h3>
                                    <form id="login-form" name="login-form" class="nobottommargin"
                                          action="{{ route('check') }}"
                                          method="post">
                                        {{ csrf_field() }}
                                        <div class="col_full" id="username">
                                            <label for="login-form-username">账号(用户名):</label>
                                            <input type="text" id="login-form-username"
                                                   name="login-form-username" required
                                                   value="" class="form-control"/>
                                        </div>
                                        <div class="col_full">
                                            <label for="login-form-password">密码:</label>
                                            <input type="password" id="login-form-password"
                                                   name="login-form-password" required
                                                   value="" class="form-control"/>
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button class="button button-rounded button-reveal button-large button-white button-light tright"
                                                    type="submit"
                                                    id="login-form-submit" name="login-form-submit" value="login">
                                                <i class="icon-circle-arrow-right"></i>
                                                <span>登录</span>
                                            </button>
                                            <a href="{{ url('forgetPassword') }}" class="fright">忘记密码?</a>
                                        </div>
                                        <hr/>
                                        <div class="col_full">
                                            <div class="fright clearfix">
                                                <a href="{{ url('auth/qq') }}"
                                                   class="social-icon si-small si-borderless si-facebook">
                                                    <i class="am-icon-qq"></i>
                                                    <i class="am-icon-qq"></i>
                                                </a>

                                            </div>

                                            <div class="clear"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content clearfix" id="tab-register">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <h3>注册新账号</h3>
                                    <form id="register-form" name="register-form" class="nobottommargin" method="post"
                                          action="{{ route('signUp') }}">
                                        {{ csrf_field() }}
                                        <div class="col_full">
                                            <label for="register-form-email">账号(邮箱):</label>
                                            <input type="email" id="register-form-email" name="email"
                                                   value="" class="form-control" required/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-username">昵称:</label>
                                            <input type="text" id="register-form-username" required
                                                   name="username" value="" class="form-control"/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="col_full">
                                            <label for="register-form-password">密码:</label>
                                            <input type="password" id="register-form-password" required
                                                   name="password" value="" class="form-control"/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="col_full nobottommargin">
                                            <button class="button button-rounded button-reveal button-large button-white button-light tright"
                                                    type="submit" id="register-form-submit" name="register-form-submit"
                                                    value="register">
                                                <i class="icon-circle-arrow-right"></i>
                                                <span>注册</span>
                                            </button>
                                        </div>
                                        <hr/>
                                        <div class="col_full">
                                            <div class="fright clearfix">
                                                <a href="{{ url('auth/qq') }}"
                                                   class="social-icon si-small si-borderless si-facebook">
                                                    <i class="am-icon-qq"></i>
                                                    <i class="am-icon-qq"></i>
                                                </a>

                                            </div>

                                            <div class="clear"></div>
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
