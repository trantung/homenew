<div id="course-render">
    @foreach($listCourse as $kCourse => $vCourse)
        <div class="col-md-4 list-course">
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
                            {{-- <p class="surtitle">Giáo viên</p>
                            <p class="text-uppercase">{{ getNameTeacherByCourse($vCourse->courseId) }}</p>
                            <p class="surtitle">Bộ môn: {{ $vCourse->subject_name }}</p> --}}

                            <div class="ig-subject clearfix">
                                <div class="i-subject igs-item"><span>{{ $vCourse->subject_name }}</span></div>
                                <div class="i-level igs-item"><span>{{ getGroupNameByCourse($vCourse->courseId) }}</span></div>
                            </div>

                            <div class="ig-tm">
                                <p class="surtitle">Tên khoá học</p>
                                <p>{{ $vCourse->fullname }}</p>
                            </div>

                            <div class="ig-tm">
                                <p class="surtitle">Học phí cả năm</p>
                                <p>{{ $vCourse->fee }}</p>
                            </div>
                            <div class="ig-tm">
                                <p class="surtitle">Ngày bế giảng</p>
                                <p>{{ convertTimeFormat($vCourse->finishtime) }}</p>
                            </div>
                            <div class="ig-tm">
                                <p class="surtitle">Giáo viên</p>
                                <p class="text-uppercase">{{ getNameTeacherByCourse($vCourse->courseId) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        
        </div>
    @endforeach
</div>