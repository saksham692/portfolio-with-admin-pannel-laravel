<section class="ftco-section" id="blog-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h1 class="big big-2">Blog</h1>
                <h2 class="mb-4">{{ $blogSectionTitle->title ?? 'Title' }}</h2>
                <p>{{ $blogSectionTitle->sub_title ?? 'Sub title' }}</p>
            </div>
        </div>
        <div class="row d-flex">
            @foreach($blogs as $blog)
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="{{ route('show.blog', $blog->slug) }}" class="block-20"
                           style="background-image: url('{{ asset($blog->meta_image) }}');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <h3 class="heading"><a href="{{ route('show.blog', $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <span class="mr-2">{{ date('M. d, Y', strtotime($blog->published_at)) }}</span>
                                    <a href="#" class="mr-2">Saksham Pangotra</a>
{{--                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>--}}
                                </p>
                            </div>
                            <p>{{ $blog->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
                @if($blogs)
                    <div class="col-12 text-center ftco-animate">
                        <a href="{{ route('frontend.blogs.index') }}" class="btn btn-primary py-3 px-5">View All <i class="icon icon-arrow-right"></i></a>
                    </div>
                @endif
        </div>
    </div>
</section>

<section class="ftco-section ftco-hireme img"
         style="background-image: url({{ asset('frontend/assets') }}/images/bg_1.jpg)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 ftco-animate text-center">
                <h2>I'm <span>Available</span> for freelancing</h2>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                <p class="mb-0"><a href="#contact-section" class="btn btn-primary py-3 px-5">Hire me</a></p>
            </div>
        </div>
    </div>
</section>
