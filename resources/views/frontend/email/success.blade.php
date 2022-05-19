@php
    // $items = Cart::getContent();
    // $count_item = $items->count();
    // $count = Cart::getTotalQuantity();
    // dd($count);
@endphp
<p style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;">Cảm ơn quý khách <b>{{ $account_name }}</b></p>
<p style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;">Quý khách đã đặt hàng thành công tại Website: <b>{{ $web }}</b></p>
<p style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;">Mã đơn hàng: <b>{{ $order_id }}</b></p>
<p style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;"><b>Thông tin chi tiết đơn hàng:</b></p>
{{-- <p><b>Ngày đặt hàng:</b> {{ $order->order_date }}</p> --}}
<table style="border-collapse:collapse;border-style:1px solid;border-color:#2b3a42;font-family:Arial,Helvetica,sans-serif;font-size:10pt;line-height: 24px;" width="100%" cellspacing="0" cellpadding="0" border="1">
    <thead>
        <tr colspan="2" style="background-color:#2b3a42;color:#fff;padding:8px">
            <th style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold;line-height: 24px;padding:8px 8px;">STT</th>
            <th style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold;line-height: 24px;padding:8px 8px;">Tên sản phẩm</th>
            <th style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold;line-height: 24px;padding:8px 8px;">Giá</th>
            <th style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold;line-height: 24px;padding:8px 8px;">Số lượng</th>
            <th style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;font-weight:bold;line-height: 24px;padding:8px 8px;">Thành tiền</th>
        </tr>
    </thead>
    <tbody>
        @php
            $n = 1;
        @endphp
        @foreach($items as $key => $item)
        <tr>
            <td style="line-height: 24px;text-align: center;padding:8px 8px;">{{ $n }}</td>
            <td style="line-height: 24px;text-align: center;padding:8px 8px;">{{ $item['name'] }}</td>
            <td style="line-height: 24px;text-align: center;padding:8px 8px;">{{ number_format($item['sale_price']) }}₫</td>
            <td style="line-height: 24px;text-align: center;padding:8px 8px;">{{ $item['quantity'] }}</td>
            <td style="line-height: 24px;text-align: center;padding:8px 8px;">{{ number_format($item['quantity']*$item['sale_price']) }}₫</td>
        </tr>
        @php
            $n++;
        @endphp
        @endforeach
        <tr>
            <td colspan="5" style="padding:8px 8px"><b style="color:red;line-height: 24px;">Tổng tiền: </b><b>{{ number_format($order->total_price) }}₫</b>
            </td>
        </tr>
    </tbody>
</table>
<p style="font-family:Arial,Helvetica,sans-serif;font-size:10pt;line-height: 24px;">Trân trọng cảm ơn Quý khách hàng <b>{{ $account_name }}</b></p>