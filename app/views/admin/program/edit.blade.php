@extends('admin.layout.default')
    {{ $title='Sửa chương trình' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('ProgramController@index') }}" class="btn btn-success">Danh sách chương trình</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('ProgramController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="class">Chọn menu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('menu_id', ['' => 'Chọn'] + Menus::lists('name', 'id'), $data->menu_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="class">Chọn package group </label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('package_group_id', ['' => 'Chọn'] + getAllPackageGroup('code'), $data->package_group_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="tentheloai">Mô tả đối tượng</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('description_object', $data->description_object, ['id' => 'note']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Mô tả chương trình</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('description_program', $data->description_program, ['id' => 'note2']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Mô tả chung</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::textarea('description', $data->description, ['id' => 'editor3']) }}
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
@include('admin.common.ckeditor')
@include('admin.script.check-disabled')
<script type="text/javascript">
    $( ".check-class" ).change(function() {
        controlInput(this, 'class');
    }).change();
</script>
@stop