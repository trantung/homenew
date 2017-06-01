<section id="second-slider" class="main-border-color">
                <div class="container section-content">
                    <div id="carousel-second" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="row clearfix">
                                    <div class="multi3">
                                    @foreach($test as $kSlide=>$vSlide)
                                        <div class="col-md-4">
                                            <div class="ss-item">
                                                <div class="ss-img">
                                                    <div class="img">
                                                         <img src="{{ url(IMAGESLIDE. '/' . $vSlide->image_url) }}">
                                                    </div>
                                                </div>
                                                <div class="ss-description">
                                                {{ $vSlide->description }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>