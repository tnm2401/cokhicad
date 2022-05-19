
    <section class="bg-white-gallery">
        <div class="container">
            <div class="row">
                <div class="gallery">
                    <div class="main-title text-center title-header">
                        <h2 class="star">{{ __('HÌNH ẢNH NHÀ XƯỞNG') }}</h2>
                        <span>
                            <div class="x"><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
                        </span>
                    </div>
                    <div class="row multiple-items-gallery">
                        @foreach ($data['gallery']  as $item)
                        <div class="col-md-3 mt-2">
                            <img src="{{ imageUrl('/storage/uploads/gallery/'.$item->imgs,'440','297','100','1') }}
                            " alt="" class="img-fluid">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
