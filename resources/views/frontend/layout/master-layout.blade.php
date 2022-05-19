@include('frontend.layout.header')
<!--Body Content-->
@include('sweetalert::alert')
        @yield('content')
    <!--End Body Content-->
@include('frontend.layout.footer')
