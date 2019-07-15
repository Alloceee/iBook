@extends('admin.masters.app')
@section('title')
    iBook - 分类管理
@endsection
@section('content')
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <a href="{{ route('typeInsert') }}"><button class="button button-rounded button-reveal button-large button-white button-light
                tright " type="button" id="insert" name="insert" value="insert">
                        <i class="icon-circle-arrow-right"></i>
                        <span>添加</span>
                    </button></a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>类型名</th>
                        <th>描述</th>
                        <th>文章数</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $types as $type)
                        <tr>
                            <td id="id">{{ $type->id }}</td>
                            <td>{{ $type->typename }}</td>
                            <td>{{ $type->detailed }}</td>
                            <td>{{ $type->count }}</td>
                            <td>{{ $type->created_at }}</td>
                            <td>
                                <a href="{{ route('type.editor',['id'=>$type->id]) }}" class="remove"
                                   title="修改"><i class="icon-pencil"></i></a>
                                <a href="{{ route('type.delete',['id'=>$type->id]) }}" class="remove"
                                   title="删除"><i class="icon-trash2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>类型名</th>
                        <th>描述</th>
                        <th>文章数</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    </tfoot>
                </table>

            </div>

        </div>

    </section><!-- #content end -->
@endsection
