@extends('admin.layout.default')
    {{ $title='Sửa ' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('LinkUrlController@index') }}" class="btn btn-success">Danh sách </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('LinkUrlController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên link</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('name', $data->name , textParentCategory('Tên link')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class">Khối</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('block_id', ['' => 'Chọn']+returnList('Blocks'), $data->block_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="class">Chương trình</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('menu_id', ['' => 'Chọn']+returnList('Menus'), $data->menu_id,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGELINKURL.$data->logo) }}" />
                                {{ Form::file('logo', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image hover</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGELINKURL.$data->logo_hover) }}" />
                                {{ Form::file('logo_hover', array('id' => 'logo_hover')) }}
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
                    <div class="form-group">
                        <label for="tentheloai">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                            {{ Form::text('weight_number', $data->weight_number , textParentCategory('Mức ưu tiên')) }}
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