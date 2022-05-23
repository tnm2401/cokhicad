<ul class="sidebar-menu">
    <li class="{{ Request::routeIs('stepworks.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('backend.stepwork.index') }}"><i class="fa fa-qrcode"></i> <span>{{ __('Quy trình làm việc') }}</span>
        </a>
    </li>
</ul>
