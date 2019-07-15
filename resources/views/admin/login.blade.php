@extends('admin.masters.app')
@section('title')
    iBook - 后台Login
@endsection
@section('content')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                     style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-login">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="nobottommargin"
                                          action="{{ route('admin.login') }}"
                                          method="post">
                                        {{ csrf_field() }}
                                        <h3>登录</h3>

                                        <div class="col_full">
                                            <label for="login-form-username">账号:</label>
                                            <input type="text" id="login-form-username" name="username"
                                                   value="" class="form-control"/>
                                        </div>

                                        <div class="col_full">
                                            <label for="login-form-password">密码:</label>
                                            <input type="password" id="login-form-password"
                                                   name="password"
                                                   value="" class="form-control"/>
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button class="button button-rounded button-reveal button-large button-white button-light tright" type="submit"
                                                    id="login-form-submit" name="login-form-submit" value="login">
                                                <i class="icon-circle-arrow-right"></i>
                                                <span>登录</span>
                                            </button>
                                            <a href="{{ url('home/forgetPassword') }}" class="fright">忘记密码?</a>
                                        </div>
                                        <hr/>
                                        <div class="col_full">
                                            <div class="fright clearfix">
                                                <a href="#" class="social-icon si-small si-borderless si-facebook">
                                                    <i class="am-icon-qq"></i>
                                                    <i class="am-icon-qq"></i>
                                                </a>

                                                <a href="#" class="social-icon si-small si-borderless si-twitter">
                                                    <i class="am-icon-wechat"></i>
                                                    <i class="am-icon-wechat"></i>
                                                </a>

                                                <a href="#" class="social-icon si-small si-borderless si-gplus">
                                                    <i class="am-icon-weibo"></i>
                                                    <i class="am-icon-weibo"></i>
                                                </a>


                                                <a href="#" class="social-icon si-small si-borderless si-github">
                                                    <i class="icon-github"></i>
                                                    <i class="icon-github"></i>
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
