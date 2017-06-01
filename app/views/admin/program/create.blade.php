@extends('admin.layout.default')
    {{ $title='Thêm mới chương trình' }}
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
                {{ Form::open(array('action' => array('ProgramController@store'))) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="class">Chọn menu</label>
                        <div class="row">
                            <div class="col-sm-9">
                                {{ Form::select('menu_id', ['' => 'Chọn'] + getMenuByBlock(), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="class">Chọn package group</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('package_group_id', ['' => 'Chọn'] + getAllPackageGroup('code'), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label for="tentheloai">Mô tả đối tượng</label>
                        <div class="row">
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" id="note" name="description_object"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Mô tả chương trình</label>
                        <div class="row">
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" id="note2" name="description_program"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Mô tả chung</label>
                        <div class="row">
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" id="editor3" name="description"></textarea>
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
@stop