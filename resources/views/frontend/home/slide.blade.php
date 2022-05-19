{{-- <div class="home-slider owl-carousel js-fullheight">
    @foreach ($data['slider'] as $item)
    <div class="slider-item js-fullheight" style="background-image: url(  {{ imageUrl('/storage/uploads/slides/'.$item->img,'1440','478','100','1') }}); "> --}}
        {{-- <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-12 ftco-animate">
                    <div class="text w-100 text-center">
                        <h2>Best Place to Travel</h2>
                        <h1 class="mb-3">Norway</h1>
                    </div>

                </div>
            </div>
        </div> --}}
    {{-- </div>
    @endforeach

</div> --}}

<section>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($data['slider'] as $item)
      <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
        <img class="d-block w-100" src="{{ imageUrl('/storage/uploads/slides/'.$item->img,'1440','500','100','1') }}" alt="First slide">
      </div>
      @endforeach

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
