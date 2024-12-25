@extends('frontend.layouts.master')
@section('page-title', @$seoSetting->title ?: 'Home')
@section('seo')
        <meta name="description" content="{{@$seoSetting->description}}">
        <meta name="keywords" content="{{@$seoSetting->keywords}}">
@endsection
@section('content')
<!-- Banner-Area-Start -->
<!-- include header -->
@include('frontend.pages.widgets.hero')
<!-- Service-Area-Start -->
<!-- Service-Area-End -->

<!-- About-Area-Start -->
@include('frontend.pages.widgets.about')
<!-- About-Area-End -->

<!-- About-Area-Start -->
@include('frontend.pages.widgets.partner')
@include('frontend.pages.widgets.resume')
@include('frontend.pages.widgets.service')
@include('frontend.pages.widgets.project')
@include('frontend.pages.widgets.blog')
@include('frontend.pages.widgets.contact')
<!-- About-Area-End -->

<!-- Portfolio-Area-Start -->
{{--@include('frontend.pages.widgets.portfolio')--}}
{{--<!-- Portfolio-Area-End -->--}}

{{--<!-- Skills-Area-Start -->--}}
{{--@include('frontend.pages.widgets.skills')--}}
{{--<!-- Skills-Area-End -->--}}

{{--<!-- Experience-Area-Start -->--}}
{{--@include('frontend.pages.widgets.experience')--}}
{{--<!-- Experience-Area-End -->--}}

{{--<!-- Testimonial-Area-Start -->--}}
{{--@include('frontend.pages.widgets.testimonial')--}}
<!-- Testimonial-Area-End -->

<!-- Blog-Area-Start -->
<!-- Blog-Area-End -->

<!-- Contact-Area-Start -->
<!-- Contact-Area-End -->

@endsection
