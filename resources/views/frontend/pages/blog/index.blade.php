@extends('frontend.layouts.master')
@section('page-title','Blogs')
@section('content')
    <section id="main-content" class="ftco-section">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    @if ($searchedCategory)
                        <h2 class="text-center mb-4">Result For Category "{{ $searchedCategory->name }}"</h2>
                    @endif
                    @if ($search)
                        @if ($blogs->isEmpty())
                            <h2 class="text-center mb-4">No Result{{ $search ? ' for "' . $search . '"' : '' }}</h2>
                        @else
                            <h2 class="text-center mb-4">Search Results for <span
                                    class="text-primary">"{{ $search }}"</span></h2>
                        @endif
                    @endif

                    @forelse($blogs as $blog)
                        <div class="card single_post">
                            <div class="body">
                                <div class="img-post">
                                    <img class="d-block img-fluid" src="{{ asset($blog->meta_image) }}"
                                         alt="First slide">
                                </div>
                                <h3><a href="{{ route('show.blog', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <p>{{ $blog->description }}</p>
                            </div>
                            <div class="footer">
                                <div class="actions">
                                    <a href="{{ route('show.blog', $blog->slug) }}" class="btn btn-outline-secondary">Continue
                                        Reading</a>
                                </div>
                                <ul class="stats">
                                    <li>By {{ $generalSetting->author }}</li>
                                </ul>
                            </div>
                        </div>
                    @empty
                        <h2 class="text-center mb-4">No Blog Available</h2>
                    @endforelse

                    {{ $blogs->appends(['search' => $search])->links('frontend.pagination') }}
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Search..." name="search"
                                       value="{{$search}}">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Categories</h3>
                        <ul class="categories">
                            @foreach($categories as $viewCategory)
                                <li><a href="{{ route('frontend.blogs.index', $viewCategory->slug) }}">{{ $viewCategory->name }} <span>({{ count($viewCategory->posts) }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Recent Blog</h3>
                        @foreach($latestBlogs as $latestBlog)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                   style="background-image: url({{ $latestBlog->meta_image }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('show.blog', $latestBlog->slug) }}">{{ $latestBlog->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span
                                                    class="icon-calendar"></span> {{ date('M d, Y', strtotime($latestBlog->published_at)) }}
                                            </a></div>
                                        <div><a href="#"><span class="icon-person"></span> {{ $generalSetting->author }}
                                            </a></div>
                                        {{--                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Old Blog</h3>
                        @foreach($oldBlogs as $oldBlog)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                   style="background-image: url({{ $oldBlog->meta_image }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('show.blog', $oldBlog->slug) }}">{{ $oldBlog->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span
                                                    class="icon-calendar"></span> {{ date('M d, Y', strtotime($oldBlog->published_at)) }}
                                            </a></div>
                                        <div><a href="#"><span class="icon-person"></span> {{ $generalSetting->author }}
                                            </a></div>
                                        {{--                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
