@extends('frontend.layout.master-layout')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9 mb-4 main-content">
            <nav class="breadcrumb-nav mt-1" aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}" title="{{ $setting->translations->name }}"><i
                                class="ti-home"></i> Trang chủ</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('frontend.slug',$post->svcate->translations->slug) }}" title="{{$post->svcate->translations->name }}"><i
                            class="ti-home"></i> {{ $post->svcate->translations->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->translations->name }}</li>
                </ol>
            </nav>
            <article class="card post mb-5">
                <div style="overflow: hidden" class="post-content" id="post_content">
                    <div class="main-title text-center">
                        <h1 class="font-weight-bold">{{ $post->translations->name }}</h1>
                     </div>
                    {!! $post->translations->content !!}
                </div>
            </article>
        </div>
    </div>
    <div class="main-title text-center">
        <p>Bài viết cùng chủ đề</p>
    </div>
    <div class="row">
        @foreach ($relatedpost as $item)
        <div class="col-md-4 col-6 mb-4">
            <figure>
                <div class="thumbnail-news mb-2">
                    <a href="{{ route('frontend.slug',$item->translations->slug) }}">
                        <img src="{{ imageUrl('/storage/uploads/servis/'.$item->img,'440','300','100','1') }}
                        "
                            class="img-fluid" alt="{{ $item->translations->title }}"
                            title="{{ $item->translations->title }}">
                    </a>
                </div>
                <figcaption>
                    <div class="title__news mt-4 mb-3">
                        <h3><a href="{{ route('frontend.slug',$item->translations->slug) }}">{{ $item->translations->name }}</a></h3>
                    </div>
                    <div class="des_news ellipsis_three_row">
                       {!! $item->translations->descriptions !!}
                    </div>
                </figcaption>
            </figure>
        </div>
        @endforeach
         <div class=" col-12 col-md-12">
                {!! $relatedpost->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>
@endsection
