@extends('backend.layout.master')
@section('title','Thêm mã giảm giá')
@push('script')
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
    Thêm mới Coupon
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a>Mã giảm giá</a></li>
      <li><a href="{{ route('coupon.index') }}">Quản lý Mã</a></li>
      <li class="active">Thêm mới</li>
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
    <form method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
              <input type="hidden" id="type" name="type" value="coupon">
                @foreach ($language as $k => $lang)
                <div class="form-group">
                    <label>Tên Coupon ({{ $lang->locale }}) </label>
                    <input type="text" name="translation[{{ $k }}][name]" id="name" value="{{ old('translation['. $k.' ][name]') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên Coupon">
                  </div>
                  <input hidden type="text" name="translation[{{ $k }}][locale]" value="{{ $lang->locale }}">
                @endforeach

              <div class="form-group">
                <label>Mã Coupon</label>
                <input type="text" name="coupon" id="coupon" value="{{ old('coupon') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mã Coupon">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Loại Coupon</label>
                    <select class="form-control select2" name="condition" style="width: 100%;">
                      <option selected="selected" value="2">Giảm theo Tiền</option>
                      <option value="1">Giảm theo %</option>
                    </select>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Nhập giá trị</label>
                      <input type="text" name="discount" id="discount" value="{{ old('discount') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập số tiền hoặc %">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Số lần sử dụng</label>
                      <input type="number" min="1" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên Coupon">
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ngày bắt đầu</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker" name="effective_date" value="">
                      </div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Ngày kết thúc</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker2" name="expiry_date" value="">
                      </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
              <a href="{{ route('coupon.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
              <a href="{{ route('coupon.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Trạng thái</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <select class="form-control select2" name="status" style="width: 100%;">
                  <option value="1" selected="selected">Sử dụng</option>
                  <option value="0">Vô hiệu hóa</option>
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
                <input type="number" min="1" name="stt" id="stt" value="1" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
              </div>
            </div>
          </div>
        </div>
        <!-- right column -->
      </div>
    </section>
  </div>
</form>
@endsection
