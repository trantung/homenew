@extends('admin.layout.default')
    {{ $title='Thêm mới slide' }}
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="/manager/homenew/public/adminlte/plugins/datetimepicker/bootstrap-datetimepicker.css">
    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('SlideController@getList', $typeSlide) }}" class="btn btn-success">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('SlideController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tiêu đề</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('name', $data->name ) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Ghi chú</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="note" name="note">{{ $data->note }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="note2" name="description" >{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGESLIDE.$data->image_url) }}" />
                                {{ Form::file('image_url', array('id' => 'image_url', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image mobile</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <img class="image_fb" src="{{  url(IMAGESLIDE_MOBILE.$data->image_url_mobile) }}" />
                                {{ Form::file('image_url_mobile', array('id' => 'image_url_mobile', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email">Trạng thái</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('status', getStatus(), $data->status,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', $data->weight_number , textParentCategory('Mức ưu tiên')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Link slide</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link_url', $data->link_url , textParentCategory('Link slide')) }}
                            </div>
                        </div>
                    </div>
                    @if ($typeConfig != TYPE_SLIDE_MENU && $typeSlide == TYPE_SLIDE_FULL)
                    <div class="form-group">
                        <label>Thời gian bắt đầu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input name="start_time" id="start_time" class="form-control datetimepicker"  value="{{ $data->start_time }}">
                                </div>
                            </div>
                        </div>
                        
                        <!-- /.input group -->
                      </div>
                    <div class="form-group">
                        <label>Thời gian kết thúc</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input name="finish_time" id="finish_time" class="form-control datetimepicker" value="{{ $data->finish_time }}">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::checkbox('expire_alert', 1,$data->expire_alert) }}
                        <label>Thông báo hết hạn</label>
                    </div>
                    @endif
                    @if ($typeConfig == TYPE_SLIDE_BLOCK)
                        <input type="hidden" name="block_id" value="{{ $modelId }}">
                    @else
                        @if ($typeConfig == TYPE_SLIDE_MENU && $typeSlide == TYPE_SLIDE_ROW)
                            <div class="form-group">
                                <label for="email">Chọn chương trình</label>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php 
                                            $arrMenu = MenuClass::whereBetween('class_id', array(6, 9))->lists('menu_id');
                                        ?>
                                        {{ Form::select('menu_id[]', ['' => 'Không chọn'] + Menus::whereIn('id', $arrMenu)->lists('name', 'id'), $data->menu_id,  array('class' => 'form-control'))}}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($typeConfig == TYPE_SLIDE_CLASS)
                            <input type="hidden" name="class_id[]" value="{{ $modelId }}">
                        @endif
                        @if ($typeConfig == TYPE_SLIDE_MENU && $typeSlide == TYPE_SLIDE_FULL)
                            <input type="hidden" name="menu_id[]" value="{{ $modelId }}">
                        @endif
                    @endif
                    <input type="hidden" name="display_type" value="{{ $typeSlide }}">
                </div>
                <input type="hidden" name="type_config" value="{{ $typeConfig }}">
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
<script type="text/javascript" src="/manager/homenew/public/adminlte/plugins/datetimepicker/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
    //Date picker
    $(".datetimepicker").datetimepicker({format: 'dd-mm-yyyy hh:ii'});
</script>
@stop