@extends('backend.layout.master')
@section('title','Ngôn ngữ')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                Ngôn ngữ
            </h4>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
                <li>Dịch vụ</li>
                <li><a href="{{ route('backend.language.index') }}">Ngôn ngữ</a></li>
                <li class="active">Tất cả</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">

                        <div class="box-body">
                            <table id="language" class="table table-bordered table-striped set__width">
                                <a href="js:0" data-toggle="modal" data-target="#addmodel"
                                    class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>

                                <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Cờ</th>
                                        <th>Tên </th>
                                        <th>Viết tắt</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($language as $k => $lang)
                                    <!-- Modal edit-->
                                    <div class="modal fade" id="editmodel-{{ $lang->id }}"
                                      tabindex="-1" role="dialog"
                                      aria-labelledby="modeledit{{ $lang->id }}" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h3 class="modal-title"
                                                      id="modeleidt{{ $lang->id }}">Sửa ngôn ngữ
                                                      </h3>
                                                  <button type="button" class="close" data-dismiss="modal"
                                                      aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <form method="POST"
                                                  action="{{ route('backend.language.update', $lang->id) }}"
                                                  enctype="multipart/form-data">
                                                  @csrf
                                                  {{ method_field('PUT') }}
                                                  <div class="modal-body">
                                                      <div class="form-group">
                                                          <label for="">Tên</label>
                                                      <input value="{{ $lang->name }}" type="text" class="form-control" name="name"
                                                          placeholder="Tên gọi">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="">Cờ</label>
                                                    <input value="{{ $lang->flag }}" type="text" class="form-control" name="flag"
                                                        placeholder="Cờ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Viết tắt</label>
                                                    <input value="{{ $lang->locale }}" type="text" class="form-control" name="locale"
                                                        placeholder="Viết tắt">
                                                    </div>

                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary"
                                                              data-dismiss="modal">Hủy</button>
                                                          <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                      </div>

                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                        <tr>

                                            <td>
                                                <div class="form-group">
                                                    <span>{{ $k + 1 }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="{{ $lang->flag }}"></span>
                                            </td>
                                            <td><strong><a
                                              data-toggle="modal"
                                              data-target="#editmodel-{{ $lang->id }}">{{ $lang->name }}</a></strong>
                                            </td>
                                            <td>
                                                {{ $lang->locale }}
                                            </td>

                                            <td>
                                                <a  data-toggle="modal"
                                                data-target="#editmodel-{{ $lang->id }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                                                    title="Sửa danh mục"><i
                                                        class="fa fa-edit"></i></a>
                                                <form class="d-inline" method="POST"
                                                    action="{{ route('backend.language.destroy', $lang->id) }}"
                                                    >
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger del-confirm" data-toggle="tooltip"
                                                        data-placement="top" title="Xoá danh mục"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <a href="js:0" data-toggle="modal" data-target="#addmodel" class="btn btn-primary new-custom"><i
                                    class="fa fa-plus"></i> Thêm mới</a>

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
                <form method="POST" action="{{ route('backend.language.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" placeholder="vd :Tiếng Việt" >
                        </div>
                        <div class="form-group">
                        <label for="">Cờ <a href="https://flagicons.lipis.dev/" target="_blank">(Hướng dẫn ?)</a> </label>
                        <input type="text" class="form-control" value="fi fi-..." name="flag" placeholder="vd : fi fi-vi" >
                        </div>
                        <div class="form-group">
                        <label for="">Viết tắt</label>
                        <input type="text" class="form-control" name="locale" placeholder="vd : vi" >
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
        $(function() {
            $('#language').DataTable({
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
