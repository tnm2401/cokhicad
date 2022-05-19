<ul {{ Hideshow::find(22)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu" data-widget="tree">
    <li
        class="treeview {{ $segment2 == 'slider' || $segment2 == 'partners' || $segment2 == 'other' || $segment2 == 'gallery' ? 'menu-open active': '' }}">
        <a href="#"><i class="fa fa-image"></i> <span>{{ __('admin.image') }}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu"
            style="{{Request::routeIs('backend.partner.*') || Request::routeIs('backend.slider.*') ? 'display:block' : '' }}">
            <li {{ Hideshow::find(23)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.slider.*') ? 'class=active' : '' }}><a
                    href="{{ route('backend.slider.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.image.slider') }}</a></li>
            <li {{ Hideshow::find(36)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.partner.*') ? 'class=active' : '' }}><a href="{{ route('backend.partner.index') }}"><i
                        class="fa fa-angle-right"></i>{{ __('admin.image.partner') }}</a></li>
            <li {{ $segment2 == 'gallery' ? 'class=active' : '' }}><a href="{{ route('backend.gallery.index') }}"><i
                        class="fa fa-angle-right"></i>{{ __('Thư viện ảnh') }}</a></li>
        </ul>
    </li>
</ul>
