<li class="dropdown messages-menu" data-toggle="tooltip" data-placement="bottom" title="Đơn hàng mới">
    <a href="{{ route('backend.order.index') }}" class="dropdown-toggle" {{-- data-toggle="dropdown" --}}>
        <i class="fa-solid fa-cart-shopping-fast"></i><span class="label label-danger">{{ Order::where('status', 1)->count() }}</span>
    </a>
    {{-- <ul class="dropdown-menu">
        <li class="header">Bạn có <span class="notification">{{ Order::where('status', 1)->count() }}</span> Đơn hàng mới</li><li>
            <ul class="menu">
                @foreach (Order::with('account')->where('status', '1')->limit(5)->get() as $new_order)
                <li>
                    <a href="{{ route('backend.order.edit', $new_order->id) }}">
                        <div class="pull-left">
                            <img src="{{ asset('storage') }}/uploads/{{ $new_order->account->img ?? 'placeholder.png' }}" class="img-circle" alt="{{ auth()->user()->name }}">
                        </div>
                        <h4>{{ $new_order->account->name }}<small><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($new_order->order_date)->diffForhumans() }}</small>
                        </h4>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="{{ route('backend.order.index') }}">Xem tất cả</a></li>
    </ul> --}}
</li>
<li class="dropdown messages-menu" data-toggle="tooltip" data-placement="bottom" title="Thư liên hệ mới">
    <a href="{{ route('backend.contactform.index') }}" class="dropdown-toggle" {{-- data-toggle="dropdown" --}}>
        <i class="fa-solid fa-envelope"></i><span class="label label-success">{{ Contactform::where('read', 0)->count() }}</span>
    </a>
    {{-- <ul class="dropdown-menu">
        <li class="header">Bạn có <span class="notification">{{ Contactform::where('read', 0)->count() }}</span> tin nhắn mới</li>
        <li>
            <ul class="menu">
                @foreach (Contactform::where('read', 0)->limit(5)->get() as $item)
                <li>
                    <a href="{{ route('backend.contactform.index') }}">
                        <div class="pull-left">
                            <img src="{{ asset('storage') }}/uploads/{{ $img ?? '' }}" class="img-circle"
                            alt="User Image">
                        </div>
                        <h4>{{ $item->name }}<small><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</small></h4>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="{{ route('backend.contactform.index') }}">Xem tất cả</a></li>
    </ul> --}}
</li>
<li class="dropdown messages-menu" data-toggle="tooltip" data-placement="bottom" title="Thư đăng ký mới">
    <a href="{{ route('newsletter.index') }}" class="dropdown-toggle" {{-- data-toggle="dropdown" --}}>
        <i class="fa fa-at"></i><span class="label label-danger bg-yellow">{{ Newsletter::where('read', 0)->count() }}</span>
    </a>
    {{-- <ul class="dropdown-menu">
        <li class="header">Bạn có <span class="notification">{{ Newsletter::where('read', 0)->count() }}</span> Đăng ký email mới</li>
        <li>
            <ul class="menu">
                @foreach (Newsletter::where('read', 0)->limit(5)->get() as $item)
                <li>
                    <a href="{{ route('newsletter.index') }}">
                        <div class="pull-left">
                            {{ Str::limit($item->email, 20) }}
                        </div>
                        <h4><small><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($item->created_at)->diffForhumans() }}</small></h4>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="{{ route('newsletter.index') }}">Xem tất cả</a></li>
    </ul> --}}
</li>