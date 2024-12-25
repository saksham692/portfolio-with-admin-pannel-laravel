@extends('frontend.layouts.master')
@section('page-title', 'Projects')
@section('seo')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{asset('frontend/assets/images/favicon/favicon.ico')}}"/>
@endsection
@section('content')
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
@endsection
@push('scripts')

@endpush
