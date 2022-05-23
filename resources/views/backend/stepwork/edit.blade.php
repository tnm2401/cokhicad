@extends('backend.layout.master')
@section('title','Sửa Quy trình làm việc | Videos')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Sửa quy trình làm việc</h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a href="{{ route('backend.stepwork.index') }}">Quy trình làm việcs</a></li>
      <li class="active">Sửa</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <form method="POST" action="{{ route('backend.stepwork.update', $steps->id) }}" enctype="multipart/form-data">
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
        <!-- left column -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">

              <div class="form-group">
                <label>Nội dung ({{ session('locale') }})</label>
                <textarea class="form-control" name="translation[content]" id="content">@if(isset($steps->translations->content)){{ old('translation'.'.content', $steps->translations->content) }}@else{{ old('translation'.'.content') }}@endif</textarea>
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
              <a href="{{ route('backend.stepwork.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
              <label>Số thứ tự</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <input type="number" name="stt" id="stt" value="@if(isset($steps->stt)){{ old('stt', $steps->stt) }}@else{{ old('stt') }}@endif" min="0" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
                <label>Màu nền</label>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <input type="color" name="color" value="{{ $steps->color }}"  class="form-control ">
                </div>
            </div>
        </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>
                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $steps->hide_show == 1 ? 'checked' : '' }} class="cbc">
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
{{-- <script>
  $("#name").keyup(function(){
    $("#title").val(this.value);
  });
</script> --}}
<script>
  $(document).ready(function() {
      CKEDITOR.replace('content', options);
  });
  $('document').ready(function () {
    $(document).on('keyup', 'input#slug', function() {
      var slugcat = CreateSlugCat($(this).val());
      $('div#slug-seo').text(window.location.hostname + '/' +slugcat + '.html');
    });
  });
  $(document).on('keyup', 'textarea#description', function() {
      $("div#description-seo").text(this.value);
  });
  $(document).on('keyup', 'input#title', function() {
      $("div#title-seo").text(this.value);
  });
  function CreateSlugCat(text)
  {
    return text.toString().toLowerCase()
    .replace(/\s+/g, '-') // Replace spaces with -
    .replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a')
    .replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e')
    .replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i')
    .replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o')
    .replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u')
    .replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y')
    .replace(/đ/gi, 'd')
    .replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '')
    .replace(/\-\-\-\-\-/gi, '-')
    .replace(/\-\-\-\-/gi, '-')
    .replace(/\-\-\-/gi, '-')
    .replace(/\-\-+/g, '-') // Replace multiple - with single -
    .replace(/^-+/, '') // Trim - from start of text
    .replace(/-+$/, ''); // Trim - from end of text
  }
</script>
@endpush
