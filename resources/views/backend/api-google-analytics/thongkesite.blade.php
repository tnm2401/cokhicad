<div class="card collapsed-card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h3 class="card-title has-success">
                    <i class="fa-duotone fa-eye mr-2"></i>
                    <label class=" control-label">Trang xem nhiều</label>
                </h3>
            </div>
            <div style="margin-top:2%" class="col-md-3">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="select2 form-control" onchange="site(value);">
                            <option value="updateSitetoday">{{ __('dashboard.today') }}</option>
                            <option value="updateSiteyesterday">{{ __('dashboard.yesterday') }}</option>
                            <option value="updateSite7day">{{ __('dashboard.last7day') }}</option>
                            <option value="updateSiteweek">{{ __('dashboard.week') }}</option>
                            <option value="updateSite30day">{{ __('dashboard.last30day') }}</option>
                            <option value="updateSitemonth">{{ __('dashboard.month') }}</option>
                            <option value="updateSiteyear">{{ __('dashboard.year') }} </option>
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div style="width: 100%">
            <table id="tablesite" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Tên Trang</th>
                        <th>Lượt Xem</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tên Trang</th>
                        <th>Lượt Xem</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@include('backend.api-google-analytics.js-page.js-site')
