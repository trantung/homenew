<section id="block-three">
    <div class="container blur-background section-content">
        <div class="text-center bt-title main-color">
            - CÁC KHỐI ĐÀO TẠO -
        </div>
        <div class="row bt-block clearfix">
            @foreach($blocks as $block)
            <div class="col-md-4">
                <a href="{{ action('Frontend\BlockController@blockDefault', CommonSite::getSlugNameByBlockId($block->id)) }}">
                    <div class="bt-block-body">
                        <div class="bt-block-title clearfix">
                            <div class="bt-img"><img src="{{ url(IMAGEBLOCK. '/' . $block->logo) }}"></div>
                            <div class="bt-cap">{{ $block->name }}</div>
                        </div>
                        <div class="bt-block-content">
                            {{ $block->description }}
                        </div>
                        <div class="bt-block-action hbtn">
                            TÌM HIỂU THÊM
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>