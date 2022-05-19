<ul {{ Hideshow::find(6)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu">
    <li class="{{ Request::routeIs('newsletter.*') ? 'menu-open active' : '' }}">
        <a href="{{ route('newsletter.index') }}"><i class="fa fa-at"></i> <span>{{ __('admin.newsletter') }}<span
                    class="label label-cus bg-yellow label-success-cus">
                    {{ Newsletter::where('read', 0)->count() }}</span>
        </a>
    </li>
</ul>
