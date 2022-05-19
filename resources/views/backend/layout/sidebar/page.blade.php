<ul {{ Hideshow::find(2)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu ">
    <li class="{{ Request::routeIs('backend.page.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('backend.page.index') }}"><i class="fa fa-file-text"></i> <span>{{ __('Nội dung & Trang tĩnh') }}</span>
        </a>
    </li>
</ul>
