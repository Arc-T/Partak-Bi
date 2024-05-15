@extends('company.layouts.master')
@section('title', 'آمار مشتریان')

@section('main_content')

    <div class="row align-items-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-right: 1.5em;">

                        <!-- ############    TABS START     ############ -->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                                aria-controls="general" aria-selected="false">آمار جامع</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab"
                                aria-controls="sales" aria-selected="true">آمار شخصی</a>
                        </li>
                        <!-- ############    TABS END      ############ -->
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            </br>

                            <!-- -------------- General START   -------------- -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card border-primary mb-3">
                                            <div class="card-header">
                                                <h4>تعداد مشتریان به تفکیک سرویس</h4>
                                            </div>
                                            <div class="card-body px-3 py-4-5">
                                                <div id="chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>تعداد مشتریان به تفکیک مراکز مخابراتی</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="chart1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>تعداد مشتریان به تفکیک نوع</h4>
                                            </div>
                                            <div class="card-body">
                                                <div id="chart4"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>تعداد مشتریان به تفکیک وضعیت</h4>
                                                <h6 class="text-muted mb-0 pt-1">اطلاعات آپدیت شده</h6>
                                            </div>
                                            <div class="card-body">
                                                <div id="chart5"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>تعداد مشتریان بر اساس استان</h4>
                                                <h6 class="text-muted mb-0 pt-1">اطلاعات آپدیت شده</h6>
                                            </div>
                                            <div class="card-body">
                                                <div id="container"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>تعداد مشتریان بر اساس شهر</h4>
                                                <h6 class="text-muted mb-0 pt-1">اطلاعات آپدیت شده</h6>
                                            </div>
                                            <div class="card-body">
                                                <div id="chart3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -------------- General END   -------------- -->
                        </div>

                        <!-- -------------- Custome START -------------- -->
                        <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">

                            <form class="form form-horizontal" action="{{ url('/') }}"> <!-- Form Sales Start -->
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">تنظیمات شاخص وضعیت مشتریان</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>هزینه راه اندازی کامل</label>
                                                                <input type="text" id="roundText"
                                                                    class="form-control round" placeholder="ریال">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>هزینه راه اندازی مجدد</label>
                                                                <input type="text" id="squareText"
                                                                    class="form-control square" placeholder="ریال">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6 pt-4">
                                                            <div class="form-group">
                                                                <label>هزینه راه اندازی وایرلس</label>
                                                                <input type="text" id="squareText"
                                                                    class="form-control square" placeholder="ریال">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6 pt-4">
                                                            <div class="form-group">
                                                                <label>هزینه تعویض خط</label>
                                                                <input type="text" id="squareText"
                                                                    class="form-control square" placeholder="ریال">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6 pt-4">
                                                            <div class="form-group">
                                                                <label>هزینه نصب و حضور کارشناس</label>
                                                                <input type="text" id="squareText"
                                                                    class="form-control square" placeholder="ریال">
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6 pt-4">
                                                            <div class="form-group">
                                                                <label>هزینه هر ماه IP</label>
                                                                <input type="text" id="squareText"
                                                                    class="form-control square" placeholder="ریال">
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">ثبت
                                                            نام آنلاین</label>
                                                    </div>

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">نمایش
                                                            آمار مشتریان
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">معرف
                                                            در واحد فروش</label>
                                                    </div>

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">معرف
                                                            در ثبت نام آنلاین
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">تغییر
                                                            سرویس در پنل</label>
                                                    </div>

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">نمایش
                                                            آمار مشتریان
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end me-4">
                                        <button type="submit" class="btn btn-primary me-2 mb-1">ثبت تنظیمات</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">بازگردانی</button>
                                    </div>

                                </div>
                            </form>

                            </br>
                            <hr>

                            <div class="row match-height">
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">تنظیمات تخلیه</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">


                                                <form class="form form-horizontal" action="{{ url('/') }}">
                                                    <!-- Form Evecuation Start -->
                                                    <div class="form-body">
                                                        <div class="row">


                                                            <div class="col-md-4 form-group">
                                                                <label>ما به تفاوت تخلیه</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ریال">
                                                            </div>


                                                            <div class="col-md-4 form-group">
                                                                <label>هزینه نگهداری روزانه پورت</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ریال">
                                                            </div>


                                                            <div class="d-flex justify-content-end me-4 mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-2 mb-1">ثبت تنظیمات</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">بازگردانی</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form> <!-- Form Evecuation End -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">تنظیمات سرویس</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">

                                                <form class="form form-horizontal" action="{{ url('/') }}">
                                                    <!-- Form Service Start -->
                                                    <div class="form-body">
                                                        <div class="row">


                                                            <div class="col-md-4 form-group">
                                                                <label>آبونمان مخابرات</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ریال">
                                                            </div>


                                                            <div class="col-md-4 form-group">
                                                                <label>هزینه نگهداری روزانه پورت</label>
                                                            </div>
                                                            <div class="col-md-8 form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="ریال">
                                                            </div>


                                                            <div class="d-flex justify-content-end me-4 mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary me-2 mb-1">ثبت تنظیمات</button>
                                                                <button type="reset"
                                                                    class="btn btn-light-secondary me-1 mb-1">بازگردانی</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </form> <!-- Form Service End -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js_files')
    <script src="{{ asset('extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            series: {!! json_encode($general['StatusName']['data']) !!},
            chart: {
                type: 'donut',
            },
            labels: {!! json_encode($general['StatusName']['name']) !!},
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200 // Adjust chart width for responsiveness
                    },
                    legend: {
                        position: 'left'
                    }
                }
            }]
        };
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var options1 = {
            series: [{
                    name: 'Desktops',
                    data: [{
                            x: 'ABC',
                            y: 10
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'XYZ',
                            y: 41
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                        {
                            x: 'DEF',
                            y: 60
                        },
                    ]
                },
                {
                    name: 'Mobile',
                    data: [{
                            x: 'ABCD',
                            y: 12
                        },
                        {
                            x: 'DEFG',
                            y: 20
                        },
                        {
                            x: 'WXYZ',
                            y: 51
                        },
                        {
                            x: 'PQR',
                            y: 30
                        },
                        {
                            x: 'MNO',
                            y: 20
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },
                        {
                            x: 'CDE',
                            y: 30
                        },

                    ]
                }
            ],
            legend: {
                show: false
            },
            chart: {
                height: 350,
                type: 'treemap'
            },
            title: {
                text: 'Multi-dimensional Treemap',
                align: 'center'
            }
        };

        var chart1 = new ApexCharts(document.querySelector("#chart1"), options1);
        chart1.render();
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    </script>
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
        anychart.onDocumentReady(function() {
            // This sample uses 3rd party proj4 component
            // that makes it possible to set coordinates
            // for the points and labels on the map and
            // required for custom projections and grid labels formatting.
            // See https://docs.anychart.com/Maps/Map_Projections

            // data
            var data = [{
                    id: "IR.CM",
                    size: 2
                },
                {
                    id: "IR.TH",
                    size: 3
                },
            ];

            // create map chart
            var map = anychart.map();

            // set geodata using https://cdn.anychart.com/geodata/2.2.0/countries/australia/australia.js
            map.geoData(anychart.maps["iran"]);

            //create bubble series
            var series = map.bubble(data);

            //set series geo id field settings
            series.labels().format("{%name}");

            series.tooltip().format("{%size} thousands of tourists");

            series.tooltip().titleFormat("{%name}");


            map.title("استان تهران، پر مخاطب ترین \n منطقه ی فروش");

            // set max and min bubble sizes
            map.maxBubbleSize(35);
            map.minBubbleSize(10);

            // set container id for the chart
            map.container("container");

            // initiate chart drawing
            map.draw();
        });
    </script>

    <script>
        var options33 = {
            series: [{
                name: "",
                data: [200, 330, 548, 740, 880, 990, 1100, 1380],
            }, ],
            chart: {
                type: 'bar',
                height: 350,
            },
            plotOptions: {
                bar: {
                    borderRadius: 0,
                    horizontal: true,
                    distributed: true,
                    isFunnel: true,
                },
            },

            dataLabels: {
                enabled: true,
                formatter: function(val, opt) {
                    return opt.w.globals.labels[opt.dataPointIndex]
                },
                dropShadow: {
                    enabled: true,
                },
            },
            title: {
                text: 'Pyramid Chart',
                align: 'middle',
            },
            xaxis: {
                categories: ['Sweets', 'Processed Foods', 'Healthy Fats', 'Meat', 'Beans & Legumes', 'Dairy',
                    'Fruits & Vegetables', 'Grains'
                ],
            },
            legend: {
                show: true,
            },
        };

        var chart3 = new ApexCharts(document.querySelector("#chart3"), options33);
        chart3.render();
    </script>

    <script>
        var options44 = {
            series: [{
                    name: 'حقیقی',
                    data: [20, 100, 40, 30, 50, 80, 33]
                },
                {
                    name: 'حقوقی',
                    data: [10, 50, 40, 10, 21, 53, 44],
                },
            ],
            chart: {
                height: 350,
                type: 'radar',
            },
            dataLabels: {
                enabled: true
            },
            plotOptions: {
                radar: {
                    size: 140,
                    polygons: {
                        strokeColors: '#e9e9e9',
                        fill: {
                            colors: ['#f8f8f8', '#fff']
                        }
                    }
                }
            },
            colors: ['#FF4560', '#435ebe'],
            markers: {
                size: 4,
                colors: ['#fff'],
                strokeColor: '#FF4560',
                strokeWidth: 2,
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
            xaxis: {
                categories: ['فرودین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر']
            },
            yaxis: {
                labels: {
                    formatter: function(val, i) {
                        if (i % 2 === 0) {
                            return val
                        } else {
                            return ''
                        }
                    }
                }
            }
        };

        var chart44 = new ApexCharts(document.querySelector("#chart4"), options44);
        chart44.render();


        var options55 = {
            series: [{
                name: 'بهره برداری',
                data: [44]
            }, {
                name: 'مشکل دار',
                data: [53]
            }, {
                name: 'آماده به نصب',
                data: [1]
            }, {
                name: 'بدون وضعیت',
                data: [23]
            }, {
                name: 'جمع شده',
                data: [25]
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        total: {
                            enabled: true,
                            offsetX: 0,
                            style: {
                                fontSize: '13px',
                                fontWeight: 900
                            }
                        }
                    }
                },
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            title: {
                text: 'Fiction Books Sales'
            },
            xaxis: {
                categories: [2008]
            },
            yaxis: {
                title: {
                    text: undefined
                },
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + "K"
                    }
                }
            },
            fill: {
                opacity: 1
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            }
        };

        var chart55 = new ApexCharts(document.querySelector("#chart5"), options55);
        chart55.render();
    </script>
@endsection
@section('inline_css')
    <style>
        #container {
            height: 600px;
            width: 100%;
        }
    </style>
@endsection
