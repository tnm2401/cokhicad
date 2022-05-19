@extends('backend.layout.master')
@section('title', 'Sửa tin tức | Tin tức')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Sửa tin tức</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li>Tin tức</li>
            <li><a href="{{ route('backend.post.index') }}">Quản lý tin tức</a></li>
            <li class="active">Sửa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form method="POST" action="{{ route('backend.post.update', $post->id) }}" enctype="multipart/form-data">
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
                                <label>Tên bài viết ({{ session('locale') }})</label>
                                <input type="text" name="translation[name]" id="translation[name]" value="@if(isset($post->translations->name)){{ old('translation'.'.name', $post->translations->name) }}@else{{ old('translation'.'.name') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên bài viết ({{ session('locale') }})">
                            </div>
                            <div class="form-group tags">
                                <label>Tags ({{ session('locale') }})</label> <small>*Có thể chọn nhiều Tags</small>
                                <select class="form-control select2 tag" name="tags[]" multiple="multiple">
                                    @foreach ($post->get_tags as $tag)
                                    <option selected value="{{ $tag->id }}">{{ $tag->translations->name ?? '' }}</option>
                                    @endforeach
                                    @foreach ($tags as $t)
                                    <option value="{{ $t->id }}">{{ $t->translations->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Danh mục cấp 1</label>
                                <select class="form-control select2 choose newcatone" name="newcatone" id="newcatone" style="width: 100%;">
                                    <option value="">Chọn</option>
                                    @foreach ($newcatones as $newcatone)
                                    <option value="{{ $newcatone->id }}" {{ $post->newcatone_id == $newcatone->id ? 'selected' : '' }}>{{ $newcatone->translations->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>Danh mục cấp 2</label>
                                <select class="form-control select2 choose newcattwo" name="newcattwo" id="newcattwo" style="width: 100%;">
                                    <option value="">Chọn</option>
                                    @foreach ($newcattwos as $newcattwo)
                                    <option value="{{ $newcattwo->id }}" {{ $post->newcattwo_id == $newcattwo->id ? 'selected' : '' }}>{{ $newcattwo->translations->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label>Mô tả ({{ session('locale') }})</label>
                                <textarea class="form-control" name="translation[descriptions]" id="descriptions" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ({{ session('locale') }})">@if(isset($post->translations->descriptions)){{ old('translation'.'.descriptions', $post->translations->descriptions) }}@else{{ old('translation'.'.descriptions') }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung ({{ session('locale') }})</label>
                                <textarea class="form-control" name="translation[content]" id="content">@if(isset($post->translations->content)){{ old('translation'.'.content', $post->translations->content) }}@else{{ old('translation'.'.content') }}@endif</textarea>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tối ưu hoá tìm kiếm (SEO - {{ session('locale') }})</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="url-seo" id="slug-seo">{{ url('/') }}/{{ $post->translations->slug }}.html</div>
                                    <div class="title-seo" id="title-seo">{{ $post->translations->title }}</div>
                                    <div class="description-seo" id="description-seo">{{ $post->translations->description }}</div>
                                    <label>URL bài viết ({{ session('locale') }})</label>
                                    <input type="text" name="translation[slug]" id="slug" value="@if(isset($post->translations->slug)){{ old('translation'.'.slug', $post->translations->slug) }}@else{{ old('translation'.'.slug') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL bài viết ({{ session('locale') }})">
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề ({{ session('locale') }})</label>
                                    <input type="text" name="translation[title]" id="title" value="@if(isset($post->translations->title)){{ old('translation'.'.title', $post->translations->title) }}@else{{ old('translation'.'.title') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề ({{ session('locale') }})">
                                </div>
                                <div class="form-group">
                                    <label>Từ khóa ({{ session('locale') }})</label>
                                    <textarea class="form-control" name="translation[keywords]" id="keywords" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá ({{ session('locale') }})">@if(isset($post->translations->keywords)){{ old('translation'.'.keywords', $post->translations->keywords) }}@else{{ old('translation'.'.keywords') }}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ({{ session('locale') }})</label>
                                    <textarea class="form-control" name="translation[description]" id="description" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ({{ session('locale') }})">@if(isset($post->translations->description)){{ old('translation'.'.description', $post->translations->description) }}@else{{ old('translation'.'.description') }}@endif</textarea>
                                </div>
                                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                                <a href="{{ route('backend.post.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <a href="{{ route('backend.post.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                                <img id="imgpreview" class="img-thumbnail mb-2" style="width: 100%; margin-bottom:10px;" src="{{ asset('storage') }}/uploads/post/{{ $post->img }}"
                                alt="{{ $post->translations->name }}">
                                <input type="file" name="img" class="form-control" value="{{ $post->img }}" data-toggle="tooltip" data-placement="top" title="Dimensions min 370 x 250 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Số thứ tự</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="number" name="stt" id="stt" value="@if(isset($post->stt)){{ old('stt', $post->stt) }}@else{{ old('stt') }}@endif" min="0" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $post->hide_show == 1 ? 'checked' : '' }} class="cbc">
                                <label class="cbc">Hiển thị</label>
                            </label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $post->is_featured == 1 ? 'checked' : '' }} class="cbc">
                                <label class="cbc">Nổi bật</label>
                            </label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Thao tác</label>
                        </div>
                        <div class="box-body">
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                            <a href="{{ route('backend.post.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
        });
    </script>
@endpush
@push('script')
    <script>
        $("#name_vi").keyup(function() {
            $("#title_vi").val(this.value);
        });
    </script>
    <script>
        $("#name_en").keyup(function() {
            $("#title_en").val(this.value);
        });
    </script>
    <script>
        $("#name_cn").keyup(function() {
            $("#title_cn").val(this.value);
        });
    </script>
    {{-- <script>
  var editor = CKEDITOR.replace( 'content' );
  CKFinder.setupCKEditor( editor );
</script> --}}
    <script>
        $('document').ready(function() {
            $(document).on('change', 'input#slug', function() {
                var slug1 = createslug($(this).val());
                $('div#slug1').text(window.location.hostname +
                    '/' + slug1 + '.html');
            });
        });

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
    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var code_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                // alert(action);
                if (action == 'newcatone') {
                    result = 'newcattwo';
                }
                $.ajax({
                    url: '{{ route('backend.post.select') }}',
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
