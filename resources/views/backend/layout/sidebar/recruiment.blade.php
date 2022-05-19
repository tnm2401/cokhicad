<ul {{ Hideshow::find(21)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu">
    <li class="{{ Request::routeIs('backend.recruitment.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('backend.recruitment.index') }}"><i class="fa fa-user-plus"></i> <span>{{ __('admin.recruit') }}</span>
        </a>
    </li>
</ul>
