@foreach ($reports as $report)
    <div class="tab-pane fade {{$tab_index == $report->id ? 'show active' : '' }}" id="custom{{$loop->iteration}}"
        role="tabpanel" aria-labelledby="custom{{$loop->iteration}}-tab">
        <br />
        <div class="col-12">
            <div class="row">
                @if(!$report->reports_graphs->isEmpty())
                    @foreach ($report->reports_graphs as $graphs) 
                        <div class="col-md-{{$graphs->width}} mt-4">
                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <h4>
                                        {{ !is_null($graphs->title) ? $graphs->title . ' ' : ' بدون عنوان ' }}<a
                                            style="font-size: 1.2rem;" href="#" data-bs-toggle="tooltip"
                                            data-bs-original-title="یادداشت ذخیره شده برای این نمودار نمایش داده شود برای نمونه">(یادداشت)</a>
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    @include('user.layouts.partials.delete', [
                                        'url' => '/indicators/' . Request()->route . '/' . Request()->sub_route,
                                        'id' => $graphs->id,
                                        'report' => $report->id,
                                        'title' => 'نمودار ' . $graphs->graph['title'],
                                        'name' => 'report_graph_id'
                                    ])

                                    @include('user.layouts.partials.edit', [
                                        'url' => '/indicators/' . Request()->route . '/' . Request()->sub_route,
                                        'report' => $report->id,
                                        'id' => $graphs->id
                                    ])
                                    <a href="#" style="float: left;" title="یادداشت" data-bs-toggle="modal"
                                        data-bs-target="#secondary{{$loop->iteration}}">
                                        <i class="badge-circle badge-circle-light-secondary font-medium-1 me-1"
                                            data-feather="edit"></i>
                                    </a>
                                    <div class="modal fade text-left" id="secondary{{$loop->iteration}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel160" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title white" id="myModalLabel160">یادداشت نمودار</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5>متن یادداشت</h5>
                                                            <textarea type="text" class="form-control" name="graph_title"
                                                                rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">بازگشت</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-warning ms-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">ثبت تغییرات</span>
                                                    </button>
                                                    <input type="hidden" name="id" value="{{$loop->iteration}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                @php
                                    $data = json_decode($graphs->data);
                                @endphp
                                <h6 class="text-muted mb-0 pt-1">{!! 
                                 "نمودار از تاریخ &lrm;{$data->dates[0]}&lrm; تا تاریخ &lrm;{$data->dates[count($data->dates) - 1]}&lrm; می باشد"
                                  !!}</h6>
                            </div>
                            <div class="col-md-12 mt-4">
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

        /*
        * ! DANGER DATA EXPOSE
        */

        let graph2 = {!! json_encode($reports) !!};
        
        let location_type2 = "  {{ Request()->sub_route == 'province' ? 'استان ' : 'شهر '  }}";

        if (graph2.length !== 0) {

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

            for (let i = 0; i < graph2.length; i++) {

                for (let j = 0; j < graph2[i].reports_graphs.length; j++) {

                    let height = graph2[i].reports_graphs[j].height;

                    let res = JSON.parse(graph2[i].reports_graphs[j].data);

                    let title = location_type2 + res.locations + " ";

                    let chart_number = document.querySelector('[chart-type-' + graph2[i].id + j.toString() + ']');

                    if (chart_number) {

                        let chart_value = chart_number.getAttribute('chart-type-' + graph2[i].id + j.toString());

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
                                        height: height,
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
                                    colors: colors,
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
        }

    </script>

@endpush