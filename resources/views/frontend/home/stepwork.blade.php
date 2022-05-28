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
                <div class="row">
                    @foreach ($data['step-work-box'] as $item)
                    <div class="col-lg-6 col-md-12">
                        <div class="step" style="background-color:{{ $item->color }}">
                            <div class="number" style="color: {{ $item->color }}">{{ $item->stt }}</div>

                            <div class="text">
                                {!! $item->translations->content ?? '' !!}
                            </div>
                        </div>
                        {{-- <span class="label">
                            <span class="icon">F</span>
                            <span class="frame">
                                <span class="text">Lorem ipsum dolor sit Lorem ipsum dolor sit adipisicing?</span>
                            </span>
                        </span> --}}
                    </div>
                    @endforeach


                </div>

                {{-- <div class="row">
                    @foreach ($data['step-work-box'] as $item)
                    <div class="col-md-12 col-lg-6 col-12">
                        <div class="row ">
                            <div class="bggg " style="background-color:{{ $item->color }}">
                            <div class="col-3 align-self-center
                            ">
                                <div class="number__z " style="color:{{ $item->color }}">
                                    1
                                </div>
                            </div>
                            <div class="col-9 align-self-center
                            ">
                           <div class="text">
                            {!! $item->translations->content ?? '' !!}</div></div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}

            </div>
        </div>

    </div>
</section>
{{-- @push('style')
    <style>
        .bggg{
            display: flex;
            margin: 10px 15px;
            width: 100%;
            border-radius: 57px;
            background-color: red;
            min-height: 114px;
            color: white;
        }
        .number__z{
            font-weight: bold;
            font-size: 350%;
            width: 90px;
            height: 90px;
            border-radius: 45px;
            background-color: #edf6ff;
            text-align: center;
        }

  @media  screen and (max-width: 450px) {
    .bggg .text p{
        font-size: 13px;
    }

  }
    </style>
@endpush --}}
