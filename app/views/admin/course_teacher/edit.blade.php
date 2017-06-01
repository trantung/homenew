@extends('admin.layout.default')
    {{ $title='Sửa' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('CourseTeacherController@index') }}" class="btn btn-success">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('CourseTeacherController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('name', $data->name , textParentCategory('tên ')) }}
                            </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="email">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link', $data->link , textParentCategory('link')) }}
                            </div>
                        </div>
                    </div>            
                    <div class="form-group">
                        <label for="email">Chọn môn</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('subject_id', ['' => 'Chọn']+returnList('Subject'), $data->subject_id,  array('class' => 'form-control', 'id' => 'subject_id'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn lớp</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('class_id', ['' => 'Chọn']+ HomeClass::lists('name', 'id'), $data->class_id,  array('class' => 'form-control', 'id' => 'groupid'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn giáo viên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('teacher_id', ['' => 'Chọn']+returnListonField('Teacher','hoten'), $data->teacher_id,  array('class' => 'form-control', 'id' => 'teacher_id'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn package khóa học</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('groupid', ['' => 'Chọn']+ getAllPackageGroup('code'), $data->groupid,  array('class' => 'form-control', 'id' => 'groupid'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn nhóm khóa học(N2/N3)</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('course_group_id', ['' => 'Chọn']+returnListonField('CourseGroup', 'shortname'), $data->course_group_id,  array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Ảnh thumbnail trang THPT</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGECOURSETEACHER.$data->image_url) }}" />
                                {{ Form::file('image_url', array('id' => 'image_url', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>         
                    <div class="form-group">
                        <label for="name">Ảnh thumbnail trang giáo viên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGECOURSETEACHER.$data->image_url_teacher) }}" />
                                {{ Form::file('image_url_teacher', array('id' => 'image_url_teacher', 'multiple' => true, 'required' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Mô tả ngắn</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('sapo',  $data->sapo , array('class' => 'form-control', "rows"=>3)) }}
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label for="email">Mô tả chi tiết</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('description',  $data->description , array('class' => 'form-control', "rows"=>6)) }}
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
@include('admin.course_teacher.script')
@include('admin.common.ckeditor')
@stop