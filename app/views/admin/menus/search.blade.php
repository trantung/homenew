<div class="margin-bottom">
    {{ Form::open(array('action' => 'MenuController@index', 'method' => 'GET')) }}
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Tiêu đề</label>
        {{ Form::text('name', Input::get('name'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Trạng thái</label>
        {{ Form::select('status', ['' => 'Chọn tất cả', '1' => 'Hiển thị', '2' => 'Ẩn'] , Input::get('status'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="display: block; vertical-align: bottom; margin-top: 15px;">
        {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>