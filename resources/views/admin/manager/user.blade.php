@extends('admin.masters.app')
@section('title')
    iBook - 用户管理
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
                        <th>用户名</th>
                        <th>头像</th>
                        <th>注册时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $users as $user)
                        <tr>
                            <td id="id">{{ $user->id }}</td>
                            <td><a href="{{ route('user',['username'=>$user->username]) }}" target="_blank">
                                    {{ $user->username }}
                                </a></td>
                            <td>{{ $user->icon }}</td>
                            <td>{{ $user->CTime }}</td>
                            <td>{{ $user->status }}</td>
                            <td>
                                <a href="{{ route('user.editor',['id'=>$user->id]) }}" class="remove"
                                   title="修改"><i class="icon-pencil"></i></a>
                                <a href="{{ route('user.delete',['id'=>$user->id]) }}" class="remove"
                                   title="删除"><i class="icon-trash2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>头像</th>
                        <th>注册时间</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
