@foreach ($reports as $report)
    <div class="tab-pane fade" id="custom{{$loop->iteration}}" role="tabpanel"
        aria-labelledby="custom{{$loop->iteration}}-tab">
        <br />
        <div class="col-12">
            <div class="row">
                @if(!$report->reportGraphs->isEmpty())
                    @foreach ($report->reportGraphs as $graphs) 
                        <!-- <div class="col-{{ ($graphs->graph['name'] === 'pie') ? '4' : '12'}} mt-4"> -->
                        <div class="col-md-12 mt-4">
                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <h4>{{ !is_null($graphs->title) ? $graphs->title : 'بدون عنوان' }}</h4>
                                </div>
                                <div class="col-md-4">
                                    @include('user.layouts.partials.delete', [
                            'url' => '/indicators/' . Request()->route . '/' . Request()->sub_route,
                            'id' => $graphs->id,
                            'title' => 'نمودار ' . $graphs->graph['title'],
                            'name' => 'report_id'
                        ])

                                    @include('user.layouts.partials.edit', [
                            'url' => '/indicators/' . Request()->route . '/' . Request()->sub_route,
                            'id' => $graphs->id
                        ])
                                </div>
                            </div>
                            <div>
                                <h6 class="text-muted mb-0 pt-1">اطلاعات از تاریخ تا هستند</h6>
                            </div>
                            <div class="col-md-12">
                                <div chart-type-{{$report->id . $loop->iteration - 1}}="{{$graphs->graph['name']}}"></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning mt-4">
                        <h4 class="alert-heading">توجه !</h4>
                        <p>هیچ نموداری برای گزارش خود انتخاب نکرده اید. لطفا از سربرگ آمار شخصی اقدام به ثبت
                            نمودار کنید</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endforeach

@push('scripts')

    <script>

        let graph = {!! json_encode($reports) !!};

        if (graph.length !== 0) {

            let font_family = 'Shabnam';

            let locale = {
                "name": "fa",
                "options": {
                    "months": [
                        "فروردین",
                        "اردیبهشت",
                        "خرداد",
                        "تیر",
                        "مرداد",
                        "شهریور",
                        "مهر",
                        "آبان",
                        "آذر",
                        "دی",
                        "بهمن",
                        "اسفند"
                    ],
                    "shortMonths": [
                        "فرو",
                        "ارد",
                        "خرد",
                        "تیر",
                        "مرد",
                        "شهر",
                        "مهر",
                        "آبا",
                        "آذر",
                        "دی",
                        "بهمـ",
                        "اسفـ"
                    ],
                    "days": [
                        "یکشنبه",
                        "دوشنبه",
                        "سه شنبه",
                        "چهارشنبه",
                        "پنجشنبه",
                        "جمعه",
                        "شنبه"
                    ],
                    "shortDays": ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                    "toolbar": {
                        "exportToSVG": "دانلود SVG",
                        "exportToPNG": "دانلود PNG",
                        "exportToCSV": "دانلود CSV",
                        "menu": "منو",
                        "selection": "انتخاب",
                        "selectionZoom": "بزرگنمایی انتخابی",
                        "zoomIn": "بزرگنمایی",
                        "zoomOut": "کوچکنمایی",
                        "pan": "پیمایش",
                        "reset": "بازنشانی بزرگنمایی"
                    }
                }
            };

            for (let i = 0; i < graph.length; i++) {

                for (let j = 0; j < graph[i].report_graphs.length; j++) {

                    let res = JSON.parse(graph[i].report_graphs[j].data);

                    let title = graph[i].report_graphs[j].title;

                    let chart_number = document.querySelector('[chart-type-' + graph[i].id + j.toString() + ']');

                    if (chart_number) {

                        let chart_value = chart_number.getAttribute('chart-type-' + graph[i].id + j.toString());

                        let options;

                        switch (chart_value) {
                            case 'bar':
                                options = {
                                    series: res.indicators,
                                    chart: {
                                        locales: [locale],
                                        defaultLocale: 'fa',
                                        fontFamily: font_family,
                                        type: 'bar',
                                        height: 350,
                                        stacked: true,
                                        stackType: '100%'
                                    },
                                    plotOptions: {
                                        bar: {
                                            horizontal: true,
                                        },
                                    },
                                    stroke: {
                                        width: 1,
                                        colors: ['#fff']
                                    },
                                    title: {
                                        text: title,
                                        align: 'center'
                                    },
                                    xaxis: {
                                        categories: res.dates
                                    },
                                    yaxis: {
                                        labels: {
                                            offsetX: -50,
                                        },
                                    },
                                    /*
                                    tooltip: {
                                    y: {
                                    formatter: function (val) {
                                    return val + "K"
                                    }
                                    }
                                    },
                                    */
                                    fill: {
                                        opacity: 1
                                    },
                                    legend: {
                                        position: 'top',
                                        horizontalAlign: 'center',
                                        verticalAlign: 'bottom',
                                        offsetX: 40
                                    }
                                };
                                break;
                            case 'line':
                                options = {
                                    series: res.indicators,
                                    chart: {
                                        locales: [locale],
                                        defaultLocale: 'fa',
                                        fontFamily: font_family,
                                        height: 350,
                                        type: 'line',
                                        zoom: {
                                            enabled: false
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'straight'
                                    },
                                    title: {
                                        text: title,
                                        align: 'center'
                                    },
                                    grid: {
                                        row: {
                                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                            opacity: 0.5
                                        },
                                    },
                                    xaxis: {
                                        categories: res.dates,
                                    }
                                };
                                break;
                            case 'pie':
                                options = {
                                    series: [44, 55, 13, 43, 22],
                                    chart: {
                                        locales: [locale],
                                        defaultLocale: 'fa',
                                        fontFamily: font_family,
                                        width: 400,
                                        type: 'pie',
                                    },
                                    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                                    responsive: [{
                                        breakpoint: 480,
                                        options: {
                                            chart: {
                                                width: 200
                                            },
                                        }
                                    }]
                                };
                                break;
                            case 'radar':
                                options = {
                                    series: [{
                                        name: 'Series 1',
                                        data: [20, 100, 40, 30, 50, 80, 33],
                                    }],
                                    chart: {
                                        locales: [locale],
                                        defaultLocale: 'fa',
                                        fontFamily: font_family,
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
                                    title: {
                                        align: 'center',
                                        text: title
                                    },
                                    colors: ['#FF4560'],
                                    markers: {
                                        size: 4,
                                        colors: ['#fff'],
                                        strokeColor: '#FF4560',
                                        strokeWidth: 2,
                                    },
                                    tooltip: {
                                        y: {
                                            formatter: function (val) {
                                                return val
                                            }
                                        }
                                    },
                                    xaxis: {
                                        categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
                                    },
                                    yaxis: {
                                        labels: {
                                            formatter: function (val, i) {
                                                if (i % 2 === 0) {
                                                    return val
                                                } else {
                                                    return ''
                                                }
                                            }
                                        }
                                    }
                                };
                                break;
                            case 'area':
                                options = {
                                    series: res.indicators,
                                    chart: {
                                        locales: [locale],
                                        defaultLocale: 'fa',
                                        fontFamily: font_family,
                                        height: 350,
                                        type: 'area'
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'smooth'
                                    },
                                    xaxis: {
                                        type: 'date',
                                        categories: res.dates
                                    },
                                    tooltip: {
                                        x: {
                                            format: 'dd/MM/yy HH:mm'
                                        },
                                    },
                                };
                                break;
                            default:
                                options = {};
                        }

                        if (options) {

                            let chart = new ApexCharts(chart_number, options);
                            chart.render();

                        } else {
                            console.error('Invalid chart');
                        }

                    }
                }
            }
        }

    </script>

@endpush