<div id="course-class-{{$classId}}">
	<div class="form-group">
        <label>Chọn khóa học lớp {{ $classId }}</label>
        <div class="row">
            @foreach ($listCourse as $value)
            <div class="col-sm-6">
                {{ Form::checkbox("course_id[".$value->course_id."]", $value->course_id, Common::checkValueChecked('CardCourse', ['card_id' => $cardId, 'course_id'=> $value->course_id]), ['id' => 'course-'.$value->course_id, 'class' => 'field check-type', 'data-id' => $value->id]) }} {{ $value->fullname }}
            </div>
            @endforeach
        </div>
    </div>
</div>