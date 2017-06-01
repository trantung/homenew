<section id="review" class="{{ getCssClassByBlockId($block) }}">
    <div class="container section-content blur-background">
        <div id="carousel-review" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                @foreach($slideStudents as $kStudent => $slideStudent)
                <li data-target="#carousel-review" data-slide-to="{{ $kStudent }}" class="{{ checkActive($kStudent) }} main-background-color">
                <img src="{{ url(IMAGESLIDE. '/' . $slideStudent->image_url) }}"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach($slideStudents as $keyStudent => $student)
                <div class="item {{ checkActive($keyStudent) }}">
                    <div class="review-title">
                        {{ $student->note }}
                    </div>
                    <div class="review-content main-color">
                        {{ $student->description }}
                    </div>
                    <ol class="carousel-indicators">
                            <li data-target="#carousel-review" data-slide-to="{{ $keyStudent }}" class="{{ checkActive($keyStudent) }} main-background-color">
                            <img src="{{ url(IMAGESLIDE. '/' . $slideStudent->image_url) }}"></li>
                    </ol>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>