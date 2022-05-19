@extends("frontend.layout.master-layout-detail")
@section("content")
@include('frontend.layout.background')
<div class="container">
    <div class="row mb-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
            <nav aria-label="breadcrumb" style="margin-top: 10px" id="chon-viec-ngay">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->title }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('recruitment') }}</li>
                </ol>
            </nav>
            <div class="main-title d-none">
                <h1 class="heading text-center">{{ __('recruitment') }}</h1>
            </div>
            <div>
                <div class="row no-gutters">
                    @foreach($recruitments as $item)
                    <div class="col-md-6 mb-3">
                        <div class="career__post">
                            <div class="row">
                                <div class="col-3 sol-sm-3 col-md-2">
                                    <div class="qty_item">
                                        <span class="quantity">{{ $item->quantity ? $item->quantity : 1 }}</span>
                                    </div>
                                </div>
                                <div class="col-9 sol-sm-9 col-md-10 d-flex align-items-center no-gutters">
                                    <span class="">{{ $item->{ 'name_'.$lang } }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right mb-3" style="line-height: 60px;">
                        <div class="career__post">
                            <div class="row">
                                <div class="col-6 sol-sm-9 col-md-9">
                                    <span>{{ __('date_expired') }}: {{ date("d/m/Y", strtotime($item->date_expired)) }}</span>
                                </div>
                                <div class="col-6 sol-sm-3 col-md-3" style="right: 15px;">
                                    <a href="/tuyen-dung/{{ $item->slug.'.html' }}" class="btn btn-item">{{ __('see_details') }} <i class="ti-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div id="chinh-sach" class="pb-5"></div>
            <div>
                {!! $careers->{ 'content_'.$lang } !!}
                <div class="nav_cus_style">
                    <ul class="nav nav-tabs-cus justify-content-center mb-4">
                        @foreach($careerposts as $key => $item)
                        <li class="nav-item nav-link">
                            <a href="#{{ $item->slug }}" data-toggle="tab">{{ $item->{ 'name_'.$lang } }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content" id="tabs">
                    @foreach($careerposts as $key => $item2)
                    <div class="tab-pane" id="{{ $item2->slug }}">
                        <div class="mb-4">
                            {!! $item2->{ 'content_'.$lang } !!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@push("style")
<style>
    html {
      scroll-behavior: smooth;
    }
</style>
@endpush
@push("script")
<script>
    function activaTab(tab){
        $('.nav-tabs-cus a[href="#' + tab + '"]').tab('show');
    };
    activaTab('{{ isset($careerpost->slug) ? $careerpost->slug : '' }}');
</script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph": [
            {
                "@type": "Organization",
                "@id": "{{ url('/#organization') }}",
                "name": "{{ $setting->{ 'nameindex_'.$lang } }}",
                "url": "{{ url('/') }}/",
                "sameAs": ["{{ $setting->facebook }}", "{{ $setting->twitter }}", "{{ $setting->youtube }}"],
                "logo": {
                    "@type": "ImageObject",
                    "@id": "{{ url('/#logo') }}",
                    "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                    "url": "{{ url('/storage/uploads/'.$setting->logoindex) }}",
                    "contentUrl": "{{ url('/storage/uploads/'.$setting->logoindex) }}",
                    "width": {{ list($width) = getimagesize(url('/storage/uploads/'.$setting->logoindex))[0] }},
                    "height": {{ list($height) = getimagesize(url('/storage/uploads/'.$setting->logoindex))[1] }},
                    "caption": "{{ $setting->{ 'nameindex_'.$lang } }}"
                },
                "image": { "@id": "{{ url('/#logo') }}" },
                "slogan": "{{ $setting->{ 'nameindex_'.$lang } }}",
                "description": "{{ $setting->{ 'description_'.$lang } }}",
                "legalName": "{{ $setting->{ 'nameindex_'.$lang } }}"
            },
            {
                "@type": "WebSite",
                "@id": "{{ url('/#website') }}",
                "url": "{{ url('/') }}/",
                "name": "{{ $setting->{ 'nameindex_'.$lang } }}",
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "description": "{{ $setting->{ 'description_'.$lang } }}",
                "publisher": { "@id": "{{ url('/#organization') }}" }
                "copyrightHolder": { "@id": "{{ url('/#organization') }}" }
            },
            {
                "@type": "ImageObject",
                "@id": "{{ URL::current() }}/#primaryimage",
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "url": "{{ url('/storage/uploads/'.$master['img']) }}",
                "contentUrl": "{{ url('/storage/uploads/'.$master['img']) }}",
                "width": {{ list($width) = getimagesize(url('/storage/uploads/'.$master['img']))[0] }},
                "height": {{ list($height) = getimagesize(url('/storage/uploads/'.$master['img']))[1] }},
                "caption": "{{ __('recruitment') }}"
            },
            {
                "@type": ["WebPage", "CollectionPage"],
                "@id": "{{ URL::current() }}/#webpage",
                "url": "{{ URL::current() }}",
                "name": "{{ __('recruitment') }}",
                "isPartOf": { "@id": "{{ url('/#website') }}" },
                "primaryImageOfPage": { "@id": "{{ URL::current() }}/#primaryimage" },
                "datePublished": "{{ $master['created_at'] }}",
                "dateModified": "{{ $master['updated_at'] }}",
                "description": "{{ $master['description'] }}",
                "breadcrumb": { "@id": "{{ URL::current() }}/#breadcrumb" },
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "potentialAction": [{ "@type": "ReadAction", "target": ["{{ URL::current() }}/"] }]
            },
            {
                "@type": "BreadcrumbList",
                "@id": "{{ URL::current() }}/#breadcrumb",
                "itemListElement": [
                    { "@type": "ListItem", "position": 1, "item": { "@type": "WebPage", "@id": "{{ url('/') }}/", "url": "{{ url('/') }}/", "name": "{{ __('home') }}" } },
                    { "@type": "ListItem", "position": 2, "item": { "@type": "WebPage", "@id": "{{ URL::current() }}", "url": "{{ URL::current() }}", "name": "{{ __('recruitment') }}" } }
                ]
            }
        ]
    }
</script>
@endpush