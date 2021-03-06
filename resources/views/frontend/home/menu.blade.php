<div class="sticky-top-head bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-white d-none d-lg-block">
                <i class="fa-solid fa-location-dot"></i> {{ $setting->translations->address }}
            </div>
            <div class="col-md-3  text-white">
                <i class="fa-solid fa-square-phone"></i> Hotline:
                <strong>{{ $setting->hotline_1 }}</strong>
            </div>
            <div class="col-md-3 d-none d-lg-block text-white">
                <i class="fa-solid fa-envelope"></i> Email:
                <strong>{{ $setting->email }}</strong>
            </div>

        </div>
    </div>
</div>

<div class="navigation-wrap start-header start-style">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route('frontend.home.index') }}">
                        <img src="{{ asset('storage') }}/uploads/setting/{{ $setting->logoindex }}" alt="{{ $setting->translations->name }}" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#main_nav" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span style="color: #143fd6 !important;" class="navbar-toggler-icon">
                        <i class="fa-solid fa-bars"></i></span>
                </button>
                    <div class="collapse navbar-collapse" id="main_nav">
                        <ul class="navbar-nav">
                            <li class="nav-item  pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4"> <a class="nav-link" href="{{ route('frontend.home.index') }}"><i class="fa-solid fa-house"></i> </a> </li>
                            <li class="nav-item {{ $isactive == 'gioi-thieu' ? 'active' : '' }} pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4"><a class="nav-link " href="{{ route('frontend.slug', $menu['gioi-thieu']->translations->slug) }}"> {{ __('GI???I THI???U') }} </a></li>
                            <li class="nav-item dropdown  {{ $isactive == 'dich-vu' ? 'active' : '' }} pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4">
                                <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="{{ route('frontend.slug',$menu['tat-ca-dich-vu']->translations->slug) }}"> {{ __('D???CH V???') }} <i class="fa-solid fa-chevron-down"></i> </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('frontend.slug',$menu['tat-ca-dich-vu']->translations->slug) }}">T???t C??? D???ch V???</a>
                                    </li>
                                    @foreach ($menu['dich-vu'] as $item)
                                    <li><a class="dropdown-item" href="{{ route('frontend.slug',$item->translations->slug) }}"> {{ $item->translations->name }} </a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item  {{ $isactive == 'san-pham' ? 'active' : '' }} pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4">
                                <a class="nav-link dropdown-toggle" href="{{ route('frontend.slug',$menu['tat-ca-san-pham']->translations->slug) }}" > {{ __('S???N PH???M') }}  </a>
                            </li>
                            <li class="nav-item dropdown {{ $isactive == 'hoat-dong' ? 'active' : '' }} pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> {{ __('HO???T ?????NG') }} <i class="fa-solid fa-chevron-down"></i> </a>
                                <ul class="dropdown-menu">
                                    @foreach ( $menu['hoat-dong']['gallery'] as $item)
                                    <li><a class="dropdown-item" href="{{ route('frontend.slug',$item->translations->slug) }}"> {{ $item->translations->name }} </a></li>
                                    @endforeach
                                    @foreach ( $menu['hoat-dong']['media'] as $item)
                                    <li><a class="dropdown-item" href="{{ route('frontend.slug',$item->translations->slug) }}"> {{ $item->translations->name }} </a></li>
                                    @endforeach


                                </ul>
                            </li>
                            <li class="nav-item  {{ $isactive == 'tin-tuc' ? 'active' : '' }} pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4">
                                <a class="nav-link " href="{{ route('frontend.slug',$menu['tat-ca-bai-viet']->translations->slug) }}" >{{ __('TIN T???C') }} </a>
                            </li>
                            <li class="nav-item  {{ $isactive == 'tuyen-dung' ? 'active' : '' }} pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4">
                                <a class="nav-link " href="{{ route('frontend.slug',$menu['tin-tuyen-dung']->translations->slug) }}" > {{ __('TUY???N D???NG') }}  </a>
                                <ul class="dropdown-menu">
                                </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ $isactive == 'lien-he' ? 'active' : '' }} pl-lg-0 ml-lg-0 pl-4 pl-md-0 ml-0 ml-md-4 pl-md-4"> <a class="nav-link" href="{{ route('frontend.slug',$menu['lien-he']->translations->slug) }}">{{ __('LI??N H???') }} </a> </li>
                            <li class="d-flex">
                                <a class="icon_lang" href="{{ route('frontend.locale', $lang) }}"><img src="{{ asset('frontend') }}/img/vietnamese.png" alt="vi" data-google-lang="" /></a>
                                <a class="icon_lang"><img src="{{ asset('frontend') }}/img/english.png" alt="en" data-google-lang="en" /></a>
                            </li>
                        </ul>

                    </div> <!-- navbar-collapse.// -->

                </nav>

            </div>
        </div>
    </div>
</div>
