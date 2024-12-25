<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 col-lg-6 d-flex">
                <div class="img-about img d-flex align-items-stretch">
                    <div class="overlay"></div>
                    <div class="img d-flex align-self-stretch align-items-center"
                         style="background-image:url({{ asset(optional($about)->image) }});">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 pl-md-5 py-5">
                <div class="row justify-content-start pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h1 class="big">About</h1>
                        <h2 class="mb-4">{{optional($about)->title}}</h2>
                        {!! optional($about)->description !!}
                    </div>
                </div>
                <div class="counter-wrap ftco-animate d-flex mt-md-3">
                    <div class="text">
{{--                        <p class="mb-4">--}}
{{--                            <span class="number" data-number="120">0</span>--}}
{{--                            <span>Project complete</span>--}}
{{--                        </p>--}}
                        <p><a href="{{route('admin.resume.download')}}" class="btn btn-primary py-3 px-3">Download CV</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
