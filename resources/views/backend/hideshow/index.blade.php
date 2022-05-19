@extends('backend.layout.master')
@section('title','Bật / Tắt menu')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                Bật tắt menu
            </h4>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
                <li>Menu</li>
                <li><a href="{{ route('backend.language.index') }}">Bật tắt menu</a></li>
                <li class="active">Tất cả</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">

                        <div class="box-body">
                            <table id="hide_shows" class="table table-bordered table-striped set__width">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#addmodel"
                                    class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
                                <a href="javascript:void(0)" class="btn btn-success show-all new-custom"
                                    style="margin-left: 3px;"><i class="fa-duotone fa-toggle-on"></i> Bật hết</a>
                                <a href="javascript:void(0)" class="btn btn-danger hide-all new-custom"
                                    style="margin-left: 3px;"><i class="fa-duotone fa-toggle-off"></i> Tắt hết</a>
                                <thead>
                                    <tr>
                                        <th>
                                            <label class="mb-0">
                                                <input type="checkbox" id="selectall">
                                            </label>
                                        </th>
                                        <th>#</th>
                                        <th>Mục</th>
                                        <th>Dạng</th>
                                        <th>Trạng thái</th>
                                        {{-- <th>Thao tác</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($menu as $k => $hide)
                                        <!-- Modal edit-->
                                        <div class="modal fade" id="editmodel-{{ $hide->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modeledit{{ $hide->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="modeleidt{{ $hide->id }}">Sửa tên
                                                            gọi
                                                        </h3>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('backend.hideshow.update', $hide->id) }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        {{ method_field('PUT') }}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Tên</label>
                                                                <input value="{{ $hide->name }}" type="text"
                                                                    class="form-control" name="name" placeholder="Tên">
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Hủy</button>
                                                                <button type="submit" class="btn btn-primary">Cập
                                                                    nhật</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="checkbox" class="checkbox"
                                                        data-id="{{ $hide->id }}">
                                                </label>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <span>{{ $hide->id }}</span>
                                                </div>
                                            </td>

                                            <td style="cursor:pointer"><strong><a data-toggle="modal"
                                                        data-target="#editmodel-{{ $hide->id }}">{{ $hide->name }}</a></strong>
                                            </td>
                                            <td>
                                                <span
                                                    class="{{ $hide->hide_show == 0 ? 'badge bg-red' : 'badge bg-green' }}">{{ $hide->type }}</span>
                                            </td>
                                            <td>
                                                <input data-id="{{ $hide->id }}" class="hide_show" type="checkbox"
                                                    data-on="<i class='fa fa-check'></i>"
                                                    data-off="<i class='fa fa-times'></i>"
                                                    {{ $hide->hide_show ? 'checked' : '' }} data-toggle="toggle"
                                                    data-onstyle="success" data-offstyle="danger" data-style="ios"
                                                    data-size="mini">
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addmodel"
                                class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
                            <a href="javascript:void(0)" class="btn btn-success show-all new-custom"
                                style="margin-left: 3px;"><i class="fa-duotone fa-toggle-on"></i> Bật hết</a>
                            <a href="javascript:void(0)" class="btn btn-danger hide-all new-custom"
                                style="margin-left: 3px;"><i class="fa-duotone fa-toggle-off"></i> Tắt hết</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal  add -->
    <div class="modal fade" id="addmodel" tabindex="-1" role="dialog" aria-labelledby="modelcontent" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modelcontent">Thêm ngôn ngữ</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('backend.hideshow.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên mục </label>
                            <input type="text" class="form-control" name="name" placeholder="vd : Bảng điều khiển">
                        </div>
                        <div class="form-group">
                            <label for="">Dạng</a> </label>
                            <input type="text" class="form-control" name="type" placeholder="dashboard">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function switchChange() {
            $('#hide_shows').on('change', 'input[class="hide_show"]', function() {
                var hide_show = $(this).prop('checked') == true ? 1 : 0;
                var hide_show_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('backend.hideshow.hideshow') }}',
                    data: {
                        'hide_show': hide_show,
                        'hide_show_id': hide_show_id
                    },
                    success: function(data) {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'success',
                            title: 'Đã cập nhật , F5 để có tải lại trang !',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                });
            })
        }

        $(document).ready(function() {
            switchChange();
        })
    </script>
    <script>
        $(function() {
            tableData = $('#hide_shows').DataTable({
                'order': [0],
                'responsive': true,
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'columnDefs': [{
                    'orderable': false,
                    'targets': [0, 2, 3, 4]
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
            // Apply the search
            tableData.columns().every(function() {
                let that = this;
                $('select', this.header()).change(function(e) {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });
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
            $('.show-all').on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('data-id'));
                });
                var strIds = idsArr.join(",");
                $.ajax({
                    url: "{{ route('backend.showall.hideshow') }}",
                    type: 'GET',
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

                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Đã bật các mục được chọn',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Đã bật tất cả các mục',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function() { // wait for 3 secs(2)
                                location
                                    .reload(); // then reload the page.(3)
                            }, 3000);
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'Đã có lỗi xảy ra',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            });
            ///////
            $('.hide-all').on('click', function(e) {
                var idsArr = [];
                $(".checkbox:checked").each(function() {
                    idsArr.push($(this).attr('data-id'));
                });
                var strIds = idsArr.join(",");
                $.ajax({
                    url: "{{ route('backend.hideall.hideshow') }}",
                    type: 'GET',
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

                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Đã tắt các mục được chọn',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                // position: 'top-end',
                                icon: 'success',
                                title: 'Đã tắt tất cả các mục',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function() { // wait for 3 secs(2)
                                location
                                    .reload(); // then reload the page.(3)
                            }, 3000);
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            // position: 'top-end',
                            icon: 'error',
                            title: 'Đã có lỗi xảy ra',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            });
        });
    </script>
@endpush
