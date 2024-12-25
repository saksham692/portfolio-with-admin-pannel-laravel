<section class="ftco-section" id="services-section">
    <div class="container-fluid px-md-5">
        <div class="row justify-content-center pb-5">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="big big-2">Services</h1>
                <h2 class="mb-4">Services</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4 text-center d-flex ftco-animate">
                    <a href="{{ route('service.detail', $service->slug) }}" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-analysis"></i>
							</span>
                        <div class="desc">
                            <h3 class="mb-5">{{$service->name}}</h3>
                            <p>{{$service->description}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
            @if($services)
                <div class="col-12 text-center ftco-animate">
                    <a href="{{ route('frontend.services') }}" class="btn btn-primary py-3 px-5">View All <i class="icon icon-arrow-right"></i></a>
                </div>
            @endif
        </div>
    </div>
</section>
