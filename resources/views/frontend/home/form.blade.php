
    <section class="bg-blue-form">
        <div class="container">
            <div class="row">
                <div class="col-md-7 p-lg-5">
                  {!! $data['contact']->translations->descriptions !!}
                </div>
                <div class="col-md-5 mt-3 p-lg-5">
                    <div class="form-contact">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-3">
                                <div class="title-about">
                                    {{ __('LIÊN HỆ ĐỘI NGŨ CƠ KHÍ CAD') }}
                                </div>
                            </div>
                            <form id="ajax-contact-form" action="{{ route('backend.contactform.store') }}" method="POST" accept-charset="utf-8">
                                @csrf
                                <div class="modal-body" style="padding: 0px;">
                                  @if ($errors->any())
                                  <div id="error_contact" class="alert alert-danger" style="display: none">
                                    <ul style="padding-left: 0px;">
                                      @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                  </div>
                                  @endif
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 mb-3" >
                                      <input class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="{{ __('HỌ VÀ TÊN') }}" type="text" />
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3" >
                                        <input class="form-control" name="phone" value="{{ old('phone') }}" id="phone" placeholder="{{ __('SĐT') }}" type="text"  {{-- autofocus --}} />
                                      </div>
                                      <div class="col-lg-6 col-md-6 col-sm-6 mb-3" >
                                        <input class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="EMAIL" type="email"  />
                                      </div>
                                      <div class="col-lg-6 col-md-3 col-sm-3 col-12 mb-3" >
                                        <input class="form-control" name="captcha" id="captcha" placeholder="CAPTCHA" type="text"  />
                                      </div>
                                      <div class="col-lg-6 col-md-3 col-sm-3 col-6 refereshrecapcha mb-3" >
                                        {!! captcha_img('flat') !!}
                                      </div>
                                      <div class="col-lg-12 col-md-6 col-sm-6 col-6 text-lg-right">
                                        <a href="javascript:void(0)" onclick="refreshCaptcha()"><i class="fa-solid fa-arrow-rotate-right"></i></a>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                      <input type="hidden" class="form-control" name="stt" id="stt" value="1" placeholder="stt" />
                                    </div>
                                  </div>
                                  <div class="col-md-12 mb-3 text-center">
                                    <button type="submit"  id="submit" class="button-send-contact">{{ __('GỬI THÔNG TIN') }}</button>
                                </div>
                                </div>
                              </form>
                              <div class="col-md-12 mb-3 text-center ">
                                <small class="form-send-small">{{ __('Thông tin khách hàng được CAD bảo mật tuyệt đối') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
