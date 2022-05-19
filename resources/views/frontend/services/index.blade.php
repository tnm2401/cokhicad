@extends("frontend.layout.master-layout-detail")
@section("content")
<section class="bg_services">
  <div class="row row_rs">
    <div class="main-content">
      <nav aria-label="breadcrumb" style="margin-top: 88px">
        <ol class="breadcrumb shadow-sm">
          <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ __('home') }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('frontend.all_service.index') }}" title="{{ __('service') }}">{{ __('service') }}</a></li>
          <li class="breadcrumb-item" aria-current="page">{{ $cat_service->{ 'name_'.$lang } }}</li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::current() }}" title="{{ $master['title'] }}">{{ $master['name'] }}</a></li>
        </ol>
      </nav>
      <article class="post mb-5">
        <div class="post-content" id="post_content">
          <h2 class="d-none">{{ $master['name'] }}</h2>
          <h3 class="d-none">{{ $master['name'] }}</h3>
          {{-- @if(is_null($service->video))
          <section class="services">
            <div>
              <div class="row">
                <div class="col-md-12">
                  <div class="info_service text-center">
                    <h2 class="mb-0">
                    {{ $cat_service->{ 'name_'.$lang } }}
                    </h2>
                    <h3 class="mb-0">
                    ({{ $master['name'] }})
                    </h3>
                  </div>
                  <div class="item_service item_detail">
                    <div class="row">
                      <div class="col-md-6">
                        {!! $service->{ 'content_'.$lang } !!}
                      </div>
                      <div class="col-md-6">
                        {!! $service->{ 'content1_'.$lang } !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="info_service main-title text-center">
                <h2 class="mb-0">
                <a href="{{ route('frontend.bimsvs.index') }}" class="ml-0" title="{{ __('our_bim_services') }}">{{ __('our_bim_services') }}</a>
                </h2>
              </div>
              <div class="row mb-5">
                @foreach($our_bim_services as $item)
                <div class="col-md-3 mb-4">
                  <div class="item_service item_service_cus">
                    <a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}" class="img" title="{{ $item->name }}">
                      <img src="{{ imageUrl('/storage/uploads/'.$item->img,'568','330','100','1') }}" alt="{{ $item->{ 'name_'.$lang } }}">
                    </a>
                    <div class="info_service">
                      <h3 class="ellipsis_two_row text-center">
                      <a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}">{{ $item->{ 'name_'.$lang } }}</a>
                      </h3>
                      <div class="row">
                        <div class="col-md-12 mb-3 text-justify ellipsis_three_row">
                          {!! $item->{ 'descriptions_'.$lang } !!}
                        </div>
                        <div class="col-md-12 text-center">
                          <div class="btn btn-sv"><a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}">{{ __('view_more') }} <i class="ti-arrow-right"></i></a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </section>
          @else
          <section class="services">
            <div class="row">
              <div class="col-md-12">
                <div class="item_service item_detail">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="p-0">
                        <h2 class="text-center mb-0">
                        {{ $cat_service->{ 'name_'.$lang } }}
                        </h2>
                        <h3 class="text-center mb-2">
                        ({{ $master['name'] }})
                        </h3>
                        <div class="mb-2">
                          {!! $service->{ 'content_'.$lang } !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $service->video_code }}?rel=0" allowfullscreen></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="info_service text-center">
              <h2 class="mb-0">
              <a href="{{ route('frontend.bimsvs.index') }}" class="ml-0" title="{{ __('our_bim_services') }}">{{ __('our_bim_services') }}</a>
              </h2>
            </div>
            <div class="row mb-5">
              @foreach($our_bim_services as $item)
              <div class="col-md-3 mb-4">
                <div class="item_service item_service_cus">
                  <a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}" class="img" title="{{ $item->name }}">
                    <img src="{{ imageUrl('/storage/uploads/'.$item->img,'568','330','100','1') }}" alt="{{ $item->{ 'name_'.$lang } }}">
                  </a>
                  <div class="info_service">
                    <h3 class="ellipsis_two_row text-center">
                    <a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}">{{ $item->{ 'name_'.$lang } }}</a>
                    </h3>
                    <div class="row">
                      <div class="col-md-12 mb-3 text-justify ellipsis_three_row">
                        {!! $item->{ 'descriptions_'.$lang } !!}
                      </div>
                      <div class="col-md-12 text-center">
                        <div class="btn btn-sv"><a href="{{ !$item->url ? '/dich-vu-bim/'.$item->slug.'.html' : $item->url }}">{{ __('view_more') }} <i class="ti-arrow-right"></i></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </section>
          @endif --}}
        </div>
      </article>
    </section>
@endsection
@push("style")
@endpush
@push("script")
<script>
$(function(){
   $("a img").each(function(){
        $(this).attr("title", $(this).find("img").attr("alt"));
   });
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
                "description": "{{ $setting->{ 'description_'.$lang } }}",
                "publisher": { "@id": "{{ url('/#organization') }}" },
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "copyrightHolder": { "@id": "{{ url('/#organization') }}" }
            },
            { "@type": "ImageObject", "@id": "{{ URL::current() }}/#primaryimage",
                "url": "{{ url('/storage/uploads/'.$master['img'] ) }}",
                "width": {{ list($width) = getimagesize(url('/storage/uploads/'.$master['img']))[0] }},
                "height": {{ list($height) = getimagesize(url('/storage/uploads/'.$master['img']))[1] }},
                "caption": "{{ $master['name'] }}"
            },
            {
                "@type": ["WebPage"],
                "@id": "{{ URL::current() }}/#webpage",
                "url": "{{ URL::current() }}",
                "name": "{{ $master['name'] }}",
                "isPartOf": { "@id": "{{ url('/#website') }}" },
                "primaryImageOfPage": { "@id": "{{ URL::current() }}/#primaryimage" },
                "datePublished": "{{ $master['created_at'] }}",
                "dateModified": "{{ $master['updated_at'] }}",
                "breadcrumb": { "@id": "{{ URL::current() }}/#breadcrumb" },
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "potentialAction": [{ "@type": "ReadAction", "target": ["{{ URL::current() }}"] }]
            },
            {
                "@type": "BreadcrumbList",
                "@id": "{{ URL::current() }}/#breadcrumb",
                "itemListElement": [
                    { "@type": "ListItem", "position": 1, "name": "{{ __('home') }}", "item": "{{ url('/') }}/" },
                    { "@type": "ListItem", "position": 2, "name": "{{ __('service') }}", "item": "{{ route('frontend.all_service.index') }}" },
                    { "@type": "ListItem", "position": 3, "name": "{{ $cat_service->{ 'name_'.$lang } }}", "item": "{{ url('/dich-vu/'.$cat_service->slug.'.html') }}" },
                    { "@type": "ListItem", "position": 4, "name": "{{ $master['name'] }}" }
                ]
            },
            {
                "@type": "Article",
                "@id": "{{ URL::current() }}/#article",
                "isPartOf": { "@id": "{{ URL::current() }}/#webpage" },
                "author": { "@id": "{{ route('frontend.author.index') }}", "name": "{{ $author->{ 'name_'.$lang } }}" },
                "headline": "{{ $master['name'] }}",
                "datePublished": "{{ $master['created_at'] }}",
                "dateModified": "{{ $master['updated_at'] }}",
                "mainEntityOfPage": { "@id": "{{ URL::current() }}/#webpage" },
                "publisher": { "@id": "{{ url('/#organization') }}" },
                "image": { "@id": "{{ URL::current() }}/#primaryimage" },
                "thumbnailUrl": "{{ url('/storage/uploads/'.$master['img'] ) }}",
                "keywords": "{{ $master['keywords'] }}",
                "inLanguage": "{{ $setting->{ 'locale_'.$lang } }}",
                "copyrightYear": "{{ Carbon::createFromFormat('Y-m-d H:i:s', $master['created_at'])->year }}",
                "copyrightHolder": { "@id": "{{ url('/#organization') }}" }
            },
            {
                "@type": ["Person"],
                "@id": "{{ route('frontend.author.index') }}",
                "name": "{{ $author->{ 'name_'.$lang } }}",
                "image": { "@type": "ImageObject", "@id": "{{ url('/#authorlogo') }}", "url": "{{ url('/storage/uploads/'.$author->img) }}", "caption": "{{ $author->{ 'name_'.$lang } }}" },
                "description": "{{ $author->{ 'description_'.$lang } }}",
                "sameAs": ["{{ url('/') }}/,{{ route('frontend.author.index') }}"]
            }
        ]
    }
</script>
@endpush