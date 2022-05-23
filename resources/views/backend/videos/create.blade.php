@extends('backend.layout.master')
@section('title','Thêm Video | Videos')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Thêm Video</h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li>Videos</li>
      <li><a href="{{ route('video.index') }}">Quản lý Videos</a></li>
      <li class="active">Thêm</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <form id="stringLengthForm" method="POST" action="{{ route('video.store') }}" enctype="multipart/form-data">
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
          <div class="row">
            <div class="col-md-7">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  @foreach ($language as $lang)
                  <li class="{{ $loop->first ? 'active' : '' }}"><a href="#tab_{{ $lang->locale }}" data-toggle="tab"><span class="{{ $lang->flag }}"></span> {{ $lang->name }}</a></li>
                  @endforeach
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                  <input type="hidden" id="type" name="type" value="video">
                  @foreach($language as $lang)
                  <div class="tab-pane {{ $loop->first ? 'in active' : '' }} tab-content-en" id="tab_{{$lang->locale}}">
                    <div class="form-group">
                      <label>Tên Video ({{ $lang->locale }})</label>
                      <input type="text" name="translation[{{ $lang->locale }}][name]" id="name" value="{{ old('name') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên Video">
                    </div>
                    <input type="hidden" value="{{ $lang->locale }}" name="translation[{{ $lang->locale }}][locale]">
                  </div>
                  @endforeach
                  <div class="form-group">
                    <label>Danh mục Video</label>
                    <select class="form-control select2 choose videocat" name="videocat" id="videocat" style="width: 100%;">
                      {{-- <option value="">Chọn</option> --}}
                      @foreach($videocats as $videocat)
                      <option value="{{ $videocat->id }}">{{ $videocat->translations->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Link Video Youtube</label>
                    <input type="url" name="link" id="link" placeholder="Video URL" value="{{ old('link') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập Link Video Youtube">
                  </div>
                  <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                  <a href="{{ route('backend.newcatone.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="form-group">
                    <label>Xem trước Video</label>
                    <div id="videobox" style="display: none;">
                      <div class="form-group">
                        <div id="video-preview"></div>
                      </div>
                    </div>
                  </div>
                </div>
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
              <a href="{{ route('video.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <label>Hình ảnh đại diện</label>
            </div>
            <div class="box-body">
              <div class="form-group">
                <img id="imgpreview" src="{{ asset('storage') }}/uploads/placeholder.png" width="100%">
                <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" title="Dimensions min 370 x 250 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
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
              <a href="{{ route('video.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
  $(document).ready(function($) {
   var videobox = document.getElementById('videobox');
   $('#link').on('keyup', function() {
     if($(this).val() === "") {
   videobox.style.display = "none";
     }else{
   var url =$(this).val();
   var ifrm = document.createElement('iframe');
   ifrm.src = "//www.youtube.com/embed/"+ url.split("=")[1];
   // ifrm.src = (!url.includes('vimeo')) ? "//www.youtube.com/embed/"+ url.split("=")[1] : "//player.vimeo.com/video/"+ url.split("/")[3];
   ifrm.width= "100%";
   ifrm.height = "200";
   ifrm.frameborder="1";
   ifrm.scrolling="no";
   $('#video-preview').html(ifrm);
   videobox.style.display = "block";
     }
    });
  })
</script>
@endpush
