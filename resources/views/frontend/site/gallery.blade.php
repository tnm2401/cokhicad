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
                <div class="main-title text-center mb-5">
                    <h1 class="title font-weight-bold">{{ $gallery->translations->name }}</h1>
                </div>

                <div class="row mb-5">
                    @foreach ($gallery->images as $item)
                    <div class="col-md-3 mb-3 col-3">
                        <img class="lightboxed img-fluid" rel="group1" src="{{ imageUrl('/storage/uploads/gallery/'.$item->imgs,'350','300','100','1') }}
                        "
                            data-link="{{ imageUrl('/storage/uploads/gallery/'.$item->imgs,'700','600','100','1') }}" alt="{{ $gallery->translations->name }}"
                            data-caption="{{ $gallery->translations->title }}" />
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
