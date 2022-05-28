<div class="container">
    <div class="row about-us">
        <div class="col-md-7">
            <div>
                <div>
                    {!!  $data['about-us']->translations->descriptions !!}
                </div>
                <a class="btn text-white" href="{{ route('frontend.slug',$menu['gioi-thieu']->translations->slug) }}">{{ __('Xem thêm') }} <i class="fa-solid fa-right-long"></i></a>
            </div>
        </div>
        <div class="col-md-5">
            <img src="{{ imageUrl('/storage/uploads/pages/'.$data['about-us']->img,'440','','100','1') }}
            " class="img-fluid" alt="{{ $data['about-us']->translations->title }}" title="{{ $data['about-us']->translations->title }}">
        </div>
    </div>
</div>
