@extends('backend.layout.master')
@section('title','Thư liên hệ')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Thư liên hệ</h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a href="{{ route('backend.contactform.index') }}">Thư liên hệ</a></li>
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
            <table id="contactforms" class="table table-bordered table-striped set__width">
              <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
              <thead>
                <tr>
                  <th>
                    <label class="mb-0">
                      <input type="checkbox" id="selectall">
                    </label>
                  </th>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Điện thoại</th>
                  <th>Email</th>
                  <th>Ngày gửi</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($contactforms as $k => $contactform)
                <tr>
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" data-id="{{ $contactform->id }}">
                    </label>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" data-id="{{ $contactform->id }}" value="@if(isset($contactform->stt)){{ old('stt', $contactform->stt) }}@else{{ old('stt') }}@endif" class="stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự" style="max-width: 50px; text-align: center">
                    </div>
                  </td>
                  <td><strong><a href="{{ route('backend.contactform.edit', $contactform->id) }}">{{ $contactform->name }}</a></strong></td>
                  <td>{{ $contactform->phone }}</td>
                  <td>{{ $contactform->email }}</td>
                  <td>{{ date("d/m/Y", strtotime($contactform->updated_at)) }}</td>
                  <td>
                    <input data-id="{{ $contactform->id }}" class="read" type="checkbox" data-on="Mới" {{ $contactform->read ? '' : 'checked' }} data-off="Đã xem" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-size="mini">
                  </td>
                  <td>
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa thông tin" href="{{ route('backend.contactform.edit', $contactform->id ) }}"><i class="fa fa-edit"></i></a>
                    <form class="d-inline" method="POST" action="{{ route('backend.contactform.destroy', $contactform->id) }}">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá thông tin"><i class="fa fa-trash"></i></button>
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
                            url: "{{ route('backend.contactform.deletemultiple') }}",
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
function switchChange(){
  $('#contactforms').on('change','input[class="read"]',function(){
    var read = $(this).prop('checked') == true ? 0 : 1;
    var contactform_id = $(this).data('id');
    $.ajax({
      type: "GET",
      dataType: "json",
      url: '{{ route('backend.contactform.read') }}',
      data: {'read': read, 'contactform_id': contactform_id},
        success: function(data){
          Swal.fire({
            icon: 'success',
            title: 'Thành công !',
            text: 'Đã cập nhật trạng thái !',
            showConfirmButton: false,
            timer: 2500
            })
        }
    });
  })
}

$(document).ready(function(){
  switchChange();
  $(function(){
    $('#contactforms').on( 'change', 'input[class="stt"]', function () {
      var stt = $(this).val();
      var contactform_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('backend.contactform.changestt') }}',
        data: {'stt': stt, 'contactform_id': contactform_id},
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
<script>
  $(function () {
    $('#contactforms').DataTable({
      'order'       : [0],
      'responsive'  : true,
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'columnDefs': [
      { 'orderable': false, 'targets': [0,1,7] }
      ],
      'language': {
        "sProcessing":   "Đang xử lý...",
        "sLengthMenu":   "Xem _MENU_ mục",
        "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
        "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
        "sInfoFiltered": "(được lọc từ _MAX_ mục)",
        "sInfoPostFix":  "",
        "sSearch":       "Tìm:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Đầu",
          "sPrevious": "Trước",
          "sNext":     "Tiếp",
          "sLast":     "Cuối"
        }
      }
    })
  })
</script>
@endpush