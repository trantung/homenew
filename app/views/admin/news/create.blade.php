@extends('admin.layout.default')
    {{ $title='Thêm mới tin tức' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('NewsController@getIndex') }}" class="btn btn-success">Danh sách tin tức</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('NewsController@postStore'), 'files' => true)) }}
            @if (isset($USER))
                @if(checkPermission())
                    @include('admin.news.admin_create')
                @else
                <div class="box-body">
                    @if(checkPermissionBlock() == HOME_BLOCK || checkPermissionBlock() == SUPER_ADMIN )
                    <div class="form-group">
                        <label for="tentheloai">Loại tin tức</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('is_hot', [1 => 'Tin nóng', 2 => 'Tin thường'], null,  array('class' => 'form-control'))}}
                                {{ Form::hidden('is_home', ACTIVE) }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="tentheloai">Tên tin tức</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Trạng thái tin</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('status', getStatus(), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tentheloai">Sapo</label>
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea class="form-control" rows="5" id="editor1" name="sapo">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    @if(checkPermissionBlock() == HOME_BLOCK || checkPermissionBlock() == SUPER_ADMIN )
                    <div class="form-group">
                        <label for="tentheloai">Ảnh destop</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::file('logo', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tentheloai">Ảnh mobile</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::file('logo_mobile', array('id' => 'logo')) }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="tentheloai">Link</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    @if($blockId != HOME_BLOCK)
                    <div class="form-group">
                        <label for="tentheloai">Vị trí hiển thị</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('type_news[0][type_new_id]', [0 => 'Chọn']+CommonAdmin::getTypeNewByBlock($blockId), null,  array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="weight_number">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('type_news[0][weight_number]', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div> --}}
                    @else
                    <div class="form-group">
                        <label for="weight_number">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Lưu lại" />
                    <input type="reset" class="btn btn-default" value="Nhập lại" />
                </div>
                @endif
            @endif
                {{ Form::close() }}
            </div>
            <!-- /.box -->
        </div>
    </div>

@include('admin.common.ckeditor')
@include('admin.script.check-disabled')
<script type="text/javascript">
    $( ".check-menu" ).change(function() {
        controlInput(this, 'menu');
    }).change();
    $( ".check-block" ).change(function() {
        controlInput(this, 'block');
    }).change();
    $( ".check-type" ).change(function() {
        console.log("function");
        controlInput(this, 'type');
    }).change();
</script>
@stop