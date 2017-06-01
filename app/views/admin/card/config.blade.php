@extends('admin.layout.default_card')
    {{ $title='Thêm mới' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('CardController@index') }}" class="btn btn-success">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('CardController@putCourse', $data->id), 'method' => 'PUT')) }}
                <div class="box-body">
                    <div class="form-group">
                        <label>Mã thẻ</label>
                        <div class="row">
                            <div class="col-sm-7">
                                {{$data->code}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Chọn Lớp</label>
                        <div class="row">
                            @foreach(HomeClass::all() as $value)
                            <div class="col-sm-6">
                                {{ Form::checkbox("class_id[".$value->id."]", $value->id, null, ['id' => 'class-'.$value->id,'data-id' => $value->id, 'class' => 'field check-class']) }} {{ $value->name }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="config-course">
                        
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
@include('admin.script.course')
@stop