<figure class="highcharts-figure">
    <div id="chart"></div>
    <p class="highcharts-description">
    </p>
</figure>

<div class="box box-success">
    <form id="shortday" action="{{ route('backend.shortday.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="box-body">
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> {{ __('dashboard.select.month') }}</label>
                        <select class="form-control" name="getmonth" id="getmonth">
                            @for ($i = 1; $i <= 12; $i++)
                                @if($i == Carbon::now()->month && $i<10)
                                <option selected value="0{{ Carbon::now()->month }}"> {{ $i }}</option>
                                @elseif($i == Carbon::now()->month && $i>10)
                                <option selected value="{{ Carbon::now()->month }}"> {{ $i }}</option>
                                @elseif ($i < 10)
                                    <option value="0{{ $i }}"> {{ $i }}</option>
                                @else
                                    <option value="{{ $i }}"> {{ $i }}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-body">
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> {{ __('dashboard.select.year') }}</label>
                        <select class="form-control" id="getyear" name="getyear">
                            @for ($i =  Carbon::now()->year ; $i <= 2040; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> {{ __('dashboard.action') }}</label>
                        <button type="submit" class="btn btn-primary form-control xemthongke">{{ __('dashboard.result') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('style')
    <style>
        #chart {
            height: 400px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            /* min-width: 310px; */
            max-width: 100%;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: "Roboto Condensed", sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>
@endpush
@push('script')
    <script src="{{ asset('backend') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script type="text/javascript" charset="utf-8" async defer>
        function clock() {
            // We create a new Date object and assign it to a variable called "time".
            var time = new Date(),
                // Access the "getHours" method on the Date object with the dot accessor.
                hours = time.getHours(),
                // Access the "getMinutes" method with the dot accessor.
                minutes = time.getMinutes(),
                seconds = time.getSeconds();
            document.querySelectorAll(".clock")[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(
                seconds);

            function harold(standIn) {
                if (standIn < 10) {
                    standIn = "0" + standIn;
                }
                return standIn;
            }
        }
        setInterval(clock, 1000);
    </script>
    <script src="{{ asset('backend') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/highcharts/highcharts.js"></script>
    <script src="{{ asset('backend') }}/assets/js/highcharts/exporting.js"></script>
    <script src="{{ asset('backend') }}/assets/js/highcharts/export-data.js"></script>
    <script src="{{ asset('backend') }}/assets/js/highcharts/accessibility.js"></script>
    <script src="{{ asset('backend') }}/assets/js/highcharts/dark-unica.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> --}}
    <script>
        var API_URL = "{{ route('api.index') }}";
        $.get(API_URL + "/thong-ke-truy-cap").then(function(response) {
            // alert(response);
        });
    </script>
    <script>
        $.get(API_URL + "/thong-ke-truy-cap").then(function(response) {
            Highcharts.setOptions({
                chart: {
                    style: {
                        fontFamily: "Roboto Condensed",
                    },
                },
            });
            Highcharts.chart("chart", {
                chart: {
                    type: "column",
                },
                title: {
                    text: "{{ __('dashboard.chart') }} : <?php echo $month; ?> - <?php echo $year; ?> ",
                },
                subtitle: {
                    text: '{{ __('dashboard.source') }}: <a href="">API Website</a>',
                },
                xAxis: {
                    type: "category",
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: "13px",
                            fontFamily: "Roboto Condensed, sans-serif",
                        },
                    },
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: "{{ __('dashboard.chart.count_access') }}",
                    },
                },
                legend: {
                    enabled: false,
                },
                tooltip: {
                    pointFormat: "{{ __('dashboard.chart.total') }} <b>{point.y:.1f} {{ __('dashboard.chart.count_access') }}</b>",
                },
                series: [{
                    name: "Lượt truy cập",

                    data: response,
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: "#FFFFFF",
                        align: "right",
                        format: "{point.y:.1f}", // one decimal
                        y: 10, // 10 pixels down from the top
                        style: {
                            fontSize: "13px",
                            fontFamily: "Roboto Condensed, sans-serif",
                        },
                    },
                }, ],
            });
        });
    </script>

    <script>
        // this is the id of the form
        $("#shortday").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var get_month = $('#getmonth').val();
            var get_year = $('#getyear').val();
            var url = form.attr("action");
            // alert(url);
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    // alert(data); // show response from the php script.
                    Highcharts.chart("chart", {
                        chart: {
                            type: "column",
                        },
                        title: {
                            text: "Thống kê truy cập tháng : " + get_month + ' - ' + get_year,
                        },
                        subtitle: {
                            text: 'Nguồn: <a href="">API Website</a>',
                        },
                        xAxis: {
                            type: "category",
                            labels: {
                                rotation: -45,
                                style: {
                                    fontSize: "13px",
                                    fontFamily: "Verdana, sans-serif",
                                },
                            },
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: "Lượt truy cập",
                            },
                        },
                        legend: {
                            enabled: false,
                        },
                        tooltip: {
                            pointFormat: "Tổng <b>{point.y:.1f} Lượt truy cập</b>",
                        },
                        series: [{
                            name: "Lượt truy cập",

                            data: data,
                            dataLabels: {
                                enabled: true,
                                rotation: -90,
                                color: "#FFFFFF",
                                align: "right",
                                format: "{point.y:.1f}", // one decimal
                                y: 10, // 10 pixels down from the top
                                style: {
                                    fontSize: "13px",
                                    fontFamily: "Verdana, sans-serif",
                                },
                            },
                        }, ],
                    });
                },
            });
        });
    </script>
@endpush
