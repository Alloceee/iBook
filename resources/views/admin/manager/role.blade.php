@extends('admin.masters.app')
@section('title')
    iBook - 权限管理
@endsection
@section('content')
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <a href="{{ route('roleInsert') }}"><button class="button button-rounded button-reveal button-large button-white button-light
                tright " type="button" id="insert" name="insert" value="insert">
                    <i class="icon-circle-arrow-right"></i>
                    <span>添加</span>
                </button></a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>角色名</th>
                        <th>角色权利</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $roles as $role)
                        <tr>
                            <td>{{ $role->role_id }}</td>
                            <td>{{ $role->role_name }}</td>
                            <td>{{ $role->role_power }}</td>
                            <td>{{ $role->role_status }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>
                                <a href="{{ route('role.editor',['id'=>$role->role_id]) }}" class="remove"
                                   title="修改"><i class="icon-pencil"></i></a>
                                <a href="{{ route('role.delete',['id'=>$role->role_id]) }}" class="remove"
                                   title="删除"><i class="icon-trash2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>角色名</th>
                        <th>角色权利</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </section><!-- #content end -->

@endsection
