<ul {{ Hideshow::find(13)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu">
    <li class="{{ Request::routeIs('backend.tag.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('backend.tag.index') }}"><i class="fa-solid fa-tags"></i> <span>&nbsp; {{ __('admin.tag') }}</span>
        </a>
    </li>
</ul>
