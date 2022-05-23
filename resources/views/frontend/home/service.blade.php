<section class="bg-grey">
    <div class="container service">
        <div class="row ">
            <div class="col-md-6 mb-1">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ imageUrl('/storage/uploads/pages/'.$data['service1']->img,'440','','100','1') }}
                        " class="img-fluid" alt="">
                    </div>
                    <div class="col-md-12">
                        <div class="text-content">
                            <p>
                               {!! $data['service1']->translations->descriptions !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-1">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ imageUrl('/storage/uploads/pages/'.$data['service2']->img,'440','','100','1') }}
                        " class="img-fluid" alt="">
                    </div>
                    <div class="col-md-12">
                        <div class="text-content">
                            <p>
                               {!! $data['service2']->translations->descriptions !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
