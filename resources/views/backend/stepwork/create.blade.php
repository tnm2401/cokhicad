@extends('backend.layout.master')
@section('title','Thêm quy trình làm việc | Quy trình')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Thêm quy trình làm việc</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="{{ route('backend.stepwork.index') }}">Quy trình làm việc</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('backend.stepwork.store') }}" enctype="multipart/form-data">
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
                                  <label>Nội dung ({{ $lang->locale }})</label>
                                  <textarea class="form-control" name="translation[{{ $lang->locale }}][content]" id="content_{{ $lang->locale }}">{{ old('translation.'.$lang->locale.'.content') }}</textarea>
                                </div>
                                <input type="hidden" name="translation[{{ $lang->locale }}][locale]" value="{{ $lang->locale }}">
                            </div>
                            @endforeach
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.stepwork.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <a href="{{ route('backend.stepwork.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <label>Màu nền</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="color" name="color"  class="form-control stt" data-toggle="tooltip" data-placement="top" title="Chọn màu nền">
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
                            <label>Thao tác</label>
                        </div>
                        <div class="box-body">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.stepwork.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
@foreach($language as $lang)
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('content_{{ $lang->locale }}', options);
        });
        $('document').ready(function() {
            $("#name_{{ $lang->locale }}").keyup(function() {
                $("#title_{{ $lang->locale }}").val(this.value);
                $("#keywords_{{ $lang->locale }}").val(this.value);
                $("#des_{{ $lang->locale }}").val(this.value);
            });
            $(document).on('change', 'input#name_{{ $lang->locale }}', function() {
                var title1 = ($(this).val());
                $('div#title{{ $lang->locale }}').text(title1);
                var des{{ $lang->locale }} = ($(this).val());
                $('div#description{{ $lang->locale }}').text(des{{ $lang->locale }});
                var slug{{ $lang->locale }} = createslug($(this).val());
                $('div#slug{{ $lang->locale }}').text(window.location.hostname + '/' + slug{{ $lang->locale }} + '.html');
            });
            $(document).on('change', 'textarea#des_{{ $lang->locale }}', function() {
                var des{{ $lang->locale }} = ($(this).val());
                $('div#description{{ $lang->locale }}').text(des{{ $lang->locale }});
            });
            $(document).on('change', 'input#slug_{{ $lang->locale }}', function() {
                var slug{{ $lang->locale }} = createslug($(this).val());
                $('div#slug{{ $lang->locale }}').text(window.location.hostname + '/' + slug{{ $lang->locale }} + '.html');
            });
        });
    </script>
@endforeach
@endpush

