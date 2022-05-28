<section class="why-us-bg">
    <div class="container">
        <div class="why-us">
            <div class="row ">
                <div style="width: 100%" class="main-title text-center title-header">
                    <h2 style="z-index: 1 ; color: white; " class="star">{{ $data['why-us']->translations->name }}</h2>
                    <span>
                        <div style="background-color: #00437f;z-index: 2;" class="x">
                            <i class="fa-solid fa-star text-white"></i>
                            <i class="fa-solid fa-star text-white"></i>
                            <i class="fa-solid fa-star text-white"></i>
                        </div>
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                      {!! $data['why-us']->translations->descriptions !!}
                    </div>
                    <div class="col-lg-5 col-md-12 mt-3">
                        <img src="{{ imageUrl('/storage/uploads/pages/'.$data['why-us']->img,'440','','100','1') }}
                        " class="img-fluid" alt="{{ $data['why-us']->translations->title }}">
                    </div>
                </div>
                {!! $data['why-us']->translations->content !!}
            </div>
        </div>
    </div>

</section>
