@extends('user.layouts.master')
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
                        <a class="nav-link active" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab"
                            aria-controls="personal" aria-selected="true">آمار شخصی</a>
                    </li>

                    @if($reports->isNotEmpty())
                        @foreach ($reports as $report)
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="custom{{$loop->iteration}}-tab" data-bs-toggle="tab"
                                    href="#custom{{$loop->iteration}}" role="tab" aria-controls="custom{{$loop->iteration}}"
                                    aria-selected="true">{{$report->title}}</a>
                            </li>
                        @endforeach
                    @endif

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

                    <!-- -------------- Personal START -------------- -->
                    <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <br />
                        <div class="row">

                            <div class="col-md-12 mt-4">
                                <p>
                                    برای ثبت آمار شخصی، ابتدا نام گزارش خود را وارد نمایید (این نام به عنوان نام سربرگ
                                    اضافه خواهد شد).
                                    پس از آن، از لیست نمودار های موجود، مقادیر مورد نظر خود را اعمال کنید و بر روی دکمه
                                    ثبت کلیک کنید.
                                    برای اضافه کردن نمودار به گزارش های فعال، کافی است از جدول ارائه شده، گزارش مورد نظر
                                    را انتخاب کرده و نمودارهای مدنظر خود را به آن اضافه کنید.
                                </p>
                            </div>

                            <hr />

                            <div class="col-md-4 mt-2">
                                <form
                                    action="{{ url('/indicators/' . Request()->indicator . '/' . Request()->route . '/report')}}"
                                    method="post">
                                    @csrf
                                    <br />
                                    <h4>گزارش جدید</h4>

                                    <h6 class="text-muted mb-0 pt-1">اطلاعات گزارش خود را درج کرده و بر بروی گزینه ی
                                        "ثبت
                                        گزارش" کلیک کنید</h6>
                                    <div class="row mt-4">
                                        <div class="col-md-6 mt-3">
                                            <h5>نام گزارش</h5>
                                            <input type="text" class="form-control" placeholder="گزارش برترین استان ها"
                                                name="report_title">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="row">
                                                <h5>وضعیت گزارش</h5>
                                                <div class="col-md-6 pt-2 ">
                                                    <div class="form-check form-check-success pt-1">
                                                        <input class="form-check-input" type="radio"
                                                            name="report_active" value="1" checked />
                                                        <label class="form-check-label">
                                                            فعال
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-2">
                                                    <div class="form-check form-check-danger pt-1">
                                                        <input class="form-check-input" type="radio"
                                                            name="report_active" value="0" />
                                                        <label class="form-check-label">
                                                            غیر فعال
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <h5>توضیحات گزارش (اختیاری)</h5>
                                            <textarea class="form-control" rows="0" name="report_comment"></textarea>
                                        </div>

                                        <br />
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-block btn-outline-secondary">ثبت
                                                گزارش</button>
                                        </div>
                                    </div>
                                </form>
                                <br /><br />
                            </div>

                            <div class="col-md-8 mt-2">
                                <br />
                                <h4>
                                    لیست گزارش های ثبت شده برای شاخص
                                </h4>
                                <h6 class="text-muted mb-0 pt-1">لیست گزارش های ثبت شده برای شاخص مورد نظر به همراه
                                    مشخصات آن</h6>
                                <div class="card-content">
                                    <!-- table head dark -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>ردیف</th>
                                                        <th>نام گزارش</th>
                                                        <th>زمان ایجاد</th>
                                                        <th>توضیحات</th>
                                                        <th>فعال</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($reports as $report)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$report['title']}}</td>
                                                            <td>{{ verta($report['created_at']) }}</td>
                                                            <td>{{$report['comment']}}</td>
                                                            <td>
                                                                @if($report['active'])
                                                                    <span class="badge bg-success">فعال</span>
                                                                @else
                                                                    <span class="badge bg-danger">غیر فعال</span>
                                                                @endif
                                                            </td>
                                                            <td>...</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="col-md-12">
                                <h4 class="ms-4 mt-4">
                                    لیست نمودار ها
                                </h4>
                                <br />
                                @if($reports->isNotEmpty())
                                    <div class="card-group">
                                        @foreach ($graphs_list as $name => $graph)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <form method=post
                                                            action="{{ url('/indicators/' . Request()->indicator . '/' . Request()->route) }}">
                                                            @csrf
                                                            <img class="card-img-top img-fluid"
                                                                src="{{ asset('images/graphs/' . $name . '-chart.png') }}"
                                                                alt="Card image cap">
                                                            <input type="hidden" name="graph" value="{{$graph['id']}}">
                                                            <div class="card-body">
                                                                <h4 class="card-title">{{ 'نمودار ' . $graph['title'] }}
                                                                </h4>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h6 class="mt-4">گزارش ها</h6>
                                                                        <select class="form-select"
                                                                            style="background-position: left.75rem center"
                                                                            name="report">
                                                                            @foreach ($reports as $report)
                                                                                <option value="{{$report['id']}}">
                                                                                    {{$report['title']}}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <!-- @foreach ($graph['inputs'] as $input)
                                                                                        <div class="col-md-{{$input['size']}} mt-4">
                                                                                            <h6>{{$input['title']}}</h6>
                                                                                            @if($input['type'] === 'select')
                                                                                                <select class="choices form-select multiple-remove"
                                                                                                    name='{{$input['name']}}[]' multiple="multiple">
                                                                                                    <option value="ALL" selected>انتخاب همه
                                                                                                    </option>
                                                                                                </select>

                                                                                            @elseif($input['type'] === 'date')
                                                                                                <input type="text" class="form-control"
                                                                                                    name='{{$input['name']}}' placeholder="انتخاب کنید">
                                                                                            @endif
                                                                                        </div>
                                                                                    @endforeach -->
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
                                @else
                                    <div class="alert alert-danger">
                                        <h4 class="alert-heading">خطا !</h4>
                                        <p>هیچ گزارشی برای نمودار ها ثبت نشده. ابتدا یک گزارش ثبت کرده و سپس اقدام به انتخاب
                                            نمودار ها کنید</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- -------------- Personal END   -------------- -->

                    <!-- -------------- Csutom START -------------- -->
                    @if ($reports->isNotEmpty())
                        @foreach ($reports as $report)
                            <div class="tab-pane fade" id="custom{{$loop->iteration}}" role="tabpanel"
                                aria-labelledby="custom{{$loop->iteration}}-tab">
                                <div class="col-12">
                                    <div class="row">
                                        @if(!$report->reportGraphs->isEmpty())
                                            @foreach ($report->reportGraphs as $graphs)
                                                <div class="col-{{ ($graphs->graph['name'] === 'pie') ? '4' : '12'}}">
                                                    <div class="card border-primary mb-3">
                                                        <div class="card-header">
                                                            <h4>تعداد مشتریان بر اساس همه ی وضعیت ها به تفکیک استان</h4>
                                                            <h6 class="text-muted mb-0 pt-1">اطلاعات از تاریخ تا هستند</h6>
                                                        </div>
                                                        <div class="card-body px-3 py-4-5">
                                                            <div chart-type-{{$loop->iteration}}="{{$graphs->graph['name']}}"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-warning mt-4">
                                                <h4 class="alert-heading">توجه !</h4>
                                                <p>هیچ نموداری برای گزارش خود انتخاب نکرده اید. لطفا از سربرگ آمار شخصی اقدام به ثبت نمودار کنید</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <!-- -------------- Custom END -------------- -->
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js_files')

<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<!-- <script src={{ asset('extensions/choices.js/public/assets/scripts/choices.js') }}></script> -->

<!-- <script src={{ asset('js/pages/form-element-select.js') }}></script> -->

<script src={{ asset('extensions/apexcharts/apexcharts.min.js') }}></script>

<script>

    for (let i = 0; i < 10; i++) {

        let chart_number = document.querySelector('[chart-type-' + i + ']');

        if (chart_number) {

            let chart_value = chart_number.getAttribute('chart-type-' + i);

            @include('user.dashboard.components.graphs.charts')
        }
    }

</script>

<script>

    let data = {!! json_encode($general) !!};

    let options_1 = {
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

    let chart2 = new ApexCharts(document.querySelector("#chart"), options_1);
    chart2.render();

</script>

@endsection

<!-- @section('inline_css') -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

<!-- <link rel="stylesheet" href={{ asset('extensions/choices.js/public/assets/styles/choices.css') }} /> -->
<!-- @endsection -->