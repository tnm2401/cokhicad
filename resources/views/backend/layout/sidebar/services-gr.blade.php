<ul {{ Hideshow::find(14)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu" data-widget="tree">
    <li class="treeview {{ Request::routeIs('backend.svcategory.*') ? 'menu-open active' : '' }}">
        <a href="#"><i class="fa fa-check-circle"></i> <span>{{ __('admin.service') }}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="{{ $segment2 == 'servis' ? 'display:block' : '' }}">
            <li {{ Hideshow::find(15)->hide_show == 1 ? '' : 'hidden' }} {{ $segment2 == 'svcategories' ? 'class=active' : '' }}><a
                    href="{{ route('backend.svcategory.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.service.cate') }}</a></li>
            <li {{ Hideshow::find(16)->hide_show == 1 ? '' : 'hidden' }} {{ $segment2 == 'servis' ? 'class=active' : '' }}><a
                    href="{{ route('backend.servi.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.service.service') }}</a></li>
        </ul>
    </li>
</ul>
