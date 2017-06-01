<div class="margin-bottom">
    {{ Form::open(array('action' => 'CourseManagerController@search', 'method' => 'GET')) }}
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Id khoá học</label>
        {{ Form::text('id', Input::get('id'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>FullName</label>
        {{ Form::text('fullname', Input::get('fullname'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Shortname</label>
        {{ Form::text('shortname', Input::get('shortname'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Môn</label>
        {{ Form::select('subject', ['' => 'Chọn tất cả'] + Subject::lists('name', 'id'), Input::get('subject'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
    </div>
    <div class="input-group" style="display: block; vertical-align: bottom; margin-top: 15px;">
        {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>