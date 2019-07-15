<form class="nobottommargin" id="template-contactform" name="template-contactform" action="{{ route('email') }}"
      method="post">
    <div class="col_half">
        <label for="template-contactform-name">姓名
            <small>*</small>
        </label>
        {{ $content['template-contactform-name'] }}
    </div>

    <div class="col_half col_last">
        <label for="template-contactform-email">Email
            <small>*</small>
        </label>
        {{ $content['template-contactform-email'] }}
    </div>

    <div class="clear"></div>

    <div class="col_half">
        <label for="template-contactform-phone">电话</label>
        {{ $content['template-contactform-phone'] }}
    </div>

    <div class="col_half col_last">
        <label for="template-contactform-service">Services</label>
        {{ $content['template-contactform-service'] }}
    </div>

    <div class="clear"></div>

    <div class="col_full">
        <label for="template-contactform-subject">问题
            <small>*</small>
        </label>
        {{ $content['template-contactform-subject'] }}
    </div>

    <div class="col_full">
        <label for="template-contactform-message">详细描述
            <small>*</small>
        </label>
        {{ $content['template-contactform-message'] }}
    </div>
</form>
