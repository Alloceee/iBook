@extends('home.masters.user')
@section('title')
    iBook - 关于我们
@endsection
@section('content')
    <!-- Page Title
        ============================================= -->
    <section id="page-title" class="page-title-mini">

        <div class="container clearfix">
            <h1>关于我们</h1>
            <span>这是我们的团队</span>
            <ol class="breadcrumb">
                <li class="active">关于我们</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_full">

                    <div class="heading-block center nobottomborder">
                        <h2>iBook创书网</h2>
                        <span>团队成立于华东交通大学理工学院</span>
                    </div>

                    <div class="fslider" data-pagi="false" data-animation="fade">
                        <div class="flexslider">
                            <div class="slider-wrap">
                                <div class="slide"><a href="#"><img
                                                src="{{ URL::asset('/home/static/images/about/11.jpeg') }}"
                                                alt="About Image"></a></div>
                                <div class="slide"><a href="#"><img
                                                src="{{ URL::asset('/home/static/images/about/22.jpeg') }}"
                                                alt="About Image"></a></div>
                                <div class="slide"><a href="#"><img
                                                src="{{ URL::asset('/home/static/images/about/33.jpg') }}"
                                                alt="About Image"></a></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col_one_fourth nobottommargin center">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-user"></i>
                    <div class="counter" style="color: #1abc9c;">
                        <span data-from="0" data-to="{{ $user }}"
                              data-refresh-interval="50"
                              data-speed="2000"></span></div>
                    <h5>用户</h5>
                </div>

                <div class="col_one_fourth nobottommargin center">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-book"></i>
                    <div class="counter" style="color: #e74c3c;">
                        <span data-from="0" data-to="{{ $article }}"
                              data-refresh-interval="50"
                              data-speed="2500"></span></div>
                    <h5>文章</h5>
                </div>

                <div class="col_one_fourth nobottommargin center">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-heart"></i>
                    <div class="counter" style="color: #3498db;">
                        <span data-from="0" data-to="{{ $coll }}"
                              data-refresh-interval="50"
                              data-speed="3500"></span></div>
                    <h5>收藏</h5>
                </div>

                <div class="col_one_fourth nobottommargin center col_last">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-comment"></i>
                    <div class="counter" style="color: #9b59b6;">
                        <span data-from="0" data-to="{{ $comm }}"
                              data-refresh-interval="30"
                              data-speed="2700"></span></div>
                    <h5>评论</h5>
                </div>

                <div class="clear"></div>

                <div class="promo promo-light bottommargin">
                    <h3>有事请打电话 <span>+18855109072</span> 或者给我们发邮件 <span>1184465220@qq.com</span></h3>
                    <span>我们会在24小时内给予回复</span>
                    <a href="{{ route('contact') }}" class="button button-xlarge button-rounded">联系我们</a>
                </div>

                <div class="heading-block center">
                    <h2>我们的团队</h2>
                    <span>以下是我们的团队成员</span>
                </div>

                <div class="row clearfix">

                    <div class="col-md-6 bottommargin">
                        <div class="team team-list clearfix">
                            <div class="team-image">
                                <img src="{{ URL::asset('/home/static/images/team/yewenshu.jpg') }}" alt="叶文姝">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>叶文姝</h4><span>后端设计</span></div>
                                <div class="team-content">
                                    <p>16级软件工程1班，主要从事后端代码设计，Java开发，热爱听音乐</p>
                                </div>
                                <a href="#" id="team1" class="social-icon si-rounded si-small si-light si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 bottommargin">
                        <div class="team team-list clearfix">
                            <div class="team-image">
                                <img src="{{ URL::asset('/home/static/images/team/pengjiamei.png') }}" alt="Josh Clark">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>彭佳美</h4><span>数据库设计人员</span></div>
                                <div class="team-content">
                                    <p>16级软件工程2班，活泼开朗，从事数据库设计，熟悉MySQL、Oracle等数据库</p>
                                </div>
                                <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 bottommargin">
                        <div class="team team-list clearfix">
                            <div class="team-image">
                                <img src="{{ URL::asset('/home/static/images/team/ooo.jpg') }}" alt="Mary Jane">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>欧阳威</h4><span>数据分析师</span></div>
                                <div class="team-content">
                                    <p>性别男，喜欢篮球没有唱跳rap</p>
                                </div>
                                <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 bottommargin">
                        <div class="team team-list clearfix">
                            <div class="team-image">
                                <img src="{{ URL::asset('/home/static/images/team/201.jpg') }}" alt="Nix Maxwell">
                            </div>
                            <div class="team-desc">
                                <div class="team-title"><h4>李芬</h4><span>测试人员</span></div>
                                <div class="team-content">
                                    <p>16级软件工程2班，从事软件测试</p>
                                </div>
                                <a href="#" class="social-icon si-rounded si-small si-light si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="#" class="social-icon si-rounded si-small si-light si-gplus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section><!-- #content end -->

@endsection
