@extends('home.masters.app')
@section('title')
    iBook
@stop
@section('nav')
    @include('home.comm.nav',['user'=>$user])
@endsection
@section('body')
    <!-- Header -->
    <header id="header">
        <div class="intro">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 intro-text">
                            <h1>欢迎来到<br/><span>iBook创书网</span></h1>
                            <p>我们的目标是：在线创作最美书籍</p>
                            <a href="#features" class="btn btn-custom btn-lg page-scroll">查看更多</a></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features Section -->
    <div id="features" class="text-center">
        <div class="container">
            <div class="col-md-10 col-md-offset-1 section-title">
                <h2>功能</h2>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <a href="{{ route('write') }}" target="_blank">
                        <i class="fa fa-pencil-square-o"></i>
                        <h3>在线创作书籍</h3>
                        <p>利用最少的时间，写最美的书籍</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-3">
                    <a href="{{ route('allArticle') }}" target="_blank">
                        <i class="fa fa-bullhorn"></i>
                        <h3>订阅书籍</h3>
                        <p>你可以订阅任何你喜欢的书籍</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-3"><i class="fa fa-group"></i>
                    <a href="{{ route('allArticle') }}" target="_blank">
                        <h3>交友分享</h3>
                        <p>为自己喜欢的文章留下精彩评论，分享与交流</p>
                    </a>
                </div>
                <div class="col-xs-6 col-md-3"><i class="fa fa-magic"></i>
                    <a href="{{ route('write') }}" target="_blank">
                        <h3>设计封面</h3>
                        <p>为自己已经写好的文章，设计最美的封面</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="text-center">
        <div class="container">
            <div class="section-title">
                <h2>热门书籍</h2>
                <p>选取评论最高的文章.</p>
            </div>
            <div class="row">
                @foreach( $articles as $article)
                    <div class="col-md-4" style="height: 400px">
                        <div class="image image-carousel">
                            <a href="{{ route('article',['id'=>$article->aid]) }}" target="_blank">
                                <img src="{{ URL::asset($article->cover) }}" style=" box-shadow: 10px 10px 5px rgba(78,109,141,0.7);"
                                     alt="{{ $article->title }}" width="200px" height="260px"></a>
                        </div>
                        <a href="{{ route('article',['id'=>$article->aid]) }}" target="_blank">
                            <div class="service-desc">
                                <h3>{{ $article->title }}</h3>
                                <p class="content">{{ $article->brief }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @include('home.comm.about')
    <!-- Gallery Section -->
    <div id="portfolio" class="text-center">
        <div class="container">
            <div class="section-title">
                <h2>作品展示</h2>
                <p>最新发布的文章.</p>
            </div>
            <div class="row">
                <div class="portfolio-items">
                    @foreach( $new_art as $article)
                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div class="portfolio-item">
                                <div class="hover-bg">
                                    <a href="{{ route('article',['id'=>$article->aid]) }}" target="_blank"
                                       title="{{ $article->title }}" data-lightbox-gallery="gallery1">
                                        <div class="hover-text">
                                            <h4>{{ $article->title }}</h4>
                                        </div>
                                        <img src="{{ URL::asset($article->cover) }}" height="240px"
                                           width="190px"  alt="{{ $article->title }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials Section -->
    @include('home.comm.ClassicQuotations',['comm'=>$comm])
    <!-- Team Section -->
    <div id="team" class="text-center">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 section-title">
                <h2>团队</h2>
                <p>我们来自华东交通大学理工学院16级软件工程.</p>
            </div>
            <div id="row">
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail"><img src="{{ URL::asset('/home/static/img/team/101.jpg') }}" alt="叶文姝" class="team-img">
                        <div class="caption">
                            <h4>叶文姝</h4>
                            <p>后端设计师</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail">
                        <img src="{{ URL::asset('/home/static/img/team/202.png') }}" alt="彭佳美" class="team-img">
                        <div class="caption">
                            <h4>彭佳美</h4>
                            <p>数据库设计师</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail"><img src="{{ URL::asset('/home/static/img/team/ooo.jpg') }}" alt="..." class="team-img">
                        <div class="caption">
                            <h4>欧阳威</h4>
                            <p>数据分析师</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 team">
                    <div class="thumbnail"><img src="{{ URL::asset('/home/static/img/team/201.jpg') }}" alt="..." class="team-img">
                        <div class="caption">
                            <h4>李芬</h4>
                            <p>测试人员</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section -->
    <div id="contact">
        <div class="container">
            <div class="col-md-8">
                <div class="row">
                    <div class="section-title">
                        <h2>联系我们</h2>
                        <p>如果有好的意见或建议请及时反馈给我们.</p>
                    </div>
                    <form id="template-contactform" name="template-contactform" action="{{ route('email') }}"
                          method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="name" class="form-control" placeholder="姓名"
                                           required="required" name="template-contactform-name">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="邮箱"
                                           required="required" name="template-contactform-email">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="phone" class="form-control" placeholder="电话"
                                           name="template-contactform-phone">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="template-contactform-service"></label>
                                    <select id="template-contactform-service" name="template-contactform-service"
                                            class="form-control">
                                        <option value="">-- 问题类型 --</option>
                                        <option value="网站美化">网站美化</option>
                                        <option value="网站问题">网站问题</option>
                                        <option value="新功能建议">新功能建议</option>
                                        <option value="其他">其他</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" id="subject" class="form-control" placeholder="建议"
                                   required="required" name="template-contactform-subject">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                        <textarea name="template-contactform-message" id="message" class="form-control" rows="4"
                                  placeholder="详细描述"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div id="success"></div>
                        <button type="submit" class="btn btn-custom btn-lg" id="contact_us">联系我们</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 contact-info">
                <div class="contact-item">
                    <div id="allmap"></div>
                    <p><span><i class="fa fa-map-marker"></i> 地址</span>江西省南昌市华东交通大学理工学院<br>
                        广兰大道899号</p>
                </div>
                <div class="contact-item">
                    <p><span><i class="fa fa-phone"></i> 电话</span> +18855109072</p>
                </div>
                <div class="contact-item">
                    <p><span><i class="fa fa-envelope-o"></i> 邮箱</span> 1184465220@qq.com</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="social">
                        <ul>
                            <li><a href="#"><i class="fa fa-qq"></i></a></li>
                            <li><a href="#"><i class="fa fa-weixin"></i></a></li>
                            <li><a href="#"><i class="fa fa-weibo"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#content_us').on('click', function () {
                alert('11');
                var name = $("input#name").val();
                var email = $("input#email").val();
                var message = $("textarea#message").val();
                $.ajax({
                    url: "{{ route('email') }}",
                    type: "POST",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'template-contactform-name': name,
                        'template-contactform-email': email,
                        'template-contactform-message': message
                    },
                    cache: false,
                    success: function () {
                        // Success message
                        $('#success').html("<div class='alert alert-success'>");
                        $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#success > .alert-success')
                            .append("<strong>Your message has been sent. </strong>");
                        $('#success > .alert-success')
                            .append('</div>');

                        //clear all fields
                        $('#contactForm').trigger("reset");
                    },
                    error: function () {
                        // Fail message
                        $('#success').html("<div class='alert alert-danger'>");
                        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                        $('#success > .alert-danger').append('</div>');
                        //clear all fields
                        $('#contactForm').trigger("reset");
                    },
                })
            });
        });
    </script>
@endsection
