@extends('backend.layout.master')
@push('script')
<script>
  $("#name_vi").keyup(function(){
    $("#title_vi").val(this.value);
    $("#keywords_vi").val(this.value);
    $("#description_vi").val(this.value);
  });
</script>
<script>
  $("#name_en").keyup(function(){
    $("#title_en").val(this.value);
    $("#keywords_en").val(this.value);
    $("#description_en").val(this.value);
  });
</script>
<script>
  $("#name_cn").keyup(function(){
    $("#title_cn").val(this.value);
    $("#keywords_cn").val(this.value);
    $("#description_cn").val(this.value);
  });
</script>
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
    Cập nhật Trang Liên hệ
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a>Trang tĩnh</a></li>
      <li class="active">Liên hệ</li>
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
    <form id="stringLengthForm" method="POST" action="{{ route('backend.contact.update') }}" enctype="multipart/form-data">
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
                <input type="hidden" id="type" name="type" value="contact">
                <div class="form-group">
                  @if (Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  <label>Tên trang (VI)</label>
                  <input type="text" name="name_vi" id="name_vi" value="@if(isset($contact->name_vi)){{ old('name_vi', $contact->name_vi) }}@else{{ old('name_vi') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên trang (VI)">
                </div>
                <div class="form-group">
                  <label>Nội dung (VI)</label>
                  <textarea class="form-control" name="content_vi" id="content_vi" rows="6">@if(isset($contact->content_vi)){{  old('content_vi', $contact->content_vi) }}@else{{ old('content_vi') }}@endif</textarea>
                </div>
                <label>Tối ưu hoá tìm kiếm (SEO - VI)</label>
                <div class="form-group">
                  <div class="url-seo" id="slug1">{{ $setting->web }}/lien-he.html</div>
                  <div class="title-seo" id="title1">{{ $contact->title_vi }}</div>
                  <div class="description-seo" id="descriptions1">{{ $contact->description_vi }}</div>
                  <label>Title (VI)</label>
                  <input type="text" name="title_vi" id="title_vi" value="@if(isset($contact->title_vi)){{ old('title_vi', $contact->title_vi) }}@else{{ old('title_vi') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang (VI)">
                </div>
                <div class="form-group">
                  <label>Keywords (VI)</label>
                  <textarea class="form-control" name="keywords_vi" id="keywords_vi" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang (VI)">@if(isset($contact->keywords_vi)){{ old('keywords_vi', $contact->keywords_vi) }}@else{{ old('keywords_vi') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Description (VI)</label>
                  <textarea class="form-control" name="description_vi" id="description_vi" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ngắn trang (VI)">@if(isset($contact->description_vi)){{ old('description_vi', $contact->description_vi) }}@else{{ old('description_vi') }}@endif</textarea>
                </div>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="form-group">
                  <label>Tên trang (EN)</label>
                  <input type="text" name="name_en" id="name_en" value="@if(isset($contact->name_en)){{ old('name_en', $contact->name_en) }}@else{{ old('name_en') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên trang (EN)">
                </div>
                <div class="form-group">
                  <label>Nội dung (EN)</label>
                  <textarea class="form-control" name="content_en" id="content_en" rows="6">@if(isset($contact->content_en)){!! old('content_en', $contact->content_en) !!}@else{!! old('content_en') !!}@endif</textarea>
                </div>
                <label>Tối ưu hoá tìm kiếm (SEO - EN)</label>
                <div class="form-group">
                  <div class="url-seo" id="slug1">{{ $setting->web }}/lien-he.html</div>
                  <div class="title-seo" id="title2">{{ $contact->title_en }}</div>
                  <div class="description-seo" id="descriptions2">{{ $contact->descriptions_en }}</div>
                  <label>Title (EN)</label>
                  <input type="text" name="title_en" id="title_en" value="@if(isset($contact->title_en)){{ old('title_en', $contact->title_en) }}@else{{ old('title_en') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang (EN)">
                </div>
                <div class="form-group">
                  <label>Keywords (EN)</label>
                  <textarea class="form-control" name="keywords_en" id="keywords_en" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang (EN)">@if(isset($contact->keywords_en)){{ old('keywords_en', $contact->keywords_en) }}@else{{ old('keywords_en') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Description (EN)</label>
                  <textarea class="form-control" name="description_en" id="description_en" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả trang (EN)">@if(isset($contact->description_en)){{ old('description_en', $contact->description_en) }}@else{{ old('description_en') }}@endif</textarea>
                </div>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="{{ route('backend.dashboard.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
              </div>
              <div class="tab-pane" id="tab_3">
                <div class="form-group">
                  <label>Tên trang (CN)</label>
                  <input type="text" name="name_cn" id="name_cn" value="@if(isset($contact->name_cn)){{ old('name_cn', $contact->name_cn) }}@else{{ old('name_cn') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên trang (CN)">
                </div>
                <div class="form-group">
                  <label>Nội dung (CN)</label>
                  <textarea class="form-control" name="content_cn" id="content_cn" rows="6">@if(isset($contact->content_cn)){!! old('content_cn', $contact->content_cn) !!}@else{!! old('content_cn') !!}@endif</textarea>
                </div>
                <label>Tối ưu hoá tìm kiếm (SEO - CN)</label>
                <div class="form-group">
                  <div class="url-seo" id="slug1">{{ $setting->web }}/lien-he.html</div>
                  <div class="title-seo" id="title3">{{ $contact->title_cn }}</div>
                  <div class="description-seo" id="descriptions3">{{ $contact->descriptions_cn }}</div>
                  <label>Title (CN)</label>
                  <input type="text" name="title_cn" id="title_cn" value="@if(isset($contact->title_cn)){{ old('title_cn', $contact->title_cn) }}@else{{ old('title_cn') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang (CN)">
                </div>
                <div class="form-group">
                  <label>Keywords (CN)</label>
                  <textarea class="form-control" name="keywords_cn" id="keywords_cn" value="@if(isset($contact->keywords_cn)){{ old('keywords_cn', $contact->keywords_cn) }}@else{{ old('keywords_cn') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang (CN)">@if(isset($contact->keywords_cn)){{ old('keywords_cn', $contact->keywords_cn) }}@else{{ old('keywords_cn') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Description (CN)</label>
                  <textarea class="form-control" name="description_cn" id="description_cn" data-length=320 value="@if(isset($contact->description_cn)){{ old('description_cn', $contact->description_cn) }}@else{{ old('description_cn') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả trang (CN)">@if(isset($contact->description_cn)){{ old('description_cn', $contact->description_cn) }}@else{{ old('description_cn') }}@endif</textarea>
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
                <img class="img-thumbnail mb-2" style="max-width: 100%; margin-bottom:10px;" src="/storage/uploads/{{ $contact->img }}" alt="img">
                <input type="file" name="img" class="form-control" value="{{ $contact->img }}">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>
                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $contact->hide_show == 1 ? 'checked' : '' }} class="cbc">
                <label class="cbc" style="margin-left: 10px;">Hiển thị</label>
              </label>
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