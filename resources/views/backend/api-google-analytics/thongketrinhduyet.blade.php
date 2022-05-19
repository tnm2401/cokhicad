<style>
    #trinhduyet {
        width: 100%;
        height: 400px;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">
                <h3 class="card-title has-success">
                    <i class="fa-duotone fa-browser mr-2"></i>
                    <label class="control-label">{{ __('dashboard.chart.browswe') }}</label>
                </h3>
            </div>

            <div style="margin-top:2%" class="col-md-4">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="form-control select2" onchange="browser(value);">
                            <option value="updateCharttoday">{{ __('dashboard.today') }}</option>
                            <option value="updateChartyesterday">{{ __('dashboard.yesterday') }}</option>
                            <option value="updateChart7day">{{ __('dashboard.last7day') }}</option>
                            <option value="updateChartweek">{{ __('dashboard.week') }}</option>
                            <option value="updateChart30day">{{ __('dashboard.last30day') }}</option>
                            <option value="updateChartmonth">{{ __('dashboard.month') }}</option>
                            <option value="updateChartyear">{{ __('dashboard.year') }} </option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">
        <canvas height="100" id="trinhduyet">
        </canvas>
    </div>
</div>
    @include('backend.api-google-analytics.js-page.js-trinhduyet')


