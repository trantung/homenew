<section id="list-courses">
    <div class="container blur-background section-content">
        <h2 class="section-title main-color">
            <span class="text-uppercase">các khóa học</span>
        </h2>
        <div class="row feature-courses">
        <div class="gv12_mobile">
        @foreach($listCourseHot as $kcourse => $course)
            <div class="col-md-4">
                <a href="{{ rewriteUrl(Course::find($course->courseId), COURSE_REWRITE) }}">
                    <div class="item-grid">
                        <img src="{{ getImageUrlFromHomeNewCourseByCourseId($course->courseId, $course->groupId) }}">
                        <div class="ig-description main-gradient-90">
                            <div class="ig-description-content">

                                <div class="ig-features clearfix">
                                    @if(checkValueCourse($course->courseId, $course->groupId, 'is_hot'))
                                        <div class="f-hot">Hot <br> <span>course</span></div>
                                    @endif
                                    @if(checkValueCourse($course->courseId, $course->groupId, 'is_sale'))
                                        <div class="f-sales f-hot">Sale</div>
                                    @endif
                                </div>

                                <div class="ig-subject clearfix">
                                    <div class="i-subject igs-item"><span>{{ $course->subject_name }}</span></div>
                                    <div class="i-level igs-item"><span>{{ getGroupNameByCourse($course->courseId) }}</span></div>
                                </div>

                                <div class="ig-tm">
                                    <p class="surtitle">Tên khoá học</p>
                                    <p>{{ $course->fullname }}</p>
                                </div>

                                <div class="ig-tm">
                                    <p class="surtitle">Học phí trọn gói</p>
                                    <p>{{ number_format($course->fee, 0, '.', '.'); }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
        </div>
        <div class="row">

            @foreach($listCourse as $kCourse => $vCourse)
            <div class="col-md-4">
                <a href="{{ rewriteUrl(Course::find($vCourse->courseId), COURSE_REWRITE) }}">
                    <div class="item-grid item-grid_mod-2">
                        <img src="{{ getImageUrlFromHomeNewCourseByCourseId($vCourse->courseId, $vCourse->groupId) }}">
                        <div class="ig-description main-gradient-90">
                            <div class="ig-description-content">
                                <div class="ig-features clearfix">
                                    @if(checkValueCourse($vCourse->courseId, $vCourse->groupId, 'is_hot'))
                                        <div class="f-hot">Hot <br> <span>course</span></div>
                                    @endif
                                    @if(checkValueCourse($vCourse->courseId, $vCourse->groupId, 'is_sale'))
                                        <div class="f-sales f-hot">Sale</div>
                                    @endif
                                </div>
                                <div class="ig-tm">
                                    <p class="surtitle">Tên khoá học</p>
                                    <p>{{ $vCourse->fullname }}</p>
                                </div>
                                <div class="ig-tm">
                                    <p class="surtitle">Học phí trọn gói</p>
                                    <p>{{ number_format($vCourse->fee, 0, '.', '.'); }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            @endforeach

        </div>
    </div>
</section>