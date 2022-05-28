@extends('backend.layout.master')
@section('title','Cập nhật gallery')
@push('style')
    <style>
        #frames img {
            width: 200px !important;
            height: 50px !important;
        }
    </style>
@endpush
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="pjax-container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h4>
                Chỉnh sửa hình ảnh
            </h4>
            <ol class="breadcrumb">
                <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
                <li>Hình ảnh</li>
                {{-- <li><a href="{{ route('backend.gallery.index') }}">Quản lý gallery</a></li> --}}
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
            <form method="POST" action="{{ route('backend.gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Tên ({{ session('locale') }})</label>
                                    <input disabled  type="text" name="translation[name]"
                                        value="@if (isset($gallery->translations->name)){{ old('translation[name]', $gallery->translations->name) }}@else{{ old('translation[name]') }} @endif"
                                        class="form-control" data-toggle="tooltip" data-placement="top"
                                        title="Nhập tiêu đề hình ảnh ">
                                </div>

                                <label>Thêm hình ảnh chi tiết</label>
                                <input id="image" type="file" class="form-control" name="imgs[]" style="margin-bottom: 10px" multiple
                                    data-toggle="tooltip" data-placement="top" title="Dimensions min 850 x 400 (px)" />
                                    <div id="frames"></div>
                                    <div class="form-group">
                                        <label>Hình ảnh hiện tại </label>
                                            <div id="frames">
                                            @foreach ($img as $image)
                                                    <img src="{{ asset('storage') }}/uploads/gallery/{{ $image->imgs }}"
                                                        alt="{{ $image->imgs }}" class="img-thumbnail mx-md-auto"
                                                        style="width: 300px; height: 100px">
                                                    <a style="cursor:pointer" data-toggle="tooltip" class="delete-img"
                                                        data-id="{{ $image->id }}" data-placement="top" title="Xoá"><i
                                                            style="color: rgb(230, 86, 86)"
                                                            class="fa-solid fa-trash-can-xmark"></i>
                                                    </a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{$img->links("pagination::bootstrap-4")}}
                                    </div>
                                <div class="box-header with-border">
                                    <h3 class="box-title">Tối ưu hoá tìm kiếm (SEO - {{ session('locale') }})</h3>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="url-seo" id="slug-seo">
                                            {{ route('frontend.home.index') }}/{{ $gallery->translations->slug ?? '' }}.html
                                        </div>
                                        <div class="title-seo" id="title-seo">{{ $gallery->translations->title ?? '' }}
                                        </div>
                                        <div class="description-seo" id="description-seo">
                                            {{ $gallery->translations->description ?? ''}}</div>
                                        <label>URL bài viết ({{ session('locale') }})</label>
                                        <input type="text" type="text" name="slug" id="slug" data-length=120
                                            value="@if (isset($gallery->translations->slug)){{ old('slug', $gallery->translations->slug) }}@else{{ old('slug') }} @endif"
                                            class="form-control" data-toggle="tooltip" data-placement="top"
                                            title="Nhập URL sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label>Tiêu đề ({{ session('locale') }})</label>
                                        <input type="text" name="translation[title]" id="title" data-length=120
                                            value="@if (isset($gallery->translations->title)){{ old('translation[title]', $gallery->translations->title) }}@else{{ old('translation[title]') }} @endif"
                                            class="form-control" data-toggle="tooltip" data-placement="top"
                                            title="Nhập tiêu đề sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label>Từ khóa ({{ session('locale') }})</label>
                                        <textarea class="form-control" name="translation[keywords]" id="keywords" data-length=320
                                            value="@if (isset($gallery->translations->keywords)){{ old('translation[keywords]', $gallery->translations->keywords) }}@else{{ old('translation[keywords]') }} @endif"
                                            rows="3" data-toggle="tooltip" data-placement="top"
                                            title="Nhập từ khoá cho sản phẩm">@if (isset($gallery->translations->keywords)){{ old('translation[keywords]', $gallery->translations->keywords) }}@else{{ old('translation[keywords]') }}@endif</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả ({{ session('locale') }})</label>
                                        <textarea class="form-control" name="translation[description]" id="description" data-length=320
                                            value="@if (isset($gallery->translations->description)){{ old('translation[description]', $gallery->translations->description) }}@else{{ old('translation[description]') }} @endif"
                                            rows="3" data-toggle="tooltip" data-placement="top"
                                            title="Nhập mô tả ngắn sản phẩm">@if (isset($gallery->translations->description)){{ old('translation[description]', $gallery->translations->description) }}@else{{ old('translation[description]') }}@endif</textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                                {{-- <a href="{{ route('backend.newcatone.index') }}" class="btn btn-danger"><i
                                        class="fa fa-times-circle"></i> Thoát</a> --}}

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
                                {{-- <a href="{{ route('backend.gallery.index') }}" class="btn btn-danger"><i
                                        class="fa fa-times-circle"></i> Thoát</a> --}}
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>Ảnh đại diện</label>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="file" name="img" class="form-control" value="{{ $gallery->img }}"
                                        data-toggle="tooltip" data-placement="top" title="Dimensions min 420 x 200 (px)">
                                    <img class="img-thumbnail mb-2" style="max-width: 100px; margin-top:10px;"
                                        src="{{ asset('storage') }}/uploads/gallery/{{ $gallery->img }}"
                                        alt="{{ $gallery->name }}">
                                </div>
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
                                    <input   type="number" name="stt" id="stt"
                                        value="@if (isset($gallery->stt)){{ old('stt', $gallery->stt) }}@else{{ old('stt') }} @endif"
                                        class="form-control stt" data-toggle="tooltip" data-placement="top"
                                        title="Nhập số thứ tự">
                                </div>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>
                                    <input type="checkbox" name="hide_show" id="hide_show" value="1"
                                        {{ $gallery->hide_show == 1 ? 'checked' : '' }} class="cbc"><label
                                        class="cbc">Hiển thị</label>
                                </label>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <label>Thao tác</label>
                            </div>
                            <div class="box-body">
                                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                                {{-- <a href="{{ route('backend.gallery.index') }}" class="btn btn-danger"><i
                                        class="fa fa-times-circle"></i> Thoát</a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- right column -->
                </div>
        </section>
    </div>
    </form>


@endsection
@push('script')
<script>
    $(".delete-img").click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'Xóa hình ảnh này ?',
            text: "Sau khi xóa không thể hoàn tác",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý !',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('/') }}/administrator/gallery/" + id + "/delete",
                    // url : {{ route('backend.product.delete', 13) }}
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {
                        if (data['status'] == true) { // if true (1)
                            setTimeout(function() { // wait for 3 secs(2)
                                location.reload(); // then reload the page.(3)
                            }, 1000);
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Đã xóa hình ảnh',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Đã có lỗi xảy ra',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Đã có lỗi xảy ra',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            }
        })

    });
</script>
@endpush

