@extends('home.masters.user')
@section('title')
    iBook - 联系我们
@endsection
@section('content')
    <!-- Contact Form & Map Overlay Section
        ============================================= -->
    <section id="map-overlay">

        <div class="container clearfix">

            <!-- Contact Form Overlay
            ============================================= -->
            <div id="contact-form-overlay" class="clearfix">

                <div class="fancy-title title-dotted-border">
                    <h2>反馈邮件 <small>我们会在24小时内给予回复</small></h2>
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
            </div>
        </div>
    </section>
@endsection
