<aside class="main-sidebar">
    <section class="sidebar">
        @php
        $segment1 = Request::segment(1);
        $segment2 = Request::segment(2);
        $segment3 = Request::segment(3);
        @endphp
        @include('backend.layout.sidebar.dashboard')
        @if (hasRole('static_page_all'))@include('backend.layout.sidebar.page')@endif
        {{-- @if (hasRole('billing_all'))@include('backend.layout.sidebar.cart')@endif --}}
        {{-- @if (hasRole('counpon_all'))@include('backend.layout.sidebar.coupon')@endif --}}
        {{-- @if (hasRole('feeship_all'))@include('backend.layout.sidebar.feeship')@endif --}}
        {{-- @if (hasRole('mailletter_all'))@include('backend.layout.sidebar.newsletter')@endif --}}
        @if (hasRole('contactletter_all'))@include('backend.layout.sidebar.contactform')@endif
        @if (hasRole('product_all'))@include('backend.layout.sidebar.product-gr')@endif
        @if (hasRole('tag_all'))@include('backend.layout.sidebar.tag')@endif
        @include('backend.layout.sidebar.services-gr')
        @if (hasRole('post_all'))@include('backend.layout.sidebar.news-gr')@endif
        @if (hasRole('recruit_all'))@include('backend.layout.sidebar.recruiment')@endif
        @if (hasRole('slider_all'))@include('backend.layout.sidebar.image-gr')@endif
        @if (hasRole('media_all'))@include('backend.layout.sidebar.media-gr')@endif
        {{-- @if (hasRole('filemanager'))@include('backend.layout.sidebar.filemanager')@endif --}}
        @if (hasRole('webconfig_all'))@include('backend.layout.sidebar.configweb')@endif
        {{-- @if (hasRole('admin_all'))@include('backend.layout.sidebar.administrator')@endif --}}
    </section>
</aside>
