{{-- <script src="{{asset('backend')}}/bower_components/jquery/dist/jquery.min.js"></script> --}}

<script>
    
    function ref(i) {
        if (i == "updateRef7day") {
                    updateRef7day();
                } else if (i == "updateReftoday") {
                    updateReftoday();
                } else if (i == "updateRefyesterday") {
                    updateRefyesterday();
                } else if (i == "updateRefweek") {
                    updateRefweek();
                } else if (i == "updateRef30day") {
                    updateRef30day();
                } else if (i == "updateRefmonth") {
                    updateRefmonth();
                } else if (i == "updateRefyear") {
                    updateRefyear();
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
        $('#tableRef').DataTable({
            "order": [
                [1, "desc"]
            ],
            "ajax": "{{ route('api.referral') }}",
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

    function updateRefyesterday() {
        var datatable = $('#tableRef').DataTable();
        $.get("{{ route('api.referral.yesterday') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateReftoday() {
        var datatable = $('#tableRef').DataTable();
        $.get("{{ route('api.referral') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateRef7day() {
        var datatable = $('#tableRef').DataTable();
        $.get("{{ route('api.referral.7day') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateRefweek() {
        var datatable = $('#tableRef').DataTable();
        $.get("{{ route('api.referral.thisweek') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateRef30day() {
        var datatable = $('#tableRef').DataTable();
        $.get("{{ route('api.referral.30day') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateRefmonth() {
        var datatable = $('#tableRef').DataTable();
        $.get("{{ route('api.referral.thismonth') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };

    function updateRefyear() {
        var datatable = $('#tableRef').DataTable();
        $.get("{{ route('api.referral.thisyear') }}", function(newDataArray) {
            datatable.clear();
            datatable.rows.add(newDataArray.data);
            datatable.draw();
        });
    };
</script>
