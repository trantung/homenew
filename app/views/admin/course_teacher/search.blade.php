<div class="margin-bottom">
    {{ Form::open(array('action' => 'CourseTeacherController@search', 'method' => 'GET')) }}
    <div class="input-group" style="width: 150px; display:inline-block;">
        <label>Chương trình</label>
        {{ Form::select('groupid', ['' => 'Chọn']+getAllPackageGroup('code'), null,  array('class' => 'form-control', 'id' => 'groupid'))}}
    </div>
    <div class="input-group" style="display: block; vertical-align: bottom; margin-top: 15px;">
        {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
    </div>
    {{ Form::close() }}
</div>