@extends('frontend.layouts.master')
@section('page-title',  $service->name)
@section('seo')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{asset('frontend/assets/images/favicon/favicon.ico')}}"/>
@endsection
@section('content')
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">{{ $service->name }}</h1>
                    <h2 class="mb-4 w-100">{{ $service->name }}</h2>
                </div>
            </div>
            {!! $service->content !!}
        </div>
    </section>
@endsection
@push('scripts')

@endpush
