<section id="statistics" class="">
    <div class="container section-content">
        <div class="row clearfix">
        <div class="multi4">
            @foreach(getArrayWithoutLink() as $config)
                <div class="{{ getClassConfig(1, $config->key) }}">
                    <div class="{{ getClassConfig(2, $config->key) }}">
                        <div class="{{ getClassConfig(3, $config->key) }}">
                            @if ($config->key == 'total_user')
                                {{ getTotalUserHocMai() }}
                            @else
                            {{ $config->value }}
                            @endif
                        </div>
                        <div class="{{ getClassConfig(4, $config->key) }}">{{ $config->name_value }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
        <div class="s-cta">
            <a class="cta-btn hbtn" href="{{ getValueWithLink('about_us', 'link') }}">{{ getValueWithLink('about_us', 'value') }}</a>
        </div>
    </div>
</section>