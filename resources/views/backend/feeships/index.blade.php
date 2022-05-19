@extends('backend.layout.master')
@section('title', 'Phí vận chuyển')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Phí vận chuyển</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="{{ route('feeship.index') }}">Phí vận chuyển</a></li>
            <li class="active">Tất cả</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="feeships" class="table table-bordered table-striped set__width">
                            <a href="#" data-toggle="modal" data-target="#addfeeship" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
                            <a href="#" class="btn btn-danger delete-all new-custom" style="margin-left: 4px;"><i class="fa fa-trash"></i> Xoá chọn</a>
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mb-0">
                                            <input type="checkbox" id="selectall">
                                        </label>
                                    </th>
                                    <th>Tỉnh/Thành phố</th>
                                    <th>Quận/Huyện</th>
                                    <th>Phường/Xã</th>
                                    <th>Phí ship</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feeships as $k => $feeship)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="checkbox" data-id="{{ $feeship->id }}">
                                    </td>
                                    <td>{{ $feeship->Province->name }}</td>
                                    <td>{{ $feeship->District->name }}</td>
                                    <td>{{ $feeship->Ward->name }}</td>
                                    <td>{{ number_format($feeship->fee_ship, 0, ',', ',') }}₫</td>
                                    <td>
                                        <a class="btn btn-primary" data-toggle="modal" data-target="#addfeeship_{{ $feeship->id }}" data-toggle="tooltip" data-placement="top" title="Sửa phí ship" href="#"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline" method="POST" action="{{ route('feeship.destroy', $feeship->id) }}" >
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá phí ship"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="addfeeship_{{ $feeship->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="addfeeship_{{ $feeship->id }}">Sửa phí vận chuyển</h4>
                                            </div>
                                            <form method="POST"
                                                action="{{ route('feeship.update', $feeship->id) }}">
                                                {{ method_field('PUT') }}
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="hidden" id="type" name="type" value="fee">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Tỉnh/Thành phố</label>
                                                                        <select class="form-control select2 choose2" name="province" id="2province" style="width: 100%;">
                                                                            <option value="">Chọn Tỉnh/Thành phố</option>
                                                                            @foreach ($provinces as $key => $province)
                                                                            @if ($feeship->province_id == $province->id)
                                                                            <option selected value="{{ $province->id }}">{{ $province->name }}
                                                                            </option>
                                                                            @else
                                                                            <option value="{{ $province->id }}">{{ $province->name }}
                                                                            </option>
                                                                            @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Quận/Huyện</label>
                                                                        <select class="form-control select2 choose2" name="district" id="2district" style="width: 100%;">
                                                                            <option value="{{ $feeship->district_id }}">{{ District::find($feeship->district_id)->name }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Phường/Xã</label>
                                                                        <select class="form-control select2" name="ward" id="2ward" style="width: 100%;">
                                                                            <option value="{{ $feeship->ward_id }}">
                                                                                {{ Ward::find($feeship->ward_id)->name }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Phí vận chuyển</label>
                                                                <input type="text" name="fee_ship" id="fee_ship" value="{{ $feeship->fee_ship }}" class="form-control fee_ship" data-toggle="tooltip" data-placement="top" title="Nhập tên bài viết">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('feeship.create') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
                        <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="addfeeship">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Thêm phí vận chuyển</h4>
            </div>
            <form method="POST" action="{{ route('feeship.store') }}">
                @csrf
                @if ($errors->any())
                <div id="add_feeship" class="alert alert-danger" style="display: none">
                    <ul style="padding-left: 0px;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="type" name="type" value="fee">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố</label>
                                        <select class="form-control select2 choose province" name="province" id="province" style="width: 100%;">
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
                                        <select class="form-control select2 choose district" name="district" id="district" style="width: 100%;">
                                            <option value="">Chọn Quận/Huyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phường/Xã</label>
                                        <select class="form-control select2 ward" name="ward" id="ward" style="width: 100%;">
                                            <option value="">Chọn Phường/Xã</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phí vận chuyển</label>
                                <input type="text" name="fee_ship" id="fee_ship" value="{{ old('fee_ship') }}" class="form-control fee_ship" data-toggle="tooltip" data-placement="top" title="Nhập phí vận chuyển">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
  var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};
  if (has_errors) {
    Swal.fire({
      title: 'Lỗi...!',
      icon: 'error',
      html: jQuery('#add_feeship').html(),
      showCloseButton: true,
    });
  }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#selectall').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#selectall').prop('checked', true);
            } else {
                $('#selectall').prop('checked', false);
            }
        });
        $('.delete-all').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                Swal.fire(
                    'Chưa chọn !',
                    'Vui lòng chọn ít nhất 1 mục để Xóa !',
                    'question'
                )
            } else {
                Swal.fire({
                    title: 'Xác nhận Xóa !',
                    text: "Không thể hoàn tác sau khi Xóa !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "{{ route('feeship.deletemultiple') }}",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                if (data['status'] == true) { // if true (1)
                                    setTimeout(function() { // wait for 3 secs(2)
                                        location
                                    .reload(); // then reload the page.(3)
                                    }, 3000);
                                    $(".checkbox:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    Swal.fire(
                                        'Thành công !',
                                        'Đã Xóa các mục vừa chọn !',
                                        'success'
                                    )
                                } else {
                                    alert('Rất tiếc, đã có lỗi xảy ra !');
                                }
                            },
                            error: function(data) {
                                Swal.fire(
                                    'Thất bại !',
                                    'Đã có lỗi xảy ra !',
                                    'danger'
                                )
                            }
                        });
                    } else {
                        Swal.fire(
                          'Đã hủy !',
                          'Bạn chưa Xóa gì cả !',
                          'error'
                      );
                    }
                })
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
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
                    // fetch_delivery();
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
                    // fetch_delivery();
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
<script>
    $(function() {
        $('#feeships').DataTable({
            'order': [0],
            'responsive': true,
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'columnDefs': [
            {'orderable': false,'targets': [0, 1, 2, 3, 5]}
            ],
            'language': {
                "sProcessing": "Đang xử lý...",
                "sLengthMenu": "Xem _MENU_ mục",
                "sZeroRecords": "Không tìm thấy dòng nào phù hợp",
                "sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix": "",
                "sSearch": "Tìm:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Đầu",
                    "sPrevious": "Trước",
                    "sNext": "Tiếp",
                    "sLast": "Cuối"
                }
            }
        })
    })
</script>
<script>
    $(document).ready(function() {
        // load data fee
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
    $(document).ready(function() {
        $('.choose2').on('change', function() {
            var action = $(this).attr('id');
            var code_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if (action == '2province') {
                result = '2district';
            } else {
                result = '2ward';
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
    });
</script>
@endpush