<!-- Modal bao tri-->
<div class="modal fade" id="popup_maintain" tabindex="-1" role="dialog" aria-labelledby="popup_maintain" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5>Đưa Website vào trạng thái bảo trì, không thể truy cập !</h5>
                <form id="down_web" method="post" action="{{ route('down_web') }}">
                    @csrf
                    <input style="margin-bottom: 5px" class="form-control " type="text"
                    placeholder="Nhập mật khẩu để khóa Website" id="pass" name="pass" required>
                    <small>Truy cập website bằng url mới: <a href="">{{ url('/') }}/<span id="linkactive"></span> </a></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                    class="fa fa-ban"></i> Hủy</button>
                    <button type="submit" class="btn btn-danger"> <i class="fa fa-triangle-exclamation"></i> Bảo trì</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end modal --}}