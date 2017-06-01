@extends('admin.layout.default')
    {{ $title='Thêm mới' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('TypeNewsController@index') }}" class="btn btn-success">Danh sách</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('TypeNewsController@store'))) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên loại tin</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::text('name', null , textParentCategory('Tên loại tin')) }}
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
                        <label for="email">Chọn khối</label>
                        <div class="row">
                            @foreach(Blocks::all() as $value)
                            <div class="col-sm-4">
                                {{ $value->name }}: {{ Form::checkbox("block[".$value->id."][block_id]", $value->id, null, ['id' => 'menu-'.$value->id, 'class' => 'field check-block', 'data-id' => $value->id]) }} 
                                {{ Form::text("block[".$value->id."][weight_number]", null, array('id'=>"weight-block-" . $value->id)) }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="email">Chọn chương trình</label>
                        <div class="row">
                            @foreach(Menus::all() as $value)
                            <div class="col-sm-4">
                                {{ $value->name }}: {{ Form::checkbox("menu[".$value->id."][menu_id]", $value->id, null, ['id' => 'menu-'.$value->id, 'class' => 'field check-menu', 'data-id' => $value->id]) }} 
                                {{ Form::text("menu[".$value->id."][weight_number]", null, array('id'=>"weight-menu-" . $value->id)) }}
                            </div>
                            @endforeach
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
    $( ".check-menu" ).change(function() {
        controlInput(this, 'menu');
    }).change();
    $( ".check-block" ).change(function() {
        controlInput(this, 'block');
    }).change();
</script>
@stop