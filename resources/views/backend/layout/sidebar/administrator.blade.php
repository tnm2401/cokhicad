
        <ul {{ Hideshow::find(29)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu" data-widget="tree">

            <li
                class="treeview {{ $segment2 == 'config' ||Request::routeIs('backend.language.*') ||Request::routeIs('sources.*') ||Request::routeIs('backend.hideshow.*')? 'menu-open active': '' }}">
                <a href="#"><i class="fa fa-user-secret"></i> <span>{{ __('admin.manager') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="{{ Request::routeIs('backend.role.*') ? 'display:block' : '' }}">
                    <li {{ Hideshow::find(30)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('role.*') ? 'class=active' : '' }}><a
                            href="{{ route('role.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.groups.roles') }}</a>
                    </li>
                    <li {{ Hideshow::find(31)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.user.*') ? 'class=active' : '' }}><a
                            href="{{ route('backend.user.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.administrator') }}</a></li>
                    <li {{ Hideshow::find(32)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('sources.index') ? 'class=active' : '' }}><a
                            href="{{ route('sources.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.source.mod') }}</a>
                    </li>
                    <li {{ Hideshow::find(33)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.language.*') ? 'class=active' : '' }}><a
                            href="{{ route('backend.language.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.lang') }}</a></li>
                    <li {{ Hideshow::find(34)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.hideshow.*') ? 'class=active' : '' }}><a
                            href="{{ route('backend.hideshow.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.hideshow.menu') }}</a></li>
                    <li {{ Hideshow::find(34)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.thumb.*') ? 'class=active' : '' }}><a
                        href="{{ route('backend.thumb.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.sizecrop') }}</a></li>
                </ul>
            </li>
        </ul>
