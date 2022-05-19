            @if(Hideshow::find(35)->hide_show == 0)
            <div {{ Hideshow::find(35)->hide_show == 1  ? '' : 'hidden' }} class="box box-success">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        @if (hasRole('ana_general'))
                        @include('backend.api-google-analytics.8-col-dashboard')
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <div class="row">
                                <section class="col-lg-7 connectedSortable">
                                    @if (hasRole('ana_access')) @include('backend.api-google-analytics.thongketruycap')@endif
                                    @if (hasRole('ana_country'))@include('backend.api-google-analytics.thongkequocgia')
                                    @endif
                                    @if (hasRole('ana_site'))@include('backend.api-google-analytics.thongkesite')
                                    @endif
                                </section>
                                <section class="col-lg-5 connectedSortable">
                                    @if (hasRole('ana_browser'))@include('backend.api-google-analytics.thongketrinhduyet')
                                    @endif
                                    @if (hasRole('ana_device'))@include('backend.api-google-analytics.thongkethietbi')
                                    @endif
                                    @if (hasRole('ana_ref'))@include('backend.api-google-analytics.nguonkhachhang')
                                    @endif
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
