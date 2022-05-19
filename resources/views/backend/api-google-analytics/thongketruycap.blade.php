<style>
    #truycap {
        width: 100%;
        height: 400px;
    }

</style>
<div class="card">
    <div class="card-header">
        <div class="row ">
            <div class="col-md-9">
                <h3 class="card-title has-success">
                    <i class="fa-duotone fa-chart-area mr-2"></i>
                    <label class="control-label">{{ __('dashboard.chart.access') }}</label>
                </h3>
            </div>

            <div style="margin-top:2%" class="col-md-3 ">
                <ul  class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="access(value);">
                            <option value="access_updateCharttoday">{{ __('dashboard.today') }}</option>
                            <option value="access_updateChartyesterday">{{ __('dashboard.yesterday') }}</option>
                            <option value="access_updateChart7day">{{ __('dashboard.last7day') }}</option>
                            <option value="access_updateChartweek">{{ __('dashboard.week') }}</option>
                            <option value="access_updateChart30day">{{ __('dashboard.last30day') }}</option>
                            <option value="access_updateChartmonth">{{ __('dashboard.month') }}</option>
                            <option value="access_updateChartyear">{{ __('dashboard.year') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>

    </div>
    <div class="card-body">
        <canvas id="truycap">
        </canvas>
    </div>
</div>

@include('backend.api-google-analytics.js-page.js-truycap')
