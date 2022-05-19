@extends('backend.layout.master')
@section('title','Sửa trang | Trang tĩnh')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Sửa trang</h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a href="{{ route('backend.page.index') }}">Trang tĩnh</a></li>
      <li class="active">Sửa</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <form method="POST" action="{{ route('backend.page.update', $page->id) }}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
      @if ($errors->any())
      <div class="alert alert-danger hidden show__errors">
        <ul>
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
                <label>Tên trang ({{ session('locale') }})</label>
                <input type="text" name="translation[name]" id="translation[name]" value="@if(isset($page->translations->name)){{ old('translation'.'.name', $page->translations->name) }}@else{{ old('translation'.'.name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên trang ({{ session('locale') }})">
              </div>
              <div class="form-group">
                <label>Mô tả ( Trang chủ ) ({{ session('locale') }})</label>
                <textarea class="form-control" name="translation[descriptions]" id="descriptions">@if(isset($page->translations->descriptions)){{ old('translation'.'.descriptions', $page->translations->descriptions) }}@else{{ old('translation'.'.descriptions') }}@endif</textarea>
              </div>
              <div class="form-group">
                <label>Nội dung ({{ session('locale') }})</label>
                <textarea class="form-control" name="translation[content]" id="content">@if(isset($page->translations->content)){{ old('translation'.'.content', $page->translations->content) }}@else{{ old('translation'.'.content') }}@endif</textarea>
              </div>
            </div>
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tối ưu hoá tìm kiếm (SEO - {{ session('locale') }})</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <div class="url-seo" id="slug-seo">{{ url('/') }}/{{ $page->translations->slug }}.html</div>
                  <div class="title-seo" id="title-seo">{{ $page->translations->title }}</div>
                  <div class="description-seo" id="description-seo">{{ $page->translations->description }}</div>
                  <label>URL trang ({{ session('locale') }})</label>
                  <input type="text" name="translation[slug]" id="slug" value="@if(isset($page->translations->slug)){{ old('translation'.'.slug', $page->translations->slug) }}@else{{ old('translation'.'.slug') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL trang ({{ session('locale') }})">
                </div>
                <div class="form-group">
                  <label>Tiêu đề ({{ session('locale') }})</label>
                  <input type="text" name="translation[title]" id="title" value="@if(isset($page->translations->title)){{ old('translation'.'.title', $page->translations->title) }}@else{{ old('translation'.'.title') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang ({{ session('locale') }})">
                </div>
                <div class="form-group">
                  <label>Từ khóa ({{ session('locale') }})</label>
                  <textarea class="form-control" name="translation[keywords]" id="keywords" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang ({{ session('locale') }})">@if(isset($page->translations->keywords)){{ old('translation'.'.keywords', $page->translations->keywords) }}@else{{ old('translation'.'.keywords') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Mô tả ({{ session('locale') }})</label>
                  <textarea class="form-control" name="translation[description]" id="description" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả trang ({{ session('locale') }})">@if(isset($page->translations->description)){{ old('translation'.'.description', $page->translations->description) }}@else{{ old('translation'.'.description') }}@endif</textarea>
                </div>
                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                <a href="{{ route('backend.page.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
              <a href="{{ route('backend.page.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                  <a href="javascript:void(0)"><span class="changelanguage change-confirm" id="{{ $lang->locale }}"> <i class="{{ $lang->flag }}"></i> {{ $lang->name }} <i class="fas fa-external-link-alt"></i></span></a>
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
                <img id="imgpreview" src="{{ asset('storage') }}/uploads/pages/{{ $page->img }}" alt="{{ $page->translations->name }}">
                <input type="file" name="img" class="form-control" value="{{ $page->img }}" data-toggle="tooltip" data-placement="top" title="Dimensions min 370 x 250 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
              </div>
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
                  <input type="text" class="form-control pull-right" id="datepicker2" name="published" value="@if(isset($page->published)){{ old('published', $page->published) }}@else{{old('published')}}@endif">
                </div>
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>
                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $page->hide_show == 1 ? 'checked' : '' }} class="cbc">
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
              <a href="{{ route('backend.page.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
<script>
    $(document).ready(function() {
        CKEDITOR.replace('content', options);
        CKEDITOR.replace('descriptions', options);
    });
</script>
<script>
    $("#slug").keyup(function() {
        $("#slug-seo").text(window.location.hostname + '/' + this.value + '.html');
    });
    $("#title").keyup(function() {
        $("#title-seo").text(this.value);
    });
    $("#description").keyup(function() {
        $("#description-seo").text(this.value);
    });
</script>
<script>
    function createslug(text) {
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
