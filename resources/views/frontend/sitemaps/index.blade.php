@php print '<?xml version="1.0" encoding="UTF-8" ?>'; @endphp
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">


    <url>
    <loc>{{ route('frontend.home.index') }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/setting/{{ $setting->img }}</image:loc>
      <image:title>{{ $setting->translations->title }}</image:title>
      <image:caption>{{ $setting->translations->title }}</image:caption>
    </image:image>
  </url>


{{-- danh muc cap 1 --}}
@foreach ($data['procatone'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/procatones/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

@foreach ($data['procattwo'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/procattwos/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

@foreach ($data['product'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/products/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

@foreach ($data['newcatone'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/newcatone/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

@foreach ($data['post'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/post/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

@foreach ($data['page'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/page/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

@foreach ($data['videocat'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/videocats/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

{{-- @foreach ($data['video'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/videos/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach --}}

@foreach ($data['service'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/servis/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach

@foreach ($data['servicecate'] as $item)
<url>
    <loc>{{ route('frontend.slug',$item->translations->slug) }}</loc>
    <lastmod>{{ date("Y-m-d", strtotime($setting->updated_at)) }}</lastmod>
    <image:image>
      <image:loc>{{ route('frontend.home.index') }}/storage/uploads/svcategory/{{ $item->img }}</image:loc>
      <image:title>{{ $item->translations->title }}</image:title>
      <image:caption>{{ $item->translations->title }}</image:caption>
    </image:image>
  </url>
@endforeach
</urlset>
