@extends('frontend.layout.master-layout')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" style="margin-top: 10px">
            <ol class="breadcrumb shadow-sm">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" title=""><i class="ti-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{ $menu['tat-ca-san-pham']->translations->slug ?? '' }}">Sản phẩm</a></li>
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
                                        href="{{ imageUrl('/storage/uploads/products/' . $product->img, '440', '', '100', '1') }}
                                                ">
                                        <img src="{{ imageUrl('/storage/uploads/products/' . $product->img, '440', '', '100', '1') }}"
                                            srcset="{{ imageUrl('/storage/uploads/products/' . $product->img, '800', '', '100', '1') }}"
                                            alt="" />
                                    </a>
                                    <div class="selectors">
                                        @foreach ($product->images as $item)
                                            <a data-zoom-id="Zoom-1"
                                                href="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '500', '400', '100', '1') }}"
                                                data-image="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '1000', '800', '100', '1') }}">
                                                <img srcset="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '60', '60', '100', '1') }}"
                                                    src="{{ imageUrl('/storage/uploads/products/' . $item->imgs, '60', '60', '100', '1') }}" />
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="product-price mb-2">
                                    <b>Giá:</b> {{ number_format($product->selling_price) }} đ
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
        <div class="row">
            <div class="col-md-12">
                <div class="main-title text-center">
                    <h2 class="title font-weight-bold">
                        Sản phẩm cùng danh mục
                    </h2>
                </div>
                @foreach ($relatedproduct as $item)
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 mb-4">
                    <div class="">
                        <a href="{{ route('frontend.slug',$item->translations->slug) }}" title="{{ $item->translations->name }}">
                            <div class="hover15">
                                <figure><img class="card-img-top"
                                        src="https://phunsuongtc.com/frontend/thumb/placeholder-278x278.png"
                                        alt="{{ $item->translations->name }}"></figure>
                            </div>
                        </a>
                        <div class="card-body">

                            <h3 class="text-center title_pro "><a
                                    href="{{ route('frontend.slug',$item->translations->slug) }}" title="{{ $item->translations->name }}">{{ $item->translations->name }}</a></h3>
                            <p class="card-price text-center mb-3">
                                {{ number_format($item->selling_price) }} đ
                            </p>




                        </div>
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
