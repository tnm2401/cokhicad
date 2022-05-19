<ul {{ Hideshow::find(17)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu" data-widget="tree">
    <li
        class="treeview {{ Request::routeIs('backend.newcatone.*') ||
        Request::routeIs('backend.newcattwo.*') ||
        Request::routeIs('backend.post.*')
            ? 'menu-open active'
            : '' }}">
        <a href="#"><i class="fa fa-newspaper-o"></i> <span>{{ __('Bài viết') }}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu"
            style="{{ Request::routeIs('backend.newcatone.*') ? 'display:block' : '' }}">
            <li {{ Hideshow::find(18)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.newcatone.*') ? 'class=active' : '' }}><a
                    href="{{ route('backend.newcatone.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.post.cate1') }}</a></li>
            {{-- <li {{ Hideshow::find(19)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.newcattwo.*') ? 'class=active' : '' }}><a
                    href="{{ route('backend.newcattwo.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.post.cate2') }}</a></li> --}}
            <li {{ Hideshow::find(20)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.post.*') ? 'class=active' : '' }}><a
                    href="{{ route('backend.post.index') }}"><i class="fa fa-angle-right"></i>{{ __('Quản lí bài viết') }}</a></li>
        </ul>
    </li>
</ul>
