@extends('home.masters.user')
@section('title')
    iBook - 栏目管理
@endsection
@section('css')
    <script src="{{ URL::asset('js/tagcloud.js') }}"></script>
    <style type="text/css">

        .wrapper {
            align-content: center;
            width: 1200px;
            height: 300px;
            margin: 0 auto;
            position: relative;
        }

        .wrapper p {
            padding-top: 150px;
            line-height: 27px;
            color: #999;
            font-size: 16px;
            text-align: center;
        }

        .tagcloud {
            float: left;
            position: relative;
            /*margin-top: -150px;*/
        }

        .tagcloud a {
            position: relative;
            top: 0;
            left: 0;
            display: block;
            padding: 11px 30px;
            color: #333;
            font-size: 16px;
            border: 1px solid #e6e7e8;
            border-radius: 18px;
            background-color: #f2f4f8;
            text-decoration: none;
            white-space: nowrap;
            -o-box-shadow: 6px 4px 8px 0 rgba(151, 142, 136, .34);
            -ms-box-shadow: 6px 4px 8px 0 rgba(151, 142, 136, .34);
            -moz-box-shadow: 6px 4px 8px 0 rgba(151, 142, 136, .34);
            -webkit-box-shadow: 6px 4px 8px 0 rgba(151, 142, 136, .34);
            box-shadow: 6px 4px 8px 0 rgba(151, 142, 136, .34);
            -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4,Direction=135, Color='#000000')"; /*兼容ie7/8*/
            filter: progid:DXImageTransform.Microsoft.Shadow(color='#969696', Direction=125, Strength=9);
            /*strength是阴影大小，direction是阴影方位，单位为度，可以为负数，color是阴影颜色 （尽量使用数字）使用IE滤镜实现盒子阴影的盒子必须是行元素或以行元素显示（block或inline-block;）*/
        }

        .tagcloud a:hover {
            color: #3385cf;
        }
    </style>
@endsection
@section('content')
    <section id="page-title">
        <div class="container clearfix">
            <h1>我的栏目</h1>
            <ol class="breadcrumb">
                <li class="active">全部</li>
                <li>小说</li>
                <li>随笔</li>
            </ol>
        </div>
    </section><!-- #page-title end -->
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix ">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="wrapper">
                            @if( count($items) == 0)
                                <p>没有发现任何标签内容</p>
                            @else
                                <div class="tagcloud">
                                    @foreach( $items as $item)
                                        <a href="{{ url('/search?q='.$item) }}" target="_blank">
                                            {{ $item }}</a>
                                    @endforeach
                                    @endif
                                </div>
                        </div><!--wrapper-->
                    </div>
                    <div class="col-sm-6" style="float: right;">
                        @foreach( $item_art as $article)
                            <div class="toggle faq faq-marketplace faq-authors">
                                <div class="togglet">
                                    {{ $article['item'] }}<small>({{ count($article['article']) }})</small>
                                </div>
                                <div class="togglec">
                                    @foreach( $article['article'] as $value)
                                        <a href="{{ route('article',['id'=>$value->aid]) }}" target="_blank">
                                            {{ $value->title }}</a>
                                        <a href="{{ route('delete',['id'=>$value->aid]) }}" >
                                            <i class="icon icon-trash2"></i></a>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <script type="text/javascript">
                    /*3D标签云*/
                    tagcloud({
                        selector: ".tagcloud",  //元素选择器
                        fontsize: 18,       //基本字体大小, 单位px
                        radius: 100,         //滚动半径, 单位px
                        mspeed: "normal",   //滚动最大速度, 取值: slow, normal(默认), fast
                        ispeed: "normal",   //滚动初速度, 取值: slow, normal(默认), fast
                        direction: 135,     //初始滚动方向, 取值角度(顺时针360): 0对应top, 90对应left, 135对应right-bottom(默认)...
                        keep: false          //鼠标移出组件后是否继续随鼠标滚动, 取值: false, true(默认) 对应 减速至初速度滚动, 随鼠标滚动
                    });
                </script>
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {
                        var $faqItems = $('#faqs .faq');
                        if (window.location.hash != '') {
                            var getFaqFilterHash = window.location.hash;
                            var hashFaqFilter = getFaqFilterHash.split('#');
                            if ($faqItems.hasClass(hashFaqFilter[1])) {
                                $('#portfolio-filter li').removeClass('activeFilter');
                                $('[data-filter=".' + hashFaqFilter[1] + '"]').parent('li').addClass('activeFilter');
                                var hashFaqSelector = '.' + hashFaqFilter[1];
                                $faqItems.css('display', 'none');
                                if (hashFaqSelector != 'all') {
                                    $(hashFaqSelector).fadeIn(500);
                                } else {
                                    $faqItems.fadeIn(500);
                                }
                            }
                        }

                        $('#portfolio-filter a').click(function () {
                            $('#portfolio-filter li').removeClass('activeFilter');
                            $(this).parent('li').addClass('activeFilter');
                            var faqSelector = $(this).attr('data-filter');
                            $faqItems.css('display', 'none');
                            if (faqSelector != 'all') {
                                $(faqSelector).fadeIn(500);
                            } else {
                                $faqItems.fadeIn(500);
                            }
                            return false;
                        });
                    });
                </script>

            </div>

    </section><!-- #content end -->
@endsection