<script type="text/javascript">
    function access(i) {
        if (i == "access_updateChart7day") {
            access_updateChart7day();
        } else if (i == "access_updateCharttoday") {
            access_updateCharttoday();
        } else if (i == "access_updateChartyesterday") {
            access_updateChartyesterday();
        } else if (i == "access_updateChartweek") {
            access_updateChartweek();
        } else if (i == "access_updateChart30day") {
            access_updateChart30day();
        } else if (i == "access_updateChartmonth") {
            access_updateChartmonth();
        } else if (i == "access_updateChartyear") {
            access_updateChartyear();
        }


        let timerInterval
        Swal.fire({
            title: '{{ __('dashboard.loading') }}',
            timer: 800,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {}, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        })
    }

    const ctx = document.getElementById('truycap').getContext('2d');
    const truycap = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: '{{ __('dashboard.chart.count_access') }}',
                data: [12, 19, 3, 5, 2, 3, 9],
                backgroundColor: '#d88c80',
                borderColor: '#dd4d37',
                tension: 0.5,
                borderWidth: 1,
                fill: true,
            }, {
                label: '{{ __('dashboard.chart.count_view') }}',
                data: [7, 12, 5, 9, 15, 9, 11],
                backgroundColor: '#74a5c1',
                borderColor: '#3d8dbc',
                tension: 0.5, //bo viền
                borderWidth: 1, // độ dày line
                fill: true, // đổ màu
            }]
        },
        options: {
            maintainAspectRatio: false, // bỏ heigh mặc định, set heigh custom

            scales: {
                y: {
                    beginAtZero: true
                    // min : 0,
                }
            },
        },

    });
    access_updateCharttoday();

    function access_updateCharttoday() {
        async function fetchjson() {
            const url = "{{ route('api.access') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const visitors = datapoints.map(function(index) {
                return index[1];
            });
            const visit = visitors;
            const nuevo = visit.map((i) => Number(i));
            let totalvisit = 0;
            for (let i = 0; i < nuevo.length; i++) {
                totalvisit += nuevo[i];
            }
            truycap.data.datasets[0].label = "{{ __('dashboard.chart.count_access') }}: " + totalvisit;
            truycap.data.datasets[0].data = visitors;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            const pageViews = datapoints.map(function(index) {
                return index[2];
            });
            const pv = pageViews;
            const nuevo2 = pv.map((i) => Number(i));
            let totalpv = 0;
            for (let i = 0; i < nuevo2.length; i++) {
                totalpv += nuevo2[i];
            }
            truycap.data.datasets[1].label = "{{ __('dashboard.chart.count_view') }} : " + totalpv;
            truycap.data.datasets[1].data = pageViews;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            const date = datapoints.map(function(index) {
                return index[0] + "H";
            });
            truycap.data.labels = date;
            truycap.update();
        });
    };

    function access_updateChartyesterday() {
        async function fetchjson() {
            const url = "{{ route('api.access.yesterday') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const visitors = datapoints.map(function(index) {
                return index[1];
            });
            const visit = visitors;
            const nuevo = visit.map((i) => Number(i));
            let totalvisit = 0;
            for (let i = 0; i < nuevo.length; i++) {
                totalvisit += nuevo[i];
            }
            truycap.data.datasets[0].label = "{{ __('dashboard.chart.count_access') }} : " + totalvisit;
            truycap.data.datasets[0].data = visitors;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            const pageViews = datapoints.map(function(index) {
                return index[2];
            });
            const pv = pageViews;
            const nuevo2 = pv.map((i) => Number(i));
            let totalpv = 0;
            for (let i = 0; i < nuevo2.length; i++) {
                totalpv += nuevo2[i];
            }
            truycap.data.datasets[1].label = "{{ __('dashboard.chart.count_view') }} : " + totalpv;
            truycap.data.datasets[1].data = pageViews;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            const date = datapoints.map(function(index) {
                return index[0] + "H";
            });
            truycap.data.labels = date;
            truycap.update();
        });

    };

    function access_updateChart7day() {
        async function fetchjson() {
            const url = "{{ route('api.access.7day') }}";
            const response = await fetch(url);
            const datapoints = await response.json();

            return datapoints;
        };
        fetchjson().then(datapoints => {
            let sumvisit = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumvisit += Number(datapoints[i][1]);
            };
            const visitors = datapoints.map(function(index) {
                return index[1];
            });

            truycap.data.datasets[0].label = "{{ __('dashboard.chart.count_access') }}: "+sumvisit;
            truycap.data.datasets[0].data = visitors;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            let sumviews = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumviews += Number(datapoints[i][2]);
            };
            const pageViews = datapoints.map(function(index) {
                return index[2];
            });
            truycap.data.datasets[1].label = "{{ __('dashboard.chart.count_view') }}: " + sumviews;
            truycap.data.datasets[1].data = pageViews;
            truycap.update();
        });
        fetchjson().then(datapoints => {

            const date = datapoints.map(function(index) {
                return [index[0].slice(6, 8), index[0].slice(4, 6), index[0].slice(0, 4)].join('-');
            });
            truycap.data.labels = date;
            truycap.update();
        });

    };

    function access_updateChartweek() {
        async function fetchjson() {
            const url = "{{ route('api.accesss.thisweek') }}";
            const response = await fetch(url);
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            let sumvisit = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumvisit += Number(datapoints[i][1]);
            };
            const visitors = datapoints.map(function(index) {
                return index[1];
            });
            truycap.data.datasets[0].label = "{{ __('dashboard.chart.count_access') }}: " + sumvisit;
            truycap.data.datasets[0].data = visitors;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            let sumviews = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumviews += Number(datapoints[i][2]);
            };
            const pageViews = datapoints.map(function(index) {
                return index[2];
            });
            truycap.data.datasets[1].label = "{{ __('dashboard.chart.count_view') }}: " + sumviews;
            truycap.data.datasets[1].data = pageViews;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            truycap.data.labels = ['Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7', 'Chủ Nhật'];
            truycap.update();
        });

    };

    function access_updateChart30day() {
        async function fetchjson() {
            const url = "{{ route('api.access.30day') }}";
            const response = await fetch(url);
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            let sumvisit = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumvisit += Number(datapoints[i][1]);
            };
            const visitors = datapoints.map(function(index) {
                return index[1];
            });
            truycap.data.datasets[0].label = "{{ __('dashboard.chart.count_access') }}: " + sumvisit;
            truycap.data.datasets[0].data = visitors;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            let sumviews = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumviews += Number(datapoints[i][2]);
            };
            const pageViews = datapoints.map(function(index) {
                return index[2];
            });
            truycap.data.datasets[1].label = "{{ __('dashboard.chart.count_view') }}: " + sumviews;
            truycap.data.datasets[1].data = pageViews;
            truycap.update();
        });
        fetchjson().then(datapoints => {

            const date = datapoints.map(function(index) {
                return [index[0].slice(6, 8), index[0].slice(4, 6), index[0].slice(0, 4)].join('-');
            });
            truycap.data.labels = date;
            truycap.update();
        });

    };

    function access_updateChartmonth() {
        async function fetchjson() {
            const url = "{{ route('api.access.thismonth') }}";
            const response = await fetch(url);
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            let sumvisit = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumvisit += Number(datapoints[i][1]);
            };
            const visitors = datapoints.map(function(index) {
                return index[1];
            });
            truycap.data.datasets[0].label = "{{ __('dashboard.chart.count_access') }}: " + sumvisit;
            truycap.data.datasets[0].data = visitors;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            let sumviews = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumviews += Number(datapoints[i][2]);
            };
            const pageViews = datapoints.map(function(index) {
                return index[2];
            });
            truycap.data.datasets[1].label = "{{ __('dashboard.chart.count_view') }}: " + sumviews;
            truycap.data.datasets[1].data = pageViews;
            truycap.update();
        });
        fetchjson().then(datapoints => {

            const date = datapoints.map(function(index) {
                return [index[0].slice(6, 8), index[0].slice(4, 6), index[0].slice(0, 4)].join('-');
            });
            truycap.data.labels = date;
            truycap.update();
        });

    };

    function access_updateChartyear() {
        async function fetchjson() {
            const url = "{{ route('api.access.thisyear') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            let sumvisit = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumvisit += Number(datapoints[i][1]);
            };
            const visitors = datapoints.map(function(index) {
                return index[1];
            });
            truycap.data.datasets[0].label = "{{ __('dashboard.chart.count_access') }}: " + sumvisit;
            truycap.data.datasets[0].data = visitors;
            truycap.update();
        });
        fetchjson().then(datapoints => {
            let sumviews = 0;
            for (let i = 0; i < datapoints.length; i++) {
                sumviews += Number(datapoints[i][2]);
            };
            const pageViews = datapoints.map(function(index) {
                return index[2];
            });
            truycap.data.datasets[1].label = "{{ __('dashboard.chart.count_view') }}: " + sumviews;
            truycap.data.datasets[1].data = pageViews;
            truycap.update();
        });
        fetchjson().then(datapoints => {

            const date = datapoints.map(function(index) {
                return "T." + index[0];
            });
            truycap.data.labels = date;
            truycap.update();
        });

    };
</script>
