<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.inc.style')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
@if(request()->routeIs('home'))
    @include('frontend.layouts.inc.navbar')
@else
    @include('frontend.layouts.inc.navbar2')
@endif
@yield('content')

@include('frontend.layouts.inc.footer')

@include('frontend.layouts.inc.script')


</body>
</html>
