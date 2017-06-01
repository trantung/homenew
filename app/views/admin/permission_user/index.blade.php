@extends('admin.layout.default')
{{ $title='List banner' }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('PermissionUserController@create') }}" class="btn btn-primary">Thêm Banner</a>
    </div>
</div>
<div class="row">
    @foreach ($listModelId as $modelId => $listRow)
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $modelName::find($modelId)->name; }}</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Vị trí hiển thị</th>
                                <th>Tiêu đề</th>
                                <th>Link</th>
                                <th>Ảnh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listRow as $element)
                                <tr>
                                    <td>{{ $element->position }}</td>
                                    <td>{{ $element->name }}</td>
                                    <td>{{ $element->link_url }}</td>
                                    <td>{{ $element->image_url }}</td>
                                    <td>
                                        <a href="{{ action('PermissionUserController@edit', $element->id) }}" class="btn btn-primary">Sửa</a>
                                        {{ Form::open(array('method'=>'DELETE', 'action' => array('PermissionUserController@destroy', $element->id), 'style' => 'display: inline-block;')) }}
                                        <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</div>

@stop

