<style>
    #thietbi {
        width: 100%;
        height: 400px;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <h3 class="card-title has-success">
                    <i class="fa-duotone fa-laptop-mobile mr-2"></i>
                    <label class="control-label">Thiết bị</label>
                </h3>
            </div>

            <div style="margin-top:2%" class="col-md-4">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="device(value);">
                            <option value="updateDevicetoday">{{ __('dashboard.today') }}</option>
                            <option value="updateDeviceyesterday">{{ __('dashboard.yesterday') }}</option>
                            <option value="updateDevice7day">{{ __('dashboard.last7day') }}</option>
                            <option value="updateDeviceweek">{{ __('dashboard.week') }}</option>
                            <option value="updateDevice30day">{{ __('dashboard.last30day') }}</option>
                            <option value="updateDevicemonth">{{ __('dashboard.month') }}</option>
                            <option value="updateDeviceyear">{{ __('dashboard.year') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">
        <canvas id="thietbi">
        </canvas>
    </div>
</div>
@include('backend.api-google-analytics.js-page.js-thietbi')
