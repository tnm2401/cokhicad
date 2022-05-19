@extends('frontend.layout.master-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 mb-4 main-content">
                <nav class="breadcrumb-nav mt-1" aria-label="breadcrumb">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}"
                                title="{{ $setting->translations->name }}"><i class="ti-home"></i> Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}"
                                title="{{ $setting->translations->name }}"><i class="ti-home"></i> Tuyển dụng</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $recruitment->translations->name }}</li>
                    </ol>
                </nav>
                <article class="card post mb-5">
                    <div style="overflow: hidden" class="post-content" id="post_content">
                        <div class="main-title text-center">
                            <h1 class="font-weight-bold">{{ $recruitment->translations->name }}</h1>
                        </div>
                        {!! $recruitment->translations->content !!}
                    </div>
                </article>

            </div>
        </div>

    </div>
@endsection
