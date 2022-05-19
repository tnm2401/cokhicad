@extends('backend.layout.master')
@section('title','Sửa sản phẩm | Sản phẩm')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h4>Sửa sản phẩm</h4>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
            <li>Sản phẩm</li>
            <li><a href="{{ route('backend.product.index') }}">Quản lý sản phẩm</a></li>
            <li class="active">Sửa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <form id="edit-product" method="POST" action="{{ route('backend.product.update', $product->id) }}" enctype="multipart/form-data">
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
                    <div class="box box-primary">
                        <div class="box-body">
                            <input type="hidden" id="type" name="type" value="product">
                            <div class="form-group">
                                <label>Tên sản phẩm ({{ session('locale') }})</label>
                                <input type="text" name="translation[name]" id="name" value="@if(isset($product->translations->name)){{ old('translation'.'.name', $product->translations->name) }}@else{{ old('translation'.'.name') }} @endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên sản phẩm ({{ session('locale') }})">
                            </div>
                            <div class="form-group">
                                <label>Danh mục cấp 1</label>
                                <select class="form-control select2 choose procatone" name="procatone" id="procatone" style="width: 100%;">
                                    <option value="">Chọn</option>
                                    @foreach ($procatones as $key => $procatone)
                                    <option value="{{ $procatone->id }}" {{ $product->procatone_id == $procatone->id ? 'selected' : '' }}>{{ $procatone->translations->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Danh mục cấp 2</label>
                                <select class="form-control select2 choose procattwo" name="procattwo" id="procattwo" style="width: 100%;">
                                    <option value="">Chọn</option>
                                    @foreach ($procattwos as $key => $procattwo)
                                    <option value="{{ $procattwo->id }}" {{ $product->procattwo_id == $procattwo->id ? 'selected' : '' }}>{{ $procattwo->translations->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>Danh mục cấp 3</label>
                                <select class="form-control select2 procatthree" name="procatthree" id="procatthree" style="width: 100%;">
                                    <option value="">Chọn</option>
                                    @foreach ($procatthrees as $key => $procatthree)
                                    <option value="{{ $procatthree->id }}" {{ $product->procatthree_id == $procatthree->id ? 'selected' : '' }}>{{ $procatthree->translations->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input type="text" name="product_code" id="product_code" value="@if(isset($product->product_code)){{ old('product_code', $product->product_code) }}@else{{ old('product_code') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mã sản phẩm">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Giá sản phẩm (₫)</label>
                                        <input type="text" name="price" id="price" value="@if(isset($product->price)){{ old('price', product_price_view($product->price)) }}@else{{ old('price') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập giá sản phẩm">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Giảm giá (%)</label>
                                        <input type="number" name="discount" id="discount" value="@if(isset($product->discount)){{ old('discount', $product->discount) }}@else{{ old('discount') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập % giảm giá">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-2" id="preview" width="100"></div>
                            <label>Thêm hình ảnh</label>
                            <input type="file" class="form-control" name="imgs[]" id="file-input" style="margin-bottom: 10px" multiple data-toggle="tooltip" data-placement="top" title="Dimensions min 500 x 500 (px)" />
                            <label>Hình ảnh hiện tại</label>
                            @if($images->count() > 0)
                            <span data-id="{{ $product->id }}" id="delete_all_img_detail" class="btn btn-danger"><i class="fa-duotone fa-trash-can"></i> <label>Xóa tất cả</label></span>
                            <span  class="btn btn-danger " style="margin-left: 4px;">
                                    <input id="selectall" type="checkbox"  />
                                    <label for="selectall">Chọn tất cả</label>
                            </span>
                            <span  class="btn btn-danger delete-all " style="margin-left: 4px;"><i class="fa-solid fa-list"></i> <label >Xoá chọn</label></span>
                            @endif
                            <div class="box-body">
                                <div class="form-group product-img">
                                    <div class="row">
                                        @foreach ($images as $image)
                                        <div class="col-xs-6 col-sm-4 col-md-2 mb-2" style="text-align: center;">
                                            <img src="{{ asset('storage') }}/uploads/products/{{ $image->imgs }}" alt="product image" class="img-thumbnail mx-md-auto" style="width: 150px; height: 100px">

                                            <a style="cursor:pointer" data-toggle="tooltip" class="delete-img" data-id="{{ $image->id }}" data-placement="top" title="Xoá"><i style="color: rgb(230, 86, 86)" class="fa-solid fa-trash-can-xmark"></i>
                                            </a>
                                            <input type="checkbox" class="checkbox" data-id="{{ $image->id }}">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group tags">
                                <label>Tags ({{ session('locale') }})</label> <small>*Có thể chọn nhiều Tags</small>
                                <select class="form-control select2 tag" name="tags[]" multiple="multiple" id="">
                                    @foreach ($product->get_tags as $tag)
                                    <option selected value="{{ $tag->id }}">{{ $tag->translations->name ?? '' }}</option>
                                    @endforeach
                                    @foreach ($tags as $t)
                                    <option value="{{ $t->id }}">{{ $t->translations->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả sản phẩm ({{ session('locale') }})</label>
                                <textarea class="form-control" name="translation[descriptions]" id="descriptions" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả ngắn sản phẩm ({{ session('locale') }})">@if(isset($product->translations->descriptions)){{ old('translation'.'.descriptions', $product->translations->descriptions) }}@else{{ old('translation'.'.descriptions') }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung sản phẩm ({{ session('locale') }})</label>
                                <textarea class="form-control" name="translation[content]" id="content">@if(isset($product->translations->content)){{ old('translation'.'.content', $product->translations->content) }}@else{{ old('translation'.'.content') }}@endif</textarea>
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tối ưu hoá tìm kiếm (SEO - {{ session('locale') }})</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="url-seo" id="slug-seo">{{ url('/') }}/{{ $product->translations->slug }}.html</div>
                                    <div class="title-seo" id="title-seo">{{ $product->translations->title }}</div>
                                    <div class="description-seo" id="description-seo">{{ $product->translations->description }}</div>
                                    <label>URL sản phẩm ({{ session('locale') }})</label>
                                    <input type="text" name="translation[slug]" id="slug" value="@if(isset($product->translations->slug)) {{ old('translation'.'.slug', $product->translations->slug) }}@else{{ old('translation'.'.slug') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập URL sản phẩm ({{ session('locale') }})">
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề ({{ session('locale') }})</label>
                                    <input type="text" name="translation[title]" id="title" value="@if(isset($product->translations->title)){{ old('translation'.'.title', $product->translations->title) }}@else{{ old('translation'.'.title') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tiêu đề sản phẩm ({{ session('locale') }})">
                                </div>
                                <div class="form-group">
                                    <label>Từ khóa ({{ session('locale') }})</label>
                                    <textarea class="form-control" name="translation[keywords]" id="keywords" rows="3" data-toggle="tooltip" data-placement="top" title="Nhập từ khoá sản phẩm ({{ session('locale') }})">@if(isset($product->translations->keywords)){{ old('translation'.'.keywords', $product->translations->keywords) }}@else{{ old('translation'.'.keywords') }}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ({{ session('locale') }})</label>
                                    <textarea class="form-control" name="translation[description]" id="description" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập mô tả sản phẩm ({{ session('locale') }})">@if(isset($product->translations->description)){{ old('translation'.'.description', $product->translations->description) }}@else{{ old('translation'.'.description') }}@endif</textarea>
                                </div>
                                <button class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                                <a href="{{ route('backend.product.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                            <a href="{{ route('backend.product.index') }}" class="btn btn-danger"><i class="fa fa-times-circle"></i> Thoát</a>
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
                                                <a href="javascript:void(0)"><span class="changelanguage change-confirm-product"
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
                            <img id="imgpreview" class="img-thumbnail mb-2" style="width: 100%; margin-bottom:10px;" src="{{ asset('storage') }}/uploads/products/{{ $product->img }}" alt="{{ $product->translations->name }}">
                            <div class="form-group">
                                <input type="file" name="img" class="form-control" value="{{ $product->img }}" data-toggle="tooltip" data-placement="top" title="Dimensions min 500 x 500 (px)" oninput="imgpreview.src=window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>Số thứ tự</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="number" name="stt" id="stt" value="@if(isset($product->stt)){{ old('stt', $product->stt) }}@else{{ old('stt') }}@endif" min="0" class="form-control stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="hide_show" id="hide_show" value="1" {{ $product->hide_show == 1 ? 'checked' : '' }} class="cbc">
                                <label class="cbc">Hiển thị</label>
                            </label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ $product->is_featured == 1 ? 'checked' : '' }} class="cbc">
                                <label class="cbc">Nổi bật</label>
                            </label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <label>
                                <input type="checkbox" name="is_new" id="is_new" value="1" {{ $product->is_new == 1 ? 'checked' : '' }} class="cbc">
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
            </form>
        </div>
    </section>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        CKEDITOR.replace('descriptions', options);
        CKEDITOR.replace('content', options);
    });
    $("#slug").keyup(function(){
        $("#slug-seo").text(window.location.hostname+'/'+ this.value + '.html');
    });
    $("#title").keyup(function(){
        $("#title-seo").text(this.value);
    });
    $("#description").keyup(function(){
        $("#description-seo").text(this.value);
    });
</script>
<script>
    $('document').ready(function() {
        $(document).on('change', 'input#slug', function() {
            var slug1 = CreateSlugProduct($(this).val());
            $('div#slug1').text('{{ $setting->web }}/san-pham/' + slug1 + '.html');
        });
    });
    function CreateSlugProduct(text) {
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
</script>
<script>
    $(".delete-img").click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'Xóa hình ảnh này ?',
            text: "Sau khi Xóa không thể hoàn tác !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý !',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('/') }}/administrator/products/" + id + "/delete",
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
                                icon: 'success',
                                title: 'Thành công !',
                                text: 'Đã Xóa hình ảnh !',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi !',
                                text: 'Đã có lỗi xảy ra !',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi !',
                            text: 'Đã có lỗi xảy ra !',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                });
            }
        })
    });
</script>
<script>
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
<script>
    $("#delete_all_img_detail").click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
            title: 'Xóa tất cả hình ảnh',
            text: "Sau khi Xóa không thể hoàn tác !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý !',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('backend.product.delete_all_image') }}",
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
                                icon: 'success',
                                title: 'Thành công !',
                                text: 'Đã Xóa hình ảnh !',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi !',
                                text: 'Đã có lỗi xảy ra !',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi !',
                            text: 'Đã có lỗi xảy ra !',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }
                });
            }
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#selectall').on('click', function(e) {
          if ($(this).is(':checked', true)) {
              $(".checkbox").prop('checked', true);
          } else {
              $(".checkbox").prop('checked', false);
          }
      });
        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#selectall').prop('checked', true);
            } else {
                $('#selectall').prop('checked', false);
            }
        });
        $('.delete-all').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                Swal.fire(
                    'Chưa chọn !',
                    'Vui lòng chọn ít nhất 1 mục để Xóa !',
                    'question'
                )
            } else {
                Swal.fire({
                    title: 'Xác nhận Xóa !',
                    text: "Không thể hoàn tác sau khi Xóa !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var strIds = idsArr.join(",");
                        $.ajax({
                            url: "{{ route('backend.product.deletemultiple_imgdetail') }}",
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content')
                            },
                            data: 'ids=' + strIds,
                            success: function(data) {
                                if (data['status'] == true) { // if true (1)
                                    setTimeout(function() { // wait for 3 secs(2)
                                        location
                                    .reload(); // then reload the page.(3)
                                    }, 3000);
                                    $(".checkbox:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    Swal.fire(
                                        'Thành công !',
                                        'Đã Xóa các mục vừa chọn !',
                                        'success'
                                    )
                                } else {
                                    alert('Rất tiếc, đã có lỗi xảy ra !');
                                }
                            },
                            error: function(data) {
                                Swal.fire(
                                    'Thất bại !',
                                    'Đã có lỗi xảy ra !',
                                    'danger'
                                )
                            }
                        });
                    } else {
                          Swal.fire(
                            'Đã hủy !',
                            'Bạn chưa Xóa gì cả !',
                            'error'
                        );
                    }
                })
            }
        });
    });
  </script>
@endpush
