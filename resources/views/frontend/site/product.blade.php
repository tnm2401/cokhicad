@extends('frontend.layout.master-layout')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" style="margin-top: 10px">
            <ol class="breadcrumb shadow-sm">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" title=""><i class="ti-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ route('frontend.slug', $menu['tat-ca-san-pham']->translations->slug) }}">Sản phẩm</a></li>
                <li class="breadcrumb-item  {{ $product->procatone ? '' : 'd-none' }}"><a href="{{ route('frontend.slug',$product->procatone->translations->slug ?? '') }}">{{ $product->procatone->translations->name ?? '' }}</a></li>
                <li class="breadcrumb-item  {{ $product->procattwo ? '' : 'd-none' }}"><a href="{{ route('frontend.slug',$product->procattwo->translations->slug ?? '') }}">{{ $product->procattwo->translations->name ?? '' }}</a></li>
                <li class="breadcrumb-item ">{{ $product->translations->name }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                <article class="card post">
                    <div id="post_content" style="padding: 20px">
                        <div class="main-title text-center">
                            <h1 class="title font-weight-bold">{{ $product->translations->name }}</h1>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                <div class="app-figure" id="zoom-fig">
                                    <a id="Zoom-1" class="MagicZoom" title="{{ $product->translations->title }}"
                                        href="{{ imageUrl('/storage/uploads/products/' . $product->img, '440', '', '100', '1') }}">
                                        <img src="{{ imageUrl('/storage/uploads/products/' . $product->img, '440', '', '100', '1') }}" srcset="{{ imageUrl('/storage/uploads/products/' . $product->img, '800', '', '100', '1') }}" alt="{{ $product->translations->name }}" style="border: 1px solid rgb(0 68 127) !important" />
                                    </a>
                                    <div class="selectors">
                                        @foreach ($product->images as $item)
                                            <a data-zoom-id="Zoom-1"
                                                href="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '500', '400', '100', '1') }}" data-image="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '1000', '800', '100', '1') }}">
                                                <img srcset="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '60', '60', '100', '1') }}" src="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '60', '60', '100', '1') }}" />
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="product-price mb-2">
                                    <b>Giá:</b> <b class="text-danger">{{ $product->selling_price == 0 ? 'Liên hệ' : number_format($product->selling_price).'₫' }}</b>
                                </div>
                                <div class="product-description mb-4">
                                    {!! $product->translations->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="related_product">
                <div class="main-title text-center">
                    <h2 class="title font-weight-bold mb-4">
                        Sản phẩm cùng danh mục
                    </h2>
                </div>
                <div class="row">
                @foreach ($relatedproduct as $item)
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <a href="{{ route('frontend.slug',$item->translations->slug) }}" title="{{ $item->translations->name }}">
                        <div class="hover15">
                            <figure><img src="{{ imageUrl('/storage/uploads/products/' . $item->img, '247', '247', '100', '1') }}" alt="{{ $item->translations->name }}"></figure>
                        </div>
                    </a>
                    <div class="card-body">
                        <h3 class="text-center title_pro"><a href="{{ route('frontend.slug',$item->translations->slug) }}" title="{{ $item->translations->name }}">{{ $item->translations->name }}</a></h3>
                        <p class="card-price text-center mb-3">
                            <b>Giá:</b> <b class="text-danger">{{ $item->selling_price == 0 ? 'Liên hệ' : number_format($product->selling_price).'₫' }}</b>
                        </p>
                    </div>
                </div>
                @endforeach
                </div>
            <nav style="margin: 0 auto;">
                <ul class="pagination justify-content-center mb-4">
                </ul>
            </nav>
        </div>
    </div>
@endsection
{{-- @push('script')
<script>
    jQuery('.zoom-gallery .selectors a').on('click touchend', function(e) {
        var iframe = jQuery('.active iframe[src*="youtube"],.active iframe[src*="vimeo"]');
        if (iframe.length) {
            iframe.attr('src',iframe.attr('src'));
        }
        jQuery('.zoom-gallery .zoom-gallery-slide').removeClass('active');
        jQuery('.zoom-gallery .selectors a').removeClass('active');
        jQuery('.zoom-gallery .zoom-gallery-slide[data-slide-id="'+jQuery(this).attr('data-slide-id')+'"]').addClass('active');
        jQuery(this).addClass('active');
        e.preventDefault();
    });
</script>
@endpush --}}
@push('style')
    <style type="text/css">
        .selectors {
            margin-top: 20px;
            text-align: center;
        }
    </style>
@endpush