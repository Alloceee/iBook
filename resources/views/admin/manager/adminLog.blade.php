@extends('admin.masters.app')
@section('title')
    iBook - 管理员日志管理
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
                        <th>用户ID</th>
                        <th>Method</th>
                        <th>IP</th>
                        <th>Path</th>
                        <th>Data</th>
                        <th>Time</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $logs as $log)
                        <tr>
                            <td>{{ $log->aid }}</td>
                            <td>{{ $log->method }}</td>
                            <td>{{ $log->ip }}</td>
                            <td>{{ $log->path }}</td>
                            <td>{{ $log->data }}</td>
                            <td>{{ $log->created_at }}</td>
                            <td>
                                <a href="#" class="remove" title="Remove this item"><i class="icon-pencil"></i></a>
                                <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    <tr>
                        <th>用户id</th>
                        <th>Method</th>
                        <th>IP</th>
                        <th>Path</th>
                        <th>Data</th>
                        <th>Time</th>
                        <th>操作</th>
                    </tr>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
