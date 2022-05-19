@extends('backend.layout.master')
@section('title','Quản trị viên')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="pjax-container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h4>
      Quản lý Thành Viên
    </h4>
    <ol class="breadcrumb">
      <li><a href="{{ route('backend.dashboard.index') }}"><i class="fa fa-dashboard"></i></a></li>
      <li><a>Quản lý Thành viên</a></li>
      <li><a href="{{ route('backend.user.index') }}">Quản lý User</a></li>
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
            <table id="users" class="table table-bordered table-striped">
              <a href="{{ route('backend.user.create') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
              <a href="#" class="btn btn-danger delete-all new-custom" style="margin-left: 4px;"><i class="fa fa-trash"></i> Xoá chọn</a>
              <thead>
                <tr>
                  <th>
                    <label class="mb-0">
                      <input type="checkbox" id="selectall">
                    </label>
                  </th>
                  {{-- <th>STT</th> --}}
                  <th>Tên thành viên</th>
                  <th>Phân quyền</th>
                  <th>Email</th>
                  <th>Ngày tạo</th>
                  {{-- <th>Ngày cập nhật</th> --}}
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $k => $user)
                <tr>
                  <td>
                    <label>
                      <input type="checkbox" class="checkbox" data-id="{{ $user->id }}">
                    </label>
                  </td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->roles->name ?? 'No' }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ date("d/m/Y", strtotime($user->created_at)) }}</td>

                  <td>
                    <input data-id="{{ $user->id }}" class="changestatus" type="checkbox"
                        data-on="<i class='fa fa-check'></i>"
                        data-off="<i class='fa fa-times'></i>"
                        {{ $user->status ? 'checked' : '' }} data-toggle="toggle"
                        data-onstyle="success" data-offstyle="danger" data-style="ios"
                        data-size="mini">
                </td>
                  <td>
                    <a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Xóa quyền cao nhất" href=""><i class="fa fa-remove"></i></a>
                    <a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Sửa thông tin User" href="{{ route('backend.user.editinfo', $user->id ) }}"><i class="fa fa-edit"></i></a>

                    <a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Thay đổi mật khẩu User" href="{{ route('backend.user.editpassword', $user->id ) }}"><i class="fa-regular fa-key"></i></a>
                    <form class="d-inline" method="POST" action="{{ route('backend.user.destroy', $user->id) }}" >
                      @csrf
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top" title="Xoá User"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{ route('backend.user.create') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm mới</a>
            <a href="#" class="btn btn-danger delete-all new-custom"><i class="fa fa-trash"></i> Xoá chọn</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@push("script")
{{-- <script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/administrator/users/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
               Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'Đã cập nhật trạng thái',
                    showConfirmButton: false,
                    timer: 2500
                    })
            }
        });
    })
  })
</script> --}}

<script>
            function switchChange() {
            $('#users').on('change', 'input[class="changestatus"]', function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('backend.user.status') }}',
                    data: {
                        'status': status,
                        'user_id': user_id
                    },
                    success: function(data) {
                         Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: 'Đã cập nhật trạng thái',
                    showConfirmButton: false,
                    timer: 2500
                    })
                    }
                });
            })
        }
</script>
<script>
     $(document).ready(function() {
            switchChange();
     })
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $('#selectall').on('click', function(e) {
     if($(this).is(':checked',true))
     {
      $(".checkbox").prop('checked', true);
    } else {
      $(".checkbox").prop('checked',false);
    }
  });
    $('.checkbox').on('click',function(){
      if($('.checkbox:checked').length == $('.checkbox').length){
        $('#selectall').prop('checked',true);
      }else{
        $('#selectall').prop('checked',false);
      }
    });
    $('.delete-all').on('click', function(e) {
      var idsArr = [];
      $(".checkbox:checked").each(function() {
        idsArr.push($(this).attr('data-id'));
      });
      if(idsArr.length <=0)
      {
        alert("Vui lòng chọn ít nhất 1 User để Xoá !");
      }  else {
        if(confirm("Xác nhận Xoá tất cả User đã chọn ?")){
          var strIds = idsArr.join(",");
          $.ajax({
            url: "{{ route('backend.user.deletemultiple') }}",
            type: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: 'ids='+strIds,
            success: function (data) {
                            if (data['status']==true) { // if true (1)
                                setTimeout(function(){ // wait for 3 secs(2)
                                  location.reload(); // then reload the page.(3)
                                }, 3000);
                                $(".checkbox:checked").each(function() {
                                  $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                              } else {
                                alert('Rất tiếc, đã có lỗi xảy ra !');
                              }
                            },
                            error: function (data) {
                              alert(data.responseText);
                            }
                          });
        }
      }
    });
  });
</script>
@endpush
