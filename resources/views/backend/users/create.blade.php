@extends('backend.layout.master')
@section('title','Thêm thành viên | Quản trị hệ thống | Quản trị viên')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
      Thêm mới User
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a>Quản lý Thành viên</a></li>
      <li><a href="{{ route('backend.user.index') }}">Quản lý User</a></li>
      <li class="active">Thêm mới User</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <form id="stringLengthForm" method="POST" action="{{ route('backend.user.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <label>Tên thành viên</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên thành viên">
              </div>
              <div class="form-group">
                <label>Email thành viên</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập email thành viên">
              </div>
              <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" value="{{ old('password') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mật khẩu đăng nhập">
              </div>
              <div class="form-group">
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập lại mật khẩu">
              </div>
              <div class="form-group">
                <label>Mô tả thành viên</label>
                <textarea class="form-control" name="content" id="content" rows="6">{{ old('content') }}</textarea>
              </div>
              <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
              <a class="btn btn-danger" href="{{ route('backend.user.index') }}"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
        </div>
        <!-- left column -->
        <!-- right column -->
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Thao tác</label>
            </div>
            <div class="box-body">
              <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
              <a class="btn btn-danger" href="{{ route('backend.user.index') }}"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Hình ảnh đại diện</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <img id="imgpreview" src="{{ asset('storage') }}/uploads/placeholder.png" width="100%">
                <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" title="Dimensions min 500 x 500 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Phân quyền</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <select class="form-control select2" name="role_id" data-placeholder="Chọn nhóm và quyền" style="width: 100%;">
                  @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Trạng thái</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <select class="form-control select2" name="status" style="width: 100%;">
                  <option value="1" selected="selected">Active</option>
                  <option value="0">UnActive</option>
                </select>
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Số thứ tự</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <input type="number" name="stt" id="stt" value="1" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Thao tác</label>
            </div>
            <div class="box-body">
              <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
              <a class="btn btn-danger" href="{{ route('backend.user.index') }}"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
        </div>
        <!-- right column -->
      </div>
    </section>
  </div>
</form>
@endsection
@push('script')
@endpush