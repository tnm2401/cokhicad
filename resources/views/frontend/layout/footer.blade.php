<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <div class="title text-uppercase">{{ $setting->translations->name }}</div>
                {!! $menu['footer']->translations->content !!}
                <div class="mt-3 image-footer">
                    <img width="200px" src="{{ asset('frontend/img/bo-cong-thuong.png') }}" alt="">
                    <a href="{{ $setting->facebook }}"> <i class="fa-brands fa-facebook"></i></a>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-google-plus"></i>
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </div>
            <div class="col-md-3 mb-2" style="overflow: hidden">
                <div class="title">
                    {{ __('BẢN ĐỒ CHỈ ĐƯỜNG') }}
                </div>
                <div class="content">
                    {!! $setting->maps !!}
                </div>
            </div>
            <div class="col-md-3 mb-2">
                <div class="title">
                    {{ __('KẾT NỐI CAD') }}
                </div>
                <div class="content">
                    <div class="fb-page" data-href="{{ $setting->facebook }}" data-tabs="timeline"
                        data-width="250" data-height="200" data-small-header="false" data-adapt-container-width="true"
                        data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="{{ $setting->facebook }}" class="fb-xfbml-parse-ignore"><a
                                href="{{ $setting->facebook }}"></a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer-line">Copyright © 2022. CAD. All Rights Reserved. Designed by <a href="https://aib.vn">AIB.VN</a>
</div>
<a href="#" class="scrollToTop"><i class="fa-solid fa-up-long"></i></a>
<div class="chat-nav">
    <ul>
        <li>
            <a href="{{ $setting->viber }}" rel="nofollow">
                <i class="ticon-heart"></i>{{ __('Tìm đường') }}
            </a>
        </li>
        @php
      $hotline = $setting->hotline_1;
      $hotline_trim_space = Str::of($hotline)->replace(' ', '');
      @endphp
        <li>
            <a href="https://zalo.me/{{ $hotline_trim_space }}" rel="nofollow" target="_blank">
                <i class="ticon-zalo-circle2"></i>{{ __('Chat Zalo') }}
            </a>
        </li>
        <li>
            <a href="{{ $setting->href_1 }}" rel="nofollow" class="call-mobile">
                <div class="call-mobile-style ">
                    <i class="icon-phone-w call" aria-hidden="true"></i>
                </div>
                <span class="btn_phone_txt">{{ __('Gọi điện') }}</span>
            </a>
        </li>
        {{-- <li>
            <a href="{{ $setting->href_1 }}" rel="nofollow" target="_blank">
                <div class="call-mobile-style ">
                <i class="call-mobile-style"></i>
            </div>
                <span>
                    {{ __('Gọi điện') }}
                </span>

            </a>
        </li> --}}
        <li>
            <a href="{{ $setting->whatsapp }}" rel="nofollow" target="_blank">
                <i class="ticon-zalo-circle3"></i>{{ __('Messenger') }}
            </a>
        </li>
        <li>
            <a href="sms:{{ $setting->hotline_1 }}" class="chat_animation">
                <i class="ticon-chat-sms" aria-hidden="true" title="{{ __('Nhắn tin SMS') }}"></i>
                {{ __('Nhắn tin SMS') }}
            </a>
        </li>
    </ul>
  </div>
</div>

<script src="{{ asset('frontend') }}/js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('frontend') }}/js/jquery.cookie.min.js"></script>
<script src="{{ asset('frontend') }}/js/google-translate.js"></script>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
<script src="{{ asset('frontend') }}/js/popper.js"></script>
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/js/menu.js"></script>
<script src="{{ asset('frontend') }}/js/slick.js"></script>
<script src="{{ asset('frontend') }}/js/main.js"></script>
<script src="{{ asset('frontend') }}/js/swal.js"></script>
<script src="{{ asset('frontend') }}/magiczoomplus/magiczoomplus.js"></script>
<script src="{{ asset('frontend') }}/lightboxed/lightboxed.js"></script>
@stack('script');
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

<script src="{{ asset('frontend') }}/js/jquery.validate.min.js"></script>
<script>
    if ($("#ajax-contact-form").length > 0) {
        $("#ajax-contact-form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                // email: {
                //     required: true,
                //     maxlength: 50,
                //     email: true,
                // },
                subject: {
                    required: true,
                    maxlength: 100
                },
                contactcontent: {
                    required: true,
                    maxlength: 300
                },
                phone: {
                    required: true,
                    // matches:"[0-9]+",
                    minlength: 10,
                    maxlength: 10,
                    number: true,
                },
            },
            messages: {
                name: {
                    required: "Vui lòng nhập tên",
                    maxlength: "Tên quá dài, tối đa 50 kí tự"
                },
                phone: {
                    required: "Vui lòng nhập SĐT",
                    minlength: "SĐT chưa đúng",
                    maxlength: "SĐT chưa đúng",
                    number: "SĐT chưa đúng định dạng"
                },
                email: {
                    required: "Vui lòng nhập địa chỉ email",
                    email: "vui lòng nhập địa chỉ email hợp lệ",
                    maxlength: "Email quá dài, tối đa 50 kí tự",
                },
                subject: {
                    required: "Vui lòng nhập tiêu đề",
                    maxlength: "Tiêu đề quá dài, tối đa 100 kí tự"
                },
                contactcontent: {
                    required: "Vui lòng nhập nội dung",
                    maxlength: "Nội dung quá dài, tối đa 300 kí tự"
                },
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('ĐANG GỬI...');
                $("#submit").attr("disabled", true);
                $.ajax({
                    url: "{{ route('backend.contactform.store') }}",
                    type: "POST",
                    data: $('#ajax-contact-form').serialize(),
                    success: function(response) {
                        $('#submit').html('Gửi');
                        $("#submit").attr("disabled", false);
                        // alert('Ajax form has been submitted successfully');
                        Swal.fire(
                            'Thành công!',
                            'Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất !',
                            'success'
                        )
                        document.getElementById("ajax-contact-form").reset();
                    },
                    error: function(response) {
                        $('#submit').html('ĐÃ GỬI');
                        $("#submit").attr("disabled", false);
                        // alert('Ajax form has been submitted successfully');
                        Swal.fire(
                            'Lỗi',
                            'Captcha chưa chính xác, thử đổi captcha mới !',
                            'error'
                        )
                        document.getElementById("ajax-contact-form").reset();
                    }
                });
            }
        })
    }
</script>
</body>

</html>
