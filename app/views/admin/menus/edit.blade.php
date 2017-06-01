@extends('admin.layout.default')
    {{ $title='Sửa Lớp' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('MenuController@index') }}" class="btn btn-success">Danh sách Lớp</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('MenuController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên menu</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('name', $data->name, textParentCategory('Tên menu')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class">Chọn khối</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('block_id', ['' => 'Chọn'] + Blocks::lists('name', 'id'), $data->block_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn Lớp</label>
                        <div class="row">
                            @foreach(HomeClass::all() as $value)
                            <div class="col-sm-4">
                                {{ $value->name }}: {{ Form::checkbox("class[".$value->id."][class_id]", $value->id, Common::checkValueChecked('MenuClass', ['menu_id' => $data->id, 'class_id'=>$value->id]), ['data-id' => $value->id,'class' => 'field check-class']) }}
                                {{ 
                                    Form::text(
                                        "class[".$value->id."][weight_number]", 
                                        Common::checkValueChecked('MenuClass',['class_id' => $value->id, 'menu_id' => $data->id], 'weight_number'), 
                                        array('id'=>"weight-class-" . $value->id, Common::checkDisabled('MenuClass', ['menu_id' => $data->id, 'class_id' => $value->id]))
                                    ) 
                                }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class">Chọn package group </label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('package_group_id', ['' => 'Chọn'] + getAllPackageGroup('code'), $data->package_group_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('link', $data->link , textParentCategory('link')) }}
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
@include('admin.script.check-disabled')
<script type="text/javascript">
    $( ".check-class" ).change(function() {
        controlInput(this, 'class');
    }).change();
</script>
@stop