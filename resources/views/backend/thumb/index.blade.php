@extends('backend.layout.master')
@section('title','Quản trị hệ thống | Hình Thumb')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Hình Thumb</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li>Quản trị hệ thống</li>
            <li><a href="{{ route('backend.thumb.index') }}">Hình Thumb</a></li>
            <li class="active">Tất cả</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="thumb" class="table table-bordered table-striped set__width">
                            <a href="js:0" data-toggle="modal" data-target="#addmodel" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
                            <a href="#" class="btn btn-danger delete-all new-custom" style="margin-left: 4px;"><i class="fa fa-trash"></i> Xoá chọn</a>
                            <thead>
                                <tr>
                                    <th>
                                        <label class="mb-0">
                                            <input type="checkbox" id="selectall">
                                        </label>
                                    </th>
                                    <th>Tên Size</th>
                                    <th>Chiều rộng - Width (px)</th>
                                    <th>Chiều cao - Height (px)</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($thumb as $key => $item)
                                <!-- Modal Edit-->
                                <div class="modal fade" id="editmodel-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modeledit{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="modeledit{{ $item->id }}">Sửa kích thước</h4>
                                            </div>
                                            <form method="POST" action="{{ route('backend.thumb.update', $item->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Tên Size</label>
                                                        <input type="text" name="name" value="{{ $item->name }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên Size">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Type</label>
                                                        <input type="text" name="type" value="{{ $item->type }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập type" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Chiều rộng - Width (px)</label>
                                                        <input type="number" name="width" value="{{ $item->width }}" min="1" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập chiều rộng - Width (px)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Chiều cao - Height (px)</label>
                                                        <input type="number" name="height" value="{{ $item->height }}" min="1"  class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập chiều cao - Height (px)">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Hủy</button>
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-arrows-rotate"></i> Cập nhật</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>
                                      <label>
                                        <input type="checkbox" class="checkbox" data-id="{{ $item->id }}">
                                      </label>
                                    </td>
                                    <td>
                                        <strong><a href="#" data-toggle="modal" data-target="#editmodel-{{ $item->id }}">{{ $item->name }}</a></strong>
                                    </td>
                                    <td>
                                        {{ $item->width }}
                                    </td>
                                    <td>
                                        {{ $item->height }}
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#editmodel-{{ $item->id }}" class="btn btn-primary" title="Sửa size"><i class="fa fa-edit"></i></a>
                                        <form class="d-inline" method="POST" action="{{ route('backend.thumb.destroy', $item->id) }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="js:0" data-toggle="modal" data-target="#addmodel" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
                        <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal Add -->
<div class="modal fade" id="addmodel" tabindex="-1" role="dialog" aria-labelledby="modelcontent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modelcontent">Thêm kích thước</h4>
            </div>
            <form method="POST" action="{{ route('backend.thumb.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger show__errors hidden">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên Size</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" onkeyup="autoType();" data-toggle="tooltip" data-placement="top" title="Nhập tên Size">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" id="type" value="{{ old('type') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập type">
                    </div>
                    <div class="form-group">
                        <label>Chiều rộng - Width (px)</label>
                        <input type="number" name="width" value="{{ old('width') }}" min="1" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập chiều rộng - Width (px)">
                    </div>
                    <div class="form-group">
                        <label>Chiều cao - Height (px)</label>
                        <input type="number" name="height" value="{{ old('height') }}" min="1" class="form-control"  data-toggle="tooltip" data-placement="top" title="Nhập chiều cao - Height (px)">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Hủy</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    function autoType() {
        var name, type;
        //Lấy text từ thẻ input name
        name = document.getElementById("name").value;
        //Đổi chữ hoa thành chữ thường
        type = name.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        type = type.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        type = type.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        type = type.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        type = type.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        type = type.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        type = type.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        type = type.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        type = type.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        type = type.replace(/ /gi, "_");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        type = type.replace(/\-\-\-\-\-/gi, '_');
        type = type.replace(/\-\-\-\-/gi, '_');
        type = type.replace(/\-\-\-/gi, '_');
        type = type.replace(/\-\-/gi, '_');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        type = '@' + type + '@';
        type = type.replace(/\@\-|\-\@|\@/gi, '');
        //In type ra textbox có id “type”
        document.getElementById('type').value = type;
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
                            url: "{{ route('backend.thumb.deletemultiple') }}",
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
                                        'Xóa thành công các mục vừa chọn !',
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
                                    'error'
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
        $('#thumb').DataTable({
            'order': [0],
            'responsive': true,
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'columnDefs': [{
                'orderable': false,'targets': [0, 4]
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