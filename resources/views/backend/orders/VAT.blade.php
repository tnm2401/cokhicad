                        {{-- <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Thông tin Người nhận hàng</h4>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tên Khách hàng</label>
                    <input type="text" name="name_2" id="name_2" data-length=120 value="@if (isset($cart->name_2)){{ old('name_2', $cart->name_2) }}@else{{ old('name_2') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên Khách hàng">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Điện thoại Khách hàng</label>
                    <input type="text" name="phone_2" id="phone_2" data-length=120 value="@if (isset($cart->phone_2)){{ old('phone_2', $cart->phone_2) }}@else{{ old('phone_2') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập số điện thoại Khách hàng">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Số nhà, Tên đường</label>
                <input type="text" name="address_2" id="address_2" data-length=120 value="@if (isset($cart->address_2)){{ old('address_2', $cart->address_2) }}@else{{ old('address_2') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập địa chỉ Khách hàng">
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Tỉnh/Thành phố</label>
                    <select class="form-control select2" name="province_2" id="province_2" style="width: 100%;">
                      <option selected="selected" >{{ $cart->province_2 }}</option>
                      @foreach ($provinces as $province)
                      <option value="{{ $province->id }}|{{ $province->name }}">{{ $province->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Quận/Huyện</label>
                    <select class="form-control select2" name="district_2" id="district_2" style="width: 100%;">
                      <option value="">{{ $cart->district_2 }}</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Phường/Xã</label>
                    <select class="form-control select2" name="ward_2" id="ward_2" style="width: 100%;">
                      <option value="">{{ $cart->ward_2 }}</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Thông tin Xuất hóa đơn</h4>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Tên công ty/Hộ kinh doanh</label>
                    <input type="text" name="company" id="company" data-length=120 value="@if (isset($cart->company)){{ old('company', $cart->company) }}@else{{ old('company') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập tên Công ty/Hộ kinh doanh">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mã số thuế</label>
                    <input type="text" name="tax_code" id="tax_code" data-length=120 value="@if (isset($cart->tax_code)){{ old('tax_code', $cart->tax_code) }}@else{{ old('tax_code') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập mã số thuế">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Địa chỉ xuất hóa đơn</label>
                <input type="text" name="address_vat" id="address_vat" data-length=120 value="@if (isset($cart->address_vat)){{ old('address_vat', $cart->address_vat) }}@else{{ old('address_vat') }}@endif" class="form-control" data-toggle="tooltip" data-placement="top" title="Nhập địa chỉ xuất hóa đơn">
              </div>
              <div class="form-group">
                <label>Ghi chú</label>
                <textarea class="form-control" name="note_vat" id="note_vat" data-length=400 value="@if (isset($cart->note_vat)){{ old('note_vat', $cart->note_vat) }}@else{{ old('note_vat') }}@endif" rows="6" data-toggle="tooltip" data-placement="top" title="Nhập ghi chú xuất hóa đơn">@if (isset($cart->note_vat)){{ old('note_vat', $cart->note_vat) }}@else{{ old('note_vat') }}@endif</textarea>
              </div>
            </div>
          </div> --}}
