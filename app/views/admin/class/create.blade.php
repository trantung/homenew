@extends('admin.layout.default')
    {{ $title='Thêm mới Lớp' }}
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
                {{ Form::open(array('action' => array('ClassController@store'))) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên Lớp</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('name', null, textParentCategory('Tên lớp')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Khối</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('block_id', ['' => 'Chọn']+returnList('Blocks'), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn mặc định</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('default', [ ACTIVE => 'Chọn làm mặc định cho khối', INACTIVE => 'Không chọn'], null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Trọng số hiển thị</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', null, textParentCategory('Trọng số hiển thị')) }}
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