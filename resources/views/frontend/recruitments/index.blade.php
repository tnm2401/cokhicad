@extends("frontend.layout.master-layout-detail")
@section("content")
<div class="container" >
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
      <nav aria-label="breadcrumb" style="margin-top: 88px">
        <ol class="breadcrumb shadow-sm">
          <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->{ 'title_'.$lang } }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
          <li class="breadcrumb-item"><a href="{{ route('frontend.all_recruitment.index') }}" title="{{ __('recruitment') }}">{{ __('recruitment') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page" title="{{ $recruitment->{ 'title_'.$lang } }}"><a href="{{ URL::current() }}" title="{{ $recruitment->{ 'name_'.$lang } }}">{{ $recruitment->{ 'name_'.$lang } }}</a></li>
        </ol>
      </nav>
      <blog class="card post">
      <div class="post-content shadow-sm" id="post_content">
        <div class="main-title text-center">
          <h1>
            <a href="{{ URL::current() }}" title="{{ $recruitment->{ 'name_'.$lang } }}" style="font-weight: bold;">{{ $recruitment->{ 'name_'.$lang } }}</a>
          </h1>
        </div>
        <h2 class="d-none">{{ $recruitment->{ 'name_'.$lang } }}</h2>
        <h3 class="d-none">{{ $recruitment->{ 'name_'.$lang } }}</h3>
        <div class="alert alert-success">
          <div class="row">
            <div class="col-md-6">
              <p><i class="ti-angle-right"></i> {{ __('quantity') }}: <b>{{ $recruitment->quantity ? $recruitment->quantity : 1 }}</b></p>
              <p class="mb-0"><i class="ti-angle-right"></i> {{ __('date_expired') }}: <b>{{ date("d/m/Y", strtotime($recruitment->date_expired)) }}</b></p>
            </div>
            <div class="col-md-6 text-right" style="line-height: 57px;">
              <button type="button" class="btn btn-item" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">{{ __('apply') }}</button>
            </div>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">{{ __('apply') }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('backend.apply.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                  @csrf
                  @if ($errors->any())
                  <div id="error_apply" class="alert alert-danger" style="display: none">
                    <ul style="padding-left: 0px;">
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  <div class="modal-body">
                    <input type="hidden" name="type" id="type" value="apply">
                    <input type="hidden" name="read" id="read" value="0">
                    <input type="hidden" name="stt" id="stt" value="1">
                    <input type="hidden" name="apply" id="apply" value="{{ $recruitment->name_vi }}">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="{{ __('name') }}">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" placeholder="{{ __('address') }}">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="{{ __('phone_number') }}">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label>{{ __('attach') }}</label>
                      <input type="file" class="form-control" name="cv" id="cv" />
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="apply_note" id="apply_note" placeholder="{{ __('note') }}" rows="6">{{ old('apply_note') }}</textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" id="send_apply" class="col btn btn-custom btn__re" value="{{ __('sent') }}"/>
                    <button type="button" class="btn btn-danger btn__close" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        {!! $recruitment->{ 'content_'.$lang } !!}
        <div class="main-title mb-4">
          <h3 class="text-center">{{ __('other_recruitment') }}</h3>
        </div>
        <div class="row mb-5 no-gutters">
          @foreach($recruitment_related as $item)
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
                  <a href="/tuyen-dung/{{ $item->slug.'.html' }}" class="btn btn-item">{{ __('see_details') }}</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      </blog>
@endsection
@push("style")
@endpush
@push("script")
<script>
  var has_errors = {{ $errors->count() > 0 ? 'true' : 'false' }};
  if (has_errors) {
    Swal.fire({
      title: '{{ __('error') }}...!',
      icon: 'error',
      html: jQuery('#error_apply').html(),
      showCloseButton: true,
    });
  }
</script>
<script>
  $('#post_content p a').attr('title', '{{ $recruitment->{ 'title_'.$lang } }}');
  $('#post_content p a img').attr('title', '{{ $recruitment->{ 'title_'.$lang } }}');
  $('#post_content p a img').attr('alt', '{{ $recruitment->{ 'name_'.$lang } }}');
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
                    { "@type": "ListItem", "position": 2, "name": "{{ __('recruitment') }}", "item": "{{ route('frontend.all_recruitment.index') }}" },
                    { "@type": "ListItem", "position": 3, "name": "{{ $master['name'] }}" }
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