<ul {{ Hideshow::find(25)->hide_show == 1 ? '' : 'hidden' }} class="sidebar-menu" data-widget="tree">
    <li class="treeview {{ $segment2 == 'videos' || $segment2 == 'videocats' ? 'menu-open active' : '' }}">
        <a href="#"><i class="fa-brands fa-youtube"></i> <span>&nbsp;{{ __('admin.media') }}</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu"
            style="{{ $segment2 == 'videos' || $segment2 == 'videocats' ? 'display:block' : '' }}">
            {{-- <li {{ Hideshow::find(26)->hide_show == 1 ? '' : 'hidden' }} {{ $segment2 == 'videocats' ? 'class=active' : '' }}><a
                    href="{{ route('backend.videocat.index') }}"><i class="fa fa-angle-right"></i>{{ __('admin.media.cate') }}</a></li> --}}
            <li {{ Hideshow::find(27)->hide_show == 1 ? '' : 'hidden' }} {{ $segment2 == 'videos' ? 'class=active' : '' }}><a href="{{ route('video.index') }}"><i
                        class="fa fa-angle-right"></i>{{ __('admin.media.media') }}</a></li>
        </ul>
    </li>
</ul>
