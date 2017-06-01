@extends('admin.layout.default')
    {{ $title='Sửa khóa học' }}
@stop
@section('content')
    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('CourseManagerController@index') }}" class="btn btn-success">Danh sách khóa học</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('CourseManagerController@update', $id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên khóa học</label>
                        <div class="row">
                            <div class="col-sm-6">
                            <label class="form-control">{{ $data->fullname }}</label>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="tentheloai">Giáo viên</label>
                        <div class="row">
                            <div class="col-sm-6">
                            <label class="form-control">{{ getNameTeacherByCourse($data->courseId) }}</label>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <label for="tentheloai">Học phí</label>
                        <div class="row">
                            <div class="col-sm-6">
                            <label class="form-control">{{ $data->cost }}</label>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="tentheloai">Ngày bế giảng</label>
                        <div class="row">
                            <div class="col-sm-6">
                            <label class="form-control">{{ date('d-m-Y', $data->finish_time) }}</label>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="tentheloai">Group</label>
                        <div class="row">
                            <div class="col-sm-6">
                            <label class="form-control">{{ $groupName }}</label>
                            {{ Form::hidden('group_id', $data->groupId) }}
                            </div>
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="email" >Chọn thể loại</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="checkbox-inline">
                                    {{ Form::checkbox('is_hot', 1, $data->is_hot) }}
                                    Hot
                                </label>
                                <label class="checkbox-inline">
                                    {{ Form::checkbox('is_sale', 1, $data->is_sale) }}
                                    Sale
                                </label>
                                {{-- <label class="checkbox-inline">
                                    {{ Form::checkbox('is_new', 1, $data->is_new) }}
                                    New
                                </label> --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Mức hiển thị</label>
                        <div class="row">
                            <div class="col-sm-12">
                                {{ Form::text('weight_number', $data->weight_number, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Môn học</label>
                        <div class="row">
                            <div class="col-sm-12">
                                {{ Form::text('subject', $data->subject_name, array('class' => 'form-control', 'data-id' => $data->subject_id)) }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Link</label>
                        <div class="row">
                            <div class="col-sm-12">
                                {{ Form::text('link', $data->link, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn ảnh đại diện</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGECOURSE.$data->image_url) }}" />
                                {{ Form::file('image_url', array('id' => 'image_url')) }}
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Lưu lại" />
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop