@extends('admin.layout.default')
{{ $title='List banner' }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('BannerController@create') }}" class="btn btn-primary">Thêm Banner</a>
    </div>
</div>
@include('admin.banner.search')
<div class="row">
    @foreach ($data as $modelName => $listModelId)
        @foreach ($listModelId as $modelId => $listRow)
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @if (class_exists($modelName))
                            <h3 class="box-title">{{ $modelName::find($modelId)->name; }}</h3>
                        @endif
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Vị trí hiển thị</th>
                                    <th>Tiêu đề</th>
                                    <th>Link</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
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
                                        {{ statusName($element->status) }}
                                        </td>
                                        <td>
                                            <a href="{{ action('BannerController@edit', $element->id) }}" class="btn btn-primary">Sửa</a>
                                            {{ Form::open(array('method'=>'DELETE', 'action' => array('BannerController@destroy', $element->id), 'style' => 'display: inline-block;')) }}
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
    @endforeach
    
</div>

<div class="row">
    <div class="col-xs-12">
        <ul class="pagination">
            <!-- phan trang -->
            {{-- {{ $data->appends(Request::except('page'))->links() }} --}}
        </ul>
    </div>
</div>

@stop

