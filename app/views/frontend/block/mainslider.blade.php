<section id="slider" class="main-border-color">
    <div class="row">
        <div id="main-slider" class="main-slider clearfix">

            <div data-u="loading" class="slider-loading">
                <img src="frontend/img/oval.svg" />
            </div>

            <div data-u="slides" class="slider-items" style="">
                @foreach($slides as $slide)
                <div>
                    <a href="{{ $slide->link_url }}"><img data-u="image" src="{{ url(IMAGESLIDE. '/' . $slide->image_url) }}" /></a>
                    @if($slide->description)
                    <div class="caption">
                        <div class="slider-title">{{ $slide->description }}</div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="slider-bullet" data-autocenter="1">
                <!-- bullet navigator item prototype -->
                <div data-u="prototype"></div>
            </div>
        </div>
    </div>
</section>