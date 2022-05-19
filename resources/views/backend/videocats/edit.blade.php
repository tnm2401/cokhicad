@extends('backend.layout.master')
@section('title','Sửa danh mục Video | Videos')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Sửa danh mục Video</h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li>Videos</li>
      <li><a href="{{ route('backend.videocat.index') }}">Danh mục Videos</a></li>
      <li class="active">Sửa</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <form method="POST" action="{{ route('backend.videocat.update', $videocat->id) }}" enctype="multipart/form-data">
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
                <label>Tên danh mục ({{ session('locale') }})</label>
                <input type="text" name="translation[name]" id="name" value="@if(isset($videocat->translations->name)){{ old('translation'.'.name', $videocat->translations->name) }}@else{{ old('translation'.'.name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên danh mục ({{ session('locale') }})">
              </div>
              <div class="form-group">
                <label>Mô tả ({{ session('locale') }})</label>
                <textarea class="form-control" name="translation[descriptions]" id="descriptions" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả danh mục ({{ session('locale') }})">@if(isset($videocat->translations->descriptions)){{ old('translation'.'.descriptions', $videocat->translations->descriptions) }}@else{{ old('translation'.'.descriptions') }}@endif</textarea>
              </div>
              <div class="form-group">
                <label>Nội dung ({{ session('locale') }})</label>
                <textarea class="form-control" name="translation[content]" id="content">@if(isset($procatone->translations->content)){{ old('translation'.'.content', $procatone->translations->content) }}@else{{ old('translation'.'.content') }}@endif</textarea>
              </div>
            </div>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tối ưu hoá tìm kiếm (SEO - {{ session('locale') }})</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <div class="url-seo" id="slug-seo">{{ url('/') }}/{{ $videocat->translations->slug }}.html</div>
                  <div class="title-seo" id="title-seo">{{ $videocat->translations->title }}</div>
                  <div class="description-seo" id="description-seo">{{ $videocat->translations->descriptions }}</div>
                  <label>URL danh mục ({{ session('locale') }})</label>
                  <input type="text" name="translation[slug]" id="slug" value="@if(isset($videocat->translations->slug)){{ old('translation'.'.slug', $videocat->translations->slug) }}@else{{ old('translation'.'.slug') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL danh mục ({{ session('locale') }})">
                </div>
                <div class="form-group">
                  <label>Tiêu đề ({{ session('locale') }})</label>
                  <input type="text" name="translation[title]" id="title" value="@if(isset($videocat->translations->title)){{ old('translation'.'.title', $videocat->translations->title) }}@else{{ old('translation'.'.title') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề danh mục ({{ session('locale') }})">
                </div>
                <div class="form-group">
                  <label>Từ khóa ({{ session('locale') }})</label>
                  <textarea class="form-control" name="translation[keywords]" id="keywords" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá cho danh mục ({{ session('locale') }})">@if(isset($videocat->translations->keywords)){{ old('translation'.'.keywords', $videocat->translations->keywords) }}@else{{ old('translation'.'.keywords') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Mô tả ({{ session('locale') }})</label>
                  <textarea class="form-control" name="translation[description]" id="description" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ngắn danh mục ({{ session('locale') }})">@if(isset($videocat->translations->description)){{ old('translation'.'.description', $videocat->translations->description) }}@else{{ old('translation'.'.description') }}@endif</textarea>
                </div>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="{{ route('backend.videocat.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
              <a href="{{ route('backend.videocat.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
              <label>Hình ảnh đại diện</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <img id="imgpreview" class="img-thumbnail mb-2" style="width: 100%; margin-bottom:10px;" src="{{ asset('storage') }}/uploads/videocats/{{ $videocat->img }}" alt="{{ $videocat->translations->name }}">
                <input type="file" name="img" class="form-control" value="{{ $videocat->img }}" data-toggle="tooltip" data-placement="top" title="Dimensions min 370 x 250 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Số thứ tự</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <input type="number" name="stt" id="stt" value="@if(isset($videocat->stt)){{ old('stt', $videocat->stt) }}@else{{ old('stt') }}@endif" min="0" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>
                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $videocat->hide_show == 1 ? 'checked' : '' }} class="cbc">
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
              <a href="{{ route('backend.videocat.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
