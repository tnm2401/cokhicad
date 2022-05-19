@extends('backend.layout.master')
@section('title','Thêm đối tác | Hình ảnh')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Thêm đối tác</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li>Hình ảnh</li>
            <li><a href="{{ route('backend.partner.index') }}">Quản lý đối tác</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form id="stringLengthForm" method="POST" action="{{ route('backend.partner.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger show__errors" style="display: none">
                <ul style="padding-left: 0px;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <input type="hidden" id="type" name="type" value="partner">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            @foreach ($language as $lang)
                            <li class="{{ $loop->first ? 'active' : '' }}"><a href="#tab_{{ $lang->locale }}" data-toggle="tab"><span class="{{ $lang->flag }}"></span> {{ $lang->name }}</a></li>
                            @endforeach
                            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                            @foreach($language as $lang)
                            <div class="tab-pane {{ $loop->first ? 'in active' : '' }} tab-content-en" id="tab_{{ $lang->locale }}">
                                <div class="form-group">
                                    <label>Tên đối tác ({{ $lang->locale }})</label>
                                    <input type="text" name="translation[{{ $lang->locale }}][name]" value="{{ old('translation.'.$lang->locale.'.name') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên đối tác ({{ $lang->locale }})">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Mô tả ({{ $lang->locale }})</label>
                                    <input type="text" name="translation[{{ $lang->locale }}][content]" value="{{ old('translation.'.$lang->locale.'.content') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ({{ $lang->locale }})">
                                </div> --}}
                                <input hidden name="translation[{{ $lang->locale }}][locale]" value="{{ $lang->locale }}">
                            </div>
                            @endforeach
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Link liên kết</label>
                                    <input type="text" name="url" id="url" value="{{ old('url') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập link liên kết">
                                </div>
                            </div>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.partner.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.partner.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Hình ảnh</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <img id="imgpreview" src="{{ asset('storage') }}/uploads/placeholder.png" width="100%">
                                <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" title="Dimensions min 500 x 500 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Số thứ tự</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="number" name="stt" id="stt" value="1" min="0" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="hide_show" id="hide_show" value="1" class="cbc" @if(!old() || old('hide_show') == '1') checked @endif>
                                <label class="cbc">Hiển thị</label>
                            </label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Thao tác</label>
                        </div>
                        <div class="box-body">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.partner.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
                        </div>
                    </div>
                </div>
                <!-- right column -->
            </div>
        </form>
    </section>
</div>
@endsection
@push('script')
@endpush
