@extends('admin.layout.default')
    {{ $title='Sửa khối' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('AdminBlockController@index') }}" class="btn btn-success">Danh sách khối</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('AdminBlockController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên khối</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" value="{{ $data->name }}" placeholder="Tên slide" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <textarea class="form-control" name="description" rows="5" value="" >{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="logo" src="{{  url(IMAGEBLOCK.$data->logo) }}" />
                                {{ Form::file('logo', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', $data->weight_number , textParentCategory('Mức ưu tiên')) }}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="email">Mã màu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('color_code', $data->color_code , textParentCategory('Mã màu')) }}
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Lưu lại" />
                    <input type="reset" class="btn btn-default" value="Nhập lại" />
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop