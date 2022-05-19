@extends('frontend.layout.master-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 mb-4 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->translations->name }}"><i
                                    class="ti-home"></i>{{ __('Trang chủ') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $page->translations->name }}</li>
                    </ol>
                </nav>
                <article class="card post mb-5">
                    <div class="post-content" id="post_content">
                        <div class="main-title text-center">
                            <h1 class="font-weight-bold">{{ $page->translations->name }}</h1>
                        </div>

                        <hr>
                        {!! $page->translations->content !!}

                        <p>&nbsp;</p>
                        <hr>

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
                                <div class="col-md-12">
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
                                </div>
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
                        <hr>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link active" id="office-1" data-toggle="tab" href="#office" title="Bản đồ"
                                    role="tab" aria-controls="office" aria-selected="true">Bản đồ chỉ đường</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="office" role="tabpanel" aria-labelledby="office-1">
                               {!! $setting->maps !!}
                            </div>
                        </div>


                    </div>
                </article>
            </div>
        </div>



    </div>
@endsection

@push('script')
    <script>
        function refreshCaptcha() {
            $.ajax({
                url: "{{ route('refereshcapcha') }}",
                type: "get",
                dataType: "html",
                success: function(json) {
                    $(".refereshrecapcha").html(json);
                },
                error: function(data) {
                    alert("Try Again.");
                },
            });
        }
    </script>
    <script>
        var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};
        if (has_errors) {
            Swal.fire({
                title: '{{ __('error') }}...!',
                icon: 'error',
                html: jQuery('#error_contact').html(),
                showCloseButton: true,
            });
        }
    </script>
    <script>
        $(function() {
            $("#showForm").on("click", function(e) {
                e.preventDefault();
                $(".contact__form").toggleClass("active");
            });
        });
    </script>
@endpush
