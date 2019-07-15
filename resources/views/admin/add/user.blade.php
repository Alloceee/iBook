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
                    <h3>反馈邮件</h3>
                </div>

                <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                <!-- Contact Form
                ============================================= -->
                <form class="nobottommargin" id="template-contactform" name="template-contactform" action="{{ route('email') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col_half">
                        <label for="template-contactform-name">姓名 <small>*</small></label>
                        <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                    </div>

                    <div class="col_half col_last">
                        <label for="template-contactform-email">Email <small>*</small></label>
                        <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="template-contactform-phone">电话</label>
                        <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="template-contactform-service">问题类型</label>
                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                            <option value="">-- Select One --</option>
                            <option value="网站美化">网站美化</option>
                            <option value="网站问题">网站问题</option>
                            <option value="新功能建议">新功能建议</option>
                            <option value="其他">其他</option>
                        </select>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="template-contactform-subject">建议<small>*</small></label>
                        <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
                    </div>

                    <div class="col_full">
                        <label for="template-contactform-message">详细描述 <small>*</small></label>
                        <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                    </div>

                    <div class="col_full hidden">
                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                    </div>

                    <div class="col_full">
                        <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">发送</button>
                    </div>

                </form>

                <div class="line"></div>

                <!-- Contact Info
                ============================================= -->
                <div class="col_one_third nobottommargin">

                    <address>
                        <strong>网站创立时间地点:</strong><br>
                        江西南昌, 2019<br>
                        华东交通大学理工学院<br>
                    </address>
                    <label title="Phone Number"><strong>电话:</strong></label> 18855109072<br>
                    <label title="QQ"><strong>QQ:</strong></label> 1184465220<br>
                    <label title="Email Address"><strong>Email:</strong></label>1184465220@qq.com

                </div><!-- Contact Info End -->

                <!-- Testimonails
                ============================================= -->
                <div class="col_two_third col_last nobottommargin">

                    <div class="fslider testimonial twitter-scroll" data-animation="slide" data-arrows="false">
                        <div class="flexslider">
                            <div class="slider-wrap">
                                {{--通知--}}
                                <div class="slide">
                                    <div class="testi-image">
                                        <a href="#"><i class="icon-twitter2"></i></a>
                                    </div>
                                    <div class="testi-content">
                                        <p>Join us in watching some of the wonderful moments we've shared with our amazing Community^ Carmen <a href="http://t.co/zpH1khNemV" target="_blank">http://t.co/zpH1khNemV</a></p>
                                        <div class="testi-meta">
                                            <span><a href="#">32 minutes ago</a></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div><!-- Testimonials End -->

            </div><!-- Contact Form Overlay End -->

        </div>

    </section><!-- Contact Form & Map Overlay Section End -->

@endsection
