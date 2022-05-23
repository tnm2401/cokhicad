@extends('backend.layout.master')
@section('title','Quản lý tin tức | Tin tức')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>Tin tức</h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li>Tin tức</li>
      <li><a href="{{ route('backend.post.index') }}">Quản lý tin tức</a></li>
      <li class="active">Tất cả</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          @if (Session::has('success'))
          <div class="alert-custom">
            <div class="alert alert-success">{{ Session::get('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          @endif
          <div class="box-body">
            <table id="posts" class="table table-bordered table-striped set__width">
              @if (hasRole('post_add'))
              <a href="{{ route('backend.post.create') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
              @endif
              @if (hasRole('post_del'))
              <a href="#" class="btn btn-danger delete-all new-custom" style="margin-left: 4px;"><i class="fa fa-trash"></i> Xoá chọn</a>
              @endif
              <thead>
                <tr>
                  <th width="5%">
                    <label class="mb-0">
                      <input type="checkbox" id="selectall">
                    </label>
                  </th>
                  <th width="5%">STT</th>
                  <th width="10%">Hình ảnh</th>
                  {{-- <th width="25%">
                    <div class="form-group">
                      <select class="form-control select2 choose newcatone" name="newcatone" id="newcatone" style="max-width:100%;">
                        <option value="">Chọn cấp 1</option>
                        @foreach($newcatones as $key => $newcatone )
                        <option value="{{ $newcatone->name ?? ''}}" data-id="{{ $newcatone->id }}">{{ $newcatone->translations->name ?? ''}}</option>
                        @endforeach
                      </select>
                    </div>
                  </th> --}}
                  {{-- <th>
                    <div class="form-group">
                      <select class="form-control select2 choose newcattwo" name="newcattwo" id="newcattwo" style="max-width: 100%;">
                        <option value="">Chọn cấp 2</option>
                      </select>
                    </div>
                  </th> --}}
                  <th>Tên bài viết</th>
                  <th width="10%">Hiển thị</th>
                  <th width="10%">Nổi bật</th>
                  <th width="10%">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($posts as $k => $post)
                <tr id="tr_{{ $post->id }}">
                  <td>
                    <input type="checkbox" class="checkbox" data-id="{{ $post->id }}">
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" data-id="{{ $post->id }}" value="@if(isset($post->stt)){{ old('stt', $post->stt) }}@else{{ old('stt') }}@endif" class="stt" data-toggle="tooltip" data-placement="top" title="Nhập số thứ tự" style="max-width: 50px; text-align: center">
                    </div>
                  </td>
                  <td>
                    <a href="{{ route('backend.post.edit', $post->id) }}">
                      <img src="{{ $post->img ? imageUrlBackend('/storage/uploads/post/'.$post->img,'200','170','100','1') : '' }}" class="img-thumbnail" style="max-width: 60px; max-height: auto; margin-bottom: 0px">
                    </a>
                  </td>
                  {{-- <td>
                    {{ $post->newcatone->translations->name ?? '' }}
                  </td> --}}
                  {{-- <td>
                    {{ $post->newcattwo->translations->name ?? '' }}
                  </td> --}}
                  <td>
                    <strong><a href="{{ route('backend.post.edit', $post->id) }}">{{ $post->translations->name ?? '' }}</a></strong>
                  </td>
                  <td>
                    <input data-id="{{ $post->id }}" class="hide_show" type="checkbox" data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-times'></i>" {{ $post->hide_show ? 'checked' : '' }} data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios" data-size="mini">
                  </td>
                  <td>
                    <input data-id="{{ $post->id }}" class="is_featured" type="checkbox" data-on="<i class='fa fa-check'></i>" data-off="<i class='fa fa-times'></i>" {{ $post->is_featured ? 'checked' : '' }} data-toggle="toggle" data-onstyle="warning" data-offstyle="danger" data-style="ios" data-size="mini">
                  </td>
                  <td>
                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa bài viết" href="{{ route('backend.post.edit', $post->id ) }}"><i class="fa fa-edit"></i></a>
                    @if (hasRole('post_del'))
                    <form class="d-inline" method="POST" action="{{ route('backend.post.destroy', $post->id) }}"  >
                      @csrf
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá bài viết"><i class="fa fa-trash del-confirm"></i></button>
                    </form>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @if (hasRole('post_add'))
            <a href="{{ route('backend.post.create') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
            @endif
            @if (hasRole('post_del'))
            <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@push("script")
<script>
function switchChange(){
  $('#posts').on('change','input[class="hide_show"]',function(){
    var hide_show = $(this).prop('checked') == true ? 1 : 0;
    var post_id = $(this).data('id');
    $.ajax({
      type: "GET",
      dataType: "json",
      url: '{{ route('backend.post.hideshow') }}',
      data: {'hide_show': hide_show, 'post_id': post_id},
        success: function(data){
          Swal.fire({
            icon: 'success',
            title: 'Thành công !',
            text: 'Đã cập nhật trạng thái !',
            showConfirmButton: false,
            timer: 2500
            })
        }
    });
  })
}
$(document).ready(function(){
  switchChange();
  $('.choose').on('change',function(){
    var action  = $(this).attr('id');
    var code_id = $(this).find(':selected').data('id')
    var _token  = $('input[name="_token"]').val();
    var result  = '';
    if (action == 'newcatone'){
      result = 'newcattwo';
    }
    $.ajax({
      url : '{{ route('backend.post.select_option') }}',
      method : 'POST',
      data: {action:action,code_id:code_id,_token:_token},
      success:function(data){
        $('#'+result).html(data);
      }
    });
  });
  $(function(){
    $('#posts').on('change','input[class="is_featured"]',function(){
      var is_featured = $(this).prop('checked') == true ? 1 : 0;
      var post_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('backend.post.isfeatured') }}',
        data: {'is_featured': is_featured, 'post_id': post_id},
        success: function(data){
          Swal.fire({
            icon: 'success',
            title: 'Thành công !',
            text: 'Đã cập nhật trạng thái !',
            showConfirmButton: false,
            timer: 2500
            })
          }
      });
    })
  })
  $(function(){
    $('#posts').on( 'change', 'input[class="stt"]', function () {
      var stt = $(this).val();
      var post_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('backend.post.changestt') }}',
        data: {'stt': stt, 'post_id': post_id},
        success: function(data){
          Swal.fire({
            icon: 'success',
            title: 'Thành công !',
            text: 'Đã cập nhật số thứ tự !',
            showConfirmButton: false,
            timer: 2500
            })
          }
      });
    })
  })
})
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
                              url: "{{ route('backend.post.deletemultiple') }}",
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
<script>
  $(function () {
    tableData = $('#posts').DataTable({
    'order'       : [2], // Bắt đầu sắp xếp cột nào ?
    'responsive'  : true,
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true,
    'columnDefs': [
    { 'orderable': false, 'targets': [0,1,2,3,4] }
    ],
    'language': {
      "sProcessing":   "Đang xử lý...",
      "sLengthMenu":   "Xem _MENU_ mục",
      "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
      "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
      "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
      "sInfoFiltered": "(được lọc từ _MAX_ mục)",
      "sInfoPostFix":  "",
      "sSearch":       "Tìm:",
      "sUrl":          "",
      "oPaginate": {
        "sFirst":    "Đầu",
        "sPrevious": "Trước",
        "sNext":     "Tiếp",
        "sLast":     "Cuối"
      }
    }
  })
  // Apply the search
  tableData.columns().every(function () {
      let that = this;
      $('select', this.header()).change(function (e) {
          if (that.search() !== this.value) {
              that.search(this.value).draw();
          }
      });
    });
  })
</script>
@endpush
