@extends('admin.layout.default')
    {{ $title='Thêm mới Lớp' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('ConfigController@index') }}" class="btn btn-success">Danh sách Lớp</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('ConfigController@store'))) }}
                <div class="box-body">
                      <div class="form-group">
                        <label for="tentheloai">Key Config</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::text('key', null , textParentCategory('Key')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Value</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('value', null , textParentCategory('value')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Value Name</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('name_value', null , textParentCategory('value')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('link', null , textParentCategory('value')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mức hiển thị</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('weight_number', null , textParentCategory('Mức hiển thị')) }}
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