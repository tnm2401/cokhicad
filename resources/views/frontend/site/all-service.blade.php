@extends('frontend.layout.master-layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="{{ $setting->translations->name }}"><i
                                    class="ti-home"></i>{{ __('Trang chủ') }}</a></li>

                        <li class="breadcrumb-item">{{ __('Dịch vụ') }}</li>
                    </ol>
                </nav>
                <div class="main-title text-center">
                    <h1 class="title font-weight-bold">{{ __('Dịch vụ') }}</h1>
                </div>
               <div class="row justify-content-center">
                <div class="col-md-8 mb-5">
                    {!! $page->translations->descriptions !!}
                </div>
               </div>


                <div class="row">
                    @foreach ($service as $item)
                    <div class="col-md-4 mb-4">
                        <figure>
                            <div class="thumbnail-news mb-2">
                                <a href="{{ route('frontend.slug',$item->translations->slug) }}
                                    "
                                    title="{{ $item->translations->title }}">
                                    <img src="{{ imageUrl('/storage/uploads/servis/'.$item->img,'350','250','100','1') }}"
                                        class="img-fluid" alt="{{ $item->translations->title }}"
                                        title="{{ $item->translations->title }}">
                                </a>
                            </div>
                            <figcaption>

                                <div class="title_news mt-4 mb-3">
                                    <h3>
                                        <a href="{{ route('frontend.slug',$item->translations->slug) }}"
                                            title="{{ $item->translations->title }}">{{ $item->translations->name }}</a>
                                    </h3>
                                    {{-- <span>Giá : {{ number_format($item->selling_price) }} đ</span> --}}
                                </div>
                                <div class="des_news ellipsis_three_row">
                                   {!! $item->translations->descriptions !!}
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
                <nav class="mb-5">
                    <ul class="pagination justify-content-center mb-4">
                        {{ $service->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-5">
                        {!! $page->translations->content !!}
                    </div>
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
            </div>
        </div>
    </div>
@endsection
