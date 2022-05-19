@extends('backend.layout.master')
@section('title', 'Thêm danh mục cấp 2 | Tin tức')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Thêm danh mục cấp 2</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li>Tin tức</li>
            <li><a href="{{ route('backend.newcattwo.index') }}">Danh mục cấp 2</a></li>
            <li class="active">Thêm mới</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('backend.newcattwo.store') }}" enctype="multipart/form-data">
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
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            @foreach ($language as $lang)
                            <li class="{{ $loop->first ? 'active' : '' }}">
                                <a href="#tab_{{ $lang->locale }}" data-toggle="tab"><span class="{{ $lang->flag }}"></span> {{ $lang->name }} ({{ $lang->locale }})</a>
                            </li>
                            @endforeach
                            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                            @foreach ($language as $key => $lang)
                            <div class="tab-pane {{ $loop->first ? 'in active' : '' }} tab-content-en"
                                id="tab_{{ $lang->locale }}">
                                <div class="form-group">
                                    <label>Tên danh mục ({{ $lang->locale }})</label>
                                    <input type="text" name="translation[{{ $lang->locale }}][name]" id="name_{{ $lang->locale }}" onkeyup="AutoSlug();" value="{{ old('translation.'.$lang->locale.'.name') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên danh mục ({{ $lang->locale }})">
                                </div>
                                @if ($loop->first)
                                <label>Danh mục cấp 1</label>
                                <div class="form-group">
                                    <select class="form-control select2" name="newcatone_id" data-placeholder=" Chọn danh mục cấp 1" style="width: 100%;">
                                        <option value=""> Chọn danh mục cấp 1</option>
                                        @foreach ($newcatones as $newcatone)
                                        <option value="{{ $newcatone->id }}">
                                            {{ $newcatone->translations->name ?? '' }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                @endif
                                <div class="form-group">
                                    <label>Mô tả ({{ $lang->locale }})</label>
                                    <textarea class="form-control" name="translation[{{ $lang->locale }}][descriptions]" id="descriptions_{{ $lang->locale }}" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả danh mục ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.descriptions') }}</textarea>
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
                                        <label>URL danh mục</label>
                                        <input type="text" name="translation[{{ $lang->locale }}][slug]" id="slug_{{ $lang->locale }}" value="{{ old('translation.'.$lang->locale.'.slug') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL danh mục ({{ $lang->locale }})">
                                    </div>
                                    <div class="form-group">
                                        <label>Tiêu đề</label>
                                        <input type="text" name="translation[{{ $lang->locale }}][title]" id="title_{{ $lang->locale }}" value="{{ old('translation.'.$lang->locale.'.title') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề danh mục ({{ $lang->locale }})">
                                    </div>
                                    <div class="form-group">
                                        <label>Từ khóa ({{ $lang->locale }})</label>
                                        <textarea class="form-control" name="translation[{{ $lang->locale }}][keywords]" id="keywords_{{ $lang->locale }}" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá cho danh mục ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.keywords') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ({{ $lang->locale }})</label>
                                        <textarea class="form-control" name="translation[{{ $lang->locale }}][description]" id="des_{{ $lang->locale }}" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ngắn danh mục ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.description') }}</textarea>
                                    </div>
                                    <input type="hidden" name="translation[{{ $lang->locale }}][locale]" value="{{ $lang->locale }}">
                                </div>
                            </div>
                            @endforeach
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.newcattwo.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
                        </div>
                    </div>
                </div>
                <!-- right column -->
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Thao tác</label>
                        </div>
                        <div class="box-body">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.newcattwo.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <label>
                                <input type="checkbox" name="hide_show" id="hide_show" value="1" class="cbc" @if(!old() || old('hide_show') == '1') checked @endif>
                                <label class="cbc">Hiển thị</label>
                            </label>
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
                            <a href="{{ route('backend.newcattwo.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
        $(document).ready(function() {
            CKEDITOR.replace('content_{{ $lang->locale }}', options);
        });
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