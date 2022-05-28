@if (Session::has('maintain'))
    <script>
        window.location.replace("{{ route('backend.dashboard.index') }}");
    </script>
@endif
@extends('frontend.layout.master-layout')
@section('content')
    {{-- @include('frontend.home.menu') --}}
    <h1 hidden>{{ $setting->translations->name }}</h1>
    @include('frontend.home.slide')
    @include('frontend.home.about-us')
    @include('frontend.home.service')
    @include('frontend.home.why-us')
    @include('frontend.home.featured')
    @include('frontend.home.stepwork')
    @include('frontend.home.gallery')
    @include('frontend.home.form')
    @include('frontend.home.partner')
    @include('frontend.home.post')
@endsection
