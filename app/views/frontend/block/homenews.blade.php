<section id="home-news" class="">
    <div class="container blur-background section-content">
        <div class="hn-body main-border-color">
            <div class="row clearfix">
                <div class="col-md-7">
                    <a href="{{ $newFirstHome->link }}" target="_blank">
                        <div class="hn-feature">
                            <img src="{{ url(getImageUrlNewByDevice($newFirstHome)) }}">
                            <div class="hn-detail">
                                <div class="hn-title">{{ $newFirstHome->name }}</div>
                                <div class="hn-info">{{   getDateCreated($newFirstHome->created_at)  }}</div>
                                <div class="hn-description">
                                    {{ $newFirstHome->sapo }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-5">
                    <div class="hn-other">
                        <ul class="hn-items scroll">
                            @foreach($listNews as $kNew => $new)
                                <li>
                                    <a class="hn-item main-border-color" href="{{ $new->link }}" target="_blank">
                                        <div class="hn-item-title">
                                            {{ $new->name }}
                                        </div>
                                        <div class="hn-item-description">
                                            {{ $new->sapo }}
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>