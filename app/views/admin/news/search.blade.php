<div class="margin-bottom">
    {{ Form::open(array('action' => 'CourseManagerController@search', 'method' => 'GET')) }}
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Id tin tức</label>
        {{ Form::text('id', Input::get('id'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Tiêu đề</label>
        {{ Form::text('name', Input::get('fullname'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Chương trình</label>
        {{ Form::select('subject', ['' => 'Chọn tất cả'] + Subject::lists('name', 'id'), Input::get('subject'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
     <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Thể loại</label>
        {{ Form::select('subject', ['' => 'Chọn tất cả'] + Subject::lists('name', 'id'), Input::get('subject'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="display: block; vertical-align: bottom; margin-top: 15px;">
        {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>