<title>@yield('page-title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
@yield('seo')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="shortcut icon" type="image/ico" href="{{asset($generalSetting->favicon)}}" />
{{--<link rel="shortcut icon" type="image/ico" href="{{asset('frontend/assets/images/favicon/favicon.ico')}}" />--}}
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/animate.css">

<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/owl.carousel.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/owl.theme.default.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/magnific-popup.css">

<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/aos.css">

<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/ionicons.min.css">

<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/flaticon.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/icomoon.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/plugins/fontawesome/css/all.min.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/style.css">
<link rel="stylesheet" href="{{ asset('frontend/assets') }}/css/custom.css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

