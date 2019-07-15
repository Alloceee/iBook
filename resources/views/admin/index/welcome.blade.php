@extends('admin.masters.app')
@section('title')
    iBook - 后台管理
@endsection
@section('content')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <div class="col_one_fourth nobottommargin center">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-user"></i>
                    <div class="counter" style="color: #1abc9c;">
                        <span data-from="0" data-to="{{ $data['user'] }}"
                              data-refresh-interval="50"
                              data-speed="2000"></span></div>
                    <h5>用户</h5>
                </div>

                <div class="col_one_fourth nobottommargin center">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-book"></i>
                    <div class="counter" style="color: #e74c3c;">
                        <span data-from="0" data-to="{{ $data['article'] }}"
                              data-refresh-interval="50"
                              data-speed="2500"></span></div>
                    <h5>文章</h5>
                </div>

                <div class="col_one_fourth nobottommargin center">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-heart"></i>
                    <div class="counter" style="color: #3498db;">
                        <span data-from="0" data-to="{{ $data['coll'] }}"
                              data-refresh-interval="50"
                              data-speed="3500"></span></div>
                    <h5>收藏</h5>
                </div>

                <div class="col_one_fourth nobottommargin center col_last">
                    <i class="i-plain i-xlarge divcenter nobottommargin icon-comment"></i>
                    <div class="counter" style="color: #9b59b6;">
                        <span data-from="0" data-to="{{ $data['comment'] }}"
                              data-refresh-interval="30"
                              data-speed="2700"></span></div>
                    <h5>评论</h5>
                </div>
                <div class="line"></div>

                <div class="col_half" id="lineChart" style="opacity: 0;">
                    <h3 class="center">用户注册量(灰)和上传文章量(蓝)</h3>
                    <canvas id="lineChartCanvas" width="547" height="300"></canvas>
                </div>

                <div class="col_half col_last" id="barChart" style="opacity: 0;">
                    <h3 class="center">各类书籍数量</h3>
                    <canvas id="barChartCanvas" width="547" height="300"></canvas>
                </div>

                <div class="line"></div>

                <div class="col_half" id="radarChart" style="opacity: 0;">
                    <h3 class="center">各类书籍点赞(灰)与收藏量(蓝)</h3>
                    <canvas id="radarChartCanvas" width="547" height="300"></canvas>
                </div>

                <div class="col_half col_last" id="pieChart" style="opacity: 0;">
                    <h3 class="center">热门书籍（收藏数）</h3>
                    <canvas id="pieChartCanvas" width="547" height="300"></canvas>
                </div>

                <script type="text/javascript">

                    jQuery(window).load(function () {
                        var lineChartData = {
                            labels: ["{{ $user_article_count[4]['time'] }}月",
                                "{{ $user_article_count[3]['time'] }}月",
                                "{{ $user_article_count[2]['time'] }}月",
                                "{{ $user_article_count[1]['time'] }}月",
                                "{{ $user_article_count[0]['time'] }}月"],
                            datasets: [
                                {
                                    fillColor: "rgba(220,220,220,0.5)",
                                    strokeColor: "rgba(220,220,220,1)",
                                    pointColor: "rgba(220,220,220,1)",
                                    pointStrokeColor: "#fff",
                                    data: ["{{ $user_article_count[4]['user'] }}",
                                        "{{ $user_article_count[3]['user'] }}",
                                        "{{ $user_article_count[2]['user'] }}",
                                        "{{ $user_article_count[1]['user'] }}",
                                        "{{ $user_article_count[0]['user'] }}"]
                                },
                                {
                                    fillColor: "rgba(151,187,205,0.5)",
                                    strokeColor: "rgba(151,187,205,1)",
                                    pointColor: "rgba(151,187,205,1)",
                                    pointStrokeColor: "#fff",
                                    data: ["{{ $user_article_count[4]['article'] }}",
                                        "{{ $user_article_count[3]['article'] }}",
                                        "{{ $user_article_count[2]['article'] }}",
                                        "{{ $user_article_count[1]['article'] }}",
                                        "{{ $user_article_count[0]['article'] }}"]
                                },
                            ]
                        };

                        var barChartData = {
                            labels: ["{{ $type_art[0]['type'] }}",
                                "{{ $type_art[1]['type'] }}",
                                "{{ $type_art[2]['type'] }}",
                                "{{ $type_art[3]['type'] }}",
                                "{{ $type_art[4]['type'] }}",
                                "{{ $type_art[5]['type'] }}",
                                "{{ $type_art[6]['type'] }}",
                                "{{ $type_art[7]['type'] }}"],
                            datasets: [
                                {
                                    fillColor: "rgba(220,220,220,0.5)",
                                    strokeColor: "rgba(220,220,220,1)",
                                    data: [{{ $type_art[0]['count'] }},
                                        {{ $type_art[1]['count'] }},
                                        {{ $type_art[2]['count'] }},
                                        {{ $type_art[3]['count'] }},
                                        {{ $type_art[4]['count'] }},
                                        {{ $type_art[5]['count'] }},
                                        {{ $type_art[6]['count'] }},
                                        {{ $type_art[7]['count'] }}]
                                }
                            ]

                        };

                        var radarChartData = {
                            labels: ["{{ $like_comm_count[0]['type'] }}",
                                "{{ $like_comm_count[1]['type'] }}",
                                "{{ $like_comm_count[2]['type'] }}",
                                "{{ $like_comm_count[3]['type'] }}",
                                "{{ $like_comm_count[4]['type'] }}",
                                "{{ $like_comm_count[5]['type'] }}",
                                "{{ $like_comm_count[6]['type'] }}",
                                "{{ $like_comm_count[7]['type'] }}"],
                            datasets: [
                                {
                                    fillColor: "rgba(220,220,220,0.5)",
                                    strokeColor: "rgba(220,220,220,1)",
                                    pointColor: "rgba(220,220,220,1)",
                                    pointStrokeColor: "#fff",
                                    data: [{{ $like_comm_count[0]['likeCount'] }},
                                        {{ $like_comm_count[1]['likeCount'] }},
                                        {{ $like_comm_count[2]['likeCount'] }},
                                        {{ $like_comm_count[3]['likeCount'] }},
                                        {{ $like_comm_count[4]['likeCount'] }},
                                        {{ $like_comm_count[5]['likeCount'] }},
                                        {{ $like_comm_count[6]['likeCount'] }},
                                        {{ $like_comm_count[7]['likeCount'] }}]
                                },
                                {
                                    fillColor: "rgba(151,187,205,0.5)",
                                    strokeColor: "rgba(151,187,205,1)",
                                    pointColor: "rgba(151,187,205,1)",
                                    pointStrokeColor: "#fff",
                                    data: [{{ $like_comm_count[0]['commCount'] }},
                                        {{ $like_comm_count[1]['commCount'] }},
                                        {{ $like_comm_count[2]['commCount'] }},
                                        {{ $like_comm_count[3]['commCount'] }},
                                        {{ $like_comm_count[4]['commCount'] }},
                                        {{ $like_comm_count[5]['commCount'] }},
                                        {{ $like_comm_count[6]['commCount'] }}]
                                }
                            ]

                        };

                        var pieChartData = [
                            {
                                label: "{{ $coll_art[0]['title'] }}",
                                value: {{ $coll_art[0]['count'] }},
                                color: "#F38630"
                            },
                            {
                                label: "{{ $coll_art[1]['title'] }}",
                                value: {{ $coll_art[1]['count'] }},
                                color: "#E0E4CC"
                            },
                            {
                                label: "{{ $coll_art[2]['title'] }}",
                                value: {{ $coll_art[2]['count'] }},
                                color: "#69D2E7"
                            },
                            {
                                label: "{{ $coll_art[3]['title'] }}",
                                value: {{ $coll_art[3]['count'] }},
                                color: "#1E73BE"
                            }
                        ];

                        var globalGraphSettings = {animation: Modernizr.canvas};

                        function showLineChart() {
                            var ctx = document.getElementById("lineChartCanvas").getContext("2d");
                            new Chart(ctx).Line(lineChartData, globalGraphSettings);
                        }

                        function showBarChart() {
                            var ctx = document.getElementById("barChartCanvas").getContext("2d");
                            new Chart(ctx).Bar(barChartData, globalGraphSettings);
                        }

                        function showRadarChart() {
                            var ctx = document.getElementById("radarChartCanvas").getContext("2d");
                            new Chart(ctx).Radar(radarChartData, globalGraphSettings);
                        }


                        function showPieChart() {
                            var ctx = document.getElementById("pieChartCanvas").getContext("2d");
                            new Chart(ctx).Pie(pieChartData, globalGraphSettings);
                        }

                        $('#lineChart').appear(function () {
                            $(this).css({opacity: 1});
                            setTimeout(showLineChart, 300);
                        }, {accX: 0, accY: -155}, 'easeInCubic');

                        $('#barChart').appear(function () {
                            $(this).css({opacity: 1});
                            setTimeout(showBarChart, 300);
                        }, {accX: 0, accY: -155}, 'easeInCubic');

                        $('#radarChart').appear(function () {
                            $(this).css({opacity: 1});
                            setTimeout(showRadarChart, 300);
                        }, {accX: 0, accY: -155}, 'easeInCubic');

                        $('#pieChart').appear(function () {
                            $(this).css({opacity: 1});
                            setTimeout(showPieChart, 300);
                        }, {accX: 0, accY: -155}, 'easeInCubic');


                    });

                </script>
            </div>
        </div>
    </section>
@endsection
