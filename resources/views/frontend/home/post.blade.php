<section class="bg-post">
    <div class="container">
        <div class="row">
            <div class="post-section">
                <div class="main-title text-center title-header">
                    <h2 class="star">{{ __('TIN TỨC') }}</h2>
                    <span>
                        <div class="x"><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                    </span>
                </div>
                <div class="row mt-2">
                    @foreach ($data['featured_post'] as $item)
                    <div class="col-md-4 col-6 mb-2">
                        <img src="{{ imageUrl('/storage/uploads/post/'.$item->img,'370','250','100','1') }}
                        " class="img-fluid" alt="">
                        <h3 class="name font-weight-bold text-uppercase">
                            <a href="{{ route('frontend.slug',$item->translations->slug) }}">
                            {{ $item->translations->name }}
                        </a>
                        </h3>
                        <div class="des">
                            {!! $item->translations->descriptions !!}
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 text-center mt-5">

                        <a class="btn btn-see-more" href="{{ route('frontend.slug',$menu['tat-ca-bai-viet']->translations->slug) }}">
                                 {{ __('XEM THÊM') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
