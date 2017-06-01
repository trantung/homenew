@extends('admin.layout.default')
{{ $title='Quản lý Config' }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('ConfigController@create') }}" class="btn btn-primary">Thêm Config</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách Config</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Key </th>
                        <th>Value</th>
                        <th>Mức ưu tiên</th>
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->key }}</td>
                        <td>{{ $value->value }}</td>
                        <td>{{ $value->weight_number }}</td>
                        <td >
                            <a href="{{ action('ConfigController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                            {{ Form::open(array('method'=>'DELETE', 'action' => array('ConfigController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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

<div class="row">
    <div class="col-xs-12">
        <ul class="pagination">
            <!-- phan trang -->
            {{ $data->appends(Request::except('page'))->links() }}
        </ul>
    </div>
</div>

@stop

