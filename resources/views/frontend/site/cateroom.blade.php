@extends('frontend.layout.master')
@section('content')
    <main>

        <div class="banner_share">
            <img src="{{ asset('frontend') }}/assets/img/Classic (1).jpg" alt="">
            <div class="container">
                <div class="title">
                    <h2>{{ $cateroom->translations->name }}</h2>

                </div>
            </div>
        </div>
        <div class="banner-detail-rooms">

            <div class="container">


                <div class="banner">
                    <div class="owl-carousel owl-theme owl-loaded owl-drag" id="sliderBanner">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-7620px, 0px, 0px); transition: all 0.25s ease 0s; width: 15240px;">
                                @foreach ($cateroom->images as $item)
                                    <div class="owl-item " style="width: 680px;">
                                        <div class="item">
                                            <div class="banner__item">
                                                <div class="banner__img">
                                                    <img src="{{ asset('storage') }}/uploads/cateroom/{{ $item->imgs }}"
                                                        alt="{{ $cateroom->translations->name }}">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                class="owl-next"><span aria-label="Next">›</span></button></div>


                    </div>
                </div>

            </div>

        </div>
        <section class="cards-about details-rooms">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="content">
                            <div class="title text-center">
                                <h2>{{ __('Tổng quan phòng') }}</h2>
                            </div>
                            <div style="overflow: auto; height:300px">
                                {!! $cateroom->translations->descriptions !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="room-pages py-100">
            <div class="container">
                <div class="section-header">
                    <h2 class="title">
                        <span>{{ __('Danh sách phòng') }}</span>
                    </h2>
                    <p></p>
                </div>
                <!-- row-1 -->
                <div class="row">
                    @foreach ($room as $r)
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                            <div class="wrap-room-pages-contents ">
                                <div class="room-pages-image">
                                    <img src=" {{ imageUrl('/storage/uploads/'.$r->code.'/'.$r->img,'600','300','100','1') }}"
                                        alt="{{ $cateroom->translations->name }}" loading="lazy">
                                    <div class="room-pages-home__link">


                                        <button type="button" class="book-room-now" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            <a onclick="return false;" href="#">{{ __('Kiểm tra') }}</a>
                                        </button>

                                    </div>
                                </div>
                                <!--  -->
                                <div class="room-pages-contents">
                                    <div class="room-pages-contents__desc">
                                        <span>{{ $cateroom->translations->name }} - {{ $r->code }}</span>
                                    </div>
                                    @if ($cateroom->discount > 0)
                                        <s><i>{{ number_format($cateroom->price) }} đ</i></s>
                                    @endif
                                    <div class="room-pages-contents__title">
                                        <h3>
                                            @if ($cateroom->discount <= 0)
                                                <span>{{ number_format($cateroom->price) }} đ /
                                                    {{ __('Đêm') }}</span>
                                            @else
                                                <span>{{ number_format($cateroom->selling_price) }} đ /
                                                    {{ __('Đêm') }}</span>
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="room-pages-contents__desc">
                                        {!! $r->translations->descriptions !!}

                                    </div>
                                    <p>{{ $r->bed }} {{ __('Giường') }} - {{ $r->person }} {{ __('Người') }}</p>
                                    <!-- star-rating -->
                                    <div class="room__rate ">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </div>

                    @endforeach



                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('KIỂM TRA TÌNH TRẠNG PHÒNG') }}</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('frontend.checking.index') }}">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <span class="form-label">{{ __('Ngày đến') }} <i
                                                    class="fa-solid fa-plane-arrival"></i></span>
                                                    @if(session('checking'))
                                            <input type="date"  name="from_date" class="form-control" type="text"
                                                value="{{ date('d-m-Y', strtotime(session('checking')['from_date'])) }}"
                                                required>
                                                @else
                                                  <input type="date"  name="from_date" class="form-control" type="text"
                                                  value="{{ now()->format('d-m-Y') }}"
                                                  required>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="form-label">{{ __('Ngày đi') }} <i
                                                    class="fa-solid fa-plane-departure"></i></span>
                                                    @if(session('checking'))
                                            <input type="date" name="to_date" class="form-control" type="text"
                                                value="{{ date('d-m-Y', strtotime(session('checking')['to_date'])) }}"
                                                required>
                                                @else
                                                  <input type="date"  name="to_date" class="form-control" type="text"
                                                  value="{{ now()->addDays(2)->format('d-m-Y') }}"
                                                  required>
                                                @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <span class="form-label">{{ __('Số phòng') }} </span>
                                            <select class="form-control" name="room">
                                                <option value="1">{{ __('Một phòng') }}</option>
                                                <option value="2">{{ __('Nhiều phòng') }}</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div> --}}
                                </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button> --}}
                            <button type="submit" style="border: none" class="book-room-now2">Kiểm tra</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
