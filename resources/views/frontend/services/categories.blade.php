@extends("frontend.layout.master-layout-detail")
@section("content")
<div class="row row_rs">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
        <nav aria-label="breadcrumb" style="margin-top: 88px">
            <ol class="breadcrumb shadow-sm">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->{ 'title_'.$lang } }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.all_service.index') }}" title="{{ __('service') }}">{{ __('service') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::current() }}" title="{{ $svcategory->{ 'name_'.$lang } }}">{{ $svcategory->{ 'name_'.$lang } }}</a>
            </li>
        </ol>
    </nav>
    <h1 class="d-none">{{ $svcategory->{ 'name_'.$lang } }}</h1>
    <section class="services">
        <h2 class="ml-0">{{ $svcategory->{ 'name_'.$lang } }}</h2>
        @if (!$services->count())
        <div class="alert alert-info text-center">{{ 'Nội dung đang cập nhật ...!' }}</div>
        @endif
        <div class="row">
            @foreach($services as $item)
            <div class="col-md-3">
                <div class="item_service">
                    <a href="/{{ $item->slug.'.html' }}" class="img" title="{{ $item->name }}">
                        <img src="{{ imageUrl('/storage/uploads/'.$item->img,'568','330','100','1') }}" alt="{{ $item->{ 'name_'.$lang } }}">
                    </a>
                    <div class="info_service">
                        <div>
                            <h3 class="ellipsis_two_row">
                            <a href="/{{ $item->slug.'.html' }}">{{ $item->{ 'name_'.$lang } }}</a>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3 text-justify ellipsis_three_row">
                                {!! $item->{ 'descriptions_'.$lang } !!}
                            </div>
                            <div class="col-md-12 text-center d-flex justify-content-end">
                                <div class="btn btn-ser"><a href="/{{ $item->slug.'.html' }}">{{ __('view_more') }}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="info_service pl-0">
            <h2 class="mb-0">
            <a href="{{ route('frontend.bimsvs.index') }}" class="ml-0">{{ __('our_bim_services') }}</a>
            </h2>
        </div>
        <div class="row mb-5">
            @foreach($our_bim_services as $item)
            <div class="col-md-3 mb-4">
                <div class="item_service">
                    <a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}" class="img" title="{{ $item->name }}">
                        <img src="{{ imageUrl('/storage/uploads/'.$item->img,'568','330','100','1') }}" alt="{{ $item->{ 'name_'.$lang } }}">
                    </a>
                    <div class="info_service">
                        <h3 class="ellipsis_two_row">
                        <a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}">{{ $item->{ 'name_'.$lang } }}</a>
                        </h3>
                        <div class="row">
                            <div class="col-md-12 mb-3 text-justify ellipsis_three_row">
                                {!! $item->{ 'descriptions_'.$lang } !!}
                            </div>
                            <div class="col-md-12 text-center d-flex justify-content-end">
                                <div class="btn btn-ser"><a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}">{{ __('view_more') }}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
@push("style")
@endpush
@push("script")
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
                "@type": ["WebPage", "CollectionPage"],
                "@id": "{{ URL::current() }}/#webpage",
                "url": "{{ URL::current() }}",
                "name": "{{ $master['name'] }}",
                "isPartOf": { "@id": "{{ url('/#website') }}" },
                "primaryImageOfPage": { "@id": "{{ URL::current() }}/#primaryimage" },
                "datePublished": "{{ $master['created_at'] }}",
                "dateModified": "{{ $master['updated_at'] }}",
                "description": "{{ $master['name'] }}",
                "breadcrumb": { "@id": "{{ URL::current() }}/#breadcrumb" },
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "potentialAction": [{ "@type": "ReadAction", "target": ["{{ URL::current() }}/"] }]
            },
            {
                "@type": "BreadcrumbList",
                "@id": "{{ URL::current() }}/#breadcrumb",
                "itemListElement": [
                    { "@type": "ListItem", "position": 1, "item": { "@type": "WebPage", "@id": "{{ url('/') }}/", "url": "{{ url('/') }}/", "name": "{{ __('home') }}" } },
                    { "@type": "ListItem", "position": 2, "item": { "@type": "WebPage", "@id": "{{ route('frontend.all_service.index') }}", "url": "{{ url('/') }}/", "name": "{{ __('service') }}" } },
                    { "@type": "ListItem", "position": 3, "item": { "@type": "WebPage", "@id": "{{ URL::current() }}", "url": "{{ URL::current() }}", "name": "{{ $master['name'] }}" } }
                ]
            }
        ]
    }
</script>
@endpush