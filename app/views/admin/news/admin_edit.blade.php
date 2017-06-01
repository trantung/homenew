<div class="form-group">
    <label for="tentheloai">Loại tin tức</label>
    <div class="row">
        <div class="col-sm-6">
            {{ Form::select('is_hot', [1 => 'Tin nóng', 2 => 'Tin thường'], $data->is_hot,  array('class' => 'form-control'))}}
        </div>
    </div>
</div>
<div class="box-body">
    <div class="form-group">
        <label for="tentheloai">Tên tin tức</label>
        <div class="row">
            <div class="col-sm-6">
                <input type="text" class="form-control" id="name" value="{{ $data->name }}" placeholder="Tên tin tức" name="name">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="tentheloai">Hiển thị trang chủ</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::select('is_home', [1 => 'show', 2=>'hidden'], $data->is_home,  array('class' => 'form-control'))}}
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Chọn thể loại tin</label>
        <div class="row">
            @foreach(TypeNews::all() as $value)
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">
                        {{ $value->name }}: {{ Form::checkbox("type_news[".$value->id."][type_new_id]", $value->id, Common::checkValueChecked('RelationNewType', ['new_id' => $data->id, 'type_new_id'=>$value->id]), ['data-id' => $value->id, 'class' => 'field check-type']) }}
                    </span>
                    {{ 
                        Form::text(
                            "type_news[".$value->id."][weight_number]", 
                            Common::checkValueChecked('RelationNewType',['type_new_id' => $value->id, 'new_id' => $data->id], 'weight_number'), 
                            array(
                                'id'=>"weight-type-" . $value->id, 
                                Common::checkDisabled('RelationNewType', ['new_id' => $data->id, 'type_new_id' => $value->id]),
                                'class' => 'form-control'
                            )
                        ) 
                    }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="email">Chọn chương trình</label>
        <div class="row">
            @foreach(Menus::all() as $value)
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">
                        {{ $value->name }}: {{ Form::checkbox("menu[".$value->id."][menu_id]", $value->id, Common::checkValueChecked('NewsMenu', ['news_id' => $data->id, 'menu_id'=>$value->id]), ['id' => 'menu-'.$value->id, 'class' => 'field check-menu', 'data-id' => $value->id]) }} 
                    </span>
                    {{ 
                        Form::text(
                            "menu[".$value->id."][weight_number]", 
                            Common::checkValueChecked('NewsMenu',['menu_id' => $value->id, 'news_id' => $data->id], 'weight_number'), 
                            array(
                                'id'=>"weight-menu-" . $value->id, 
                                Common::checkDisabled('NewsMenu', ['news_id' => $data->id, 'menu_id' => $value->id]),
                                'class' => 'form-control'
                            )
                        ) 
                    }}
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="email">Chọn khối</label>
        <div class="row">
            @foreach(Blocks::all() as $value)
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">
                        {{ $value->name }}: {{ Form::checkbox("block[".$value->id."][block_id]", $value->id, Common::checkValueChecked('NewsBlock', ['news_id' => $data->id, 'block_id'=>$value->id]), ['id' => 'menu-'.$value->id, 'class' => 'field check-block', 'data-id' => $value->id]) }} 
                    </span>
                    {{ 
                        Form::text(
                            "block[".$value->id."][weight_number]", 
                            Common::checkValueChecked('NewsBlock',['block_id' => $value->id, 'news_id' => $data->id], 'weight_number'), 
                            array(
                                'id'=>"weight-block-" . $value->id, 
                                Common::checkDisabled('NewsBlock', ['news_id' => $data->id, 'block_id' => $value->id]),
                                'class' => 'form-control'
                            )
                        ) 
                    }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="rate">Mô tả ngắn</label>
        <div class="row">
            <div class="col-sm-12">
                  <textarea class="form-control" rows="5" id="editor1" name="sapo">
                      {{ $data->sapo }}
                  </textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="name">Image</label>
        <div class="row">
            <div class="col-sm-6">
                <img class="image_fb" src="{{  url(IMAGENEWS.$data->logo) }}" />
                {{ Form::file('logo', array('id' => 'logo')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="tentheloai">Ảnh mobile</label>
        <div class="row">
            <div class="col-sm-6">
                <img class="image_fb" src="{{  url(IMAGENEWS_MOBILE.$data->logo_mobile) }}" />
                {{ Form::file('logo_mobile', array('id' => 'logo')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="tentheloai">Link</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::text('link', $data->link , textParentCategory('nhập link')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="weight_number">Mức ưu tiên</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::text('weight_number', $data->weight_number , textParentCategory('Mức ưu tiên')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Trạng thái tin</label>
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