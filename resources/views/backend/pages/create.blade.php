@extends('backend.layout.master')
@section('title','Thêm trang | Trang tĩnh')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Thêm trang</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li><a href="{{ route('backend.page.index') }}">Trang tĩnh</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form id="stringLengthForm" method="POST" action="{{ route('backend.page.store') }}" enctype="multipart/form-data">
            @csrf
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
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            @foreach ($language as $lang)
                            <li class="{{ $loop->first ? 'active' : '' }}">
                                <a href="#tab_{{ $lang->locale }}" data-toggle="tab">
                                    <span class="{{ $lang->flag }}"></span> {{ $lang->name }}
                                </a>
                            </li>
                            @endforeach
                            <li class="pull-right">
                                <a href="#" class="text-muted"><i class="fa fa-gear"></i></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @foreach ($language as $lang)
                            <div class="tab-pane {{ $loop->first ? 'in active' : '' }} tab-content-en" id="tab_{{ $lang->locale }}">
                                <div class="form-group">
                                    <label>Tên trang ({{ $lang->locale }})</label>
                                    <input type="text" name="translation[{{ $lang->locale }}][name]" id="name_{{ $lang->locale }}" onkeyup="AutoSlug();" value="{{ old('translation.'.$lang->locale.'.name') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên trang ({{ $lang->locale }})">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả (Trang chủ) ({{ $lang->locale }})</label>
                                    <textarea class="form-control" name="translation[{{ $lang->locale }}][descriptions]" id="descriptions_{{ $lang->locale }}">{{ old('translation.'.$lang->locale.'.descriptions') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung ({{ $lang->locale }})</label>
                                    <textarea class="form-control" name="translation[{{ $lang->locale }}][content]" id="content_{{ $lang->locale }}">{{ old('translation.'.$lang->locale.'.content') }}</textarea>
                                </div>
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Tối ưu hoá tìm kiếm (SEO - {{ $lang->locale }})</h3>
                                    </div>
                                    <div class="form-group">
                                        <div class="url-seo" id="slug{{ $lang->locale }}"></div>
                                        <div class="title-seo" id="title{{ $lang->locale }}"></div>
                                        <div class="description-seo" id="description{{ $lang->locale }}"></div>
                                        <label>URL trang</label>
                                        <input type="text" name="translation[{{ $lang->locale }}][slug]" id="slug_{{ $lang->locale }}" value="{{ old('translation.'.$lang->locale.'.slug') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL trang ({{ $lang->locale }})">
                                    </div>
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" name="translation[{{ $lang->locale }}][title]" id="title_{{ $lang->locale }}" value="{{ old('translation.'.$lang->locale.'.title') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề trang ({{ $lang->locale }})">
                                    </div>
                                    <div class="form-group">
                                        <label>Từ khóa ({{ $lang->locale }})</label>
                                        <textarea class="form-control" name="translation[{{ $lang->locale }}][keywords]" id="keywords_{{ $lang->locale }}" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá trang ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.keywords') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ({{ $lang->locale }})</label>
                                        <textarea class="form-control" name="translation[{{ $lang->locale }}][description]" id="des_{{ $lang->locale }}" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả trang ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.description') }}</textarea>
                                    </div>
                                    <input type="hidden" class="form-control" name="translation[{{ $lang->locale }}][locale]" value="{{ $lang->locale }}">
                                </div>
                            </div>
                            @endforeach
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.page.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Hình ảnh đại diện</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <img id="imgpreview" src="{{ asset('storage') }}/uploads/placeholder.png">
                                <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" title="Dimensions min 370 x 250 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
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
                                    <input type="text" class="form-control pull-right" id="datepicker2" name="published" value="{{ old('published') }}">
                                </div>
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
@foreach ($language as $lang)
    <script>
        CKEDITOR.replace('descriptions_{{ $lang->locale }}', options);
        CKEDITOR.replace('content_{{ $lang->locale }}', options);
        $("#name_{{ $lang->locale }}").keyup(function() {
            $("#title_{{ $lang->locale }}").val(this.value);
            $("div#title{{ $lang->locale }}").text(this.value);
            $("#keywords_{{ $lang->locale }}").val(this.value);
            $("#description_{{ $lang->locale }}").val(this.value);
            $("#descriptions_{{ $lang->locale }}").val(this.value);
            $("#des_{{ $lang->locale }}").val(this.value);
        });
        $(document).on('change', 'textarea#des_{{ $lang->locale }}', function() {
            var des1 = ($(this).val());
            $('div#description{{ $lang->locale }}').text(des1);
        });
        $(document).on('change', 'input#name_{{ $lang->locale }}', function() {
            var title1 = ($(this).val());
            $('div#description{{ $lang->locale }}').text(title1);
        });
        $(document).on('change', 'textarea#des_{{ $lang->locale }}', function() {
            var des1 = ($(this).val());
            $('div#description{{ $lang->locale }}').text(des1);
        });
        $(document).on('change', 'input#name_{{ $lang->locale }}', function() {
            var slug1 = createslug($(this).val());
            $('div#slug{{ $lang->locale }}').text(window.location.hostname + '/' + slug1 + '.html');
        });
        $('document').ready(function() {
            $(document).on('change', 'input#slug', function() {
                var slug1 = createslug($(this).val());
                $('div#slug1').text('{{ url('/') }}/danh-muc/' + slug1 + '.html');
            });
        });
    </script>
@endforeach
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
