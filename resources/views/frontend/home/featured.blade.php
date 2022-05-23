<section class=" featured-bg">
    <div class="container">
        <div class="row">
            <div class="featured">
                <div style="width: 100%" class="main-title text-center title-header">
                    <h2 style="z-index: 1" class="star">{{ __('SẢN PHẨM NỔI BẬT') }}</h2>
                    <span>
                        <div style="z-index: 2;" class="x"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    </span>
                </div>
                <div class="row mt-3">
                    @foreach ($data['featured-product'] as $item)
                    <div class="col-lg-3 col-md-6 col-6 mb-3">
                        <div class="box_product">
                            <a href="{{ route('frontend.slug',$item->translations->slug) }}">
                            <img src="{{ imageUrl('/storage/uploads/products/'.$item->img,'240','160','100','1') }}
                            " class="img-fluid" alt=""></a>
                            <h3 class="name">
                                <a href="{{ route('frontend.slug',$item->translations->slug) }}">{{ $item->translations->name }}</a>
                            </h3>
                            <div class="description">
                               {!! $item->translations->descriptions ?? '' !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
