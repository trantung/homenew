@extends('admin.layout.default')
    {{ $title='Thêm mới ' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('CourseTeacherController@index') }}" class="btn btn-success">Danh sách </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('CourseTeacherController@store'), 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('name', null , textParentCategory('tên ')) }}
                            </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="email">Mô tả ngắn</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('sapo', null , array('class' => 'form-control', "rows"=>6)) }}
                            </div>
                        </div>
                    </div>                 
                    <div class="form-group">
                        <label for="email">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link', null , textParentCategory('link')) }}
                            </div>
                        </div>
                    </div>                 

                    <div class="form-group">
                        <label for="email">Chọn môn</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('subject_id', ['' => 'Chọn']+returnList('Subject'), null,  array('class' => 'form-control', 'id' => 'subject_id'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn giáo viên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('teacher_id', ['' => 'Chọn'], null,  array('class' => 'form-control', 'id' => 'teacher_id'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn package khóa học</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('groupid', ['' => 'Chọn']+getAllPackageGroup('code'), null,  array('class' => 'form-control', 'id' => 'groupid'))}}
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email">Chọn nhóm khóa học(N2/N3)</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('course_group_id', ['' => 'Chọn']+returnListonField('CourseGroup', 'shortname'), null,  array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Chọn lớp</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('class_id', ['' => 'Chọn']+ HomeClass::lists('name', 'id'), null,  array('class' => 'form-control', 'id' => 'groupid'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::file('image_url', array('id' => 'image_url', 'multiple' => true)) }}
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