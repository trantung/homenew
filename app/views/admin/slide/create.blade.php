@extends('admin.layout.default')
    {{ $title='Thêm mới slide' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('SlideController@index') }}" class="btn btn-success">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('SlideController@store'), 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên slide</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" placeholder="Tên slide" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn Lớp</label>
                        <div class="row">
                            @foreach(HomeClass::all() as $value)
                            <div class="col-sm-6">
                                {{ $value->name }}: {{ Form::checkbox("class_id[]", $value->id, null, ['class' => 'field']) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn chương trình</label>
                        <div class="row">
                            @foreach(Menus::all() as $value)
                            <div class="col-sm-6">
                                {{ $value->name }}: {{ Form::checkbox("menu_id[]", $value->id, null, ['class' => 'field']) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn khối</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('block_id', ['' => 'Không chọn', 4 => 'Chọn trang chủ']+returnList('Blocks'), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="rate">Ghi chú</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="note" name="note" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="note2" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="row">
                            <div class="col-sm-6">
                                
                                {{ Form::file('image_url', array('id' => 'image_url', 'multiple' => true)) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Kiểu slide</label>
                        <div class="row">
                            <div class="col-sm-6">                      
                               {{ Form::select('display_type', getTypeSlide(), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email">Trạng thái</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('status', getStatus(), null,  array('class' => 'form-control'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Mức ưu tiên</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('weight_number', null , textParentCategory('Mức ưu tiên')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Link slide</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::text('link_url', null , textParentCategory('Link slide')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Thời gian bắt đầu</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input name="start_time" id="start_time" class="form-control" >
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
                                  <input name="finish_time" id="finish_time" class="form-control" >
                                </div>
                                <!-- /.input group -->
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
<script type="text/javascript">
    //Date picker
    $( "#start_time" ).datepicker({ dateFormat: "dd-mm-yy" });
    $( "#finish_time" ).datepicker({ dateFormat: "dd-mm-yy" });
</script>
@stop