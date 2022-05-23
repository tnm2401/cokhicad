@extends('frontend.layout.master-layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"
                                title="{{ $setting->translations->name }}"><i class="ti-home"></i> Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item">{{ $gallery->translations->name }}</li>

                    </ol>
                </nav>
                <div class="main-title text-center mb-5 ">
                    <h1 class="title font-weight-bold">{{ $gallery->translations->name }}</h1>
                </div>

                <div class="row mb-5">
                    @foreach ($video as $item)
                    <div class="col-md-3 mb-3 col-6">
                        <img class="lightboxed img-fluid" rel="group1" src="{{ imageUrl('/storage/uploads/videos/'.$item->img,'350','300','100','1') }}
                        "
                            data-link="{{ $item->url_code }}"
                            data-width="560"
                            data-height="315" />

                        <div class="main-title text-center mb-5 mt-2">
                            <h2 style="font-size: 20px" class="title font-weight-bold">{{ $item->translations->name }}</h2>
                        </div>
                    </div>

                    @endforeach

                </div>
                <nav class="mb-5">
                    <ul class="pagination justify-content-center mb-4">
                        {{ $video->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>

        </div>
    </div>
@endsection
