<div class="tab-pane fade {{$tab_index == 1 ? 'show active' : '' }}" id="general" role="tabpanel"
    aria-labelledby="general-tab">
    </br>
    @foreach ($general as $graph)
        <div class="col-12">
            <div class="row">
                <div class="col-12 mt-4">
                    <h4>{{$graph->title}}</h4>
                    <h6 class="text-muted mb-4 pt-1">آخرین آپدیت: &lrm;{{verta('-1 day')->format('Y-m-d')}}</h6>
                    <div chart-type-{{$graph->id}}="{{$graph->name}}"></div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@push('scripts')

    <script>

        let graph = {!! json_encode($general) !!};

        let font_family = 'Shabnam';

        let location_type = "  {{ Request()->sub_route == 'province' ? 'استان ' : 'شهر'  }}";

        if (graph.length !== 0) {

            const colors = [
                "#008FFB", // Blue
                "#00E396", // Green
                "#FEB019", // Yellow/Orange
                "#FF4560", // Red
                "#775DD0", // Purple
                "#3F51B5", // Dark Blue
                "#546E7A", // Grayish Blue
                "#D4526E", // Pinkish Red
                "#8D5B4C", // Brown
                "#F86624"  // Orange
            ];

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

                let res = JSON.parse(graph[i].data);

                let title = location_type + res.locations + " ";

                let chart_number = document.querySelector('[chart-type-' + graph[i].id + ']');

                if (chart_number) {

                    let chart_value = chart_number.getAttribute('chart-type-' + graph[i].id);

                    let options;

                    switch (chart_value) {
                        case 'bar':
                            options = {
                                series: res.indicators,
                                chart: {
                                    type: 'bar',
                                    height: 700,
                                    stacked: true,
                                    toolbar: {
                                        show: true
                                    },
                                    fontFamily: font_family,
                                    zoom: {
                                        enabled: true
                                    }
                                },
                                responsive: [{
                                    breakpoint: 480,
                                    options: {
                                        legend: {
                                            position: 'bottom',
                                            offsetX: -10,
                                            offsetY: 0
                                        }
                                    }
                                }],
                                plotOptions: {
                                    bar: {
                                        horizontal: false,
                                        borderRadius: 10,
                                        borderRadiusApplication: 'end', // 'around', 'end'
                                        borderRadiusWhenStacked: 'last', // 'all', 'last'
                                        dataLabels: {
                                            total: {
                                                enabled: true,
                                                style: {
                                                    fontSize: '13px',
                                                    fontWeight: 900
                                                }
                                            }
                                        }
                                    },
                                },
                                xaxis: {
                                    categories: res.locations,
                                },
                                legend: {
                                    position: 'right',
                                    offsetY: 40
                                },
                                fill: {
                                    opacity: 1
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
                                colors: colors,
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
                                colors: colors,
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
                                colors: colors,
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
                                colors: colors,
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

    </script>

@endpush