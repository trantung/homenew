<section id="thcs-courses" class="main-gradient main-border-color">
    <div class="container section-content">
        <div class="tc-title">
            <span class="main-color">hướng dẫn học tại học mãi</span>
        </div>

        <div class="tc-wr clearfix">
            <div class="tc-left">
                <iframe width="630" height="354" src="https://www.youtube.com/embed/kh8NqCCHCfc" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="tc-right">
                <div class="tc-inner">
                <?php $classId = CommonSite::getActiveClassByBlock($block);?>
                    <form class="tc-form js-validation-bootstrap" method="GET" action="/cart/">
                        <h3 class="tc-ftitle">khám phá các khóa học</h3>
                        <ul class="choose-class clearfix">
                            @foreach($classList as $classValue)
                            <li class="{{ checkActiveClass($classValue->id, $classId) }}" >
                            <a class="class_id_thcs" data-id="{{ $classValue->id }}" >
                                {{ $classValue->name }}
                            </a>
                            </li>
                            @endforeach
                        </ul>
                        {{ Form::select('subject_id', ['' => 'Chọn chương trình']+ CommonSite::getSubjectByClass($classId), null,  array('class' => 'choose-subject bselect js-select2', 'id' => 'subject_id_thcs'))}}
                        <button class="hbtn choose-btn">Tìm hiểu ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="/plugins/jquery/jquery.min.js"></script>
@include('frontend.block.script.thcs')
