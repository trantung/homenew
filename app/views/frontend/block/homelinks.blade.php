<section id="home-links">
    <div class="container blur-background section-content">
        <div class="hl-wrapper">
            <div class="hl-list">
                <ul class="hl-list-items clearfix">
                    @foreach($listLink as $link)
                        <li>
                            <a class="hl-item" style="background: transparent url({{ url(IMAGELINKURL. '/' . $link->logo) }}) scroll no-repeat center 0;" onmouseover="this.style.background = 'transparent url({{ url(IMAGELINKURL. '/' . $link->logo_hover) }}) scroll no-repeat center 0'" onmouseout="this.style.background = 'transparent url({{ url(IMAGELINKURL. '/' . $link->logo) }}) scroll no-repeat center 0'" href="{{ $link->link }}" target="_blank">
                                {{ $link->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>