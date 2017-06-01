@extends('admin.layout.default')
{{ $title='List' }}
@stop
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách log</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Model Name</th>
                        <th>Model Id</th>
                        <th>Action</th>
                        <th>Action By userId</th>
                        <th>Action time</th>
                        <th></th>
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->model_name }}</td>
                        <td>{{ $value->model_id }}</td>
                        <td>{{ $value->action }}</td>
                        <td>{{ $value->by_user }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td >
                            {{ Form::open(array('method'=>'DELETE', 'action' => array('LogAdminActionController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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

