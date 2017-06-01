<section id="advantage">
    <?php
        $slideSeconds = CommonSite::getSlide($block, TYPE_SLIDE_ROW, 'id');
        $slideSeconds = array_chunk($slideSeconds, PAGINATE_SLIDE_SECOND);
    ?>
    <div class="container blur-background section-content">
        <h2 class="section-title main-color">
            <span class="text-uppercase">những điểm ưu việt tại học mãi</span>
        </h2>

        <div class="item-carousel">
            <div id="carousel-items" class="carousel slide av-carousel" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @for($i =0; $i < count($slideSeconds); $i++)
                    <li data-target="#carousel-items" data-slide-to="{{ $i }}" class="{{ checkActive($i) }}"></li>
                    @endfor
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner main-color" role="listbox">
                    @foreach($slideSeconds as $k => $slide)
                    <div class="item {{ checkActive($k) }}">
                        <div class="av-items">
                            @foreach($slide as $vSlide)
                            <div class="av-item">
                                <img src="{{ url(IMAGESLIDE. '/' . $vSlide['image_url']) }}" alt="">
                                <span>{{ $vSlide['description'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
