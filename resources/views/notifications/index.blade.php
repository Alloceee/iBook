@extends('home.masters.user')

@section('title', '我的通知')

@section('content')
    <section id="page-title">
        <div class="container clearfix">
            <h1>我的通知</h1>
        </div>
    </section><!-- #page-title end -->
    <script type="text/javascript">
        jQuery(document).ready(function () {
            var count = 1;

            $.ajax({
                data: {
                    count: count,
                    _token: '{{ csrf_token() }}'
                },
                method: 'GET',
                dataType: 'text',
                url: "{{ url('getNoti') }}",
                success: function (msg) {
                    $('.commentlist').html(msg);
                },
            });

            $('#add').on('click', function () {
                count = count + 1;
                $.ajax({
                    data: {
                        count: count,
                        _token: '{{ csrf_token() }}'
                    },
                    method: 'GET',
                    dataType: 'text',
                    url: "{{ url('getNoti') }}",
                    success: function (msg) {
                        $('.commentlist').html(msg);
                    },
                });
            });
        })
    </script>
    <!-- Content
       ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="container">
                    <div class="col-md-10 offset-md-1">
                        <div class="card ">
                            <div class="card-body">
                                <ol class="commentlist clearfix">

                                </ol>

                                <div class="panel panel-default center">
                                    <div class="panel-body">
                                        <span id="add" style="cursor: pointer;">点击加载更多</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop