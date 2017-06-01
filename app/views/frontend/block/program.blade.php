<section id="programs">
    <div class="container blur-background section-content">
        <h2 class="section-title main-color">
            <span class="text-uppercase">các chương trình học</span>
        </h2>
        <div class="row">
         <div class="multi4">
            @foreach(CommonSite::getNewPageChild($block) as $vNewChild)
            <div class="col-md-3">
                <div class="pr-item">
                    <div class="pr-top main-gradient">
                        <span>{{ $vNewChild->name }}</span>
                    </div>
                    <div class="pr-mid">
                        {{ $vNewChild->sapo }}
                    </div>
                    <div class="pr-bot bt-block-action">
                        <a href="{{ $vNewChild->link }}">tìm hiểu thêm</a>
                    </div>
                </div>
            </div>
            @endforeach

         </div>
        </div>
    </div>
</section>
