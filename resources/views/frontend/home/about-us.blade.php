<div class="container">
    <div class="row about-us">
        <div class="col-md-7">
            <div>
                <div class="title">
                    {{ __('VỀ CHÚNG TÔI') }}
                </div>
                <div>
                    {!!  $data['about-us']->translations->descriptions !!}
                </div>

                <button class="btn text-white">{{ __('Xem thêm') }} <i class="fa-solid fa-right-long"></i></button>
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{ imageUrl('/storage/uploads/pages/'.$data['about-us']->img,'440','','100','1') }}
            " class="img-fluid" alt="">
        </div>
    </div>
</div>
