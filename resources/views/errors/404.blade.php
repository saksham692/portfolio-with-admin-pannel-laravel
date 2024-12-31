@extends('frontend.layouts.master')
@section('page-title',  'Page Not Found')
@section('seo')
    <meta name="robots" content="noindex">
@endsection
@section('content')
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="text-center">
                            <i class="fas fa-exclamation-triangle text-danger fa-5x" height="200px"></i>
                        </div>
                        <h1 class="display-4 mt-4 text-center">404 - Page Not Found</h1>
                        <p class="lead text-center">Sorry, the page you’re looking for doesn’t exist.</p>
                        <a href="/" class="mt-3 text-center">
                            <button class="btn btn-primary">
                                <i class="fas fa-home" height="20"></i> Back to Home
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')

@endpush
