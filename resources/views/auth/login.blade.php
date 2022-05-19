<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Đăng nhập hệ thống</title>
        <link rel="shortcut icon" href="{{ asset('storage') }}/uploads/settings/{{ Setting::first()->logoadmin }}" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('backend') }}/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('backend') }}/auth/css/aib.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="login-view-website-aib"><a href="../" target="_blank" title="Xem Website">Xem Website <i class="fa fa-sign-out"></i></a></div>
            <div class="container-login-aib">
                <div class="wrap-login-aib">
                    <div class="login-form-aib-title">
                        <img src="{{ asset('storage') }}/uploads/setting/{{ Setting::first()->logoadmin }}" alt="Logo AIB.VN">
                        <span class="login-form-aib-title-1">ĐĂNG NHẬP HỆ THỐNG</span>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="login-form-aib validate-form-aib">
                        @csrf
                        <div class="wrap-input-aib validate-input-aib m-b-26" data-validate="Email không được rỗng !">
                            <span class="label-input-aib">Email</span>
                            <input class="input-aib @error('email')@enderror" type="email" name="email" id="email" placeholder="Nhập email">
                            <span class="focus-input-aib"></span>
                        </div>
                        <div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="wrap-input-aib validate-input-aib m-b-18" data-validate="Mật khẩu không được rỗng !">
                            <span class="label-input-aib">Mật khẩu</span>
                            <input class="input-aib @error('password')@enderror" type="password" name="password" id="password" placeholder="Nhập mật khẩu">
                            <span class="focus-input-aib"></span>
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password-aib"></span>

                        </div>
                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact-form-checkbox-aib">
                                <input class="input-checkbox-aib" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="label-checkbox-aib" for="remember">Duy trì đăng nhập</label>
                            </div>
                            <div>
                                <a href="#" class="txt-aib">Quên mật mẩu ?</a>
                            </div>
                        </div>
                        <div class="container-login-form-btn-aib">
                            <button class="login-form-btn-aib" name="login" id="login" type="submit">Đăng nhập&nbsp;<i class="fa fa-sign-in"></i></button>
                        </div>
                        <div class="login-copyright-aib"><i class="fa fa-copyright"></i> Designed by <a href="https://aib.vn" target="_blank" title="Thiết kế Website AIB.VN">Thiết kế Website AIB.VN</a></div>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('backend') }}/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/auth/js/aib-login.js"></script>
    </body>
</html>
