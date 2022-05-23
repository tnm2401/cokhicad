@extends('frontend.layout.master-layout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 mb-4 main-content">
            <nav class="breadcrumb-nav mt-1" aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->translations->name }}"><i
                                class="ti-home"></i> Trang chủ</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('frontend.slug',$post->svcate->translations->slug) }}" title="{{$post->svcate->translations->name }}"><i
                            class="ti-home"></i> {{ $post->svcate->translations->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->translations->name }}</li>
                </ol>
            </nav>
            <article class="card post mb-5">
                <div style="overflow: hidden" class="post-content" id="post_content">
                    <div class="main-title text-center">
                        <h1 class="font-weight-bold">{{ $post->translations->name }}</h1>
                     </div>
                    {!! $post->translations->content !!}
                </div>
            </article>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-12 mb-5">
            <div class="main-title text-center">
                <h2 class="title font-weight-bold">{{ __('Đăng kí nhận thông báo') }}</h2>
            </div>
            <form id="ajax-contact-form" action="javascript:void(0)" method="POST" accept-charset="utf-8">
                @csrf
                @if ($errors->any())
                    <div id="error_contact" class="alert alert-danger" style="display: none">
                        <ul style="padding-left: 0px;">
                            @foreach ($errors->all() as $error)
                                <li style="line-height: 32px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                placeholder="{{ __('Tên của bạn') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ old('email') }}" name="email"
                                placeholder="{{ __('Email của bạn') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ old('phone') }}" name="phone"
                                placeholder="{{ __('SĐT của bạn') }}">
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ old('subject') }}" name="subject"
                                placeholder="{{ __('Tiêu đề') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" name="contactcontent" rows="5"
                                placeholder="{{ __('Nội dung') }}">{{ old('contactcontent') }}</textarea>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6" style="padding-bottom: 10px;">
                                <input class="form-control" name="captcha" id="captcha" placeholder="Captcha"
                                    type="text" />
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6 " style="padding-bottom: 10px;">
                                <span class="refereshrecapcha">
                                    {!! captcha_img('flat') !!}
                                </span>
                                <a href="javascript:void(0)" onclick="refreshCaptcha()"><i
                                        class="fa-solid fa-arrows-rotate"></i></a>
                            </div>
                        </div>
                        <button type="submit" id="submit" class="button-send-contact">
                            Gửi
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="main-title text-center">
        <p>Bài viết cùng chủ đề</p>
    </div>
    <div class="row">
        @foreach ($relatedpost as $item)
        <div class="col-md-4 col-6 mb-4">
            <figure>
                <div class="thumbnail-news mb-2">
                    <a href="{{ route('frontend.slug',$item->translations->slug) }}">
                        <img src="{{ imageUrl('/storage/uploads/servis/'.$item->img,'440','300','100','1') }}
                        "
                            class="img-fluid" alt="{{ $item->translations->title }}"
                            title="{{ $item->translations->title }}">
                    </a>
                </div>
                <figcaption>
                    <div class="title__news mt-4 mb-3">
                        <h3><a href="{{ route('frontend.slug',$item->translations->slug) }}">{{ $item->translations->name }}</a></h3>
                    </div>
                    <div class="des_news ellipsis_three_row">
                       {!! $item->translations->descriptions !!}
                    </div>
                </figcaption>
            </figure>
        </div>
        @endforeach
         <div class=" col-12 col-md-12">
                {!! $relatedpost->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
