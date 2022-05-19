@extends('backend.layout.master')
@section('title','Đơn hàng')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Đơn hàng</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="{{ route('backend.order.index') }}">Đơn hàng</a></li>
            <li class="active">Tất cả</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content orders">
        <form action="{{ route('backend.order.postSearchTable') }}" method="POST" class="formAjax">
            @csrf
            @method('POST')
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary mb-0">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <div class="form-group">
                                        <label>Từ ngày</label>
                                        <input type="date" name="fromday" value="{{ old('fromday') }}" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Ngày bắt đầu">
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="form-group">
                                        <label>Đến ngày</label>
                                        <input type="date" name="today" value="{{ old('today') }}" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Ngày kết thúc">
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="form-group" data-toggle="tooltip" data-placement="bottom" title="Tình trạng">
                                        <label>Tình trạng</label>
                                        <select class="form-control select2" id="status" name="status" width="100%">
                                            <option value="0">Tất cả</option>
                                            @foreach ($data['status_order'] as $i)
                                            <option value="{{ $i->stt }}" {{ old('status') == $i ? 'selected' : '' }}>{{ $i->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="form-group">
                                        <label>Thao tác</label>
                                        <button type="submit" class="form-control btn btn-success search-order-form"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="orders" class="table table-bordered table-striped set__width">
                            <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mb-0">
                                            <input type="checkbox" id="selectall">
                                        </label>
                                    </th>
                                    <th>STT</th>
                                    <th>Mã đơn</th>
                                    <th>Tên</th>
                                    <th>Điện thoại</th>
                                    <th>Ngày đặt</th>
                                    <th>Số tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" class="checkbox" data-id="{{ $order->id }}">
                                        </label>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" id="stt_css" data-id="{{ $order->id }}" value="@if(isset($order->stt)){{ old('stt', $order->stt) }}@else{{ old('stt') }}@endif" class="stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
                                        </div>
                                    </td>
                                    <td>{{ $order->order_id }}</td>
                                    <td><strong><a href="{{ route('backend.order.edit', $order->id) }}">{{ $order->name }}</a></strong></td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ date("d/m/Y", strtotime($order->created_at)) }}</td>
                                    <td>{{ product_price_view($order->total) }}₫</td>
                                    <td>
                                        <div class="{{ $order->orderstatus->code }}"><b>{{ $order->orderstatus->name }}</b></div>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa" href="{{ route('backend.order.edit', $order->id ) }}"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline" method="POST" action="{{ route('backend.order.destroy', $order->id) }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
  function switchChange(){
  }
  $(document).ready(function(){
    switchChange();
    $(function(){
      $('#orders').on('change', 'input[class="stt"]', function () {
        var stt = $(this).val();
        var order_id = $(this).data('id');
        $.ajax({
          type: "GET",
          dataType: "json",
          url: '{{ route('backend.order.changestt') }}',
          data: {'stt': stt, 'order_id': order_id},
          success: function(data){
            Swal.fire({
              icon: 'success',
              title: 'Thành công !',
              text: 'Đã cập nhật số thứ tự !',
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
                            url: "{{ route('backend.order.deletemultiple') }}",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                if (data['status'] == true) { // if true (1)
                                    setTimeout(function() { // wait for 3 secs(2)
                                        location.reload(); // then reload the page.(3)
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
    $(function() {
        $('#orders').DataTable({
            dom: 'Bfrtip',
                buttons: [{
                        extend: 'copyHtml5',
                        title: 'Đơn hàng - ' + {{ date('dmY') }},
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Đơn hàng - ' + {{ date('dmY') }},
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6] // các cột cần xuất
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        // title: 'Order'+$("#date").val()+'-'+$("#date2").val(),
                        title: 'Đơn hàng - ' + {{ date('dmY') }},
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Đơn hàng - ' + {{ date('dmY') }},
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
            'order': [0],
            'responsive': true,
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'columnDefs': [
            {'orderable': false,'targets': [0,1,8]}
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
                },
                "buttons": {
                    "colvis": "Ẩn cột",
                }
            }
        })
    })
</script>
@endpush