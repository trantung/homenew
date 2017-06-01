<section id="choose-course-second" class="">
    <div class="container section-content text-center">
        <ul class="classes">
            @foreach($classList as $key => $value)
            <li class="{{ checkActiveClass($class , $value->id) }}">
                <div class="class-wrapp">
                    <div class="c-label">Lớp</div>
                    <div class="c-number">{{ $value->id }}</div>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="cc-title text-center main-color-2">
            Đã có <b>{{ getTotalUserHocMai() }} </b> học sinh tin tưởng HOCMAI<br>
        </div>

        <div class="cc-select">
            <form class="cc-select-form js-validation-bootstrap" method="GET" action="/package/">
                {{ Form::select('subject_id_2', ['' => 'Chọn môn'] + Subject::lists('name', 'id'), null,  array('class' => 'bselect js-select2','id' => 'subject_id_2'))}}
                 {{ Form::select('teacher_id_2', ['' => 'Chọn giáo viên'], null,  array('class' => 'bselect js-select2','id' => 'teacher_id_2'))}}
                {{ Form::select('course_id_2', ['' => 'Chọn khóa học'], null,  array('class' => 'bselect js-select2','id' => 'course_id_2'))}}
                 <input type="hidden" value="" name="groupid" id="course_filter_groupid_1"/>
                 <input type="hidden" value="" name="packageid" id="course_filter_package_id_1"/>
                 <button class="hbtn choose-btn main-gradient">Đăng ký</button>
                {{--<a href="" id="regMyCourse" class="hbtn choose-btn chooclassc">Đăng ký</a>--}}
            </form>
        </div>
    </div>
</section>