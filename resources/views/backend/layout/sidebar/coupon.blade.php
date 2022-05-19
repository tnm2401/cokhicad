<ul {{ Hideshow::find(4)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu">
    <li class="{{ Request::routeIs('coupon.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('coupon.index') }}"><i class="fa fa-qrcode"></i> <span>{{ __('admin.coupon') }}</span>
        </a>
    </li>
</ul>
