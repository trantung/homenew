<div class="box-body">
    <div class="form-group">
        <label for="tentheloai">Loại tin tức</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::select('is_hot', [1 => 'Tin nóng', 2 => 'Tin thường'], null,  array('class' => 'form-control'))}}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="tentheloai">Tên tin tức</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::text('name', null, array('class' => 'form-control')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="tentheloai">Hiển thị trang chủ</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::select('is_home', [2=>'hidden', 1 => 'show'], null,  array('class' => 'form-control'))}}
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
                        {{ $value->name }}: {{ Form::checkbox("type_news[".$value->id."][type_new_id]", $value->id, null, ['id' => 'menu-'.$value->id, 'class' => 'field check-type', 'data-id' => $value->id]) }}
                    </span>
                    {{ Form::text("type_news[".$value->id."][weight_number]", null, array('id'=>"weight-type-" . $value->id, 'class' => 'form-control')) }}
                </div>
            </div>
            @endforeach
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
        <label for="email">Chọn chương trình</label>
        <div class="row">
            @foreach(Menus::all() as $value)
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">
                        {{ $value->name }}: {{ Form::checkbox("menu[".$value->id."][menu_id]", $value->id, null, ['id' => 'menu-'.$value->id, 'class' => 'field check-menu', 'data-id' => $value->id]) }} 
                    </span>
                    {{ Form::text("menu[".$value->id."][weight_number]", null, array('id'=>"weight-menu-" . $value->id, 'class' => 'form-control')) }}
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
                        {{ $value->name }}: {{ Form::checkbox("block[".$value->id."][block_id]", $value->id, null, ['id' => 'block-'.$value->id, 'class' => 'field check-block', 'data-id' => $value->id]) }} 
                    </span>
                    {{ Form::text("block[".$value->id."][weight_number]", null, array('id'=>"weight-block-" . $value->id, 'class' => 'form-control')) }}
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        <label for="rate">Mô tả ngắn</label>
        <div class="row">
            <div class="col-sm-12">
                  <textarea class="form-control" rows="5" id="editor1" name="sapo"></textarea>
            </div>
        </div>
    </div>
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
    <div class="form-group">
        <label for="tentheloai">Link</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::text('link', null, array('class' => 'form-control')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="weight_number">Mức ưu tiên</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::text('weight_number', null , textParentCategory('Mức ưu tiên')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Trạng thái tin</label>
        <div class="row">
            <div class="col-sm-6">
                {{ Form::select('status', getStatus(), null,  array('class' => 'form-control'))}}
            </div>
        </div>
    </div>
    <div class="box-footer">
    <input type="submit" class="btn btn-primary" value="Lưu lại" />
    </div>
</div>


