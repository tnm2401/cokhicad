@extends('backend.layout.master')
@section('title','Cập nhật phí ship')
@push('script')
{{-- <script>
  $("#name").keyup(function(){
    $("#slug").val(this.value);
    $("#title").val(this.value);
  });
</script> --}}
<script>
  $('input#price').keyup(function(event) {
    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;
    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      ;
    });
  });
  $('input#prices').keyup(function(event) {
    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;
    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      ;
    });
  });
</script>
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
      Chỉnh sửa Bài viết
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a>Hosting</a></li>
      <li><a href="{{ route('backend.article.index') }}">Quản lý Hosting</a></li>
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
    <form method="POST" action="{{ route('backend.article.update', $article->id) }}" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT') }}
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
              <input type="hidden" id="type" name="type" value="article">
              <div class="form-group">
                <label>Tên bài viết</label><medium class="charcounter" id="charcounter"></medium>
                <input type="text" name="name" id="name" data-length=120 value="@if(isset($article->name)){{ old('name', $article->name) }}@else{{ old('name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên bài viết">
                {{--  @if(isset($news->name)){{ old('name', $news->name) }}@else{{old('name')}}@endif --}}
              </div>
              <div class="form-group">
                <label>Dung lượng</label>
                <input type="number" name="memory" id="memory" data-length=120 value="@if(isset($article->memory)){{ old('memory', $article->memory) }}@else{{ old('memory') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập dung lượng">
                {{--  @if(isset($news->name)){{ old('name', $news->name) }}@else{{old('name')}}@endif --}}
              </div>
              <div class="form-group">
                <label>Giá / tháng</label><medium class="charcounter" id="charcounter"></medium>
                <input type="text" name="price" id="price" data-length=120 value="@if(isset($article->price)){{ old('price', $article->price) }}@else{{ old('price') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập giá / tháng">
                {{--  @if(isset($news->name)){{ old('name', $news->name) }}@else{{old('name')}}@endif --}}
              </div>
              <div class="form-group">
                <label>Giá / năm</label><medium class="charcounter" id="charcounter"></medium>
                <input type="text" name="prices" id="prices" data-length=120 value="@if(isset($article->prices)){{ old('prices', $article->prices) }}@else{{ old('prices') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập giá / năm">
                {{--  @if(isset($news->name)){{ old('name', $news->name) }}@else{{old('name')}}@endif --}}
              </div>
              <div class="form-group">
                <label>Mã màu</label>
                <input type="text" name="color" id="color" data-length=120 value="@if(isset($article->color)){{ old('color', $article->color) }}@else{{ old('color') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mã màu #ff0066">
                {{--  @if(isset($news->name)){{ old('name', $news->name) }}@else{{old('name')}}@endif --}}
              </div>
              {{-- <div class="form-group">
                <label>Mô tả bài viết</label><medium class="charcounter-descriptions" id="charcounter-descriptions"></medium>
                <textarea class="form-control" name="descriptions" id="descriptions" data-length=320 value="@if(isset($article->descriptions)){{ old('translation'.'.descriptions' $article->descriptions) }}@else{{ old('translation'.'.descriptions') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ngắn bài viết">@if(isset($article->descriptions)){{ old('translation'.'.descriptions' $article->descriptions) }}@else{{ old('translation'.'.descriptions') }}@endif</textarea>
              </div> --}}
              {{-- <div class="form-group">
                <label>
                  <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $article->is_featured == 1 ? 'checked' : '' }} class="minimal"><span style="margin-left: 10px;">Nổi bật</span>
                </label>
              </div> --}}
              {{-- <div class="form-group">
                <label>
                  <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $article->hide_show == 1 ? 'checked' : '' }} class="minimal"><span style="margin-left: 10px;">Hiển thị</span>
                </label>
              </div> --}}
              <div class="form-group">
                <label>Nội dung bài viết</label>
                <textarea class="form-control" name="content" id="content" rows="6">@if(isset($article->content)){{ old('content', $article->content) }}@else{{ old('content') }}@endif</textarea>
              </div>
            </div>
            {{-- <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tối ưu hoá tìm kiếm (SEO)</h3>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <div class="title-seo" id="title1">{{ $article->title }}</div>
                  <div class="url-seo" id="slug1">{{ route('frontend.home.index') }}/{{ $article->slug }}.html</div>
                  <div class="description-seo" id="descriptions1">{{ $article->descriptions }}</div>
                  <label>URL bài viết</label><medium class="charcounter-slug" id="charcounter-slug"></medium>
                  <input type="text" name="slug" id="slug" data-length=120 value="@if(isset($article->slug)){{ old('slug', $article->slug) }}@else{{ old('slug') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL bài viết">
                </div>
                <div class="form-group">
                  <label>Title</label><medium class="charcounter-title" id="charcounter-title"></medium>
                  <input type="text" name="title" id="title" data-length=120 value="@if(isset($article->title)){{ old('translation'.'.title', $article->title) }}@else{{ old('translation'.'.title') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề bài viết">
                </div>
                <div class="form-group">
                  <label>Keywords</label><medium class="charcounter-keywords" id="charcounter-keywords"></medium><medium class="charcounter-slug" id="charcounter-slug"></medium>
                  <textarea class="form-control" name="keywords" id="keywords" data-length=320 value="@if(isset($article->keywords)){{ old('translation'.'.keywords', $article->keywords) }}@else{{ old('translation'.'.keywords') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá cho bài viết">@if(isset($article->keywords)){{ old('translation'.'.keywords', $article->keywords) }}@else{{ old('translation'.'.keywords') }}@endif</textarea>
                </div>
                <div class="form-group">
                  <label>Description</label><medium class="charcounter-description" id="charcounter-description"></medium>
                  <textarea class="form-control" name="description" id="description" data-length=320 value="@if(isset($article->description)){{ old('translation'.'.description', $article->description) }}@else{{ old('translation'.'.description') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ngắn bài viết">@if(isset($article->description)){{ old('translation'.'.description', $article->description) }}@else{{ old('translation'.'.description') }}@endif</textarea>
                </div>
              </div>
            </div> --}}
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
              <a href="{{ route('backend.article.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
          {{-- <div class="box box-primary">
            <div class="box-header with-border">
              <label>Chọn ngày xuất bản</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="published" value="{{ $article->published }}">
                </div>
              </div>
            </div>
          </div> --}}
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Danh mục</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <select class="form-control select2" name="categories_id[]" multiple="multiple" data-placeholder="Chọn Danh mục"
                style="width: 100%;">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $article->categories->contains($category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <label>Hình ảnh đại diện</label>
          </div>
          <div class="box-body">
            <div class="form-group">
              <img class="img-thumbnail mb-2" style="max-width: 100px; margin-bottom:10px;" src="/storage/uploads/{{ $article->img }}" alt="{{ $article->name }}">
              <input type="file" name="img" class="form-control" value="{{ $article->img }}">
            </div>
          </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <label>Trạng thái</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <select class="form-control select2" name="status" style="width: 100%;">
                  @php
                  if ($article->status == 'Published') {
                    echo '<option value="Published" selected>Xuất bản</option>';
                    echo '<option value="Pending">Chờ duyệt</option>';
                  }else {
                    echo '<option value="Pending" selected>Chờ duyệt</option>';
                    echo '<option value="Published">Xuất bản</option>';
                  }
                  @endphp
                </select>
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Số thứ tự</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <input type="number" name="stt" id="stt" value="@if(isset($article->stt)){{ old('stt', $article->stt) }}@else{{ old('stt') }}@endif" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>
                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $article->hide_show == 1 ? 'checked' : '' }} class="minimal"><span style="margin-left: 10px;">Hiển thị</span>
              </label>
            </div>
          </div>
        {{-- <div class="box box-primary">
          <div class="box-header with-border">
            <label>Thay đổi Tags</label>
          </div>
          <div class="box-body">
            <div class="form-group">
              <select class="form-control select2" name="tags_id[]" multiple="multiple" data-placeholder="Chọn Tags"
              style="width: 100%;">
              @foreach ($tags as $tag)
              <option value="{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div> --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <label>Thao tác</label>
        </div>
        <div class="box-body">
          <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
          <a href="{{ route('backend.article.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
        </div>
      </div>
    </div>
    <!-- right column -->
  </div>
</section>
</div>
</form>
@endsection
