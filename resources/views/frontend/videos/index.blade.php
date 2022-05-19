@extends("frontend.layout.master-layout")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
            <nav aria-label="breadcrumb" style="margin-top: 10px">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ __('home') }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
                    <li class="breadcrumb-item">Videos</li>
                </ol>
            </nav>
            <div class="main-title">
                <h1 class="heading text-center">Videos</h1>
            </div>
            @php
            if (!$videos->count()){
            echo "<p class='text-danger text-center'>Nội dung đang cập nhật...</p>";
            }
            @endphp
            <div class="row mb-5">
                @foreach($videos as $video)
                <div class="col-md-4 mb-4">
                    <a data-fancybox href="https://www.youtube.com/watch?v={{ $video->url_code }}" title="{{ __('view_video') }}">
                        <img src="http://i3.ytimg.com/vi/{{ $video->url_code }}/maxresdefault.jpg" class="mb-3" alt="{{ $video->{ 'name_'.$lang } }}" style="max-width: 100%; height: auto">
                    </a>
                    <div class="title__news mb-2 text-center">
                        <h3><a data-fancybox href="https://www.youtube.com/watch?v={{ $video->url_code }}" title="{{ __('view_video') }}">{{ $video->{ 'name_'.$lang } }}</a></h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center mb-4">
                {{ $videos->links('vendor.pagination.bootstrap-4') }}
            </ul>
        </nav>
    </div>
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
                "founder": { "@type": "Person", "name": "{{ auth()->user()->name }}", "url": "{{ route('frontend.author.index') }}", "sameAs": "{{ route('frontend.author.index') }}" },
                "foundingDate": "{{ Carbon::now() }}",
                "numberOfEmployees": 68,
                "slogan": "{{ $setting->{ 'nameindex_'.$lang } }}",
                "description": "{{ $setting->{ 'description_'.$lang } }}",
                "legalName": "{{ $setting->{ 'nameindex_'.$lang } }}"
            },
            {
                "@type": "WebSite",
                "@id": "{{ url('/#website') }}",
                "url": "{{ url('/') }}/",
                "name": "{{ $setting->{ 'nameindex_'.$lang } }}",
                "description": "{{ $setting->{ 'description_'.$lang } }}",
                "publisher": { "@id": "{{ url('/#organization') }}" },
                "potentialAction": [{ "@type": "SearchAction", "target": { "@type": "EntryPoint", "urlTemplate": "{{ url('/search.html?search={search_term_string}') }}" }, "query-input": "required name=search_term_string" }],
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "copyrightHolder": { "@id": "{{ url('/#organization') }}" }
            },
            {
                "@type": "CollectionPage",
                "@id": "{{ URL::current() }}#webpage",
                "url": "{{ URL::current() }}",
                "name": "{{ __('video') }}",
                "isPartOf": { "@id": "{{ url('/#website') }}" },
                "breadcrumb": { "@id": "{{ URL::current() }}/#breadcrumb" },
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "potentialAction": [{ "@type": "ReadAction", "target": ["{{ URL::current() }}"] }]
            },
            {
                "@type": "BreadcrumbList",
                "@id": "{{ URL::current() }}/#breadcrumb",
                "itemListElement": [
                    { "@type": "ListItem", "position": 1, "name": "{{ __('home') }}", "item": "{{ url('/') }}/" },
                    { "@type": "ListItem", "position": 2, "name": "{{ __('video') }}" }
                ]
            }
        ]
    }
</script>
@endpush