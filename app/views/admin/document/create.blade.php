@extends('admin.layout.default')
    {{ $title='Thêm mới tài liệu' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a class="btn btn-success back">Trở về trang trước</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('DocumentController@store'), 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên tài liệu</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('name', null , textParentCategory('Tên tài liệu')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn giáo viênn</label>
                        <div class="row">
                            @foreach(Teacher::all() as $value)
                            <div class="col-sm-6">
                                {{ $value->hoten }}: {{ Form::checkbox("teacher_id[]", $value->id, null, ['class' => 'field']) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="rate">Mô tả </label>
                        <div class="row">
                            <div class="col-sm-12">
                                  <textarea class="form-control" rows="5" id="editor1" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::file('image_url', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">tài liệu</label>
                        <div class="row">
                            <div class="col-sm-6">
                             {{ Form::file('files', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('weight_number', null , textParentCategory('Mức ưu tiên')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('link_url', null , textParentCategory('Link')) }}
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