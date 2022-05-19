<script type="text/javascript">
    function browser(i) {
        if (i == "updateChart7day") {
                    updateChart7day();
                } else if (i == "updateCharttoday") {
                    updateCharttoday();
                } else if (i == "updateChartyesterday") {
                    updateChartyesterday();
                } else if (i == "updateChartweek") {
                    updateChartweek();
                } else if (i == "updateChart30day") {
                    updateChart30day();
                } else if (i == "updateChartmonth") {
                    updateChartmonth();
                } else if (i == "updateChartyear") {
                    updateChartyear();
                }

        let timerInterval
        Swal.fire({
            title: 'Đang tải dữ liệu',
            timer: 800,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    //   b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        })
    }
    const data = {
        labels: [],
        datasets: [{
            label: 'Lượt truy cập ',
            data: [],
            backgroundColor: [
                'rgba(255, 26, 104, 0.3)',
                'rgba(54, 162, 235, 0.3)',
                'rgba(255, 206, 86, 0.3)',
                'rgba(75, 192, 192, 0.3)',
                'rgba(153, 102, 255, 0.3)',
                'rgba(255, 159, 64, 0.3)',
                'rgba(244, 37, 152, 0.3)',
                'rgba(139, 170, 15, 0.3)',
                'rgba(0, 18, 179, 0.3)',
                'rgba(105, 105, 105, 0.3)'
            ],
            borderColor: [
                'rgba(255, 26, 104, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(244, 37, 152, 1)',
                'rgba(139, 170, 15, 1)',
                'rgba(0, 18, 179, 1)',
                'rgba(105, 105, 105, 1)'
            ],
            borderWidth: 1,
            borderRadius: 5
        }]
    };

    // config
    const config = {
        type: 'doughnut',
        data,
        options: {
            maintainAspectRatio: false,

            scales: {
                // y: {
                //     beginAtZero: false
                // }
            }
        }
    };

    // render init block
    const trinhduyet = new Chart(
        document.getElementById('trinhduyet'),
        config
    );
    updateCharttoday();


    function updateChart7day() {
        async function fetchjson() {
            const url = "{{ route('api.browser.7day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const browser = datapoints.map(function(index) {
                return index.browser;
            });
            trinhduyet.data.labels = browser;
            trinhduyet.update();
        });

        fetchjson().then(datapoints => {
            const sessions = datapoints.map(function(index) {
                return index.sessions;
            });

            trinhduyet.config.data.datasets[0].data = sessions;
            trinhduyet.update();
        });
    };

    function updateCharttoday() {
        async function fetchjson() {
            const url = "{{ route('api.browser') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const browser = datapoints.map(function(index) {
                return index.browser;
            });

            trinhduyet.data.labels = browser;
            trinhduyet.update();
        });

        fetchjson().then(datapoints => {
            const sessions = datapoints.map(function(index) {
                return index.sessions;
            });

            trinhduyet.config.data.datasets[0].data = sessions;
            trinhduyet.update();
        });
    };

    function updateChartyesterday() {
        async function fetchjson() {
            const url = "{{ route('api.browser.yesterday') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const browser = datapoints.map(function(index) {
                return index.browser;
            });

            trinhduyet.data.labels = browser;
            trinhduyet.update();
        });

        fetchjson().then(datapoints => {
            const sessions = datapoints.map(function(index) {
                return index.sessions;
            });

            trinhduyet.config.data.datasets[0].data = sessions;
            trinhduyet.update();
        });

    };

    function updateChartweek() {
        async function fetchjson() {
            const url = "{{ route('api.browser.thisweek') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const browser = datapoints.map(function(index) {
                return index.browser;
            });

            trinhduyet.data.labels = browser;
            trinhduyet.update();
        });

        fetchjson().then(datapoints => {
            const sessions = datapoints.map(function(index) {
                return index.sessions;
            });

            trinhduyet.config.data.datasets[0].data = sessions;
            trinhduyet.update();
        });

    };

    function updateChart30day() {
        async function fetchjson() {
            const url = "{{ route('api.browser.30day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const browser = datapoints.map(function(index) {
                return index.browser;
            });

            trinhduyet.data.labels = browser;
            trinhduyet.update();
        });

        fetchjson().then(datapoints => {
            const sessions = datapoints.map(function(index) {
                return index.sessions;
            });

            trinhduyet.config.data.datasets[0].data = sessions;
            trinhduyet.update();
        });

    };

    function updateChartmonth() {
        async function fetchjson() {
            const url = "{{ route('api.browser.thismonth') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const browser = datapoints.map(function(index) {
                return index.browser;
            });

            trinhduyet.data.labels = browser;
            trinhduyet.update();
        });

        fetchjson().then(datapoints => {
            const sessions = datapoints.map(function(index) {
                return index.sessions;
            });

            trinhduyet.config.data.datasets[0].data = sessions;
            trinhduyet.update();
        });

    };

    function updateChartyear() {
        async function fetchjson() {
            const url = "{{ route('api.browser.thisyear') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const browser = datapoints.map(function(index) {
                return index.browser;
            });

            trinhduyet.data.labels = browser;
            trinhduyet.update();
        });

        fetchjson().then(datapoints => {
            const sessions = datapoints.map(function(index) {
                return index.sessions;
            });

            trinhduyet.config.data.datasets[0].data = sessions;
            trinhduyet.update();
        });

    };
</script>
