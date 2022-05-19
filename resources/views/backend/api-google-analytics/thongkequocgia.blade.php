<style>
    #quocgia {
        width: 100%;
        height: 400px;
    }

</style>
<div class="card collapsed-card  ">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h3 class="card-title has-success">
                    <i class="fa-duotone fa-earth-asia mr-2"></i>
                    <label class="control-label">Quốc gia</label>
                </h3>
            </div>

            <div style="margin-top:2%" class="col-md-3">
                <ul class="nav nav-pills ml-auto">
                    <li>
                        <select class="select2 form-control" onchange="country(value);">
                            <option value="country_updateCharttoday">{{ __('dashboard.today') }}</option>
                            <option value="country_updateChartyesterday">{{ __('dashboard.yesterday') }}</option>
                            <option value="country_updateChart7day">{{ __('dashboard.last7day') }}</option>
                            <option value="country_updateChartweek">{{ __('dashboard.week') }}</option>
                            <option value="country_updateChart30day">{{ __('dashboard.last30day') }}</option>
                            <option value="country_updateChartmonth">{{ __('dashboard.month') }}</option>
                        </select>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="card-body">
        <canvas id="quocgia">
        </canvas>
    </div>
</div>

    @include('backend.api-google-analytics.js-page.js-quocgia')
