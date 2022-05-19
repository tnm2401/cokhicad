@extends('backend.layout.master')
@section('title', 'Thêm phí ship')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                Thêm phí vận chuyển
            </h4>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
                <li><a>Vận chuyển</a></li>
                <li><a href="{{ route('feeship.index') }}">Phí vận chuyển</a></li>
                <li class="active">Thêm</li>
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
            <form method="POST" action="{{ route('feeship.store') }}">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-body">
                                <input type="hidden" id="type" name="type" value="fee">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tỉnh/Thành phố</label>
                                            <select class="form-control select2 choose province" name="province"
                                                id="province" style="width: 100%;">
                                                <option value="">Chọn Tỉnh/Thành phố</option>
                                                @foreach ($provinces as $key => $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Quận/Huyện</label>
                                            <select class="form-control select2 choose district" name="district"
                                                id="district" style="width: 100%;">
                                                <option value="">Chọn Quận/Huyện</option>
                                                {{-- <option value="">{{ $cart->district }}</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Phường/Xã</label>
                                            <select class="form-control select2 ward" name="ward" id="ward"
                                                style="width: 100%;">
                                                <option value="">Chọn Phường/Xã</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phí vận chuyển</label>
                                    <input type="text" name="fee_ship" id="fee_ship" value="{{ old('fee_ship') }}"
                                        class="form-control fee_ship" data-toggle="tooltip" data-placement="top"
                                        title="Nhập tên bài viết">
                                </div>
                                <div id="load_delivery"></div>
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
                                <button type="button" name="create-delivery" class="btn btn-primary create-delivery"><i
                                        class="fa fa-save"></i> Lưu</button>
                                <a href="{{ route('feeship.index') }}" class="btn btn-danger"><i
                                        class="fa fa-times-circle"></i> Thoát</a>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>Số thứ tự</label>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="number" name="stt" id="stt" value="1" class="form-control stt"
                                        data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>
                                    <input type="checkbox" name="hide_show" id="hide_show" value="1" class="minimal"
                                        checked="1"><span style="margin-left: 10px;">Hiển thị</span>
                                </label>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>Thao tác</label>
                            </div>
                            <div class="box-body">
                                <button type="button" name="create-delivery" class="btn btn-primary create-delivery"><i
                                        class="fa fa-save"></i> Lưu</button>
                                <a href="{{ route('feeship.index') }}" class="btn btn-danger"><i
                                        class="fa fa-times-circle"></i> Thoát</a>
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
    <script>
        $(document).ready(function() {
            //load data fee
            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('feeship.data') }}',
                    method: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur', '.ship_edit', function() {
                // alert("Chọn vào ô cần Edit rồi bấm qua vùng khác để lưu");
                var ship_id = $(this).data('feeship_id');
                var ship_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                // alert(ship_id);
                // alert(ship_value);
                $.ajax({
                    url: '{{ route('update_ship.data') }}',
                    method: 'POST',
                    data: {
                        ship_id: ship_id,
                        ship_value: ship_value,
                        _token: _token
                    },
                    success: function(data) {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Đã cập nhật giá ship',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        fetch_delivery();
                    }
                });
            });
            $('.create-delivery').click(function() {
                var province = $('.province').val();
                var district = $('.district').val();
                var ward = $('.ward').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                // alert(province);
                // alert(district);
                // alert(ward);
                // alert(fee_ship);
                $.ajax({
                    url: '{{ route('feeship.store') }}',
                    method: 'POST',
                    data: {
                        province: province,
                        district: district,
                        ward: ward,
                        _token: _token,
                        fee_ship: fee_ship
                    },
                    success: function(data) {
                        // alert('Thêm phí vận chuyển thành công');
                        fetch_delivery();
                        // location.href = "{{ route('feeship.index') }}";
                    }
                });
            })
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var code_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                // alert(action);
                // alert(code_id);
                // alert(_token);
                if (action == 'province') {
                    result = 'district';
                } else {
                    result = 'ward';
                }
                $.ajax({
                    url: '{{ route('feeship.select') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        code_id: code_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>
@endpush
