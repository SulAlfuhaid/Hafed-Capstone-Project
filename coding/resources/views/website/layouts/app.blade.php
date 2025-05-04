<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'حافظ | القرآن الكريم')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo1.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sal.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body class="ui-smooth-scroll">
{{--<div id="preloader">--}}
{{--    <img src="{{asset('assets/images/logo1.png')}}" alt="الشعار" class="mb-5"><br>--}}
{{--    <img src="{{asset('assets/images/preloader.gif')}}" alt="جاري التحميل">--}}
{{--</div>--}}

<a href="#main-wrapper" id="backto-top" class="back-to-top">
    <i class="fas fa-angle-double-up"></i>
</a>
@include('website.layouts.header')

<div id="main-wrapper" class="main-wrapper">
    <div id="scroll-container">
    @yield('content')

    @include('website.layouts.footer')
    </div>
</div>



<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
{{--<script src="{{ asset('assets/js/smooth-scrollbar.js') }}"></script>--}}
<script src="{{ asset('assets/js/sal.js') }}"></script>
<script src="{{ asset('assets/js/video.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>
