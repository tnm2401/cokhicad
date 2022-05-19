<div style="margin-bottom:5px; margin-top:5px" class="col-md-12 form-group has-success">
    <div class="card-tools">
        <ul class="nav nav-pills ml-auto">
            <li>
                <select class="form-control select2" onchange="dashboard(value);">
                    <option value="dashboard_today">{{ __('dashboard.today') }}</option>
                    <option value="dashboard_yesterday">{{ __('dashboard.yesterday') }}</option>
                    <option value="dashboard_7day">{{ __('dashboard.last7day') }}</option>
                    <option value="dashboard_week">{{ __('dashboard.week') }}</option>
                    <option value="dashboard_30day">{{ __('dashboard.last30day') }}</option>
                    <option value="dashboard_month">{{ __('dashboard.month') }}</option>
                    <option value="dashboard_year">{{ __('dashboard.year') }} </option>
                </select>
            </li>
        </ul>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-red elevation-1"><i class="fa-duotone fa-right-to-bracket"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.session_access') }}</span>
            <span id="dashboard_session" class="info-box-number">
            </span>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-aqua elevation-1"><i class="fa-duotone fa-users"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.users') }}</span>
            <span id="dashboard_visitors" class="info-box-number">
            </span>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-yellow elevation-1"><i class="fa-duotone fa-user-plus"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.new_users') }}</span>
            <span id="dashboard_new_visitors" class="info-box-number">
            </span>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-green elevation-1"><i class="fa-duotone fa-eye"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.pageview') }}</span>
            <span id="dashboard_pageviews" class="info-box-number">
            </span>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-red elevation-1"><i class="fa-duotone fa-right-from-bracket"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.exit_rate') }}</span>
            <span id="dashboard_exit_rate" class="info-box-number">
            </span>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-aqua elevation-1"><i class="fa-duotone fa-wave-pulse"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.new_session') }}</span>
            <span id="dashboard_new_sessions" class="info-box-number">
            </span>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-yellow elevation-1"><i class="fa-duotone fa-timer"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.view_avg') }}</span>
            <span id="dashboard_avg_time" class="info-box-number">
            </span>
        </div>
    </div>
</div>

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-green elevation-1"><i class="fa-duotone fa-hourglass"></i>
        </span>
        <div class="info-box-content">
            <span class="info-box-text">{{ __('dashboard.page_per_session') }}</span>
            <span id="dashboard_page_per_session" class="info-box-number">
            </span>
        </div>
    </div>
</div>
<!-- ./col -->
@include('backend.api-google-analytics.js-page.js-dashboard')
