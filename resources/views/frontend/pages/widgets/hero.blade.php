<section class="hero-wrap js-fullheight">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-center">
                <div class="text text-center">
                    <span class="subheading">{{ $hero->title }}</span>
                    <h1>{{ $hero->sub_title }}</h1>
                    <h2>I'm a
                        <span
                            class="txt-rotate"
                            data-period="100"
                            data-rotate='{{ json_encode($typerTitles) }}'></span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="mouse">
        <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
        </a>
    </div>
</section>

<!-- Header-Area-End -->