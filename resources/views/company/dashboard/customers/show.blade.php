@extends('company.layouts.master')
@section('title', 'آمار مشتریان')

@section('main_content')

    <div class="row align-items-center">
        <div class="col-md">
            <div class="card">
                <div class="card-body">

                    <!-- ############    TABS START     ############ -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-right: 1.5em;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                                aria-controls="general" aria-selected="false">آمار جامع</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab"
                                aria-controls="sales" aria-selected="true">آمار شخصی</a>
                        </li>
                    </ul>
                    <!-- ############    TABS END      ############ -->

                    <div class="tab-content" id="myTabContent">
                        <!-- -------------- General START   -------------- -->
                        <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-primary mb-3">
                                            <div class="card-header">
                                                <h4>تعداد مشتریان بر اساس همه ی وضعیت ها به تفکیک استان</h4>
                                                <h6 class="text-muted mb-0 pt-1">اطلاعات از تاریخ تا هستند</h6>
                                            </div>
                                            <div class="card-body px-3 py-4-5">
                                                <div id="chart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------------- General END   -------------- -->

                        <!-- -------------- Custom START -------------- -->
                        <div class="tab-pane fade show active" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="ms-4 mt-4">
                                        لیست نمودار ها
                                    </h4>

                                    <div class="card-group">
                                        @foreach ($graphs_list as $graph)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <form method=post
                                                            action={{ route('company.indicators.store', [$subdomain]) }}>
                                                            @csrf
                                                            <img class="card-img-top img-fluid"
                                                                src="{{ asset('images/graphs/' . $graph->name . '-chart.png') }}"
                                                                alt="Card image cap">
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{ 'نمودار ' . $graph->title }}
                                                                </h4>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h6 class="mt-4">اندازه نمودار</h6>
                                                                        <select class="form-select"
                                                                            name={{ $graph->name . '_size' }}
                                                                            style="background-position: left.75rem center">
                                                                            <option>کوچک</option>
                                                                            <option>متوسط</option>
                                                                            <option>بزرگ</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-6">

                                                                        <h6 class="mt-4">عنوان نمودار (اختیاری)</h6>
                                                                        <input type="text" class="form-control"
                                                                            name={{ $graph->name . '_title' }}
                                                                            placeholder="گزارش برترین استان ها">

                                                                    </div>

                                                                    <div class="col-md-12 mt-4">
                                                                        <h6>استان ها</h6>
                                                                        <select class="choices form-select multiple-remove"
                                                                            name={{ $graph->name . '_provinces[]' }}
                                                                            multiple="multiple">
                                                                            <option value="ALL" selected>انتخاب همه</option>
                                                                            {{-- <optgroup label="Figures"> --}}
                                                                                {{-- <option value="romboid">Romboid</option>
                                                                                <option value="trapeze" selected>Trapeze
                                                                                </option>
                                                                                <option value="triangle">Triangle</option>
                                                                                <option value="polygon">Polygon</option>
                                                                            </optgroup>
                                                                            <optgroup label="Colors">
                                                                                <option value="red">Red</option>
                                                                                <option value="green">Green</option>
                                                                                <option value="blue" selected>Blue
                                                                                </option>
                                                                                <option value="purple">Purple</option>
                                                                            </optgroup> --}}
                                                                        </select>
                                                                    </div>

                                                                    <div class="mt-4">
                                                                        <button type="submit"
                                                                            class="btn btn-block btn-primary">ثبت</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <hr />

                                <div class="card-content">
                                    <div class="card-body">
                                        <h4>
                                            لیست گزارش های ثبت شده
                                        </h4>
                                    </div>
                                    <!-- table head dark -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>ردیف</th>
                                                        <th>نام شرکت</th>
                                                        <th>ساب دامین</th>
                                                        <th>توضیحات</th>
                                                        <th>فعال</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach ($companies as $company) --}}
                                                    <tr>
                                                        <td>hello</td>
                                                        <td>hello</td>
                                                        <td>hello</td>
                                                        <td>hello</td>
                                                        <td>
                                                            {{-- @if ($company->active)
                                                                    <span class="badge bg-success">فعال</span>
                                                                @else
                                                                    <span class="badge bg-danger">غیر فعال</span>
                                                                @endif --}}

                                                        </td>
                                                        <td>
                                                            {{-- <div class="row">
                                                                    <div class="col-md-1">
                                                                        @include(
                                                                            'partak.layouts.partials.delete',
                                                                            [
                                                                                'route' => 'companies',
                                                                                'parameter' => $company,
                                                                            ]
                                                                        )
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        @include(
                                                                            'partak.layouts.partials.edit',
                                                                            [
                                                                                'route' => 'companies',
                                                                                'parameter' => $company,
                                                                            ]
                                                                        )
                                                                    </div>
                                                                </div> --}}
                                                        </td>
                                                    </tr>
                                                    {{-- @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- -------------- Custom END   -------------- -->
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_files')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- <script>
        /*
         $("#active").click(function() {
             if ($("#active").prop("checked")) {

                 $("#size_select").prop('disabled', false);

                 $("#province_select").prop('disabled', false);

                 $("#title").prop('disabled', false);

             } else {
                 $("#size_select").prop('disabled', true);

                 $("#province_select").prop('disabled', true);

                 $("#title").prop('disabled', true);
             }
         });
         */
    </script> --}}

    <script src={{ asset('extensions/apexcharts/apexcharts.min.js') }}></script>

    <script src={{ asset('extensions/choices.js/public/assets/scripts/choices.js') }}></script>

    <script src={{ asset('js/pages/form-element-select.js') }}></script>

    <script>
        let data = {!! json_encode($general) !!};

        var options_1 = {

            series: data['indicators'],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: {
                    show: true
                },
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
                categories: data['locations'],
            },
            legend: {
                position: 'right',
                offsetY: 40
            },
            fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options_1);
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
    </script>

@endsection

@section('inline_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href={{ asset('extensions/choices.js/public/assets/styles/choices.css') }} />
@endsection
