@extends('admin.masters.app')
@section('title')
    iBook - 角色管理
@endsection
@section('content')
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <h4>权限分配表</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col class="col-xs-1">
                            <col class="col-xs-7">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>角色名</th>
                            <th>权限描述</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $roles as $role)
                            <tr>
                                <td>
                                    <code>{{ $role->role_name }}</code>
                                </td>
                                <td>{{ $role->role_power }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </section><!-- #content end -->
@endsection
