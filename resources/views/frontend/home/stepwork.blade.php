<section class="bg-grey">
    <div class="container ">
        <div class="row">
            <div class="work">
                <div style="width: 100%" class="main-title text-center title-header">
                    <h2 style="z-index: 1" class="star">{{ $data['step-work']->translations->name }}</h2>
                    <span>
                        <div style="background-color: #edf6ff;z-index: 2;" class="x"><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i></div>
                    </span>
                </div>
                <div class="row justify-content-center ">
                    <div class="col-md-9 mb-5">
                        <div class="description">
                           {!! $data['step-work']->translations->descriptions !!}
                        </div>
                    </div>
                </div>
                {!! $data['step-work']->translations->content !!}

            </div>
        </div>

    </div>
</section>
