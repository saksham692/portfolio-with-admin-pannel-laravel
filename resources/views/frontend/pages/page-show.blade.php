@extends('frontend.layouts.master')
@section('page-title',  $page->title)
@section('seo')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{asset('frontend/assets/images/favicon/favicon.ico')}}"/>
@endsection
@section('content')
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            {!! $page->content !!}
        </div>
    </section>
@endsection
@push('scripts')

@endpush
