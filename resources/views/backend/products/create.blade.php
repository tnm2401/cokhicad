@extends('backend.layout.master')
@section('title','Thêm sản phẩm | Sản phẩm')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Thêm sản phẩm</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li>Sản phẩm</li>
            <li><a href="{{ route('backend.product.index') }}">Quản lý sản phẩm</a></li>
            <li class="active">Thêm</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form id="stringLengthForm" method="POST" action="{{ route('backend.product.store') }}" enctype="multipart/form-data">
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
                            <li class="{{ $loop->first ? 'active' : '' }}">
                                <a href="#tab_{{ $lang->locale }}" data-toggle="tab">
                                    <span class="{{ $lang->flag }}"></span> {{ $lang->name }}
                                </a>
                            </li>
                            @endforeach
                            <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                        </ul>
                        <div class="tab-content">
                            @foreach($language as $key => $lang)
                            <div class="tab-pane {{ $loop->first ? 'in active' : '' }} tab-content-en" id="tab_{{ $lang->locale }}">
                                <input type="hidden" id="type" name="type" value="product">
                                <div class="form-group">
                                    <label>Tên sản phẩm ({{ $lang->locale }})</label>
                                    <input type="text" name="translation[{{ $lang->locale }}][name]" id="name_{{ $lang->locale }}" onkeyup="AutoSlug();" value="{{ old('translation.'.$lang->locale.'.name') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên sản phẩm ({{ $lang->locale }})">
                                </div>
                                @if ($loop->first)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Danh mục cấp 1</label>
                                            <select class="form-control select2 choose procatone" name="procatone" id="procatone" style="width: 100%;">
                                                <option value="">Chọn</option>
                                                @foreach ($procatones as $procatone)
                                                <option value="{{ $procatone->id }}">{{ $procatone->translations->name ?? '' }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Danh mục cấp 2</label>
                                            <select class="form-control select2 choose procattwo" name="procattwo" id="procattwo" style="width: 100%;">
                                                <option value="">Chọn</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Danh mục cấp 3</label>
                                            <select class="form-control select2 procatthree" name="procatthree" id="procatthree" style="width: 100%;">
                                                <option value="">Chọn</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mã sản phẩm</label>
                                            <input type="text" name="product_code" id="product_code" value="{{ old('product_code') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mã sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Giá sản phấm (₫)</label>
                                            <input type="text" name="price" id="price" onchange="numberWithCommas();" value="{{ old('price') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập giá sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Giảm giá (%)</label>
                                            <input type="number" name="discount" id="discount" value="{{ old('discount') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập % giảm giá">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="selling_price" name="selling_price" value="selling_price">
                                <div class="form-group mt-2" id="preview" width="100"></div>
                                <div class="form-group">
                                    <label>Hình ảnh liên quan</label>
                                    <input type="file" class="form-control" name="imgs[]" id="file-input" multiple data-toggle="tooltip" data-placement="top" title="Dimensions min 500 x 500 (px)" />
                                </div>
                                <div class="form-group tags">
                                    <label>Tags ({{ $lang->locale }})</label> <small>*Có thể chọn nhiều Tags</small>
                                    <select class="form-control tag select2" name=tags[] multiple="multiple">
                                        @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->translations->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Mô tả sản phẩm ({{ $lang->locale }})</label>
                                    <textarea class="form-control" name="translation[{{ $lang->locale }}][descriptions]" id="descriptions_{{ $lang->locale }}" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ngắn ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.descriptions') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung sản phẩm ({{ $lang->locale }})</label>
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
                                    </div>
                                    <div class="form-group">
                                        <label>URL sản phẩm ({{ $lang->locale }})</label>
                                        <input type="text" name="translation[{{ $lang->locale }}][slug]" id="slug_{{ $lang->locale }}" value="{{ old('translation.'.$lang->locale.'.slug') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL ({{ $lang->locale }})">
                                    </div>
                                    <div class="form-group">
                                        <label>Tiêu đề ({{ $lang->locale }})</label>
                                        <input type="text" name="translation[{{ $lang->locale }}][title]" id="title_{{ $lang->locale }}" value="{{ old('translation.'.$lang->locale.'.title') }}" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề ({{ $lang->locale }})">
                                    </div>
                                    <div class="form-group">
                                        <label>Từ khóa ({{ $lang->locale }})</label>
                                        <textarea class="form-control" name="translation[{{ $lang->locale }}][keywords]" id="keywords_{{ $lang->locale }}" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.keywords') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ({{ $lang->locale }})</label>
                                        <textarea class="form-control" name="translation[{{ $lang->locale }}][description]" id="des_{{ $lang->locale }}" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ({{ $lang->locale }})">{{ old('translation.'.$lang->locale.'.description') }}</textarea>
                                    </div>
                                    <input type="hidden" name="translation[{{ $lang->locale }}][locale]" value="{{ $lang->locale }}">
                                </div>
                            </div>
                            @endforeach
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.product.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <a href="{{ route('backend.product.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Hình ảnh đại diện</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <img id="imgpreview" src="{{ asset('storage') }}/uploads/placeholder.png" width="100%">
                                <input type="file" name="img" class="form-control" data-toggle="tooltip" data-placement="top" title="Dimensions min 500 x 500 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
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
                            <label>
                                <input type="checkbox" name="is_featured" id="is_featured" value="1" class="cbc" >
                                <label class="cbc">Nổi bật</label>
                            </label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="is_new" id="is_new" value="1" class="cbc" {{ old('is_new') == '1' ? 'checked="1"' : '' }}>
                                <label class="cbc">Bán chạy</label>
                            </label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Thao tác</label>
                        </div>
                        <div class="box-body">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.product.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
            CKEDITOR.replace('descriptions_{{ $lang->locale }}', options);
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
                $('div#slug1').text('{{ url('/') }}/' + slug1 + '.html');
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
    $('input#old_price').keyup(function(event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;
        // format number
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
    $('input#price').keyup(function(event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;
        // format number
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
    $('input#prices').keyup(function(event) {
        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;
        // format number
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
    $(document).ready(function() {
        $('.choose').on('change', function() {
            var action = $(this).attr('id');
            var code_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if (action == 'procatone') {
                result = 'procattwo';
            } else {
                result = 'procatthree';
            }
            $.ajax({
                url: '{{ route('backend.product.select_option') }}',
                method: 'POST',
                data: {
                    action: action,
                    code_id: code_id,
                    _token: _token
                },
                success: function(data) {
                    $('#' + result).html(data);
                }
            });
        });
    })
</script>
@endpush
