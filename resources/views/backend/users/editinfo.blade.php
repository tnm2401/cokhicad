@extends('backend.layout.master')
@section('title','Sửa thông tin | Quản trị hệ thống | Quản trị viên')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Sửa thông tin</h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li>Quản trị hệ thống</a></li>
      <li><a href="{{ route('backend.user.index') }}">Quản trị viên</a></li>
      <li class="active">Sửa</li>
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
    <form method="POST" action="{{ route('backend.user.updateinfo') }}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <label>Tên thành viên</label>
                <input type="text" name="name" value="@if(isset($user->name)){{ old('name', $user->name) }}@else{{ old('name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên thành viên">
              </div>
              <div class="form-group">
                <label>Email thành viên</label>
                <input type="email" name="email" value="@if(isset($user->email)){{ old('email', $user->email) }}@else{{ old('email') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập email thành viên">
              </div>
              <div class="form-group">
                <label>Mô tả thành viên</label>
                <textarea class="form-control" name="content" id="content" value="@if(isset($user->content)){!! old('content', $user->content) !!}@else{{ old('translation.'.$lang->locale.'.content') }}@endif" rows="6">@if(isset($user->content)){!! old('content', $user->content) !!}@else{{ old('translation.'.$lang->locale.'.content') }}@endif</textarea>
              </div>
              <button class="btn btn-primary" ><i class="fa fa-save"></i> Lưu</button>
              <a href="{{ route('backend.user.index') }}" class="btn btn-danger" ><i class="fa fa-times-circle"></i> Thoát</a>
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
              <button class="btn btn-primary" ><i class="fa fa-save"></i> Lưu</button>
              <a href="{{ route('backend.user.index') }}" class="btn btn-danger" ><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Hình ảnh đại diện</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <img id="imgpreview" class="img-thumbnail mb-2" style="width: 100%; margin-bottom:10px;" src="/storage/uploads/{{ $user->img }}" alt="{{ $user->name }}">
                <input type="file" name="img" class="form-control" value="{{ $user->img }}" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
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
                    @if($user->role_id == $role->id)
                    <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                    @else
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endif
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
                  @if($user->status == 1)
                  <option selected value="1">Hoạt động</option>
                  <option value="0">Vô hiệu hóa</option>
                  @else
                  <option selected value="0">Vô hiệu hóa</option>
                  <option value="1">Hoạt động</option>
                  @endif
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
                <input type="number" name="stt" id="stt" value="@if(isset($user->stt)){{ old('stt', $user->stt) }}@else{{ old('stt') }}@endif" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Thao tác</label>
            </div>
            <div class="box-body">
              <button class="btn btn-primary" ><i class="fa fa-save"></i> Lưu</button>
              <a href="{{ route('backend.user.index') }}" class="btn btn-danger" ><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
        </div>
        <!-- right column -->
      </div>
      </form>
    </section>
  </div>
@endsection
@push('script')
@endpush