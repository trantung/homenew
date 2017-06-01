@if ($block > 1)
    <section id="main-menu" class="menu menu_mod">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="{{ action('Frontend\BlockController@blockDefault', CommonSite::getSlugNameByBlockId($block)) }}" title="HOCMAI" class="clearfix">
                            <span class="logo-img logo-img-thcs"><img src="{{ url(IMAGEBLOCK. '/' . $blockDetail->logo) }}" alt="HOCMAI" title="HOCMAI"></span>
                            <span class="mm-title mm-title-thcs main-color">{{ $blockDetail->name }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-9 menu-relative">
                    <ul class="sub-menu main-gradient-reserve">
                        @foreach(CommonSite::getClassByBlock($block) as $value)

                            @if($value->link)
                                <li>
                                    <a href="{{ $value->link }}">{{ $value->name }}</a>
                                    <?php $listChild = CommonSite::getMenuByClass($value->id);?>
                                    @if(count($listChild) > 0)
                                    <ul>
                                        @foreach($listChild as $valueMenu)
        
                                            @if($valueMenu->link)
                                                <li>
                                                    <a class="main-menu-link" href="{{ $valueMenu->link }}">{{ $valueMenu->name }}</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="main-menu-link" href="{{ url(URL_THCS .'/' . CommonSite::getSlugNameByClassId($value->id) . '/' . $valueMenu->id) }}">{{ $valueMenu->name }}</a>
                                                </li>
                                            @endif


                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @else
                                <li>
                                    <a href="{{ url(URL_THCS .'/' . CommonSite::getSlugNameByClassId($value->id)) }}">{{ $value->name }}</a>
                                    <?php $listChild = CommonSite::getMenuByClass($value->id);?>
                                    @if(count($listChild) > 0)
                                    <ul>
                                        @foreach($listChild as $valueMenu)

                                                
                                                @if($valueMenu->link)
                                                    <li>
                                                        <a class="main-menu-link" href="{{ $valueMenu->link }}">{{ $valueMenu->name }}</a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a class="main-menu-link" href="{{ url(URL_THCS .'/' . CommonSite::getSlugNameByClassId($value->id) . '/' . $valueMenu->id) }}">{{ $valueMenu->name }}</a>
                                                    </li>
                                                @endif


                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endif



                        @endforeach
                        @foreach($menu as $valueMenu)
                            @if($valueMenu->link)
                                <li>
                                    <a class="main-menu-link" href="{{ $valueMenu->link }}">{{ $valueMenu->name }}</a>
                                </li>
                            @else
                                <li>
                                    <a class="main-menu-link" href="{{ url(URL_THCS .'/' . CommonSite::getSlugNameByBlock($block) . '/' . $valueMenu->id) }}">{{ $valueMenu->name }}</a>
                                </li>
                            @endif


                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </section>
@else
    <section id="main-menu" class="menu">
        <div class="container">
            <div class="row thpt_menu">
                <div class="col-md-3 col-md-offset-1">
                    <div class="logo">
                        <a href="{{ action('Frontend\BlockController@blockDefault', CommonSite::getSlugNameByBlockId($block)) }}" title="HOCMAI" class="clearfix">
                            <span class="logo-img"><img src="{{ url(IMAGEBLOCK. '/' . $blockDetail->logo) }}" alt="HOCMAI" title="HOCMAI"></span>
                            <span class="mm-title main-color">{{ $blockDetail->name }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <ul class="main-menu clearfix">
                        @foreach($classList as $classValue)
                            <li class="{{ checkActiveClass($classValue->id, $class) }}">
                                <div class="main-menu-item clearfix">
                                    <div class="divspan"></div>
                                    <a href="{{ url(URL_THPT .'/' . CommonSite::getSlugNameByClassId($classValue->id)) }}" class="main-menu-link">{{ $classValue->name }}</a>
                                </div>



                            </li>
                        @endforeach
                    </ul>
                </div>
<ul class="sub-menu main-gradient-reserve">
                                     @foreach($menu as $valueMenu)
                                         @if($valueMenu->link)
                                         <li><a href="{{ $valueMenu->link }}">{{ $valueMenu->name }}</a></li>
                                         @else
                                         <li><a href="{{ url(URL_THPT .'/' . CommonSite::getSlugNameByClassId($class) . '/' . $valueMenu->id) }}">{{ $valueMenu->name }}</a></li>
                                         @endif
                                     @endforeach
                                </ul>
            </div>
        </div>
    </section>
@endif

