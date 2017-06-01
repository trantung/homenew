@extends('admin.layout.default')
{{ $title='Quản lý menu' }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('MenuController@create') }}" class="btn btn-primary">Thêm menu</a>
    </div>
</div>
@include('admin.menus.search')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách menu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Tên menu</th>
                        <th>Lớp</th>
                        <th>Link</th>
                        <th>Mức ưu tiên</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <?php 
                            $arrClass = getListClassByBlock(checkPermissionBlock()); 
                            $result = array_intersect($value->pupilClass->lists('id'), $arrClass);
                        ?>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ (implode(', ', $value->pupilClass->lists('name'))) }}</td>
                        <td><a href="{{ $value->link }}" >{{$value->link}}</a></td>
                        <td>{{ $value->weight_number }}</td>
                        <td >
                            <a href="{{ action('MenuController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                            {{ Form::open(array('method'=>'DELETE', 'action' => array('MenuController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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

