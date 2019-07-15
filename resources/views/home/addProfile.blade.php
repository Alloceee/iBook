@extends('home.masters.user')
@section('title')
    iBook - 完善个人信息
@endsection
@section('content')
    <script type="text/javascript">
        $().ready(function () {
// 在键盘按下并释放及提交后验证提交表单
            $("#password-form").validate({
                errorClass: "error",
                errorElement: "span",
                wrapper: "label",
                errorContainer: $(".error"),
                rules: {
                    password: {
                        required: true,
                        minlength: 5,
                        maxlength:25,
                    },
                    password2:{
                        required: true,
                        maxlength:25,
                        equalTo:"#password"
                    }

                },
                messages: {
                    password: {
                        required: "请输入密码",
                        minlength: "密码长度不能小于 5 个字母",
                        maxlength: "密码长度不能大于 25 个字母",
                    },
                    password2: {
                        required: "请输入密码",
                        minlength: "密码长度不能小于 5 个字母",
                        maxlength: "密码长度不能大于 25 个字母",
                        equalTo: "两次输入密码不一致"
                    }
                }
            })
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
                                    <form id="password-form" name="password-form" class="nobottommargin"
                                          action="{{ url('addPassword') }}"
                                          method="post">
                                        {{ csrf_field() }}
                                        <h3>完善密码信息</h3>

                                        <div class="col_full">
                                            <label for="password">
                                                <small>*</small>
                                                密码:</label>
                                            <input type="password" id="password" name="password" class="form-control"/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="col_full">
                                            <label for="password2">
                                                <small>*</small>
                                                确认密码:</label>
                                            <input type="password" id="password2" name="password2" class="form-control"/>
                                            <div class="error"></div>
                                        </div>
                                        <div class="col_full nobottommargin">
                                            <button class="button button-rounded button-reveal button-large button-white button-light tright"
                                                    type="submit"
                                                    id="login-form-submit" name="login-form-submit" value="restore">
                                                <i class="icon-circle-arrow-right"></i>
                                                <span>保存</span>
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
