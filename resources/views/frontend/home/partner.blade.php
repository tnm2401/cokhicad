<section>
    <div class="container bg-partner">
        <div class="row">
            <div style="width: 100%" class="main-title text-center title-header">
                <h2 class="star">{{ __('ĐỐI TÁC CỦA CAD') }}</h2>
                <span>
                    <div class="x"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                            class="fa-solid fa-star"></i></div>
                </span>
            </div>
        </div>
    </div>
    <div class="slider-partner">
        <div class="container">
            <div class="row multiple-items">
                @foreach ($data['partner'] as $item)
                <div class="col-md-3">
                    <img style="box-shadow: none" src="{{ imageUrl('/storage/uploads/partner/'.$item->img,'300','','100','1') }}
                    " class="img-fluid" alt="{{ __('Đối tác') }}">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
