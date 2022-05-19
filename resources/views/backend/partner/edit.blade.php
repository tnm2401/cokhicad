@extends('backend.layout.master')
@section('title','Sửa đối tác | Hình ảnh')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Sửa đối tác</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li>Hình ảnh</li>
            <li><a href="{{ route('backend.partner.index') }}">Quản lý đối tác</a></li>
            <li class="active">Sửa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('backend.partner.update', $partner->id) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
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
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên đối tác ({{ session('locale') }})</label>
                                <input type="text" name="translation[name]" value="@if(isset($partner->translations->name)){{ old('translation'.'.name', $partner->translations->name) }}@else{{ old('translation'.'.name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề hình ảnh ({{ session('locale') }})">
                            </div>
                            {{-- <div class="form-group">
                                <label>Mô tả ({{ session('locale') }})</label>
                                <input type="text" name="translation[content]" value="@if(isset($partner->translations->content)){{ old('translation'.'.content', $partner->translations->content) }}@else{{ old('translation'.'.content') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ({{ session('locale') }})">
                            </div> --}}
                            <div class="form-group">
                                <label>Link liên kết</label>
                                <input type="text" name="url" id="url" value="@if(isset($partner->url)){{ old('url', $partner->url) }}@else{{ old('url') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập link liên kết">
                            </div>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.newcatone.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                    @if ($language->count() > 1)
                    <div class="box box-primary languages">
                        <div class="box-header with-border">
                            <label>Ngôn ngữ</label>
                            <input hidden type="text" name="changelang" id="inputchange">
                        </div>
                        <div class="box-body">
                                <ul id="changelanguage">
                                    @foreach ($language as $lang)
                                        <li>
                                                <a href="javascript:void(0)"><span class="changelanguage change-confirm"
                                                id="{{ $lang->locale }}"> <i class="{{ $lang->flag }}"></i>
                                                {{ $lang->name }} <i class="fas fa-external-link-alt"></i></span>
                                                </a>
                                        </li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                        @endif
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Hình ảnh</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <img id="imgpreview" class="img-thumbnail mb-2" style="width: 100%; margin-bottom:10px;" src="{{ asset('storage') }}/uploads/partner/{{ $partner->img }}" alt="{{ $partner->translations->name }}">
                                <input type="file" name="img" class="form-control" value="{{ $partner->img }}" data-toggle="tooltip" data-placement="top" title="Dimensions min 500 x 500 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Số thứ tự</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="number" name="stt" id="stt" value="@if(isset($partner->stt)){{ old('stt', $partner->stt) }}@else{{ old('stt') }}@endif" min="0" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $partner->hide_show == 1 ? 'checked' : '' }} class="cbc">
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
