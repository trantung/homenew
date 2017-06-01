@if($banner = $banner->first())
	<section id="banner">
	    <div class="container blur-background section-content">
	        <div class="banner">
	            <a href="{{ $banner->link_url }}"><img src="{{ url(IMAGEBANNER. '/' . $banner->image_url) }}"></a>
	        </div>
	    </div>
	</section>
@endif