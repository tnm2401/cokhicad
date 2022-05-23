<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="google" content="notranslate" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/uploads/{{ $master['img'] }}" />
    <link rel="icon" type="image/png" href="{{ asset('storage') }}/uploads/{{ $master['img'] }}" />
    <link rel="shortcut icon" href="{{ asset('storage') }}/uploads/setting/{{$setting->favicon}}" type="image/x-icon">
    @include('frontend.layout.seo')
    {!! $setting->codehead !!}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/menu.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/mstyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/magiczoomplus/magiczoomplus.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/lightboxed/lightboxed.css">
    @stack('style')
    <title>CÔNG TY CỔ PHẦN CƠ KHÍ CAD</title>
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=800406244111382&autoLogAppEvents=1" nonce="HiEOfDGx"></script>
<body>
@include('frontend.home.menu')
