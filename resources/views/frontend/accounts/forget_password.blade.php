@extends("frontend.layout.master-layout")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 mb-4 main-content">
			<nav aria-label="breadcrumb" style="margin-top: 10px">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->title }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
					<li class="breadcrumb-item active" aria-current="page">Quên mật khẩu</li>
				</ol>
			</nav>
			<article class="card shadow post">
				<div class="post-content" id="post_content">
					<div class="main-title">
						<h1 class="title">
						Quên mật khẩu
						</h1>
					</div>
					<h2 style="position:absolute; top:-1000px;">Quên mật khẩu</h2>
					<h3 style="position:absolute; top:-1000px;">Quên mật khẩu</h3>
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
					<form class="form mb-5" action="" method="POST">
						@csrf
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
						<h3>Nhập email để lấy lại mật khẩu</h3>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email"  class="form-control" placeholder="Nhập email">
						</div>
						<button type="submit" class="btn btn-success btn-custom">Lấy lại mật khẩu</button>
						<i class="ti ti-help-alt"></i> Bạn chưa có Tài khoản ? <a href="{{ route('frontend.home.registeraccount') }}"><u>Đăng ký ngay</u></a>
					</form>
					@if($author->hide_show == 1)
					<div class="row">
						<div class="col-3">
							<a href="{{ route('frontend.author.index') }}" title="{{ $author->name }}"><img class="img-fluid" src="/storage/uploads/{{ $author->img }}" alt="{{ $author->name }}" title="{{ $author->name }}"></a>
						</div>
						<div class="col-9">
							<a href="{{ route('frontend.author.index') }}" title="{{ $author->name }}"><h3 class="text-danger text-bold" style="margin: 0;font-weight: bold;">{{ $author->name }}</h3></a>
							<p>{!! $author->content !!}</p>
							<a href="{{ $author->link_group }}" class="btn btn-success btn-fill btn-custom" target="_blank" title="{{ $author->name }}">{{ $author->namebuttonone }}</a> <a href="{{ $author->link_group }}" class="btn btn-info btn-fill btn-custom" target="_blank" title="{{ $author->name }}">{{ $author->namebuttontwo }}</a>
						</div>
					</div>
					@endif
				</div>
			</article>
		</div>
@endsection
@push("script")
@endpush