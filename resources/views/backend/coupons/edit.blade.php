@extends('backend.layout.master')
@section('title','Cập nhật mã giảm giá')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
      Chỉnh sửa mã giảm giá
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a href="{{ route('coupon.index') }}">Danh mục Mã giảm giá</a></li>
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
    <form method="POST" action="{{ route('coupon.update', $coupon->id) }}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <label>Tên coupon</label>
                <input type="text" name="translation[name]" id="name" data-length=120 value="@if(isset($coupon->translations->name)){{ old('name', $coupon->translations->name) }}@else{{ old('name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên coupon">
              </div>
              <div class="form-group">
                <label>Mã Coupon</label>
                <input type="text" name="coupon" id="coupon" value="{{ $coupon->coupon }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mã Coupon">
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Loại Coupon</label>
                    <select class="form-control select2" name="condition" style="width: 100%;">
                        @if($coupon->condition == 2)
                      <option selected="selected" value="2">Giảm theo Tiền</option>
                      <option value="1">Giảm theo %</option>
                      @else
                      <option selected value="1">Giảm theo %</option>
                      <option value="2">Giảm theo tiền</option>
                      @endif
                    </select>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Nhập giá trị</label>
                      <input type="text" name="discount" id="discount" value="{{ $coupon->discount }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập số tiền hoặc %">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Số lần sử dụng</label>
                      <input type="number" min="1" name="quantity" id="quantity" value="{{ $coupon->quantity }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập số lượng">
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
                        <input type="text" class="form-control pull-right" id="datepicker" name="effective_date" value="{{ $coupon->effective_date }}">
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
                        <input type="text" class="form-control pull-right" id="datepicker2" name="expiry_date" value="{{ $coupon->expiry_date }}">
                      </div>
                  </div>
                </div>
              </div>
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
              <label>Số thứ tự</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <input type="number" name="stt" id="stt" value="@if(isset($coupon->stt)){{ old('stt', $coupon->stt) }}@else{{ old('stt') }}@endif" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>
                <input type="checkbox" name="status" id="status" value="1" {{ $coupon->status == 1 ? 'checked' : '' }} class="minimal"><span style="margin-left: 10px;">Sử dụng</span>
              </label>
            </div>
          </div>
        </div>
        <!-- right column -->
      </div>
    </section>
  </div>
</form>
@endsection
