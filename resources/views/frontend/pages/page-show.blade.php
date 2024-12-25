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
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">{{ $page->title }}</h1>
                </div>
            </div>
            {!! $page->content !!}
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
