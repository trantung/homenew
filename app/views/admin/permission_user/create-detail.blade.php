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
                    <div class="form-group">
                        <label for="email">Hiển thị theo</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('model_name', ['' => 'Chọn', 'Blocks' => 'Theo khối', 'Menus' => 'Theo chương trình'], null,  array('class' => 'form-control', 'id' => 'model_name'))}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Trang hiển thị</label>
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::select('model_id', ['' => 'Chọn'], null,  array('class' => 'form-control', 'id' => 'model_id'))}}
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
                    <div class="form-group">
                        <label>Thông báo hết hạn</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input name="expire_time" id="expire_time" class="form-control" >
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
<script type="text/javascript">
    //Date picker
    $( "#start_time" ).datepicker({ dateFormat: "dd-mm-yy" });
    $( "#finish_time" ).datepicker({ dateFormat: "dd-mm-yy" });
    $( "#expire_time" ).datepicker({ dateFormat: "dd-mm-yy" });
    $(document).ready(function () {
          $('#model_name').on('change', function (e) {
              var modelName = $('#model_name').val();
                $('#model_id').html('');
              if (modelName != '') {
                getData(modelName);
              }

          });
      });
      function getData(model) {
        $.ajax({
          type: "GET",
          url: '/manager/homenew/public/api/json/data-by-model/' + model,
          success: function(response){
            if(response.status){                
                $('#model_id').html('');
                $.each(response.data, function (i, item) {
                    $('#model_id').append($('<option>', { 
                        value: item.id,
                        text : item.name 
                    }));
                });
              }
            }
        });
      }
</script>
@stop