@extends('admin.layout.default')
    {{ $title='Thêm mới banner' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('BannerController@index') }}" class="btn btn-success">Danh sách banner</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('BannerController@store'), 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên banner</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" placeholder="Tên banner" name="name">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="model_name" value="Blocks">
                    <input type="hidden" name="model_id" value="4">
                    <input type="hidden" name="block_id" value="4">
                    <input type="hidden" name="position" value="1">
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::file('image_url', array('id' => 'image_url', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image mobile</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::file('image_url_mobile', array('id' => 'image_url', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Link banner</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link_url', null , textParentCategory('Link banner')) }}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="email">Trạng thái</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('status', [1 => 'Hiển thị', 2 => 'Ẩn'],null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label>Thời gian bắt đầu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input name="time_start" id="time_start" class="form-control" >
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
                                  <input name="time_end" id="time_end" class="form-control" >
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::checkbox('expire_time', 1,null) }}
                        <label>Thông báo hết hạn</label>
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
<script type="text/javascript">
    //Date picker
    $( "#time_start" ).datepicker({ dateFormat: "dd-mm-yy" });
    $( "#time_end" ).datepicker({ dateFormat: "dd-mm-yy" });
    
</script>
@stop