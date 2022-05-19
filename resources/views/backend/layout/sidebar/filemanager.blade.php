<ul {{ Hideshow::find(37)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu">
    <li class="{{ Request::routeIs('file_manager.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('file_manager') }}"><i class="fa fa-solid fa-folders"></i> <span>Quản lý tệp tin</span>
        </a>
    </li>
</ul>
