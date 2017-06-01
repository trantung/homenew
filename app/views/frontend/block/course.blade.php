<section id="list-courses">
    <div class="container blur-background section-content">
        <h2 class="section-title main-color">
            <span class="text-uppercase">các khóa học</span>
        </h2>
        <div class="row">

            <div class="col-md-3 col-md-offset-9">
                {{ Form::select('subject_id', ['' => 'Chọn môn']+ CommonSite::getSubjectByClass($class), null,  array('class' => 'bselect', 'id' => 'choice-subject'))}}
            </div>
            <div id="content-course">
                @include('frontend.common.course-thcs')
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="/plugins/jquery/jquery.min.js"></script>
@include('frontend.block.script.course-thcs')