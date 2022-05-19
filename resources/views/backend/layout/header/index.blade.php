<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('storage') }}/uploads/{{ $setting->favicon }}">
        <title>@yield('title') | {{ $setting->titleadmin }}</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        @include('backend.layout.header.css')
        @push('script')
            <script>
                function createslug(text) {
                    return text.toString().toLowerCase()
                        .replace(/\s+/g, '-') // Replace spaces with -
                        .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
                        .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
                        .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
                        .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
                        .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
                        .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
                        .replace(/đ/gi, 'd')
                        .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
                        .replace(/\-\-\-\-\-/gi, '-')
                        .replace(/\-\-\-\-/gi, '-')
                        .replace(/\-\-\-/gi, '-')
                        .replace(/\-\-+/g, '-') // Replace multiple - with single -
                        .replace(/^-+/, '') // Trim - from start of text
                        .replace(/-+$/, ''); // Trim - from end of text
                }
                $('document').ready(function() {
                    $(document).on('keyup', 'input#pass', function() {
                        var descriptions = createslug($(this).val());
                        $('span#linkactive').text(descriptions);
                    });
                });
            </script>
        @endpush
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a href="{{ route('backend.dashboard.index') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini" style="font-size: 14px;">{{ auth()->user()->name }}</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><img src="{{ asset('storage') }}/uploads/setting/{{ $setting->logoadmin }}" style="width: 100%;padding: 8px;"></span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="{{ route('backend.dashboard.index') }}" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            @if(Hideshow::find(38)->hide_show == 1)
                            {{-- @include('backend.layout.header.notification') --}}
                            @else
                            @endif
                            @include('backend.layout.header.icon-top')
                        </ul>
                    </div>
                </nav>
            </header>
            @include('backend.layout.header.on_maintain')
            @include('backend.layout.header.off_maintain')
            @include('backend.layout.header.reset_pass_maintain')
            @push('script')
                <script>
                    $(document).ready(function() {
                        $(".dropdown-header-name").click(function() {
                            $(this).toggleClass('show ');
                            $("#chooselang").toggleClass('show');
                            // $(".drop-language").toggleClass("show");
                        });
                    });
                </script>
            @endpush
