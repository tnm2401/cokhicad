@php
    $items = Cart::getContent();
    $count_item = $items->count();
    $count = Cart::getTotalQuantity();
    // dd($count);
@endphp
<h3>Hi {{ $name }}</h3>
<p>
	<b>Bạn đã đặt hàng thành công</b>
</p>
<h3>Thông tin đơn hàng của Quý khách</h3>
{{-- <h3>Mã đơn hàng: {{ $order_code }}</h3> --}}
<h3>Ngày đặt hàng: </h3>
<h3>Chi tiết đơn hàng</h3>
<table border="1" cellspacing="0" cellpadding="10" width="400">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td><img src="{{ route('frontend.home.index') }}/storage/uploads/{{ $item->attributes['img'] }}" width="50"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ product_price($item->price) }}</td>
                <td>{{ product_price($item->quantity * $item->price) }}</td>
            </tr>
            @endforeach
        </tbody>
</table>