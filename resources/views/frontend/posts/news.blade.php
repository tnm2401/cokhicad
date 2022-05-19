@extends("frontend.layout.master-layout-detail")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
            <nav aria-label="breadcrumb" style="margin-top: 88px">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->title }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
                    <li class="breadcrumb-item">{{ __('new') }}</li>
                </ol>
            </nav>
            <div class="main-title">
                <h1 class="heading text-center">{{ __('new') }}</h1>
            </div>
            @php
            if (!$posts->count() > 0){
                echo "<p class='text-danger text-center'>Nội dung đang cập nhật...</p>";
            }
            @endphp
            <section class="services posts">
                <div class="row">
                    @foreach($posts as $item)
                    <div class="col-md-6 mb-5">
                        <!-- Article -->
                        <div class="article animate delayed" data-transition="fadeInUp">
                            <div class="article-headline clearfix">
                                <div class="article-date">{{ date("d/m/Y", strtotime($item->updated_at)) }}</div>
                            </div>
                            <a href="{{route('frontend.dtpost.index',$item->slug)}}" title="{{ $item->{ 'name_'.$lang } }}">
                                <div class="img-main">
                                    <div class="img-main-over bg-white animate delayed on" data-transition="heightNone"></div>
                                    <div class="animate delayed" data-transition="imagePadd">
                                        <img width="568" height="330" class="img" src="{{ imageUrl('/storage/uploads/'.$item->img,'568','330','100','1') }}" alt="{{ $item->{ 'name_'.$lang } }}">
                                    </div>
                                </div>
                            </a>
                            <div class="article-info">
                                <div class="article-title">
                                    <h3 class="ellipsis_two_row">
                                    <a href="{{route('frontend.dtpost.index',$item->slug)}}" title="{{ $item->{ 'name_'.$lang } }}">{{ $item->{ 'name_'.$lang } }}</a>
                                    </h3>
                                </div>
                                <div class="article-more"><a href="{{route('frontend.dtpost.index',$item->slug)}}" title="{{ $item->{ 'name_'.$lang } }}">{{ __('view_more') }}</a></div>
                            </div>
                        </div>
                        <!-- / Article -->
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push("style")
@endpush
@push("script")
<script  type='text/javascript' src="{{asset('frontend')}}/bower_components/jquery/dist/jquery-migrate-3.3.2.js?ver=1.0"></script>
<script  type='text/javascript' src='{{asset('frontend')}}/assets/js/waypoints.min.js?ver=1.0'></script>
<script>
    $('.delayed').waypoint(function() {         
            $(this).waypoint('disable').removeClass('delayed').addClass('animated '+$(this).data('transition'));
            },{
            offset: '85%'
        });
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
                "caption": "{{ __('new') }}"
            },
            {
                "@type": ["WebPage", "CollectionPage"],
                "@id": "{{ URL::current() }}/#webpage",
                "url": "{{ URL::current() }}",
                "name": "{{ __('new') }}",
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
                    { "@type": "ListItem", "position": 2, "item": { "@type": "WebPage", "@id": "{{ URL::current() }}", "url": "{{ URL::current() }}", "name": "{{ __('new') }}" } }
                ]
            }
        ]
    }
</script>
@endpush