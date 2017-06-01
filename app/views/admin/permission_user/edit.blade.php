@extends('admin.layout.default')
    {{ $title='Sửa banner' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('BannerController@index') }}" class="btn btn-success">Danh sách banner</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('BannerController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên banner</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" value="{{ $data->name }}" placeholder="Tên slide" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Khổi</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('block_id', ['' => 'Chọn']+returnList('Blocks'), $data->block_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="5" id="comment" value="" name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGEBANNER.$data->image_url) }}" />
                                {{ Form::file('image_url', array('id' => 'image_url', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Link banner</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link_url', $data->link_url , textParentCategory('Link banner')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Trạng thái</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('status', [1 => 'Hiển thị', 2 => 'Ẩn'], $data->status,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
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