<p><b>Thông tin ứng viên</b></p>
<p><b>Họ và tên:</b> {{ $name }}</p>
<p><b>Địa chỉ:</b> {{ $address }}</p>
<p><b>Số điện thoại:</b> {{ $phone }}</p>
<p><b>Email:</b> {{ $email }}</p>
<p><b>CV đính kèm:</b> <a href="{{ route('frontend.home.index') }}/storage/uploads/files/{{ $cv }}">{{ $cv }}</a></p>
<p><b>Ghi chú:</b> {{ $apply_note }}</p>
