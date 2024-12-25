@extends('frontend.layouts.master')
@section('page-title', 'Resume')
@section('seo')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{asset('frontend/assets/images/favicon/favicon.ico')}}"/>
@endsection
@section('content')
    <section class="ftco-section" id="services-section">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <iframe src="{{ asset($about->resume) }}" style="width:100%; height:600px; border: none;"
                            frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

@endpush
