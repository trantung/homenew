@extends('admin.layout.default')
    {{ $title='Sửa Lớp' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('ClassController@index') }}" class="btn btn-success">Danh sách Lớp</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('ClassController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên Lớp</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::text('name', $data->name , textParentCategory('Tên lớp')) }}
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
                        <label for="email">Chọn mặc định</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('default', [ ACTIVE => 'Chọn làm mặc định cho khối', INACTIVE => 'Không chọn'], $data->default,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Trọng số hiển thị</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', $data->weight_number, textParentCategory('Trọng số hiển thị')) }}
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