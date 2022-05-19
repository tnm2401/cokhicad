@extends('backend.layout.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
    Cập nhật Tác giả
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a>Trang tĩnh</a></li>
      <li class="active">Tác giả</li>
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
    <form method="POST" action="{{ route('backend.author.update') }}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">🇻🇳 Tiếng Việt</a></li>
              <li><a href="#tab_2" data-toggle="tab">🇬🇧 Tiếng Anh</a></li>
              <li><a href="#tab_3" data-toggle="tab">🇨🇳 Tiếng Trung</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active tab-content-en" id="tab_1">
                <input type="hidden" id="type" name="type" value="author">
                <div class="form-group">
                  @if (Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  <label>Tên tác giả (VI)</label>
                  <input type="text" name="name_vi" id="name_vi" value="@if(isset($author->name_vi)){{ old('name_vi', $author->name_vi) }}@else{{ old('name_vi') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên tác giả (VI)" >
                </div>
                <div class="form-group">
                  <label>Giới thiệu (VI)</label>
                  <textarea class="form-control" name="content_vi" id="content_vi" value="@if(isset($author->content_vi)){{ old('content_vi', $author->content_vi) }}@else{{ old('content_vi') }}@endif" rows="6">@if(isset($author->content_vi)){{ old('content_vi', $author->content_vi) }}@else{{ old('content_vi') }}@endif</textarea>
                </div>
                <label>Tối ưu hoá tìm kiếm (SEO - VI)</label>
                <div class="form-group">
                  <div class="url-seo" id="slug1">{{ $setting->web }}/author.html</div>
                  <div class="title-seo" id="title3">{{ $author->title_vi }}</div>
                  <div class="description-seo" id="descriptions3">{{ $author->description_vi }}</div>
                  <label>Title (VI)</label>
                  <input type="text" name="title_vi" id="title_vi" value="@if(isset($author->title_vi)){{ old('title_vi', $author->title_vi) }}@else{{ old('title_vi') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang (VI)">
                </div>
                <div class="form-group">
                  <label>Keywords (VI)</label>
                  <textarea class="form-control" name="keywords_vi" id="keywords_vi" value="@if(isset($author->keywords_vi)){{ old('keywords_vi', $author->keywords_vi) }}@else{{ old('keywords_vi') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang (VI)">@if(isset($author->keywords_vi)){{ old('keywords_vi', $author->keywords_vi) }}@else{{ old('keywords_vi') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Description (VI)</label>
                  <textarea class="form-control" name="description_vi" id="description_vi" value="@if(isset($author->description_vi)){{ old('description_vi', $author->description_vi) }}@else{{ old('description_vi') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả trang (VI)">@if(isset($author->description_vi)){{ old('description_vi', $author->description_vi) }}@else{{ old('description_vi') }}@endif</textarea>
                </div>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
              </div>
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên tác giả (EN)</label>
                  <input type="text" name="name_en" id="name_en" value="@if(isset($author->name_en)){{ old('name_en', $author->name_en) }}@else{{ old('name_en') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên tác giả (EN)" >
                </div>
                <div class="form-group">
                  <label>Giới thiệu (EN)</label>
                  <textarea class="form-control" name="content_en" id="content_en" value="@if(isset($author->content_en)){{ old('content_en', $author->content_en) }}@else{{ old('content_en') }}@endif" rows="6">@if(isset($author->content_en)){{ old('content_en', $author->content_en) }}@else{{ old('content_en') }}@endif</textarea>
                </div>
                <label>Tối ưu hoá tìm kiếm (SEO - EN)</label>
                <div class="form-group">
                  <div class="url-seo" id="slug1">{{ $setting->web }}/author.html</div>
                  <div class="title-seo" id="title3">{{ $author->title_en }}</div>
                  <div class="description-seo" id="descriptions3">{{ $author->description_en }}</div>
                  <label>Title (EN)</label>
                  <input type="text" name="title_en" id="title_en" value="@if(isset($author->title_en)){{ old('title_en', $author->title_en) }}@else{{ old('title_en') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang (EN)">
                </div>
                <div class="form-group">
                  <label>Keywords (EN)</label>
                  <textarea class="form-control" name="keywords_en" id="keywords_en" value="@if(isset($author->keywords_en)){{ old('keywords_en', $author->keywords_en) }}@else{{ old('keywords_en') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang (EN)">@if(isset($author->keywords_en)){{ old('keywords_en', $author->keywords_en) }}@else{{ old('keywords_en') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Description (EN)</label>
                  <textarea class="form-control" name="description_en" id="description_en" value="@if(isset($author->description_en)){{ old('description_en', $author->description_en) }}@else{{ old('description_en') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả trang (EN)">@if(isset($author->description_en)){{ old('description_en', $author->description_en) }}@else{{ old('description_en') }}@endif</textarea>
                </div>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
              </div>
              <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  <label>Tên tác giả (CN)</label>
                  <input type="text" name="name_cn" id="name_cn" value="@if(isset($author->name_cn)){{ old('name_cn', $author->name_cn) }}@else{{ old('name_cn') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên tác giả (CN)" >
                </div>
                <div class="form-group">
                  <label>Giới thiệu (CN)</label>
                  <textarea class="form-control" name="content_cn" id="content_cn" value="@if(isset($author->content_cn)){{ old('content_cn', $author->content_cn) }}@else{{ old('content_cn') }}@endif" rows="6">@if(isset($author->content_cn)){{ old('content_cn', $author->content_cn) }}@else{{ old('content_cn') }}@endif</textarea>
                </div>
                <label>Tối ưu hoá tìm kiếm (SEO - CN)</label>
                <div class="form-group">
                  <div class="url-seo" id="slug1">{{ $setting->web }}/author.html</div>
                  <div class="title-seo" id="title3">{{ $author->title_cn }}</div>
                  <div class="description-seo" id="descriptions3">{{ $author->description_cn }}</div>
                  <label>Title (CN)</label>
                  <input type="text" name="title_cn" id="title_cn" value="@if(isset($author->title_cn)){{ old('title_cn', $author->title_cn) }}@else{{ old('title_cn') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang (CN)">
                </div>
                <div class="form-group">
                  <label>Keywords (CN)</label>
                  <textarea class="form-control" name="keywords_cn" id="keywords_cn" value="@if(isset($author->keywords_cn)){{ old('keywords_cn', $author->keywords_cn) }}@else{{ old('keywords_cn') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang (CN)">@if(isset($author->keywords_cn)){{ old('keywords_cn', $author->keywords_cn) }}@else{{ old('keywords_cn') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Description (CN)</label>
                  <textarea class="form-control" name="description_cn" id="description_cn" value="@if(isset($author->description_cn)){{ old('description_cn', $author->description_cn) }}@else{{ old('description_cn') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả trang (CN)">@if(isset($author->description_cn)){{ old('description_cn', $author->description_cn) }}@else{{ old('description_cn') }}@endif</textarea>
                </div>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
              </div>
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
              <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Hình ảnh đại diện</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <img class="img-thumbnail mb-2" style="width: 100%; margin-bottom:10px;" src="/storage/uploads/{{ $author->img }}" alt="img">
                <input type="file" name="img" class="form-control" value="{{ $author->img }}" data-toggle="tooltip" data-placement="top" title="Dimensions min 370 x 250 (px)">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>
                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $author->hide_show == 1 ? 'checked' : '' }} class="cbc">
                <label class="cbc">Hiển thị</label>
              </label>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Ngày tạo page</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker2" name="published" value="@if(isset($author->published)){{ old('published', $author->published) }}@else{{old('published')}}@endif">
                </div>
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Thao tác</label>
            </div>
            <div class="box-body">
              <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
              <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
        </div>
        <!-- right column -->
      </div>
    </section>
  </div>
</form>
@endsection
@push('script')
@endpush