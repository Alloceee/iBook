@extends('admin.masters.app')
@section('title')
    iBook - 评论管理
@endsection
@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Account</th>
                        <th>Content</th>
                        <th>Article</th>
                        <th>Author</th>
                        <th>LikeCount</th>
                        <th>Time</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $comments as $comment)
                        <tr>
                            <td>{{ $comment->CID }}</td>
                            <td><a href="{{ route('user',['username'=>$comment->CUsername]) }}"
                                target="_blank">{{ $comment->CUsername }}</a> </td>
                            <td>{{ $comment->CContent }}</td>
                            <td><a href="{{ route('article',['id'=>$comment->aid]) }}"
                                target="_blank">{{ $comment->title }}</a> </td>
                            <td><a href="{{ route('user',['username'=>$comment->CAuthor]) }}"
                                   target="_blank">{{ $comment->CAuthor }}</a></td>
                            <td>{{ $comment->LikeCount }}</td>
                            <td>{{ $comment->CTime }}</td>
                            <td>
                                <a href="{{ route('commentDelete',['id'=>$comment->CID]) }}"
                                   class="remove" title="删除"><i class="icon-trash2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Account</th>
                        <th>Content</th>
                        <th>Article</th>
                        <th>Author</th>
                        <th>LikeCount</th>
                        <th>Time</th>
                        <th>操作</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
