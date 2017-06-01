<div class="margin-bottom">
    {{ Form::open(array('action' => 'CardController@index', 'method' => 'GET')) }}
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Mã thẻ</label>
        {{ Form::text('code', Input::get('code'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Người được giao</label>
        {{ Form::select('admin_id', ['-1' => 'Chọn tất cả'] + CardAdmin::lists('username', 'id'), Input::get('admin_id'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Kích hoạt</label>
        {{ Form::select('active', ['-1' => 'Chọn tất cả', 0 => 'chưa đăng nhập', 1 => 'Đã đăng nhập'], Input::get('active'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Ngày kích hoạt</label>
        <input name="time_active" id="time_active" class="form-control" >
    </div>
    <div class="input-group" style="display: block; vertical-align: bottom; margin-top: 15px;">
        {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>