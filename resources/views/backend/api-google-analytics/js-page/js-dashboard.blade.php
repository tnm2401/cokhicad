<script src="{{asset('backend')}}/bower_components/jquery/dist/jquery.min.js"></script>

<script>
    function dashboard(i) {
        if (i == "dashboard_7day") {
                    dashboard_7day();
                } else if (i == "dashboard_today") {
                    dashboard_today();
                } else if (i == "dashboard_yesterday") {
                    dashboard_yesterday();
                } else if (i == "dashboard_week") {
                    dashboard_week();
                } else if (i == "dashboard_30day") {
                    dashboard_30day();
                } else if (i == "dashboard_month") {
                    dashboard_month();
                } else if (i == "dashboard_year") {
                    dashboard_year();
                }

        let timerInterval
        Swal.fire({
            title: 'Đang tải dữ liệu',
            showConfirmButton: false,
            timer: 800,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    // b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        })
    }

    dashboard_today();

    function dashboard_today() {
        async function fetchjson() {
            const url = "{{ route('api.dashboard') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const data = datapoints[0];
            const sessions = data[0];
            const visitors = data[1];
            const newvisitors = data[2];
            const pageviews = data[3];
            const exitrate = data[4];
            const percentnewss = data[5];
            const pageviewperss = data[6];
            const agvtime = data[7];
            $('#dashboard_session').html(sessions + " <small>Phiên</small>");
            $('#dashboard_visitors').html(visitors + " <small>Lượt</small>");
            $('#dashboard_new_visitors').html(newvisitors + " <small>Lượt</small>");
            $('#dashboard_pageviews').html(pageviews + " <small>Lượt</small>");
            $('#dashboard_exit_rate').html(Math.round(exitrate * 100) / 100 + " <small>%</small>");
            $('#dashboard_new_sessions').html(Math.round(percentnewss * 100) / 100 + " <small>%</small>");
            $('#dashboard_page_per_session').html(Math.round(pageviewperss * 100) / 100 +
                " <small>Trang</small>");
            $('#dashboard_avg_time').html(Math.round(agvtime * 100) / 100 + " <small>s</small>");
        });
    };

    function dashboard_yesterday() {
        async function fetchjson() {
            const url = "{{ route('api.dashboard.yesterday') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const data = datapoints[0];
            const sessions = data[0];
            const visitors = data[1];
            const newvisitors = data[2];
            const pageviews = data[3];
            const exitrate = data[4];
            const percentnewss = data[5];
            const pageviewperss = data[6];
            const agvtime = data[7];
            $('#dashboard_session').html(sessions + " <small>Phiên</small>");
            $('#dashboard_visitors').html(visitors + " <small>Lượt</small>");
            $('#dashboard_new_visitors').html(newvisitors + " <small>Lượt</small>");
            $('#dashboard_pageviews').html(pageviews + " <small>Lượt</small>");
            $('#dashboard_exit_rate').html(Math.round(exitrate * 100) / 100 + " <small>%</small>");
            $('#dashboard_new_sessions').html(Math.round(percentnewss * 100) / 100 + " <small>%</small>");
            $('#dashboard_page_per_session').html(Math.round(pageviewperss * 100) / 100 +
                " <small>Trang</small>");
            $('#dashboard_avg_time').html(Math.round(agvtime * 100) / 100 + " <small>s</small>");
        });
    };

    function dashboard_7day() {
        async function fetchjson() {
            const url = "{{ route('api.dashboard.7day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const data = datapoints[0];
            const sessions = data[0];
            const visitors = data[1];
            const newvisitors = data[2];
            const pageviews = data[3];
            const exitrate = data[4];
            const percentnewss = data[5];
            const pageviewperss = data[6];
            const agvtime = data[7];
            $('#dashboard_session').html(sessions + " <small>Phiên</small>");
            $('#dashboard_visitors').html(visitors + " <small>Lượt</small>");
            $('#dashboard_new_visitors').html(newvisitors + " <small>Lượt</small>");
            $('#dashboard_pageviews').html(pageviews + " <small>Lượt</small>");
            $('#dashboard_exit_rate').html(Math.round(exitrate * 100) / 100 + " <small>%</small>");
            $('#dashboard_new_sessions').html(Math.round(percentnewss * 100) / 100 + " <small>%</small>");
            $('#dashboard_page_per_session').html(Math.round(pageviewperss * 100) / 100 +
                " <small>Trang</small>");
            $('#dashboard_avg_time').html(Math.round(agvtime * 100) / 100 + " <small>s</small>");
        });
    };

    function dashboard_week() {
        async function fetchjson() {
            const url = "{{ route('api.dashboard.thisweek') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const data = datapoints[0];
            const sessions = data[0];
            const visitors = data[1];
            const newvisitors = data[2];
            const pageviews = data[3];
            const exitrate = data[4];
            const percentnewss = data[5];
            const pageviewperss = data[6];
            const agvtime = data[7];
            $('#dashboard_session').html(sessions + " <small>Phiên</small>");
            $('#dashboard_visitors').html(visitors + " <small>Lượt</small>");
            $('#dashboard_new_visitors').html(newvisitors + " <small>Lượt</small>");
            $('#dashboard_pageviews').html(pageviews + " <small>Lượt</small>");
            $('#dashboard_exit_rate').html(Math.round(exitrate * 100) / 100 + " <small>%</small>");
            $('#dashboard_new_sessions').html(Math.round(percentnewss * 100) / 100 + " <small>%</small>");
            $('#dashboard_page_per_session').html(Math.round(pageviewperss * 100) / 100 +
                " <small>Trang</small>");
            $('#dashboard_avg_time').html(Math.round(agvtime * 100) / 100 + " <small>s</small>");
        });
    };

    function dashboard_30day() {
        async function fetchjson() {
            const url = "{{ route('api.dashboard.30day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const data = datapoints[0];
            const sessions = data[0];
            const visitors = data[1];
            const newvisitors = data[2];
            const pageviews = data[3];
            const exitrate = data[4];
            const percentnewss = data[5];
            const pageviewperss = data[6];
            const agvtime = data[7];
            $('#dashboard_session').html(sessions + " <small>Phiên</small>");
            $('#dashboard_visitors').html(visitors + " <small>Lượt</small>");
            $('#dashboard_new_visitors').html(newvisitors + " <small>Lượt</small>");
            $('#dashboard_pageviews').html(pageviews + " <small>Lượt</small>");
            $('#dashboard_exit_rate').html(Math.round(exitrate * 100) / 100 + " <small>%</small>");
            $('#dashboard_new_sessions').html(Math.round(percentnewss * 100) / 100 + " <small>%</small>");
            $('#dashboard_page_per_session').html(Math.round(pageviewperss * 100) / 100 +
                " <small>Trang</small>");
            $('#dashboard_avg_time').html(Math.round(agvtime * 100) / 100 + " <small>s</small>");
        });
    };

    function dashboard_month() {
        async function fetchjson() {
            const url = "{{ route('api.dashboard.thismonth') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const data = datapoints[0];
            const sessions = data[0];
            const visitors = data[1];
            const newvisitors = data[2];
            const pageviews = data[3];
            const exitrate = data[4];
            const percentnewss = data[5];
            const pageviewperss = data[6];
            const agvtime = data[7];
            $('#dashboard_session').html(sessions + " <small>Phiên</small>");
            $('#dashboard_visitors').html(visitors + " <small>Lượt</small>");
            $('#dashboard_new_visitors').html(newvisitors + " <small>Lượt</small>");
            $('#dashboard_pageviews').html(pageviews + " <small>Lượt</small>");
            $('#dashboard_exit_rate').html(Math.round(exitrate * 100) / 100 + " <small>%</small>");
            $('#dashboard_new_sessions').html(Math.round(percentnewss * 100) / 100 + " <small>%</small>");
            $('#dashboard_page_per_session').html(Math.round(pageviewperss * 100) / 100 +
                " <small>Trang</small>");
            $('#dashboard_avg_time').html(Math.round(agvtime * 100) / 100 + " <small>s</small>");
        });
    };

    function dashboard_year() {
        async function fetchjson() {
            const url = "{{ route('api.dashboard.thisyear') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const data = datapoints[0];
            const sessions = data[0];
            const visitors = data[1];
            const newvisitors = data[2];
            const pageviews = data[3];
            const exitrate = data[4];
            const percentnewss = data[5];
            const pageviewperss = data[6];
            const agvtime = data[7];
            $('#dashboard_session').html(sessions + " <small>Phiên</small>");
            $('#dashboard_visitors').html(visitors + " <small>Lượt</small>");
            $('#dashboard_new_visitors').html(newvisitors + " <small>Lượt</small>");
            $('#dashboard_pageviews').html(pageviews + " <small>Lượt</small>");
            $('#dashboard_exit_rate').html(Math.round(exitrate * 100) / 100 + " <small>%</small>");
            $('#dashboard_new_sessions').html(Math.round(percentnewss * 100) / 100 + " <small>%</small>");
            $('#dashboard_page_per_session').html(Math.round(pageviewperss * 100) / 100 +
                " <small>Trang</small>");
            $('#dashboard_avg_time').html(Math.round(agvtime * 100) / 100 + " <small>s</small>");
        });
    };
</script>
