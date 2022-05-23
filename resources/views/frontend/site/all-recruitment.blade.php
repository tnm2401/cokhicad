@extends('frontend.layout.master-layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="{{ $setting->translations->name }}"><i
                                    class="ti-home"></i>{{ __('Trang chủ') }}</a></li>

                        <li class="breadcrumb-item">{{ __('Tuyển dụng') }}</li>

                    </ol>
                </nav>
                <div class="main-title text-center mb-5">
                    <h1 class="title font-weight-bold">{{ __('Tuyển dụng') }}</h1>
                </div>


                <div class="row">
                    @foreach ($post as $item)
                    <div class="col-md-4 mb-4">
                        <figure>
                            <div class="thumbnail-news mb-2">
                                <a href="{{ route('frontend.slug',$item->translations->slug) }}
                                    "
                                    title="{{ $item->translations->title }}">
                                    <img src="{{ imageUrl('/storage/uploads/recruitments/'.$item->img,'350','250','100','1') }}"
                                        class="img-fluid" alt="{{ $item->translations->title }}"
                                        title="{{ $item->translations->title }}">
                                </a>
                            </div>
                            <figcaption>

                                <div class="title_news mt-4 mb-3">
                                    <h3>
                                        <a href="{{ route('frontend.slug',$item->translations->slug) }}"
                                            title="{{ $item->translations->title }}">{{ $item->translations->name }}</a>
                                    </h3>
                                </div>
                                <div class="des_news ellipsis_three_row">
                                   {!! $item->translations->descriptions !!}
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
                <nav class="mb-5">
                    <ul class="pagination justify-content-center mb-4">
                        {{ $post->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
