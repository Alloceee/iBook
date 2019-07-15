@extends('home.masters.user')
@section('title')
    iBook - 我的评论管理
@endsection
@section('content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example1').DataTable();
            $('#example2').DataTable();
        });
    </script>
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register"
                     style="width: 100%;">

                    <ul class="tab-nav tab-nav2 center clearfix">
                        <li class="inline-block"><a href="#tab-my">我的评论</a></li>
                        <li class="inline-block"><a href="#tab-others">收到的评论</a></li>
                    </ul>

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-my">
                            <table id="example1" class="table table-striped table-bordered"
                                   style="width:100%;min-height: 220px">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>文章</th>
                                    <th>内容</th>
                                    <th>时间</th>
                                    <th>作者</th>
                                    <th>点赞数</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $myComm as $comm)
                                    <tr>
                                        <td>{{ $comm->CID }}</td>
                                        <td><a href="{{ route('article',['id'=>$comm->aid]) }}">{{ $comm->title }}</a>
                                        </td>
                                        <td>{{ $comm->CContent }}</td>
                                        <td>{{ $comm->CTime }}</td>
                                        <td><a href="{{ route('user',['username'=>$comm->CUsername]) }}"
                                               target="_blank">{{ $comm->CUsername }}
                                            </a></td>
                                        <td>{{ $comm->LikeCount }}</td>
                                        <td>
                                            <a href="{{ route('commDelete',['id'=>$comm->CID]) }}" class="remove"
                                               title="Remove this item"><i class="icon-trash2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>文章</th>
                                    <th>内容</th>
                                    <th>时间</th>
                                    <th>作者</th>
                                    <th>点赞数</th>
                                    <th>操作</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="tab-content clearfix" id="tab-others">
                            <table id="example2" class="table table-striped table-bordered"
                                   style="width:100%;min-height: 220px">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>文章</th>
                                    <th>内容</th>
                                    <th>时间</th>
                                    <th>评论者</th>
                                    <th>点赞数</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $recComm as $comm)
                                    <tr>
                                        <td>{{ $comm->CID }}</td>
                                        <td><a href="{{ route('article',['id'=>$comm->aid]) }}"
                                            target="_blank">{{ $comm->title }}</a>
                                        </td>
                                        <td>{{ $comm->CContent }}</td>
                                        <td>{{ $comm->CTime }}</td>
                                        <td><a href="{{ route('user',['username'=>$comm->CUsername]) }}"
                                               target="_blank">{{ $comm->CUsername }}
                                            </a></td>
                                        <td>{{ $comm->LikeCount }}</td>
                                        <td>
                                            <a href="{{ route('commDelete',['id'=>$comm->CID]) }}" class="remove"
                                               title="Remove this item"><i class="icon-trash2"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>文章</th>
                                    <th>内容</th>
                                    <th>时间</th>
                                    <th>评论者</th>
                                    <th>点赞数</th>
                                    <th>操作</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- #content end -->

@endsection
