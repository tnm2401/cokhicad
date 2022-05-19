

<div class="card collapsed-card">
    <div class="card-header">

        <div class="row ">
            <div class="col-md-8">
                <h3 class="card-title has-success">
                    <i class="fa-duotone fa-location-dot mr-2"></i>
                    <label class="control-label">Nguồn truy cập</label>
                </h3>
            </div>

            <div style="margin-top:2%" class="col-md-4">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="ref(value);">
                            <option value="updateReftoday">{{ __('dashboard.today') }}</option>
                            <option value="updateRefyesterday">{{ __('dashboard.yesterday') }}</option>
                            <option value="updateRef7day">{{ __('dashboard.last7day') }}</option>
                            <option value="updateRefweek">{{ __('dashboard.week') }}</option>
                            <option value="updateRef30day">{{ __('dashboard.last30day') }}</option>
                            <option value="updateRefmonth">{{ __('dashboard.month') }}</option>
                            <option value="updateRefyear">{{ __('dashboard.year') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">

        <div style="width: 100%">
            <table id="tableRef" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Nguồn</th>
                        <th>Lượt Truy Cập</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nguồn</th>
                        <th>Lượt Truy Cập</th>

                    </tr>
                </tfoot>
            </table>

        </div>

    </div>
</div>

@include('backend.api-google-analytics.js-page.js-ref')
