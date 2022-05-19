<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <a href="{{ route('backend.servi.index') }}" title="Quản lý dịch vụ" style="color: #FFFFFF">
                    <h3>{{ Servi::count() }}</h3>
                    <p>{{ __('dashboard.boxtop.1') }}</p>
                </div>
                <div class="icon">
                    <i class="fa-duotone fa-cubes"></i>
                </div>
                <a href="{{ route('backend.servi.index') }}" class="small-box-footer">{{ __('dashboard.detail') }} <i
                class="fa fa-arrow-circle-right"></i></a>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <a href="{{ route('backend.product.index') }}" title="Quản lý sản phẩm" style="color: #FFFFFF">
                    <h3>{{ Product::count() }}</h3>
                    <p>{{ __('dashboard.boxtop.2') }}</p>
            </div>
            <div class="icon">
                <i class="fa-duotone fa-box"></i>
            </div>
            <a href="{{ route('backend.product.index') }}" class="small-box-footer">{{ __('dashboard.detail') }} <i
                    class="fa fa-arrow-circle-right"></i></a></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <a href="{{ route('backend.post.index') }}" title="Quản lý tin tức" style="color: #FFFFFF">
                    <h3>{{ Post::count() }}</h3>
                    <p>{{ __('dashboard.boxtop.3') }}</p>
            </div>
            <div class="icon">
                <i class="fa-duotone fa-newspaper"></i>
            </div>
            <a href="{{ route('backend.post.index') }}" class="small-box-footer">{{ __('dashboard.detail') }} <i
                    class="fa fa-arrow-circle-right"></i></a></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <a href="{{ route('backend.recruitment.index') }}" title="Quản lý tuyển dụng"
                    style="color: #FFFFFF">
                    <h3>{{ Recruitment::count() }}<sup style="font-size: 20px"></sup></h3>
                    <p>{{ __('dashboard.boxtop.4') }}</p>
            </div>
            <div class="icon">
                <i class="fa-duotone fa-bullhorn"></i>
            </div>
            <a href="{{ route('backend.recruitment.index') }}" class="small-box-footer">{{ __('dashboard.detail') }} <i
                    class="fa fa-arrow-circle-right"></i></a></a>
        </div>
    </div>
</div>
