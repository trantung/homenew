</div>
<footer>
    <div id="footer" class="main-gradient-reserve">
        <div class="container">
            {{-- <div class="row">
                <div class="col-md-12">
                    <a href="{{ action('Frontend\HomeController@index') }}" class="footer-logo"><img src="{{ url('frontend/img/logo-white.png') }}"></a>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-5">
                    <div class="company">
                        CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ DỊCH VỤ GIÁO DỤC
                    </div>
                    <div class="address">
                        Tầng 4, Tòa nhà 25T2, Đường Nguyễn Thị Thập, <br>
                        Phường Trung Hoà, Quận Cầu Giấy, Hà Nội.
                    </div>
                    <div class="phone">
                        Tel: +84 (4) 3519-0591 Fax: +84 (4) 3519-0587
                    </div>
                    <div class="apps">
                        <a href="#" class="license"><img src="{{ url('frontend/img/bo-cong-thuong.png') }}"></a>
                        <a href="#" class="playstore"><img src="{{ url('frontend/img/playstore.png') }}"></a>
                        <a href="#" class="appstore"><img src="{{ url('frontend/img/appstore.png') }}"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="footer-link">
                                <li><a href="https:hocmai.vn/kiem-tra-thi-thu/">KHO ĐỀ</a></li>
                                <li><a href="https:hocmai.vn/kho-tai-lieu/">KHO BÀI TẬP</a></li>
                                <li><a href="#">WIKI</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6">
                            <ul class="footer-link">
                                <li><a href="https://diendan.hocmai.vn/">DIỄN ĐÀN</a></li>
                                <li><a href="http://blog.hocmai.vn/">BLOG</a></li>
                                <li><a href="https:hocmai.vn/gioi-thieu">VỀ HOCMAI</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12">
                            <ul class="social">
                                <li><a href="#"><img src="{{ url('frontend/img/google-plus.png') }}"></a></li>
                                <li><a href="https://www.facebook.com/Hocmai.vnOnline"><img src="{{ url('frontend/img/facebook.png') }}"></a></li>
                                <li><a href="#"><img src="{{ url('frontend/img/instagram.png') }}"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="subscribe">
                        <form class="subscribe-form">
                            <label for="subscribe-email">đăng ký nhận bản tin</label>
                            <input type="text" name="email" id="subscribe-email" placeholder="Email">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-second" class="main-color">
        <div class="container section-content blur-background">
            <div class="row">
                <div class="col-md-5">
                    © COPYRIGHT 2017. POWERED BY HOCMAI.
                </div>
                <div class="col-md-7 clearfix">
                    <ul class="references pull-right">
                        @foreach(getArrayWithLinkNotKey(['about_us']) as $config)
                        <li class="main-border-color"><a href="{{ $config->link }}">{{ $config->value }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
    <div id="lof_go_top">
        <span class="ico_up"></span>
    </div>
<script src="/plugins/jquery/jquery-1.11.2.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.js"></script>
<script src="/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="/plugins/slick/slick.min.js"></script>
<script src="/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
{{ HTML::script('frontend/js/jssor.slider.mini.js') }}
  <script src="/plugins/validation/jquery.validate.min.js"></script>

{{ HTML::script('frontend/js/additional-methods.min.js') }}
{{ HTML::script('frontend/js/base_forms_validation.js') }}
<script src="/luyen-thi-quoc-gia/luyen-thi-pen-m/js/jquery.cookie.js"></script>
{{ HTML::script('frontend/js/script.js?v=' . $v) }}
@if(isset($class))
    @include('frontend.block.script.course')
    @include('frontend.block.script.news')
@endif
</body>
</html>