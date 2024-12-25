<section class="ftco-section ftco-project" id="projects-section">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big big-2">Projects</h1>
                <h2 class="mb-4">Our Projects</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach($projects as $project)
            <div class="col-md-4">
                <div class="project img ftco-animate d-flex justify-content-center align-items-center"
                     style="background-image: url({{ asset($project->thumbnail_img) }});">
                    <div class="overlay"></div>
                    <div class="text text-center p-4">
                        <h3><a href="{{ route('project.detail', $project->slug) }}">{{ $project->name }}</a></h3>
{{--                        <span>Web Design</span>--}}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

{{--<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">--}}
{{--    <div class="container-fluid px-md-5">--}}
{{--        <div class="row d-md-flex align-items-center">--}}
{{--            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">--}}
{{--                <div class="block-18 shadow">--}}
{{--                    <div class="text">--}}
{{--                        <strong class="number" data-number="100">0</strong>--}}
{{--                        <span>Awards</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">--}}
{{--                <div class="block-18 shadow">--}}
{{--                    <div class="text">--}}
{{--                        <strong class="number" data-number="1200">0</strong>--}}
{{--                        <span>Complete Projects</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">--}}
{{--                <div class="block-18 shadow">--}}
{{--                    <div class="text">--}}
{{--                        <strong class="number" data-number="1200">0</strong>--}}
{{--                        <span>Happy Customers</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">--}}
{{--                <div class="block-18 shadow">--}}
{{--                    <div class="text">--}}
{{--                        <strong class="number" data-number="500">0</strong>--}}
{{--                        <span>Cups of coffee</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
