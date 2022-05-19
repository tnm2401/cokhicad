<script type="text/javascript">
    function device(i) {
        if (i == "updateDevice7day") {
                    updateDevice7day();
                } else if (i == "updateDevicetoday") {
                    updateDevicetoday();
                } else if (i == "updateDeviceyesterday") {
                    updateDeviceyesterday();
                } else if (i == "updateDeviceweek") {
                    updateDeviceweek();
                } else if (i == "updateDevice30day") {
                    updateDevice30day();
                } else if (i == "updateDevicemonth") {
                    updateDevicemonth();
                } else if (i == "updateDeviceyear") {
                    updateDeviceyear();
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

    const ctx_thietbi = document.getElementById('thietbi').getContext('2d');
    const thietbi = new Chart(ctx_thietbi, {
        type: 'doughnut',
        data: {
            labels: [],
            datasets: [{
                label: 'Lượt Truy Cập',
                data: [12, 19, 3, 5, 2, 3, 9],
                backgroundColor: ['#74a5c1', 'rgba(243, 43, 43, 0.8)', 'rgba(233, 243, 43, 0.8)'],
                borderColor: ['#72aec9', 'rgba(243, 43, 43, 1)', 'rgba(208, 243, 43, 1)'],
                tension: 0.5,
                borderWidth: 1,
                fill: true,
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {}
        }
    });
    updateDevicetoday();

    function updateDevicetoday() {
        async function fetchjson() {
            const url = "{{ route('api.device') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const device = datapoints.map(function(index) {
                return index[1];
            });
            thietbi.data.datasets[0].data = device;
            thietbi.update();
        });

        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[0];
            });
            thietbi.data.labels = value;
            thietbi.update();
        });
    };

    function updateDeviceyesterday() {
        async function fetchjson() {
            const url = "{{ route('api.device.yesterday') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const device = datapoints.map(function(index) {
                return index[1];
            });
            thietbi.data.datasets[0].data = device;
            thietbi.update();
        });

        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[0];
            });
            thietbi.data.labels = value;
            thietbi.update();
        });
    };

    function updateDevice7day() {
        async function fetchjson() {
            const url = "{{ route('api.device.7day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const device = datapoints.map(function(index) {
                return index[1];
            });
            thietbi.data.datasets[0].data = device;
            thietbi.update();
        });

        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[0];
            });
            thietbi.data.labels = value;
            thietbi.update();
        });
    };

    function updateDeviceweek() {
        async function fetchjson() {
            const url = "{{ route('api.device.thisweek') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const device = datapoints.map(function(index) {
                return index[1];
            });
            thietbi.data.datasets[0].data = device;
            thietbi.update();
        });

        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[0];
            });
            thietbi.data.labels = value;
            thietbi.update();
        });
    };

    function updateDevice30day() {
        async function fetchjson() {
            const url = "{{ route('api.device.30day') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const device = datapoints.map(function(index) {
                return index[1];
            });
            thietbi.data.datasets[0].data = device;
            thietbi.update();
        });

        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[0];
            });
            thietbi.data.labels = value;
            thietbi.update();
        });
    };

    function updateDevicemonth() {
        async function fetchjson() {
            const url = "{{ route('api.device.thismonth') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const device = datapoints.map(function(index) {
                return index[1];
            });
            thietbi.data.datasets[0].data = device;
            thietbi.update();
        });

        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[0];
            });
            thietbi.data.labels = value;
            thietbi.update();
        });
    };

    function updateDeviceyear() {
        async function fetchjson() {
            const url = "{{ route('api.device.thisyear') }}";
            const response = await fetch(url);
            // chờ để lấy full dữ liệu
            const datapoints = await response.json();
            return datapoints;
        };
        fetchjson().then(datapoints => {
            const device = datapoints.map(function(index) {
                return index[1];
            });
            thietbi.data.datasets[0].data = device;
            thietbi.update();
        });

        fetchjson().then(datapoints => {
            const value = datapoints.map(function(index) {
                return index[0];
            });
            thietbi.data.labels = value;
            thietbi.update();
        });
    };
</script>
