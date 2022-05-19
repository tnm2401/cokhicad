<!-- Modal Reset Password-->
<div class="modal fade" id="popup_rspass_maintain" tabindex="-1" role="dialog" aria-labelledby="popup_rspass_maintain" aria-hidden="true">
    <div class="modal-dialog" role="maintain">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5>Khôi phục mật khẩu bảo trì Website !</h5>
                <form  method="post" action="{{ route('reset.pass.maintain') }}">
                    @csrf
                    <input style="margin-bottom: 5px" class="form-control " type="text"
                    placeholder="Nhập mật khẩu mới !" id="pass" name="pass" required>
                    <small>Truy cập website bằng URL mới: <a href="{{ url('/') }}" target="_blank">{{ url('/') }}/<span id="linkactive"></span> </a></small>
                    <div><small>Mật khẩu mới là: <span id="linkactive" class="text-success"></span></small></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                    class="fa fa-ban"></i> Hủy</button>
                    <button type="submit" class="btn btn-success"> <i class="fa-solid fa-floppy-disk"></i> Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end modal --}}
