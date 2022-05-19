<ul {{ Hideshow::find(28)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu">
    <li class="treeview {{ $segment2 == 'settings' ? 'menu-open active' : '' }}">
        <a href="{{ route('frontend.home.index') }}/administrator/settings/edit"><i
                class="fa fa-gears"></i> <span>{{ __('admin.config') }}</span>
        </a>
</ul>
