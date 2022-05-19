<ul {{ Hideshow::find(5)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu">
    <li class="{{ Request::routeIs('feeship.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('feeship.index') }}"><i class="fa fa-truck"></i> <span>{{ __('admin.feeship') }}</span>
        </a>
    </li>
</ul>
