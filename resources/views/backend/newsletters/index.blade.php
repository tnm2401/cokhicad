@extends('backend.layout.master')
@section('title', 'Quản lí thư điện tử')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Thư điện tử</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="{{ route('newsletter.index') }}">Thư điện tử</a></li>
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
                        <table id="newsletters" class="table table-bordered table-striped">
                            <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary new-custom ml-4"><i class="fa-solid fa-pen"></i> Gửi email</a>
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mb-0">
                                            <input type="checkbox" id="selectall">
                                        </label>
                                    </th>
                                    <th>Email</th>
                                    <th>Ngày đăng ký</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chunknewsletters as $k => $chunknewsletter)
                                @foreach ($chunknewsletter as $newsletter)
                                <tr>
                                    <td>
                                        <label>
                                            <input type="checkbox" class="checkbox"
                                            data-id="{{ $newsletter->id }}">
                                        </label>
                                    </td>
                                    <td>{{ $newsletter->email }}</td>
                                    <td>{{ date('d/m/Y', strtotime($newsletter->created_at)) }}</td>
                                    <td>
                                        @if($newsletter->read == 1)
                                        <span class="badge bg-green">Đã gửi mail</span>
                                        @else
                                        <span class="badge bg-red">Mới</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa thông tin" href="{{ route('newsletter.edit', $newsletter->id) }}"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline" method="POST" action="{{ route('newsletter.destroy', $newsletter->id) }}" >
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá thông tin"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                        <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary new-custom"><i class="fa-solid fa-pen"></i> Gửi email</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Nội dung gửi mail</h4>
        </div>
        <form id="sendmail" method="post"  action="{{ route('newsletter.send.all') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
              <div class="form-group col-md-12">
                  <label for="">Tiêu Đề</label>
                  <input type="text" id="title" class="form-control" name="title" >
              </div>
              <div class="form-group col-md-12">
                <label for="">Nội dung</label>
                    <textarea id="content" class=" form-control" name="content" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="">File đính kèm</label>
                    <input type="button" id="lfm" data-input="file" multiple data-preview="holder" value="Tải lên"> <i class="fa-solid fa-upload"></i>
            </div>
            <div class="form-group col-md-12">
                <input readonly id="file" class="form-control" type="text" name="file">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Hủy</button>
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check-double"></i> Gửi cho tất cả người mới</button>
          <a style="margin-left: 3px" href="#" class="btn btn-primary send-check new-custom "><i
            class="fa-solid fa-list-check"></i> Gửi những người đã chọn</a>
          {{-- <a style="margin-left: 3px" href="#" class="btn btn-primary send-all new-custom "><i
            class="fa-solid fa-envelopes-bulk"></i> Gửi mail mới</a> --}}
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('script')
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
                                url: "{{ route('newsletter.delete.multiple') }}",
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

            $('.send-check').on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    Swal.fire(
                        'Chưa chọn !',
                        'Vui lòng chọn ít nhất 1 mail để GỬI !',
                        'question'
                    )

                } else {
                    Swal.fire({
                        title: 'Bạn có muốn',
                        text: "Sẽ gửi mail đến những địa chỉ trên !",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var strIds = idsArr.join(",");
                            var title = $('#title').val();
                            var content = CKEDITOR.instances['content'].getData();
                            var file = $('#file').val();

                            $.ajax({
                                url: "{{ route('newsletter.send.multiple') }}",
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                data: { 'ids':strIds , 'title':title, 'content':content,'file':file},
                                success: function(data) {
                                    if (data['status'] == true) { // if true (1)
                                        setTimeout(function() { // wait for 3 secs(2)
                                            location
                                                .reload(); // then reload the page.(3)
                                        }, 3000);

                                        Swal.fire(
                                            'Thành Công',
                                            'Đã gửi các mail vừa chọn !',
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
            $('#newsletters').DataTable({
                'order': [0],
                // 'responsive'  : true,
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'columnDefs': [{
                    'orderable': false,
                    'targets': [0, 4]
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
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

    <script>
        $('#lfm').filemanager('file');
    </script>
    <script>
            $(document).ready(function() {
            CKEDITOR.replace('content', options);
        });
    </script>
@endpush
