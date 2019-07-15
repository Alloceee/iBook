@extends('home.masters.user')
@section('title')
    iBook - ForgetPassword
@endsection
@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#send').click(function () {
                $.ajax({
                    data: {
                        phone: $('#register-form-name').val(),
                        _token: '{{ csrf_token() }}',
                    },
                    url: "{{ url('home/send') }}",
                    method: 'POST',
                    dataType: 'json',
                    session: function () {
                        alert("验证码发送成功，注意查收");
                    },
                    error: function () {
                        alert('验证码发送错误');
                    }
                })
            });
        })
    </script>
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                     style="max-width: 500px;">
                    <div class="tab-container">
                        <div class="tab-content clearfix" id="tab-login">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="nobottommargin" action="#"
                                          method="post">

                                        <h3>找回密码</h3>

                                        <div class="col_full">
                                            <label for="login-form-username">账号:</label>
                                            <input type="text" id="login-form-username" name="login-form-username"
                                                   value="" class="form-control"/>
                                            <button id="send" class="button button-3d button-black">发送验证码</button>
                                        </div>
                                        <div class="col_full">
                                            <label for="login-form-code">验证码:</label>
                                            <input type="text" id="login-form-code" name="register-form-code"
                                                   value=""
                                                   class="form-control" required/>
                                        </div>
                                        <div class="col_full">
                                            <label for="login-form-password">新密码:</label>
                                            <input type="password" id="login-form-password"
                                                   name="login-form-password"
                                                   value="" class="form-control"/>
                                        </div>
                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin"
                                                    id="login-form-submit" name="login-form-submit" value="login">修改
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
