@extends('frontend.layout.default')

@stop

@section('block-var')
    <style>
        :root {
            --gradient-start: #03499a;
            --gradient-start-90: rgba(3,73,154, 0.9);
            --gradient-end: #0072bc;
            --gradient-end-75: rgba(0,114,188, 0.75);
            --gradient-end-90: rgba(0,114,188, 0.9);
            --main-color: #0089cf;
            --main-color-75: rgba(0,137,207, 0.75);
            --main-color-90: rgba(0,137,207, 0.90);
            --main-hover: #0072bc;
        }
    </style>
@stop
@section('content')
    @include('frontend.block.menu', array('menu' => $menu, 'block' => $block))
    <section id="coach">
        <div class="container blur-background section-content">
            <div class="co-wr">
                <div class="co-p1 clearfix">
                    <div class="co-img">
                        @if ($teacher->info)
                            <img src="{{ url(IMAGE_TEACHER . $teacher->info->image_detail ) }}" alt="">
                        @else
                            Chưa xác định
                        @endif
                    </div>
                    <div class="co-desc">
                        <div class="co-top">
                            <span class="co-name main-color">{{ $teacher->hoten }}</span>
                            <span class="co-star">
                                <i class="fa fa-star sgold" aria-hidden="true"></i>
                                <i class="fa fa-star sgold" aria-hidden="true"></i>
                                <i class="fa fa-star sgold" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="co-sub">Giáo viên môn {{ implode(',', CommonSite::getSubjectOnTeacher($teacherId)) }}</div>
                        <div class="co-mid">
                            <div class="co-info">
                                <div class="co-icon">
                                    <img src="{{ url('frontend/img/map.png') }}" alt="">
                                </div>
                                <div class="co-text">Thành phố 
                                    @if ($teacher->info)
                                        {{ $teacher->info->live_in }}
                                    @else
                                        Chưa xác định
                                    @endif
                                </div>
                            </div>
                            <div class="co-info">
                                <div class="co-icon">
                                    <img src="{{ url('frontend/img/birth.png') }}" alt="">
                                </div>
                                <div class="co-text">
                                    @if ($teacher->info)
                                        {{ $teacher->info->birthday }}
                                    @else
                                        Chưa xác định
                                    @endif
                                </div>
                            </div>
                            <div class="co-info">
                                <div class="co-icon">
                                    <img src="{{ url('frontend/img/study.png') }}" alt="">
                                </div>
                                <div class="co-text">
                                    @if ($teacher->info)
                                        {{ $teacher->info->description }}
                                    @else
                                        Chưa xác định
                                    @endif
                                </div>
                            </div>
                            <div class="co-info">
                                <div class="co-icon">
                                    <img src="{{ url('frontend/img/cup.png') }}" alt="">
                                </div>
                                <div class="co-text">
                                    @if ($teacher->info)
                                        {{ $teacher->info->record }}
                                    @else
                                        Chưa xác định
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="co-quote main-color">
                            @if ($teacher->info)
                                {{ $teacher->info->slogan }}
                            @else
                                Chưa xác định
                            @endif
                        </div>
                    </div>
                </div>
                <div class="co-p2">
                    <div class="table-responsive">
                    <table  class="table tb-courses courses2">
                        <thead>
                        <tr>
                            <th class="col-md-3">Loại khóa</th>
                            <th class="col-md-2">Dành cho học sinh</th>
                            <th class="col-md-4">Khóa học</th>
                            <th class="col-md-3">Đăng ký</th>
                        </tr>
                        </thead>
                    </table>

                    <div class="co-scroll course-list">
                        <table id="tb-courses" class="table tb-courses">
                            <tbody>
                            @foreach(CommonSite::getListCourseOnTeacher($teacherId) as $value)
                                <tr>
                                    <td class="col-md-3">{{ $value->fullname }}</td>
                                    <td class="col-md-2">{{ $value->student }}</td>
                                    <td class="col-md-4">{{ $value->summary }}</td>
                                    <td class="col-md-3 text-center"><a href="/package/?groupid={{ $value->groupid }}&packageid={{ $value->packageid }}" class=" hbtn main-gradient btn-regcourse">đăng ký</a></td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <div class="co-p3">
                    <div class="co-title main-gradient">bài giảng học thử</div>
                    <ul class="nav nav-tabs pen-tab" role="tablist">
                        @foreach(getAllDataModel($teacherId, $class) as $key => $value)
                        <li role="presentation" class="{{ checkActive($key) }}">
                        <a href="#pen-{{ $key }}" aria-controls="home" role="tab" data-toggle="tab">
                        {{ PackageGroup::find($value)->code }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach(getAllDataModel($teacherId, $class) as $key => $v)
                        <div role="tabpanel" class="tab-pane fade in {{ checkActive($key) }}" id="pen-{{ $key }}">
                            <div class="free-lesson co-scroll">
                                @foreach(CourseTeacherManagerFree::where('teacher_id', $teacherId)->where('class_id', $class)->where('groupid', $v)->get() as $kFree=>$vFree)
                                <div class="pen-item">
                                    <div class="pen-img">
                                        <a href="{{ url($vFree->link) }}"><img src="{{ url(IMAGECOURSETEACHER. '/' . $vFree->image_url_teacher) }}" alt=""></a>
                                    </div>
                                    <div class="pen-content">
                                        <div class="pen-content-wr">
                                            <div class="pen-title"><a href="{{ url($vFree->link) }}">{{ $vFree->name }}</a></div>
                                            <div class="pen-desc">{{ $vFree->description }}</div>
                                            <div class="pen-group"><a href="#">{{ PackageGroup::find($v)->code }} {{ CourseGroup::find($vFree->course_group_id)->shortname }}</a></div>
                                            <div class="pen-teacher"><a href="#">{{ $teacher->hoten }}</a></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="">
                    <div class="co-title main-gradient">tài liệu miễn phí</div>
                    <div class="doc-items co-p4 co-scroll">
                        <div class="doc-items-content">
                        @foreach(CommonSite::getDocumentByTeacher($teacherId) as $document)
                            <div class="doc-item">
                                <div class="doc-img">
                                    <img src="{{ url(IMAGEDOCUMENT. '/' . $document->image_url) }}" alt="">
                                </div>
                                <div class="doc-content">
                                    <div class="doc-title"><a href="#">{{ $document->name }}</a></div>
                                    <div class="doc-desc">{{ $document->description }}</div>
                                </div>
                                <div class="doc-btn">
                                    <a href="{{ url(FILEDOCUMENT.$document->files) }}" class="btn-download-doc main-gradient main-gradient">download</a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.block.choosecoursesecond', array('classList' => $classList))
@stop