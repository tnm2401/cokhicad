@extends("frontend.layout.master-layout")
@section('content')
@if($errors->all())
<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif
    <!--Page Title-->
    <div style="margin-top:75px" class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Create an Account</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                <div class="mb-4">
                    {{-- <form method="post" action="#" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="FirstName">First Name</label>
                                    <input type="text" name="customer[first_name]" placeholder="" id="FirstName"
                                        autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="LastName">Last Name</label>
                                    <input type="text" name="customer[last_name]" placeholder="" id="LastName">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">Email</label>
                                    <input type="email" name="customer[email]" placeholder="" id="CustomerEmail"
                                        class="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Password</label>
                                    <input type="password" value="" name="customer[password]" placeholder=""
                                        id="CustomerPassword" class="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Create">
                            </div>
                        </div>
                    </form> --}}
                    <form class="form mb-5" action="{{ route('frontend.home.registeraccount.post') }}" method="POST" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">
						@csrf
						<div class="form-group">
							<label>Họ và tên</label>
							<input type="text" name="name" >
						</div>
						<div class="form-group">
							<label>Địa chỉ</label>
							<input type="text" name="address" >
						</div>
						<div class="form-group">
							<label>Số điện thoại</label>
							<input type="text" name="phone" >
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" >
						</div>
						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="password" name="password" >
						</div>
						<div class="form-group">
							<label>Nhập lại Mật khẩu</label>
							<input type="password" name="confirm_password" >
						</div>
						<button type="submit" class="btn btn-success btn-custom">Đăng ký tài khoản</button>
						<i class="ti ti-help-alt"></i> Bạn đã có Tài khoản ? <a href="{{ route('frontend.home.login') }}"><u>Đăng nhập ngay</u></a>
						{{-- <a href="{{ route('frontend.home.register') }}" title="Đăng ký tài khoản">Đăng ký</a> --}}
					</form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
