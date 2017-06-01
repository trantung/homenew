<section id="news" class="main-border-color {{ getCssClassByBlockId($block, 'news_mod') }}">
    <div class="container section-content">
        @if($block == THPT_BLOCK)
        <div class="row">
            <div class="col-md-4">
                <div class="news-block">
                    @if($typeFirst)
                    <div class="nb-head">
                        <div class="main-gradient nb-head-bg">
                            <img src="{{ url('frontend/img/news.png') }}">
                        </div>
                        <div class="nb-head-title">
                            <h3>{{ $typeFirst->name }}</h3>
                            <p>{{ $typeFirst->description }}</p>
                        </div>
                    </div>
                    <div class="nb-content">
                        <ul class="news-list">
                            @foreach($listNewTypeFirst as $newFirst)
                            <li class="clearfix">
                                <a href="{{ $newFirst->link }}" class="main-color-2">
                                    <div class="ns-item-title">
                                        {{ $newFirst->name }}
                                    </div>
                                    <div class="ns-item-short">
                                        {{ $newFirst->sapo }}
                                    </div>
                                    <div class="pull-right ns-item-date">
                                        {{ getDateCreated($newFirst->created_at) }}
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-md-4">
                <div class="news-block">
                    <div class="nb-head">
                        <div class="main-gradient nb-head-bg">
                            <img src="{{ url('frontend/img/bobbed.png') }}">
                        </div>
                        <div class="nb-head-title">
                            <h3>BÀI GIẢNG HỌC THỬ</h3>
                            <p>Học miễn phí 100%</p>
                        </div>
                    </div>
                    <div class="nb-content">
                        <ul class="news-list lecture-list" id="listcoursefree">
                            <li class="clearfix">
                                <div class="ns-filter clearfix row">
                                    <div class="col-xs-6 filter-label main-color"><b>CHỌN MÔN HỌC</b></div>
                                    <div class="col-xs-6">
                                        {{ Form::select('subject_id', ['' => 'Chọn']+returnListSubject($class), null,  array('class' => 'bselect subject-filter', 'id'=> 'subject_id_choose'))}}
                                    </div>
                                </div>
                            </li>
                            @include('frontend.common.listcoursefree')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-block">
                    @if($typeLast)
                    <div class="nb-head">
                        <div class="main-gradient nb-head-bg">
                            <img src="{{ url('frontend/img/news.png') }}">
                        </div>
                        <div class="nb-head-title">
                            <h3>{{ $typeLast->name }}</h3>
                            <p>{{ $typeLast->description }}</p>
                        </div>
                    </div>
                    <div class="nb-content">
                        <ul class="news-list">
                            @foreach($listNewsTypeLast as $newLast)
                            <li class="clearfix">
                                <a href="{{ $newLast->link }}" class="main-color-2">
                                    <div class="ns-item-title">
                                        {{ $newLast->name }}
                                    </div>
                                    <div class="ns-item-short">
                                        {{ $newLast->sapo }}
                                    </div>
                                    <div class="pull-right ns-item-date">
                                        {{ getDateCreated($newLast->created_at) }}
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="row">
            @foreach(CommonSite::getListType($block) as $value)
            <div class="col-md-4">
                <div class="news-block">
                    <div class="nb-head">
                        <div class="main-gradient nb-head-bg">
                            <img src="{{ url('frontend/img/news.png') }}">
                        </div>
                        <div class="nb-head-title">
                            <h3>{{ $value->name }}</h3>
                            <p>{{ $value->description }}</p>
                        </div>
                    </div>
                    <div class="nb-content">
                        <ul class="news-list">
                            @foreach(CommonSite::getNewByTypeNew($value->id) as $thcsNew)
                            <li class="clearfix">
                                <a href="{{ $thcsNew->link }}" class="main-color-2">
                                    <div class="ns-item-title">
                                        {{ $thcsNew->name }}
                                    </div>
                                    <div class="ns-item-short">
                                        {{ $thcsNew->sapo }}
                                    </div>
                                    <div class="pull-right ns-item-date">
                                        {{ getDateCreated($thcsNew->created_at) }}
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>
