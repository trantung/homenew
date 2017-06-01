@extends('admin.layout.default')
{{ $title='List Slide' }}
@stop

@section('content')
@if(checkPermissionBlock() == SUPER_ADMIN)
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('SlideController@create') }}" class="btn btn-primary">Thêm mới</a>
    </div>
</div>
@endif
<?php 
    $typeSlide = Request::segment(4);
    if ($typeSlide == null) {
        $typeSlide = TYPE_SLIDE_FULL;
    }
?>
<div class="row">
    @if(checkPermissionBlock() == SUPER_ADMIN)
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách Slide</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Tên slide</th>
                            <th>Khối</th>
                            <th>Link</th>
                            <th>Kiểu hiển thị</th>
                            <th>Mức ưu tiên</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ getNameBlockBySlide($value) }}</td>
                            <td><a href="{{ $value->link_url }}">{{ $value->link_url }}</a></td>
                            <td>{{ getNameDisplayType($value->display_type) }}</td>
                            <td>{{ $value->weight_number }}</td>
                            <td >
                                <a href="{{ action('SlideController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
                                {{ Form::open(array('method'=>'DELETE', 'action' => array('SlideController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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
    @if ($typeSlide != TYPE_SLIDE_ROW)
        @include('admin.slide.inc.table-slide-not-row')
    @else
        @include('admin.slide.inc.table-slide-row')
    @endif
    
</div>


@stop

