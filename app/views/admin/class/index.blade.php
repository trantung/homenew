@extends('admin.layout.default')
{{ $title='Quản lý Lớp' }}
@stop

@section('content')
<!-- <div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{-- action('ClassController@create') --}}" class="btn btn-primary">Thêm Lớp</a>
    </div>
</div> -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách Lớp</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Tên </th>
                        <th>Khối</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ getnameModel('Blocks', $value->block_id) }}</td>
                        <td >
                            <a href="{{ action('ClassController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <ul class="pagination">
            <!-- phan trang -->
            {{ $data->appends(Request::except('page'))->links() }}
        </ul>
    </div>
</div>

@stop

