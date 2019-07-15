@extends('admin.masters.app')
@section('title')
    iBook - 管理员管理
@endsection
@section('content')
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <a href="{{ route('adminAddShow') }}">
                    <button class="button button-rounded button-reveal button-large button-white button-light
                tright " type="button" id="insert" name="insert" value="insert">
                        <i class="icon-circle-arrow-right"></i>
                        <span>添加</span>
                    </button>
                </a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>角色</th>
                        <th>邮箱</th>
                        <th>状态</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $managers as $manager)
                        <tr>
                            <td>{{ $manager->id }}</td>
                            <td>{{ $manager->username }}</td>
                            <td>{{ $manager->role_name }}</td>
                            <td>{{ $manager->email }}</td>
                            @if($manager->status==2 )
                                <td>激活</td>
                            @else
                                <td>禁用</td>
                            @endif
                            <td>{{ $manager->created_at }}</td>
                            <td>
                                <a href="{{ route('manager.editor',['id'=>$manager->id]) }}" class="remove"
                                   title="修改"><i class="icon-pencil"></i></a>
                                <a href="{{ route('manager.delete',['id'=>$manager->id]) }}" class="remove"
                                   title="删除"><i class="icon-trash2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>角色</th>
                        <th>邮箱</th>
                        <th>状态</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
