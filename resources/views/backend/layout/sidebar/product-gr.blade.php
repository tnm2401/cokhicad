<ul {{ Hideshow::find(8)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu" data-widget="tree">
    <li class="treeview {{ Request::routeIs('backend.procatone.*') ||Request::routeIs('backend.procattwo.*') || Request::routeIs('backend.procatthree.*') || Request::routeIs('backend.product.*')? 'menu-open active': '' }}">
        <a href="#"><i class="fa-brands fa-product-hunt"></i> <span>&nbsp; {{ __('admin.product') }}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu" style="{{ Request::routeIs('backend.product.*') ? 'display:block' : '' }}">
        <li {{ Hideshow::find(9)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.procatone.*') ? 'class=active' : '' }}><a href="{{ route('backend.procatone.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.product.cate1') }}</a></li>
        <li {{ Hideshow::find(10)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.procattwo.*') ? 'class=active' : '' }}><a href="{{ route('backend.procattwo.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.product.cate2') }}</a></li>
        {{-- <li {{ Hideshow::find(11)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.procatthree.*') ? 'class=active' : '' }}><a href="{{ route('backend.procatthree.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.product.cate3') }}</a></li> --}}
        <li {{ Hideshow::find(12)->hide_show == 1 ? '' : 'hidden' }} {{ Request::routeIs('backend.product.*') ? 'class=active' : '' }}><a href="{{ route('backend.product.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.product.product') }}</a></li>
    </ul>
</li>
</ul>
