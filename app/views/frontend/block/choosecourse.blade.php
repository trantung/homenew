<section id="choose-course" class="main-gradient">
    <div class="container section-content">
        <div class="cc-title">
            Đã có <b>{{ getTotalUserHocMai() }}</b> học sinh tin tưởng HOCMAI<br>
            đăng ký ngay để thực hiện giấc mơ Đại học
        </div>
        <div class="cc-select">
            <form class="cc-select-form js-validation-bootstrap" method="GET" action="/package/">
                {{ Form::select('subject_id', ['' => 'Chọn môn'] + Subject::lists('name', 'id'), null,  array('class' => 'bselect js-select2','id' => 'subject_id'))}}
                 {{ Form::select('teacher', ['' => 'Chọn giáo viên'], null,  array('class' => 'bselect js-select2','id' => 'teacher_select'))}}
                {{ Form::select('course_id', ['' => 'Chọn khóa học'], null,  array('class' => 'bselect js-select2','id' => 'course_id'))}}
                 <input type="hidden" value="" name="groupid" id="course_filter_groupid_1"/>
                 <input type="hidden" value="" name="packageid" id="course_filter_package_id_1"/>
                 <button class="hbtn choose-btn main-gradient">Đăng ký</button>
                {{--<a href="" id="regMyCourse" class="hbtn choose-btn chooclassc">Đăng ký</a>--}}
            </form>
        </div>
    </div>
</section>
