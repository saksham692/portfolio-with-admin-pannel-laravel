@extends('frontend.layouts.master')
@section('page-title', $blog->title)
@section('seo')
    <meta name="description" content="{{ $blog->description }}">

    <!-- Robots and Canonical -->
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ route('show.blog', $blog->slug) }}">

    <!-- Author -->
    <meta name="author" content="{{ $generalSetting->author }}">

    <!-- Keywords (Optional) -->
    <meta name="keywords" content="{{ $blog->meta_keywords }}">

    <!-- Open Graph Tags (Social Media) -->
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->description }}">
    <meta property="og:url" content="{{ route('show.blog', $blog->slug) }}">
    <meta property="og:image" content="{{ asset($blog->meta_image) }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="{{ env('APP_NAME') }}">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->title }}">
    <meta name="twitter:description" content="{{ $blog->description }}">
    <meta name="twitter:image" content="{{ asset($blog->meta_image) }}">

{{--    <!-- Theme Color -->--}}
{{--    <meta name="theme-color" content="#007BFF">--}}

    <!-- Article Tags -->
    <meta property="article:published_time" content="{{ $blog->published_at }}">
    <meta property="article:modified_time" content="{{ $blog->published_at }}">
    <meta property="article:author" content="{{ $generalSetting->author }}">
    <meta property="article:tag" content="{{ $blog->meta_keywords }}">

    <!-- Schema Markup -->
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ $blog->title }}",
    "description": "{{ $blog->title }}",
    "author": {
      "@type": "Person",
      "name": "{{ $generalSetting->author }}"
    },
    "datePublished": "{{ $blog->published_at }}",
    "dateModified": "{{ $blog->published_at }}",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "{{ route('show.blog', $blog->slug) }}"
    },
    "image": "{{ asset($blog->meta_image) }}",
    "publisher": {
      "@type": "Organization",
      "name": "{{ env('APP_NAME') }}",
      "logo": {
        "@type": "ImageObject",
        "url": "{{ asset(optional($generalSetting)->logo) }}"
      }
    }
  }

    </script>
@endsection
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $blog->title }}</h2>
                    {!! $blog->content !!}
                    <div class="about-author d-flex p-4 bg-light flex-sm-column">
                        <div class="desc">
                            <h3>By {{ $generalSetting->author }}</h3>
                        </div>
                    </div>
                </div>
                <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="{{ route('frontend.blogs.index') }}" method="GET" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" name="search" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Categories</h3>
                        <ul class="categories">
                            @foreach($categories as $category)
                                <li><a href="{{ route('frontend.blogs.index', $category->slug) }}">{{ $category->name }} <span>({{ count($category->posts) }})</span></a>
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
                                        <div><a href="#"><span class="icon-person"></span> {{ $generalSetting->author }}</a></div>
{{--                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($previousPost)
                        <div class="sidebar-box ftco-animate">
                            <h3 class="heading-sidebar">Previous Blog</h3>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                   style="background-image: url({{ $previousPost->meta_image }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('show.blog', $previousPost->slug) }}">{{ $previousPost->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span
                                                    class="icon-calendar"></span> {{ date('M d, Y', strtotime($previousPost->published_at)) }}
                                            </a></div>
                                        <div><a href="#"><span class="icon-person"></span> {{ $generalSetting->author }}</a></div>
{{--                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($nextPost)
                        <div class="sidebar-box ftco-animate">
                            <h3 class="heading-sidebar">Next Blog</h3>
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                   style="background-image: url({{ $nextPost->meta_image }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('show.blog', $nextPost->slug) }}">{{ $nextPost->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span
                                                    class="icon-calendar"></span> {{ date('M d, Y', strtotime($nextPost->published_at)) }}
                                            </a></div>
                                        <div><a href="#"><span class="icon-person"></span> {{ $generalSetting->author }}</a></div>
{{--                                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{--                    <div class="sidebar-box ftco-animate">--}}
                    {{--                        <h3 class="heading-sidebar">Tag Cloud</h3>--}}
                    {{--                        <div class="tagcloud">--}}
                    {{--                            <a href="#" class="tag-cloud-link">house</a>--}}
                    {{--                            <a href="#" class="tag-cloud-link">office</a>--}}
                    {{--                            <a href="#" class="tag-cloud-link">building</a>--}}
                    {{--                            <a href="#" class="tag-cloud-link">land</a>--}}
                    {{--                            <a href="#" class="tag-cloud-link">table</a>--}}
                    {{--                            <a href="#" class="tag-cloud-link">interior</a>--}}
                    {{--                            <a href="#" class="tag-cloud-link">exterior</a>--}}
                    {{--                            <a href="#" class="tag-cloud-link">industrial</a>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="sidebar-box ftco-animate">--}}
                    {{--                        <h3 class="heading-sidebar">Paragraph</h3>--}}
                    {{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem--}}
                    {{--                            necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente--}}
                    {{--                            consectetur similique, inventore eos fugit cupiditate numquam!</p>--}}
                    {{--                    </div>--}}
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
