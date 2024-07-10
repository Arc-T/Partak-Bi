@extends('user.layouts.master')

@section('main_content')

<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <svg width="1.6em" height="1.6em" style="color: rgb(255, 255, 255);">
                                            <use
                                                xlink:href="vendors/bootstrap-icons/bootstrap-icons.svg#calendar-date-fill">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">تاریخ امروز</h6>
                                    <h6 class="font-extrabold mb-0">{{ verta()->format('%d %B %Y') }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">مشتریان فعال</h6>
                                    <h6 class="font-extrabold mb-0">183</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <svg width="1.8em" height="2em" style="color: rgb(255, 255, 255);">
                                            <use xlink:href="vendors/bootstrap-icons/bootstrap-icons.svg#stack">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">سرویس فعال</h6>
                                    <h6 class="font-extrabold mb-0">560</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <!-- <i class="iconly-boldBookmark"></i> -->
                                        <svg width="1.4em" height="2em" style="color: rgb(255, 255, 255);">
                                            <use xlink:href="vendors/bootstrap-icons/bootstrap-icons.svg#building">
                                            </use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">نیروهای شرکت</h6>
                                    <h6 class="font-extrabold mb-0">132</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>آمار کلی سامانه</h4>
                        </div>
                        <div class="card-body">
                            <div id="bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('images/faces/1.jpg') }}" alt="Face">
                        </div>
                        <div class="me-3 name ps-2">
                            <h5 class="font-bold">{{ Auth::user()->name }}</h5>
                            <h6 class="text-muted mt-0">{{ Auth::user()->username . '@' }}</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4>پر مخاطب ترین استان ها</h4>
                    <h6 class="text-muted mb-0 pt-1">اطلاعات آپدیت شده</h6>
                </div>
                <div class="card-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>میزان فروش ماهیانه</h4>
                    </div>
                    <div class="card-body">
                        <div id="area"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>پرفروش ترین بسته ترافیکی</h4>
                        <h6 class="text-muted mb-0 pt-1">بسته ترافیکی مشترکین ADSL</h6>
                    </div>
                    <div class="card-body">
                        <div id="radialGradient"></div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>پرفروش ترین سرویس ها</h4>
                    </div>
                    <div class="card-content pb-4">
                        <div class="recent-message d-flex px-4 py-3">
                            {{-- <div class="avatar avatar-lg">
                                <img src="assets/images/faces/4.jpg">
                            </div> --}}
                            <div class="name me-4">
                                <h5 class="mb-1">سرویس 400 گیگ TDLTE</h5>
                                <h6 class="text-muted mb-0">سرویس مشترکین TDLTE سه ماهه با سرعت 1 مگ</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            {{-- <div class="avatar avatar-lg">
                                <img src="assets/images/faces/5.jpg">
                            </div> --}}
                            <div class="name me-4">
                                <h5 class="mb-1">سرویس 100 گیگ ADSL</h5>
                                <h6 class="text-muted mb-0">سرویس مشترکین ADSL سه ماهه با سرعت 5 مگ</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">
                            {{-- <div class="avatar avatar-lg">
                                <img src="assets/images/faces/1.jpg">
                            </div> --}}
                            <div class="name me-4">
                                <h5 class="mb-1">سرویس 200 گیگ Wireless</h5>
                                <h6 class="text-muted mb-0">سرویس مشترکین Wireless سه ماهه با سرعت 9 مگ</h6>
                            </div>
                        </div>
                        <div class="recent-message d-flex px-4 py-3">

                            <div class="name me-4">
                                <h5 class="mb-1">سرویس 200 گیگ FTTH</h5>
                                <h6 class="text-muted mb-0">سرویس مشترکین FTTH یک ماهه با سرعت 9 مگ</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('inline_css')
<style>
    #container {
        height: 365px;
    }
</style>
@endsection

@push('scripts')
    <script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-base.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-map.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script
        src="https://cdn.anychart.com/releases/8.12.1/js/anychart-exports.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
        </script>
    <script src="https://cdn.anychart.com/releases/8.12.1/js/anychart-ui.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4">
    </script>
    <script src="{{ asset('js/iran.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.15/proj4.js"></script>

    <script>
        anychart.onDocumentReady(function () {
            // data
            var data = [
                { id: "IR.CM", size: 2 },
                { id: "IR.TH", size: 3 }
            ];

            // create map chart
            var map = anychart.map();

            // set geodata
            map.geoData(anychart.maps["iran"]);
            // create bubble series
            var series = map.bubble(data);
            
            // set series geo id field settings
            series.labels().format("{%name}");
            series.tooltip().format("{%size} thousands of tourists");
            series.tooltip().titleFormat("{%name}");

            // set map title
            map.title("استان تهران، پر مخاطب ترین \n منطقه ی فروش");
            map.title().fontFamily('Shabnam');
            // set max and min bubble sizes
            map.maxBubbleSize(35);
            map.minBubbleSize(10);
            // set container id for the chart
            map.container("container");

            // initiate chart drawing
            map.draw();

            // Function to change the background color dynamically
            function setBackgroundColor(color) {
                map.background().fill(color);
                map.draw();
            }

            // jQuery event to toggle the theme
            $('#toggle-dark').on('click', function () {
                // Toggle between dark and light themes
                var currentBackground = map.background().fill();

                if (currentBackground === "#1e1e2d") {
                    setBackgroundColor("#FFFFFF"); // Change to white for light theme
                } else {
                    setBackgroundColor("#1e1e2d"); // Change to dark for dark theme
                }
            });
        });
    </script>

    <script src="{{ asset('extensions/apexcharts/apexcharts.min.js') }}"></script>
    {{--
    <script src="{{ asset('assets/js/pages/ui-apexchart.js') }}"></script> --}}
    <script>
        var lineOptions = {
            chart: {
                type: "line",
            },
            series: [{
                name: "مشتریان",
                data: @json($sum),
            },],
            xaxis: {
                categories: @json($date),
            },
        };
        var barOptions = {
            series: [{
                name: "مالی",
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66],
            },
            {
                name: "پشتیبانی",
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
            },
            {
                name: "خدمات",
                data: [35, 40, 37, 26, 45, 48, 52, 53, 41],
            },
            {
                name: "سرویس",
                data: [37, 46, 31, 29, 33, 48, 52, 56, 49],
            },
            {
                name: "مشتری",
                data: [39, 43, 30, 21, 33, 48, 52, 56, 49],
            },
            ],
            chart: {
                type: "bar",
                height: 350,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "55%",
                    endingShape: "rounded",
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 2,
                colors: ["transparent"],
            },
            xaxis: {
                categories: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر"],
            },
            fill: {
                opacity: 1,
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " ﷼";
                    },
                },
            },
        };
        var radialGradientOptions = {
            series: [75],
            chart: {
                height: 350,
                type: "radialBar",
                // toolbar: {
                //     show: true,
                // },
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: "70%",
                        background: "#fff",
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: "front",
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24,
                        },
                    },
                    track: {
                        background: "#fff",
                        strokeWidth: "67%",
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            top: -3,
                            left: 0,
                            blur: 4,
                            opacity: 0.35,
                        },
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: "#888",
                            fontSize: "17px",
                        },
                        value: {
                            formatter: function (val) {
                                return parseInt(val);
                            },
                            color: "#111",
                            fontSize: "36px",
                            show: true,
                        },
                    },
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    shade: "dark",
                    type: "horizontal",
                    shadeIntensity: 0.5,
                    gradientToColors: ["#ABE5A1"],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100],
                },
            },
            stroke: {
                lineCap: "round",
            },
            labels: ["گیگابایت"],
        };
        var areaOptions = {
            series: [{
                name: "مجمموعه اول",
                data: [31, 40, 28, 51, 42, 109, 100],
            },
            {
                name: "مجموعه دوم",
                data: [110, 320, 405, 320, 340, 520, 410],
            },
            {
                name: "مجموعه سوم",
                data: [1, 30, 40, 3, 31, 52, 41],
            },
            {
                name: "مجموعه چهارم",
                data: [11, 32, 45, 32, 34, 52, 41],
            },
            ],
            chart: {
                height: 350,
                type: "area",
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "2018-09-19T00:00:00.000Z",
                    "2018-09-19T01:30:00.000Z",
                    "2018-09-19T02:30:00.000Z",
                    "2018-09-19T03:30:00.000Z",
                    "2018-09-19T04:30:00.000Z",
                    "2018-09-19T05:30:00.000Z",
                    "2018-09-19T06:30:00.000Z",
                ],
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy HH:mm",
                },
            },
        };
        var radialBarOptions = {
            series: [44, 55, 67, 83],
            chart: {
                height: 350,
                type: "radialBar",
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: "22px",
                        },
                        value: {
                            fontSize: "16px",
                        },
                        total: {
                            show: true,
                            label: "Total",
                            formatter: function (w) {
                                // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                return 249;
                            },
                        },
                    },
                },
            },
            labels: ["Apples", "Oranges", "Bananas", "Berries"],
        };
        var bar = new ApexCharts(document.querySelector("#bar"), barOptions);
        var line = new ApexCharts(document.querySelector("#line"), lineOptions);
        // var candle = new ApexCharts(document.querySelector("#candle"), candleOptions);
        var radialGradient = new ApexCharts(document.querySelector("#radialGradient"), radialGradientOptions);
        var area = new ApexCharts(document.querySelector("#area"), areaOptions);
        area.render();
        bar.render();
        line.render();
        radialGradient.render();

    </script>
@endpush
@endsection