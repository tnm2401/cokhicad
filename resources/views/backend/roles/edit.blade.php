@extends('backend.layout.master')
@push('script')
    <script src="{{ asset('backend') }}/plugins/theeview-roles/hummingbird-treeview.js"></script>
    <script>
        $("#treeview").hummingbird();
        $("#checkAll").click(function() {
            $("#treeview").hummingbird("checkAll");
        });
        $("#uncheckAll").click(function() {
            $("#treeview").hummingbird("uncheckAll");
        });
        $("#collapseAll").click(function() {
            $("#treeview").hummingbird("collapseAll");
        });
        $("#expandAll").click(function() {
            $("#treeview").hummingbird("expandAll");
        });
        $("#addNode").click(function() {
            $("#treeview").hummingbird("addNode");
        });
        $("#checkNode").click(function() {

            $("#treeview").hummingbird("checkNode", {
                sel: "data-id",
                vals: ["newcatone_gr"],
            });
        });
        $("#treeview").hummingbird("expandNode",{sel:"data-id",vals:["check_all"],expandParents:true});

    </script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/theeview-roles/hummingbird-treeview.css">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                Cập nhật quyền
            </h4>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
                <li><a>Quản trị hệ thống</a></li>
                <li><a href="{{ route('role.index') }}">Nhóm và phân quyền</a></li>
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
            <form id="stringLengthForm" method="POST"  action="{{ route('role.update', $role->id) }}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control"
                                        data-toggle="tooltip" data-placement="top" title="Tên quyền">
                                    <input type="hidden" name="slug" value="">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mô tả nhóm và quyền"
                                        name="description" rows="6">{{ $role->description }}</textarea>
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#rolemodal">
                                    Chọn quyền
                                </button>
                            </div>
                        </div>

                        <br />

                    </div>
                    <!-- Modal -->
                    @include('backend.roles.modal');
                    <!-- left column -->
                    <!-- right column -->
                    {{-- <div class="col-md-3">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>Thao tác</label>
                            </div>
                            <div class="box-body">
                                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                                <a class="btn btn-danger" href="{{ route('role.index') }}"><i
                                        class="fa fa-times-circle"></i> Thoát</a>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>
                                    <input type="checkbox" name="is_default" id="is_default" value="1"
                                        class="minimal" checked="1"><span style="margin-left: 10px;">Mặc định</span>
                                </label>
                            </div>
                        </div>
                    </div> --}}
                    <!-- right column -->
                </div>
            </form>
        </section>

    </div>
@endsection
