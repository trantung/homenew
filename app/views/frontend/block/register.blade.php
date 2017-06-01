<section id="choose-course-second" class="">
    <div class="container section-content text-center">
        
        <div class="cc-title text-center main-color-2">
            Đăng ký học ngay
        </div>

        <div class="cc-select">
            <form class="cc-select-form">
                {{ Form::select('subject_id', ['' => 'Chọn môn học'] + CommonSite::getSubjectByClass($class), null,  array('class' => 'bselect select-subject', 'id' => 'select-subject'))}}
                {{ Form::select('teacher_id', ['' => 'Chọn giáo viên'], null,  array('class' => 'bselect js-select2','id' => 'select-teacher'))}}
                {{ Form::select('course_id', ['' => 'Chọn khóa học'], null,  array('class' => 'bselect js-select2','id' => 'course_id'))}}
                <a href="" id="regMyCourseChoose" class="hbtn choose-btn main-gradient">Đăng ký</a>
                <!-- <button class="hbtn choose-btn main-gradient">Đăng ký</button> -->
            </form>
        </div>
    </div>
</section>