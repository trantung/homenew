@extends('admin.layout.default')
    {{ $title='Thêm mới chương trình' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('TeacherSetupController@index') }}" class="btn btn-success">Danh sách giáo viên</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('TeacherSetupController@update', $id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                {{ Form::hidden('teacher_id', $id, null,  array('class' => 'form-control'))}}
                    <div class="form-group">
                        <label>Birthday</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input name="birthday" id="birthday" class="form-control" value="{{ $data->birthday }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="class">Nơi sống</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('live_in', $data->live_in , textParentCategory('Nơi sống')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class">Facebook</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('facebook', $data->facebook , textParentCategory('Facebook')) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="tentheloai">Giới thiệu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('description', $data->description , textParentCategory('Giới thiệu')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Slogan</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('slogan', $data->slogan , textParentCategory('Slogan')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Thành tích</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('record', $data->record , textParentCategory('Thành tích')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh trang danh sách ( Kích thước : 277x320)</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGE_TEACHER.$data->image) }}" />
                                {{ Form::file('image', array('id' => 'image', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh trang chi tiết ( Kích thước : 350x394)</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGE_TEACHER.$data->image_detail) }}" />
                                {{ Form::file('image_detail', array('id' => 'image_detail', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class">Thứ tự hiển thị</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', $data->weight_number ) }}
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
<script type="text/javascript">
    //Date picker
    $( "#birthday" ).datepicker({ dateFormat: "dd-mm-yy" });
</script>
@stop