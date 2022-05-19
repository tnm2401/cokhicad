{{-- <script src="{{asset('backend')}}/bower_components/jquery/dist/jquery.min.js"></script> --}}

<script>
    function site(i) {
        if (i == "updateSite7day") {
            updateSite7day();
        } else if (i == "updateSitetoday") {
            updateSitetoday();
        } else if (i == "updateSiteyesterday") {
            updateSiteyesterday();
        } else if (i == "updateSiteweek") {
            updateSiteweek();
        } else if (i == "updateSite30day") {
            updateSite30day();
        } else if (i == "updateSitemonth") {
            updateSitemonth();
        } else if (i == "updateSiteyear") {
            updateSiteyear();
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

    $(document).ready(function() {
        $('#tablesite').DataTable({
            "order": [
                [1, "desc"]
            ],
            "ajax": "{{ route('api.pageview') }}",
            "language": {
                "paginate": {
                    "next": "Sau",
                    "previous": "Trước"

                },
                "search": "Tìm kiếm",
                "lengthMenu": "Hiện _MENU_ giá trị trên trang",
                "zeroRecords": "Không có dữ liệu",
                "info": "Đang hiện _PAGE_ trên _PAGES_ trang",
                "infoEmpty": "Không tìm thấy dữ liệu hợp lệ",
                "infoFiltered": "(đã lọc trong tổng số _MAX_ giá trị)"
            }

        });
    });

    function updateSiteyesterday() {
        var datatable = $('#tablesite').DataTable();
        $.get("{{ route('api.pageview.yesterday') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateSitetoday() {
        var datatable = $('#tablesite').DataTable();
        $.get("{{ route('api.pageview') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateSite7day() {
        var datatable = $('#tablesite').DataTable();
        $.get("{{ route('api.pageview.7day') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateSiteweek() {
        var datatable = $('#tablesite').DataTable();
        $.get("{{ route('api.pageview.thisweek') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateSite30day() {
        var datatable = $('#tablesite').DataTable();
        $.get("{{ route('api.pageview.30day') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateSitemonth() {
        var datatable = $('#tablesite').DataTable();
        $.get("{{ route('api.pageview.thismonth') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateSiteyear() {
        var datatable = $('#tablesite').DataTable();
        $.get("{{ route('api.pageview.thisyear') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };
</script>
