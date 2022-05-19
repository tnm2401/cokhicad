@extends("frontend.layout.master-layout-detail")
@section("content")
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 main-content">
      <nav aria-label="breadcrumb" style="margin-top: 88px">
        <ol class="breadcrumb shadow-sm">
          <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->title }}"><i class="ti-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('author') }}
          </li>
        </ol>
      </nav>
      <div class="card card-radius mb-5">
        <div class="post-content shadow" id="post_content">
          <h1 class="heading d-none">{{ __('author') }}</h1>
          <h2 class="heading d-none">{{ __('author') }}</h2>
          <h3 class="heading d-none">{{ __('author') }}</h3>
          <div class="row">
            @if($authors->hide_show == 1)
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
              <img class="img-fluid" src="/storage/uploads/{{ $authors->img }}" alt="{{ $authors->{'name_'.$lang} }}" title="{{ $authors->{'name_'.$lang} }}">
            </div>
            <div class="col-sm-6 col-md-8 col-lg-8 col-xl-8">
              <h3 class="text-danger text-bold" style="margin: 0;font-weight: bold;">{{ $authors->{'name_'.$lang} }}</h3>
              <p style="margin-top: 6px;">{{ $setting->website }}</p>
              {!! $authors->{'content_'.$lang} !!}
            </div>
            @endif
          </div>
        </div>
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
                "@type": "WebPage",
                "@id": "{{ URL::current() }}/#webpage",
                "url": "{{ URL::current() }}",
                "name": "{{ $authors->{'name_'.$lang} }}",
                "isPartOf": { "@id": "{{ URL::current() }}" },
                "datePublished": "{{ $authors->published }}",
                "dateModified": "{{ $authors->updated_at }}",
                "breadcrumb": { "@id": "{{ URL::current() }}/#breadcrumb" },
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "potentialAction": [{ "@type": "ReadAction", "target": ["{{ URL::current() }}"] }]
            },
            {
                "@type": "BreadcrumbList",
                "@id": "{{ URL::current() }}/#breadcrumb",
                "itemListElement": [
                    { "@type": "ListItem", "position": 1, "name": "{{ __('home') }}", "item": "{{ url('/') }}/" },
                    { "@type": "ListItem", "position": 2, "name": "{{ $authors->{'name_'.$lang} }}" }
                ]
            }
        ]
    }
</script>
@endpush