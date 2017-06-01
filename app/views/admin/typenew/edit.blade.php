@extends('admin.layout.default')
    {{ $title='Sửa' }}
@stop

@section('content')

    <div class="row margin-bottom">
        <div class="col-xs-12">
            <a href="{{ action('TypeNewsController@index') }}" class="btn btn-success">Danh sách loại tin</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- form start -->
                {{ Form::open(array('action' => array('TypeNewsController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tentheloai">Tên loại tin</label>
                        <div class="row">
                            <div class="col-sm-6">
                                 {{ Form::text('name', $data->name , textParentCategory('Tên loại tin')) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate">Mô tả</label>
                        <div class="row">
                            <div class="col-sm-6">
                                  <textarea class="form-control" rows="5" id="comment" name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn khối</label>
                        <div class="row">
                            @foreach(Blocks::all() as $value)
                            <div class="col-sm-4">
                                {{ $value->name }}: {{ Form::checkbox("block[".$value->id."][block_id]", $value->id, Common::checkValueChecked('BlockTypeNew', ['type_new_id' => $data->id, 'block_id'=>$value->id]), ['class' => 'field check-block', 'data-id' => $value->id]) }}
                                {{ 
                                    Form::text(
                                        "block[".$value->id."][weight_number]", 
                                        Common::checkValueChecked('BlockTypeNew',['block_id' => $value->id, 'type_new_id' => $data->id], 'weight_number'), 
                                        array(
                                            'id'=>"weight-block-" . $value->id, 
                                            Common::checkDisabled('BlockTypeNew', ['type_new_id' => $data->id, 'block_id' => $value->id]),

                                        )
                                    ) 
                                }}
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Chọn chương trình</label>
                        <div class="row">
                            @foreach(Menus::all() as $value)
                            <div class="col-sm-4">
                                {{ $value->name }}: {{ Form::checkbox("menu[".$value->id."][menu_id]", $value->id, Common::checkValueChecked('TypeNewsMenu', ['type_news_id' => $data->id, 'menu_id'=>$value->id]), ['class' => 'field check-menu', 'data-id' => $value->id]) }}
                                {{ 
                                    Form::text(
                                        "menu[".$value->id."][weight_number]", 
                                        Common::checkValueChecked('TypeNewsMenu',['menu_id' => $value->id, 'type_news_id' => $data->id], 'weight_number'), 
                                        array(
                                            'id'=>"weight-menu-" . $value->id, 
                                            Common::checkDisabled('TypeNewsMenu', ['type_news_id' => $data->id, 'menu_id' => $value->id]),

                                        )
                                    ) 
                                }}
                            </div>
                            @endforeach
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