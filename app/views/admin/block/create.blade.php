@extends('admin.layout.default')
    {{ $title='Thêm mới Khối' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('AdminBlockController@index') }}" class="btn btn-success">Danh sách Khối</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('AdminBlockController@store'), 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên khối</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name"  placeholder="Tên khối" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="5" id="comment"  name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::file('logo', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', null , textParentCategory('Mức ưu tiên')) }}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="email">Mã màu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('color_code', null , textParentCategory('Mã màu')) }}
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