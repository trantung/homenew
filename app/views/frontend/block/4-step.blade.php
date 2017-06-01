<section>
    <?php
        if (isset($menuId)) {
            $slideSeconds = CommonSite::getSlideByMenu($block, $class, $menuId, TYPE_SLIDE_ROW);
        } else {
            $slideSeconds = CommonSite::getSlideByClass($classId, TYPE_SLIDE_ROW);
        }
        $slideSeconds = $slideSeconds->toArray();
        $slideSeconds = array_chunk($slideSeconds, PAGINATE_4_STEP_SECOND);
    ?>
    <div class="container blur-background section-content">
        <h2 class="section-title main-color">
            <span class="text-uppercase">
                @if ($config = SlideConfig::whereNotNull('title')
                ->where('model_name', 'menu')
                ->where('model_id', $menuId)
                ->orderBy('id', 'DESC')
                ->first())
                    {{ $config->title; }}
                @endif
            </span>
        </h2>

        <div class="item-carousel">
            <div id="carousel-items" class="carousel slide av-carousel" data-ride="carousel">
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner main-color" role="listbox">
                    @foreach($slideSeconds as $k => $slide)
                    <div class="item {{ checkActive($k) }}">
                        <div class="jav-items">
                            @foreach($slide as $vSlide)
                            <div class="jav-item">
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
