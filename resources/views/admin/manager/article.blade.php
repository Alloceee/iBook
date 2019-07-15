@extends('admin.masters.app')
@section('title')
    iBook - 文章管理
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
                        <th>标题</th>
                        <th>作者</th>
                        <th>时间</th>
                        <th>评论</th>
                        <th>喜欢</th>
                        <th>收藏</th>
                        <th>类型</th>
                        <th>标签</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $articles as $article)
                        <tr>
                            <td>{{ $article->aid }}</td>
                            <td><a href="{{ route('article',['id'=>$article->aid]) }}"
                                   target="_blank">{{ $article->title }}</a></td>
                            <td><a href="{{ route('user',['username'=>$article->author]) }}"
                                target="_blank">{{ $article->author }}</a> </td>
                            <td>{{ $article->created_at }}</td>
                            <td>{{ $article->commentCount }}</td>
                            <td>{{ $article->likeCount }}</td>
                            <td>{{ $article->collectionCount }}</td>
                            <td>{{ $article->type }}</td>
                            <td>{{ $article->tags }}</td>
                            <td>
                                <a href="{{ route('article.editor',['id'=>$article->aid]) }}" class="remove"
                                   title="修改"><i class="icon-pencil"></i></a>
                                <a href="{{ route('article.delete',['id'=>$article->aid]) }}" class="remove"
                                   title="删除"><i class="icon-trash2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>时间</th>
                        <th>评论</th>
                        <th>喜欢</th>
                        <th>收藏</th>
                        <th>类型</th>
                        <th>标签</th>
                        <th>操作</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
