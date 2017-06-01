@extends('admin.layout.default')
{{ $title='Quản lý tin tức' }}
@stop

@section('content')
@if(checkPermissionBlock() == SUPER_ADMIN)
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('NewsController@getCreate') }}" class="btn btn-primary">Thêm Tin</a>
    </div>
</div>
@endif
<div class="row">
@if(checkPermissionBlock() == SUPER_ADMIN)
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách tin tức</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Lớp</th>
                        <th>Thể loại tin</th>
                        <th>Link</th>
                        <th>Mức ưu tiên</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ getNameRelationByModel('News', $value->id, 'HomeClass', 'name')}}</td>
                        <td>{{ getNameTypeByNews('TypeNews', $value->id, 'name') }}</td>
                        <td><a href="{{ $value->link }}">{{ $value->link }}</a></td>
                        <td>{{ $value->weight_number }}</td>
                        <td >
                            <a href="{{ action('NewsController@getEdit', $value->id) }}" class="btn btn-primary">Sửa</a>
                            {{ Form::open(array('method'=>'DELETE', 'action' => array('NewsController@postDestroy', $value->id), 'style' => 'display: inline-block;')) }}
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
@endif
    @foreach(Blocks::where('id', '!=', 4)->get() as $value)
    @if(checkPermission($value->id))
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{ $value->name }}</h3>
                <div class="box-tools">
                    <a href="{{ action('NewsController@getCreate') }}" class="btn btn-primary">Thêm Tin</a>
                </div>
            </div>

            <div class="box-body table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Vị trí hiển thị</th>
                            <th>Tên tin tức</th>
                            <th>Link</th>
                            <th>Thứ tự</th>
                            <th>Sửa/Xoá</th>
                        </tr>
                    </thead>
                    <?php 
                        $listTypeId =  BlockTypeNew::where('block_id', $value->id)->lists('type_new_id');
                    ?>
                    @foreach(CommonAdmin::getNews($value->id) as $data)
                        <tbody>
                            <td>{{ $data->type_new_name }}</td>
                            <td>{{ $data->new_name }}</td>
                            <td>{{ $data->new_link }}</td>
                            <td>{{ $data->relation_weight_number }}</td>
                            <td>
                                <a href="{{ action('NewsController@getEdit', $data->new_id) }}" class="btn btn-primary">Sửa</a>
                                {{ Form::open(array('method'=>'POST', 'action' => array('NewsController@postDestroy', $data->new_id), 'style' => 'display: inline-block;')) }}
                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                                {{ Form::close() }}
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
    @endif
    @endforeach
    @if(checkPermissionBlock() == HOME_BLOCK || (checkPermissionBlock() == SUPER_ADMIN))
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Trang chu</h3>
                <div class="box-tools">
                    <a href="{{ action('NewsController@getCreate') }}" class="btn btn-primary">Thêm Tin</a>
                </div>
            </div>

            <div class="box-body table-responsive">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên tin tức</th>
                            <th>Link</th>
                            <th>Thứ tự</th>
                            <th>Sửa/Xoá</th>
                        </tr>
                    </thead>
                    @foreach(CommonAdmin::getNewsHome() as $data)
                        <tbody>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->link }}</td>
                            <td>{{ $data->weight_number }}</td>
                            <td>
                                <a href="{{ action('NewsController@getEdit', $data->id) }}" class="btn btn-primary">Sửa</a>
                                {{ Form::open(array('method'=>'POST', 'action' => array('NewsController@postDestroy', $data->id), 'style' => 'display: inline-block;')) }}
                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                                {{ Form::close() }}
                            </td>
                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>  
    @endif
</div>

@stop

