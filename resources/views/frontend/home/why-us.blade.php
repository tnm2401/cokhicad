<section class="why-us-bg">
    <div class="container">
        <div class="why-us">
            <div class="row ">
                <div style="width: 100%" class="main-title text-center title-header">
                    <h2 style="z-index: 1 ; color: white; " class="star">{{ $data['why-us']->translations->name }}</h2>
                    <span>
                        <div style="background-color: #0363ef;z-index: 2;" class="x">
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
                        " class="img-fluid" alt="">
                    </div>
                </div>
                {!! $data['why-us']->translations->content !!}

                {{-- <div class="container mt-4 p-0">
                    <div class="row">
                        <div class="col-md-6 mb-3 col-lg-3 text-white">
                            <div class="border ">
                                <div class="row">
                                    <div class="col-3 pl-5">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="col-9">
                                        <span class="font-weight-bolder">UY TÍN LÀ HÀNG ĐẦU</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 col-lg-3 text-white">
                            <div class="border ">
                                <div class="row">
                                    <div class="col-3 pl-5">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="col-9">
                                        <span class="font-weight-bolder"> CHẤT LƯỢNG SẢN PHẨM LÀ TRỌNG TÂM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 col-lg-3 text-white">
                            <div class="border ">
                                <div class="row">
                                    <div class="col-3 pl-5">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="col-9">
                                        <span class="font-weight-bolder"> LỢI ÍCH KHÁCH HÀNG LÀ THEN CHỐT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 col-lg-3 text-white">
                            <div class="border ">
                                <div class="row">
                                    <div class="col-3 pl-5">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <div class="col-9">
                                        <span class="font-weight-bolder">PHỤC VỤ TẬN TÂM LÀ TRÁCH NHIỆM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

</section>
