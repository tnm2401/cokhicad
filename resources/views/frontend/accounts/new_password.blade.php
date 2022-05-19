@extends("frontend.layout.master-layout")
@section("content")
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 mb-4 main-content">
			<nav aria-label="breadcrumb" style="margin-top: 10px">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->title }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
					<li class="breadcrumb-item active" aria-current="page">Lấy lại mật khẩu mới</li>
				</ol>
			</nav>
			<article class="card shadow post">
				<div class="post-content" id="post_content">
					{{-- @if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif --}}
					<div class="main-title">
						<h1 class="title">
						Lấy lại mật khẩu mới
						</h1>
					</div>
					<h2 style="position:absolute; top:-1000px;">Lấy lại mật khẩu mới</h2>
					<h3 style="position:absolute; top:-1000px;">Lấy lại mật khẩu mới</h3>
					@if($errors->all())
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						@foreach($errors->all() as $error)
							{{ $error }}
						@endforeach
					</div>
					@endif
					<form class="form mb-5" action="" method="POST">
						@csrf
						{{-- @if($errors->all())
						<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							@foreach($errors->all() as $error)
							<p>{{ $error }}</p>
							@endforeach
						</div>
						@endif --}}
						<h3>Nhập mật khẩu mới</h3>
						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="password" name="password"  class="form-control" placeholder="Nhập mật khẩu">
						</div>
						<div class="form-group">
							<label>Mật khẩu</label>
							<input type="password" name="password_confirmation"  class="form-control" placeholder="Nhập mật khẩu">
						</div>
						
						<button type="submit" class="btn btn-success btn-custom">Xác nhận</button>
						<i class="ti ti-help-alt"></i> Bạn đã nhớ Mật khẩu ? <a href="{{ route('frontend.home.login') }}"><u>Đăng nhập ngay</u></a>
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