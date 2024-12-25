@extends('frontend.layouts.master')
@section('page-title', 'Contact')
@section('seo')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/ico" href="{{asset('frontend/assets/images/favicon/favicon.ico')}}"/>
@endsection
@section('content')
    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Contact</h1>
                    <h2 class="mb-4">{{ $contactSection->title }}</h2>
                    <p>{{ $contactSection->sub_title }}</p>
                </div>
            </div>
@php
    $footerContact = \App\Models\FooterContactInfo::first();
@endphp
            <div class="row d-flex contact-info mb-5">
                <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 shadow">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-map-signs"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Address</h3>
                            <p>{{ $footerContact->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 shadow">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-phone2"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Contact Number</h3>
                            <p><a href="tel://{{ $footerContact->phone }}">{{ $footerContact->phone }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                    <div class="align-self-stretch box text-center p-4 shadow">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="icon-paper-plane"></span>
                        </div>
                        <div>
                            <h3 class="mb-4">Email Address</h3>
                            <p><a href="mailto:info@yoursite.com">{{ $footerContact->email }}</a></p>
                        </div>
                    </div>
                </div>
{{--                <div class="col-md-6 col-lg-3 d-flex ftco-animate">--}}
{{--                    <div class="align-self-stretch box text-center p-4 shadow">--}}
{{--                        <div class="icon d-flex align-items-center justify-content-center">--}}
{{--                            <span class="icon-globe"></span>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h3 class="mb-4">Website</h3>--}}
{{--                            <p><a href="#">yoursite.com</a></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="#" class="bg-light p-4 p-md-5 contact-form" id="contact-form">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="7" class="form-control"
                                  placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5" id="submit_btn">Send Message
                            </button>
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <div class="img"
                         style="background-image: url({{ asset('frontend/assets') }}/images/about.jpg);"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            // Csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#contact-form', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{route('contact')}}",
                    data: $(this).serialize(),
                    beforeSend: function () {
                        $('#submit_btn').prop("disabled", true);
                        $('#submit_btn').text('Loading...');
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status == 'success') {
                            toastr.success(response.message);
                        }
                        $('#submit_btn').prop("disabled", false);
                        $('#submit_btn').text('Send Message');
                        $('#contact-form').trigger('reset');
                    },
                    error: function (response) {
                        if (response.status == 422) {
                            let errorsMessage = $.parseJSON(response.responseText);

                            $.each(errorsMessage.errors, function (key, val) {
                                console.log(val[0]);
                                toastr.error(val[0])
                            })
                            $('#submit_btn').prop("disabled", false);
                            $('#submit_btn').text('Send Message');

                        }
                    }
                })
            })
        })

    </script>
@endpush
