<section id="home-menu" class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo"><a href="{{ action('Frontend\HomeController@index') }}" title="HOCMAI"><img src="{{ url('frontend/img/logo-blue.png') }}" alt="HOCMAI" title="HOCMAI"></a></div>
            </div>
            <div class="col-md-10">
                <ul class="home-menu clearfix">
                    @foreach($blocks as $value)
                    <li>
                        <a href="{{ action('Frontend\BlockController@blockDefault', CommonSite::getSlugNameByBlockId($value->id)) }}">
                            <div class="home-menu-item clearfix">
                                <div class="hmi-img"><img src="{{ url(IMAGEBLOCK. '/' . $value->logo) }}"></div>
                                <div class="hmi-title">{{ $value->name }}</div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
