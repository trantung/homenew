@extends('admin.layout.default')
    {{ $title='Sửa Config' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('ConfigController@index') }}" class="btn btn-success">Danh sách Config</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('ConfigController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Key Config</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::text('key', $data->key , textParentCategory('Key')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Value</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('value', $data->value , textParentCategory('value')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Value Name</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('name_value', $data->name_value , textParentCategory('value')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('link', $data->link , textParentCategory('value')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mức hiển thị</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  {{ Form::text('weight_number', $data->weight_number , textParentCategory('mức hiển thị')) }}
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