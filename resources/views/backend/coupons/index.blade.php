@extends('backend.layout.master')
@section('title','Quản lí mã giảm giá')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
      Quản lý Mã giảm giá
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a>Mã giảm giá</a></li>
      <li><a href="{{ route('coupon.index') }}">Quản lý Mã</a></li>
      <li class="active">Tất cả</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          @if (Session::has('success'))
          <div class="alert-custom">
            <div class="alert alert-success">{{ Session::get('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          @endif
          <div class="box-body">
            <table id="coupons" class="table table-bordered table-striped" >
              <a href="{{ route('coupon.create') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
              <a href="#" class="btn btn-danger delete-all new-custom" style="margin-left: 4px;"><i class="fa fa-trash"></i> Xoá chọn</a>
              <thead>
                <tr>
                  <th>
                    <label class="mb-0">
                      <input type="checkbox" id="selectall">
                    </label>
                  </th>
                  <th>STT</th>
                  <th>Tên Coupon</th>
                  <th>Mã Coupon</th>
                  <th>Giá trị</th>
                  <th>Thời gian</th>
                  <th>Đã sử dụng</th>
                  <th>Tình trạng</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($coupons as $k => $coupon)
                <tr>
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" data-id="{{$coupon->id}}">
                    </label>
                  </td>
                  <td>
                    <div class="form-group">
                        <input type="text" data-id="{{ $coupon->id }}"
                            value="@if (isset($coupon->stt)) {{ old('stt', $coupon->stt) }}@else{{ old('stt') }} @endif"
                            class="stt" data-toggle="tooltip" data-placement="top"
                            title="Nhập số thứ tự" style="max-width: 50px; text-align: center">
                    </div>
                  </td>
                  <td>{{Str::limit($coupon->translations->name, 10)  ?? '' }}</td>
                  <td>{{ $coupon->coupon }}@if($coupon->condition == 2)
                    <i style="color: green" class="fa-duotone fa-badge-dollar"></i>
                    @else
                    <i style="color: red" class="fa-duotone fa-badge-percent"></i>
                    @endif

                  </td>
                  @if($coupon->condition == 1)
                  <td>{{ $coupon->discount }} <i class="fa-duotone fa-percent"></i></td>
                  @else
                  <td>{{ number_format($coupon->discount) }} <i class="fa-duotone fa-dong-sign"></i></td>
                  @endif
                  <td>Từ {{ date("d/m/Y", strtotime($coupon->effective_date)) }} Đến {{ date("d/m/Y", strtotime($coupon->expiry_date)) }}</td>
                  {{-- <td>   {{ \Carbon\Carbon::parse($coupon->expiry_date)->diffForhumans() }}</td> --}}
                  <td>{{ $coupon->used }}/{{ $coupon->quantity }}</td>
                  <td>
                    <input data-id="{{ $coupon->id }}" class="status" type="checkbox" data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-times'></i>" {{ $coupon->status ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-size="mini">
                  </td>
                  <td>
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa Coupon" href="{{ route('coupon.edit', $coupon->id ) }}"><i class="fa fa-edit"></i></a>
                    <form method="POST" action="{{ route('coupon.destroy', $coupon->id) }}" >
                      @csrf
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá Coupon"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{ route('coupon.create') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
            <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@push("script")
<script>
    function switchChange() {
        $('#coupons').on('change', 'input[class="status"]', function() {
            var hide_show = $(this).prop('checked') == true ? 1 : 0;
            var coupon_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('backend.coupon.hideshow') }}',
                data: {
                    'hide_show': hide_show,
                    'coupon_id': coupon_id
                },
                success: function(data) {
                     Swal.fire({
                // position: 'top-end',
                icon: 'success',
                title: 'Đã cập nhật trạng thái',
                showConfirmButton: false,
                timer: 2500
                })
                }
            });
        })
    }

    $(document).ready(function() {
        switchChange();



        $(function() {
            $('#coupons').on('change', 'input[class="stt"]', function() {
                var stt = $(this).val();
                var coupon_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('backend.coupon.changestt') }}',
                    data: {
                        'stt': stt,
                        'coupon_id': coupon_id
                    },
                    success: function(data) {
                         Swal.fire({
                // position: 'top-end',
                icon: 'success',
                title: 'Đã cập nhật trạng thái',
                showConfirmButton: false,
                timer: 2500
                })
                    }
                });
            })
        })

    })
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
                    'Vui lòng chọn ít nhất 1 muc5 để XOÁ !',
                    'question'
                )

            } else {
                Swal.fire({
                    title: 'Bạn có chắc',
                    text: "Không thể hoàn tác sau khi xóa !",
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
                            url: "{{ route('backend.coupon.deletemultiple') }}",
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
                                        'Thành Công',
                                        'Đã xóa các mục vừa chọn !',
                                        'success'
                                    )
                                } else {
                                    alert('Rất tiếc, đã có lỗi xảy ra !');
                                }
                            },
                            error: function(data) {
                                Swal.fire(
                                    'Thất Bại !',
                                    'Đã có lỗi xảy ra !',
                                    'danger'
                                )
                            }
                        });

                    }
                })

            }
        });
    });
</script>
<script>
    $(function() {
        $('#coupons').DataTable({
            'order': [0],
            // 'responsive': true,
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'columnDefs': [{
                'orderable': false,
                'targets': [0, 1, 6]
            }],
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
@endpush
