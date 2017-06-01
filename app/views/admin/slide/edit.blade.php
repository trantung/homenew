@extends('admin.layout.default')
    {{ $title='Sửa slide' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('SlideController@index') }}" class="btn btn-success">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('SlideController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên slide</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" value="{{ $data->name }}" placeholder="Tên slide" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn Lớp</label>
                        <div class="row">
                            @foreach(HomeClass::all() as $value)
                            <div class="col-sm-6">
                                {{ $value->name }}: {{ Form::checkbox("class_id[]", $value->id, Common::checkValueChecked('SlideClass', ['slide_id' => $data->id, 'class_id'=>$value->id]), ['class' => 'field']) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn chương trình</label>
                        <div class="row">
                            @foreach(Menus::all() as $v)
                            <div class="col-sm-6">
                                {{ $v->name }}: {{ Form::checkbox("menu_id[]", $v->id,  Common::checkValueChecked('SlideMenu', ['slide_id' => $data->id, 'menu_id'=>$v->id]), ['class' => 'field']) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Khổi</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('block_id', [4 => 'Không chọn', 0 => 'Chọn trang chủ']+returnList('Blocks'), $data->block_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="rate">Ghi chú</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="editor1" name="note" value="{{ $data->note }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="editor2" name="description" value="{{ $data->description }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGESLIDE.$data->image_url) }}" />
                                {{ Form::file('image_url', array('id' => 'image_url', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Kiểu slide</label>
                        <div class="row">
                            <div class="col-sm-6">                      
                               {{ Form::select('display_type', getTypeSlide(), $data->display_type,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email">Trạng thái</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('status', getStatus(), $data->status,  array('class' => 'form-control'))}}
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
                    <div class="form-group">
                        <label for="email">Link slide</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link_url', $data->link_url , textParentCategory('Link slide')) }}
                            </div>
                        </div>
                    </div
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
@include('admin.common.ckeditor')
@stop