<section id="teacher">
    <div class="container blur-background section-content">
        <h2 class="teacher-headtitle main-color">
            <span class="text-uppercase">GIÁO VIÊN {{ HomeClass::find($class)->name }}</span>
        </h2>
        <div class="row">
        @foreach($listteacher as $value)
            <div class="col-md-4 hidden-sm hidden-xs">
                <a href="{{ url('/giao-vien/'.$block.'/'.$class.'/'. $value['id']) }}">
                    <div class="item-grid">
                        <img src="{{ url(IMAGE_TEACHER. '/' . $value->image) }}">
                        <div class="ig-description main-gradient-90">
                            <p class="surtitle">GIÁO VIÊN</p>
                            <p class="text-uppercase">{{ $value->name }}</p>
                            <p class="surtitle">Bộ môn: {{ $value->subject_name }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="item-carousel">
            <div id="carousel-items" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                        <div class="row">
                            <div class="gv12_mobile">
                                @foreach($listteacherSlide_v2 as $k => $vSlide)
                                    <div class="col-md-4">
                                        <a href="{{ url('/giao-vien/'.$block.'/'.$class.'/'. $vSlide->id) }}">
                                            <div class="item-grid item-grid_mod-2">
                                                <img src="{{ url(IMAGE_TEACHER. '/' . $vSlide->image) }}">
                                                <div class="ig-description main-gradient-90">
                                                    <p class="surtitle">GIÁO VIÊN</p>
                                                    <p class="text-uppercase">{{ $vSlide->name }}</p>
                                                    <p class="surtitle">Bộ môn: {{ $vSlide->subject_name }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>