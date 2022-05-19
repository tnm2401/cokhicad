<script type="text/javascript">
    function country(i) {
        if (i == "country_updateChart7day") {
                    country_updateChart7day();
                } else if (i == "country_updateCharttoday") {
                    country_updateCharttoday();
                } else if (i == "country_updateChartyesterday") {
                    country_updateChartyesterday();
                } else if (i == "country_updateChartweek") {
                    country_updateChartweek();
                } else if (i == "country_updateChart30day") {
                    country_updateChart30day();
                } else if (i == "country_updateChartmonth") {
                    country_updateChartmonth();
                } else if (i == "country_updateChartyear") {
                    country_updateChartyear();
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

    const ctx_quocgia = document.getElementById('quocgia').getContext('2d');
    const quocgia = new Chart(ctx_quocgia, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Quốc Gia',
                data: [],
                backgroundColor: '#d88c80',
                borderColor: '#dd4d37',
                tension: 0.5,
                borderWidth: 1,
                fill: true,
            }]
        },
        options: {
            maintainAspectRatio: false,

            scales: {
                y: {
                    beginAtZero: true
                    // min : 0,
                }
            }
        }
    });
    country_updateCharttoday();

    function country_updateCharttoday() {
        async function fetchjson() {
            const url = "{{ route('api.country') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const country = datapoints.map(function(index) {
                return index[0];
            });
            quocgia.data.labels = country;
            quocgia.update();
        });
        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[1];
            });
            quocgia.data.datasets[0].data = value;
            quocgia.update();
        });
    };

    function country_updateChartyesterday() {
        async function fetchjson() {
            const url = "{{ route('api.country.yesterday') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const country = datapoints.map(function(index) {
                return index[0];
            });
            quocgia.data.labels = country;
            quocgia.update();
        });
        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[1];
            });
            quocgia.data.datasets[0].data = value;
            quocgia.update();
        });
    };

    function country_updateChart7day() {
        async function fetchjson() {
            const url = "{{ route('api.country.7day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const country = datapoints.map(function(index) {
                return index[0];
            });
            quocgia.data.labels = country;
            quocgia.update();
        });
        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[1];
            });
            quocgia.data.datasets[0].data = value;
            quocgia.update();
        });
    };

    function country_updateChartweek() {
        async function fetchjson() {
            const url = "{{ route('api.country.thisweek') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const country = datapoints.map(function(index) {
                return index[0];
            });
            quocgia.data.labels = country;
            quocgia.update();
        });
        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[1];
            });
            quocgia.data.datasets[0].data = value;
            quocgia.update();
        });
    };

    function country_updateChart30day() {
        async function fetchjson() {
            const url = "{{ route('api.country.30day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const country = datapoints.map(function(index) {
                return index[0];
            });
            quocgia.data.labels = country;
            quocgia.update();
        });
        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[1];
            });
            quocgia.data.datasets[0].data = value;
            quocgia.update();
        });
    };

    function country_updateChartmonth() {
        async function fetchjson() {
            const url = "{{ route('api.country.thismonth') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const country = datapoints.map(function(index) {
                return index[0];
            });
            quocgia.data.labels = country;
            quocgia.update();
        });
        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[1];
            });
            quocgia.data.datasets[0].data = value;
            quocgia.update();
        });
    };
</script>
