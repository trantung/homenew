@extends('admin.layout.default_card')
{{ $title='Quản lý' }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('CardAdminController@create') }}" class="btn btn-primary">Thêm thành viên</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Tên </th>
                        <th>Quyền</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->role }}</td>
                        <td >
                            <a href="{{ action('CardAdminController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                            {{ Form::open(array('method'=>'DELETE', 'action' => array('CardAdminController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
                            <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                            {{ Form::close() }}
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

@stop

