@extends('backend.layout.master')
@section('title','Sửa đơn hàng | Đơn hàng')
@push('script')
@endpush
@section('content')
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Sửa đơn hàng</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="{{ route('backend.order.index') }}">Đơn hàng</a></li>
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
        <form method="POST" action="{{ route('backend.order.update', $order->id) }}">
            <input type="hidden" name="delete_item" id="value_item">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Thông tin khách hàng</h4>
                        </div>
                        <div class="box-body">
                            <input type="hidden" name="orderId" value="{{ $order->id }}">
                            <div class="form-group">
                                <label>Mã đơn hàng</label>
                                <input type="text" name="order_id" id="order_id" value="@if(isset($order->order_id)){{ old('order_id', $order->order_id) }}@else{{ old('order_id') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Mã đơn hàng" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="name" id="name" value="@if(isset($order->name)){{ old('name', $order->name) }}@else{{ old('name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên khách hàng">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="phone" id="phone" value="@if(isset($order->phone)){{ old('phone', $order->phone) }}@else{{ old('phone') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" value="@if(isset($order->email)){{ old('email', $order->email) }}@else{{ old('email') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Số nhà, tên đường</label>
                                <input type="text" name="address" id="address" value="@if(isset($order->address)){{ old('address', $order->address) }}@else{{ old('address') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập địa chỉ">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-control select2" name="province" id="province" width="100%">
                                            <option selected="selected" disabled="disabled">{{ $order->province }}</option>
                                            @foreach($provinces as $province)
                                            <option value="{{ $province->id }}|{{ $province->name }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Quận/Huyện</label>
                                        <select class="form-control select2" name="district" id="district" width="100%">
                                            <option value="">{{ $order->district }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phường/Xã</label>
                                        <select class="form-control select2" name="ward" id="ward" width="100%">
                                            <option value="">{{ $order->ward }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @include('backend.order.VAT') --}}
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Phương thức vận chuyển</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control select2" id="transport" name="transport" width="100%">
                                    @if ($order->transport == 1)
                                    <option selected="selected" value="1">Chuyển phát nhanh ( Phí vận chuyển bên mua thanh toán )</option>
                                    <option value="2">Giao hàng tận nơi trong phạm vi TP.HCM</option>
                                    @else
                                    <option selected="selected" value="2">Giao hàng tận nơi trong phạm vi TP.HCM</option>
                                    <option value="1">Chuyển phát nhanh ( Phí vận chuyển bên mua thanh toán )</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Phương thức thanh toán</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control select2" id="payment" name="payment" width="100%">
                                    @if ($order->payment == 'payment_bank')
                                    <option selected="selected" value="payment_bank">Chuyển khoản ngân hàng đối với Khách hàng không ở TP.HCM</option>
                                    <option value="payment_cod">Thu tiền khi nhận hàng đối với Khách hàng ở TP.HCM</option>
                                    <option value="payment_office">Thanh toán tại cửa hàng đối với Khách hàng tự đến lấy</option>
                                    @elseif($order->payment == 'payment_cod')
                                    <option selected="selected" value="payment_cod">Thu tiền khi nhận hàng đối với Khách hàng ở TP.HCM</option>
                                    <option value="payment_bank">Chuyển khoản ngân hàng đối với Khách hàng không ở TP.HCM</option>
                                    <option value="payment_office">Thanh toán tại cửa hàng đối với Khách hàng tự đến lấy</option>
                                    @else
                                    <option selected="selected" value="payment_office">Thanh toán tại cửa hàng đối với Khách hàng tự đến lấy</option>
                                    <option value="payment_bank">Chuyển khoản ngân hàng đối với Khách hàng không ở TP.HCM</option>
                                    <option value="payment_cod">Thu tiền khi nhận hàng đối với Khách hàng ở TP.HCM</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Chi tiết đơn hàng</h4>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá bán</th>
                                        <th>Thành tiền</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderdetail as $detail)
                                    <tr>
                                        <td><strong>{{ $detail->product->translations->name }}</strong></td>
                                        <td><img src="{{ asset('storage') }}/uploads/products/{{ $detail->product->img }}" class="img-thumbnail"></td>
                                        <td>{{ $detail['quantity'] }}</td>
                                        <td>{{ product_price_view($detail['price']) }}₫</td>
                                        <td>{{ product_price($detail['quantity'] * $detail['price']) }}</td>
                                        
                                        <td id="delete_item">
                                            <a data-toggle="tooltip" class="btn btn-danger del-confirm" data-id="{{ $detail['id'] }}" data-placement="top" title="Xoá"><i class="fa fa-trash"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="total alert alert-success mt-1"><strong>Tổng tiền:</strong> {{ product_price($order->total) }}</div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title">Ghi chú</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <textarea class="form-control" name="note" id="note" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập ghi chú">@if(isset($order->note)){{ old('note', $order->note) }}@else{{ old('note') }}@endif</textarea>
                            </div>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.order.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <a href="{{ route('backend.order.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Tình trạng</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select class="form-control select2" id="status" name="status" style="width: 100%;">
                                    @foreach ($data['status_order'] as $item)
                                    <option {{ $item->id == $order->orderstatus->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
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
                                <input type="number" name="stt" id="stt" value="@if(isset($order->stt)){{ old('stt', $order->stt) }}@else{{ old('stt') }}@endif" min="0" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Thao tác</label>
                        </div>
                        <div class="box-body">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.order.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
<script>
    $("#delete_item a").click(function() {
    const id = $(this).attr('data-id');
    $("input#value_item").val(id);
});
</script>
<script>
    $('.del-confirm').click(function(event) {
        var form = $(this).closest("form");
        // alert(form);
        event.preventDefault();
        Swal.fire({
            title: 'Xác nhận Xóa !',
            text: "Không thể khôi phục sau khi Xóa !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } else {
                Swal.fire(
                    'Đã hủy !',
                    'Bạn chưa Xóa gì cả !',
                    'error'
                )
            }
        })
    });
</script>
{{-- <script>
    $(".delete-item").click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "/administrator/orders/"+id+"/destroyorderdetail",
            type: "DELETE",
            data: {
                id: id,
                _token: token,
            },
            success: function (data) {
                setTimeout(function() { // wait for 3 secs(2)
                    location
                .reload(); // then reload the page.(3)
                }, 3000);
                Swal.fire({
                    icon: "success",
                    title: "Thành công !",
                    text: "Đã Xóa sản phẩm khỏi đơn hàng !",
                    showConfirmButton: true,
                    timer: 25000,
                });
            },
        });
    });
</script> --}}
<script type="text/javascript">
  $('#province').change(function(){
  var provinceID = $(this).val();    
  if(provinceID){
      $.ajax({
         type:"GET",
         url:"{{ url('get-district-list') }}?province_id="+provinceID,
         success:function(res){               
          if(res){
              $("#district").empty();
              $("#district").append('<option>Chọn Quận/Huyện</option>');
              $.each(res,function(key,name){
                  $("#district").append('<option value="'+key+'|'+name+'">'+name+'</option>');
              });
          }else{
             $("#district").empty();
          }
         }
      });
  }else{
      $("#district").empty();
      $("#ward").empty();
  }      
  });
  $('#district').on('change',function(){
  var districtID = $(this).val();    
  if(districtID){
      $.ajax({
         type:"GET",
         url:"{{url('get-ward-list')}}?district_id="+districtID,
         success:function(res){               
          if(res){
              $("#ward").empty();
              $("#ward").append('<option>Chọn Phường/Xã</option>');
              $.each(res,function(key,name){
                  $("#ward").append('<option value="'+key+'|'+name+'">'+name+'</option>');
              });
          }else{
             $("#ward").empty();
          }
         }
      });
  }else{
      $("#ward").empty();
  }  
  });
</script>


    {{-- <script type="text/javascript">
        $('#province').change(function() {
            var provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-district-list') }}?province_id=" + provinceID,
                    success: function(res) {
                        if (res) {
                            $("#district").empty();
                            $("#district").append('<option>Chọn Quận/Huyện</option>');
                            $.each(res, function(key, name) {
                                $("#district").append('<option value="' + key + '">' + name + '</option>');
                            });
                        } else {
                            $("#district").empty();
                        }
                    }
                });
            } else {
                $("#district").empty();
                $("#ward").empty();
            }
        });
        $('#district').on('change', function() {
            var districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-ward-list') }}?district_id=" + districtID,
                    success: function(res) {
                        if (res) {
                            $("#ward").empty();
                            $("#ward").append('<option>Chọn Phường/Xã</option>');
                            $.each(res, function(key, name) {
                                $("#ward").append('<option value="' + key + '">' + name + '</option>');
                            });
                        } else {
                            $("#ward").empty();
                        }
                    }
                });
            } else {
                $("#ward").empty();
            }
        });
    </script> --}}


    {{-- <script type="text/javascript">
        $('#province_2').change(function() {
            var provinceID = $(this).val();
            if (provinceID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-district-list') }}?province_id=" + provinceID,
                    success: function(res) {
                        if (res) {
                            $("#district_2").empty();
                            $("#district_2").append('<option>Chọn Quận/Huyện</option>');
                            $.each(res, function(key, name) {
                                $("#district_2").append('<option value="' + key + '|' + name +
                                    '">' + name + '</option>');
                            });
                        } else {
                            $("#district_2").empty();
                        }
                    }
                });
            } else {
                $("#district_2").empty();
                $("#ward_2").empty();
            }
        });
        $('#district_2').on('change', function() {
            var districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('get-ward-list') }}?district_id=" + districtID,
                    success: function(res) {
                        if (res) {
                            $("#ward_2").empty();
                            $("#ward_2").append('<option>Chọn Phường/Xã</option>');
                            $.each(res, function(key, name) {
                                $("#ward_2").append('<option value="' + key + '|' + name +
                                    '">' + name + '</option>');
                            });
                        } else {
                            $("#ward_2").empty();
                        }
                    }
                });
            } else {
                $("#ward_2").empty();
            }
        });
    </script> --}}
@endpush