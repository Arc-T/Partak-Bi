@extends('company.layouts.master')
@section('title', 'آمار مشتریان')
@section('main_content')

    {{-- <style>
        .fixed-size-image {
            width: 350px;
            /* Set the desired width */
            height: 200px;
            /* Set the desired height */
            object-fit: cover;
            /* Maintain aspect ratio and crop if necessary */
        }
    </style> --}}
    <section id="groups">
        <div class="row match-height">
            <div class="col-12 mt-3 mb-1">
                <h4 class="section-title text-uppercase">نمودار های شاخص</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top fixed-size-image"
                            src="{{ asset('images/graphs/stacked-chart.svg') }}" />
                        <div class="card-body">
                            <p class="text-center">
                                <a class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse"
                                    href="#stacked-chart" role="button" aria-expanded="false"
                                    aria-controls="stacked-chart">
                                    نمودار پشته
                                </a>
                            </p>

                            <div class="collapse" id="stacked-chart">
                                <form action={{ @route('company.indicator.result', [$subdomain]) }} method="GET"
                                    target="_blank">
                                    @csrf
                                    <label>شروع بازه</label>
                                    <input data-jdp class="form-control" name="start_date" /><br />
                                    <label>پایان بازه</label>
                                    <input data-jdp class="form-control" name="end_date" /><br />

                                    <label>بستر مشترک</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio" name="checked_customer_type"
                                                    value="W" />
                                                <label class="form-check-label">
                                                    Wireless
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio" name="checked_customer_type"
                                                    value="A" checked />
                                                <label class="form-check-label">
                                                    ADSL
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio" name="checked_customer_type"
                                                    value="T" disabled />
                                                <label class="form-check-label">
                                                    TD-LTE
                                                </label>
                                            </div>
                                        </div>
                                    </div><br />

                                    <label>وضعیت مشترک</label>

                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                        name="checked_customer_status[]">
                                        <option value="6" selected>بهره بردار</option>
                                        <option value="5">آماده به نصب</option>
                                        <option value="7">در لیست جمع آوری</option>
                                        <option value="9">جمع شده</option>
                                        <option value="10">مشکل دار</option>
                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="graph_type" value="stacked">
                                    <input type="hidden" name="indicator" value="customers">
                                    <button class="btn btn-primary btn-block mt-2">
                                        نمایش
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top fixed-size-image"
                            src="{{ asset('images/graphs/area-chart.svg') }}" />
                        <div class="card-body">
                            <p class="text-center">
                                <a class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse" href="#area-chart"
                                    role="button" aria-expanded="false" aria-controls="area-chart">
                                    نمودار محیط
                                </a>
                            </p>

                            <div class="collapse" id="area-chart">
                                <form action={{ @route('company.indicator.result', [$subdomain]) }} method="GET"
                                    target="_blank">
                                    @csrf
                                    <label>شروع بازه</label>
                                    <input data-jdp class="form-control" name="start_date" /><br />
                                    <label>پایان بازه</label>
                                    <input data-jdp class="form-control" name="end_date" /><br />

                                    <label>بستر مشترک</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio" name="checked_customer_type"
                                                    value="W" />
                                                <label class="form-check-label">
                                                    Wireless
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio" name="checked_customer_type"
                                                    value="A" checked />
                                                <label class="form-check-label">
                                                    ADSL
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio" name="checked_customer_type"
                                                    value="T" disabled />
                                                <label class="form-check-label">
                                                    TD-LTE
                                                </label>
                                            </div>
                                        </div>
                                    </div><br />

                                    <label>وضعیت مشترک</label>

                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                        name="checked_customer_status[]">
                                        <option value="6" selected>بهره بردار</option>
                                        <option value="5">آماده به نصب</option>
                                        <option value="7">در لیست جمع آوری</option>
                                        <option value="9">جمع شده</option>
                                        <option value="10">مشکل دار</option>
                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="graph_type" value="area">
                                    <input type="hidden" name="indicator" value="customers">
                                    <button class="btn btn-primary btn-block mt-2">
                                        نمایش
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top fixed-size-image"
                            src="{{ asset('images/graphs/bar-chart.png') }}" />
                        <div class="card-body">
                            <p class="text-center">
                                <a class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse"
                                    href="#bar-chart" role="button" aria-expanded="false" aria-controls="bar-chart">
                                    نمودار میله ای
                                </a>
                            </p>
                            <div class="collapse" id="bar-chart">
                                <form action={{ @route('company.indicator.result', [$subdomain]) }} method="GET"
                                    target="_blank">
                                    @csrf
                                    <label>شروع بازه</label>
                                    <input data-jdp class="form-control" name="start_date" /><br />
                                    <label>پایان بازه</label>
                                    <input data-jdp class="form-control" name="end_date" /><br />

                                    <label>بستر مشترک</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="W" />
                                                <label class="form-check-label">
                                                    Wireless
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="A" checked />
                                                <label class="form-check-label">
                                                    ADSL
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="T" disabled />
                                                <label class="form-check-label">
                                                    TD-LTE
                                                </label>
                                            </div>
                                        </div>
                                    </div><br />

                                    <label>وضعیت مشترک</label>

                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                        name="checked_customer_status[]">
                                        <option value="6" selected>بهره بردار</option>
                                        <option value="5">آماده به نصب</option>
                                        <option value="7">در لیست جمع آوری</option>
                                        <option value="9">جمع شده</option>
                                        <option value="10">مشکل دار</option>
                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="graph_type" value="bar">
                                    <input type="hidden" name="indicator" value="customers">
                                    <button class="btn btn-primary btn-block mt-2">
                                        نمایش
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top fixed-size-image"
                            src="{{ asset('images/graphs/line-chart.png') }}" />
                        <div class="card-body">
                            {{-- <h4 class="card-title text-center">نمودار خطی</h4> --}}
                            <p class="text-center">
                                <a class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse"
                                    href="#line-chart" role="button" aria-expanded="false" aria-controls="line-chart">
                                    نمودار خطی
                                </a>
                            </p>
                            <div class="collapse" id="line-chart">
                                <form action={{ @route('company.indicator.result', [$subdomain]) }} method="GET"
                                    target="_blank">
                                    @csrf
                                    <label>شروع بازه</label>
                                    <input data-jdp class="form-control" name="start_date" /><br />
                                    <label>پایان بازه</label>
                                    <input data-jdp class="form-control" name="end_date" /><br />

                                    <label>بستر مشترک</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="W" />
                                                <label class="form-check-label">
                                                    Wireless
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="A" checked />
                                                <label class="form-check-label">
                                                    ADSL
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="T" disabled />
                                                <label class="form-check-label">
                                                    TD-LTE
                                                </label>
                                            </div>
                                        </div>
                                    </div><br />

                                    <label>وضعیت مشترک</label>

                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                        name="checked_customer_status[]">
                                        <option value="6" selected>بهره بردار</option>
                                        <option value="5">آماده به نصب</option>
                                        <option value="7">در لیست جمع آوری</option>
                                        <option value="9">جمع شده</option>
                                        <option value="10">مشکل دار</option>
                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="graph_type" value="line">
                                    <input type="hidden" name="indicator" value="customers">
                                    <button class="btn btn-primary btn-block mt-2">
                                        نمایش
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top fixed-size-image"
                            src="{{ asset('images/graphs/pie-chart.png') }}" />
                        <div class="card-body">
                            <p class="text-center">
                                <a class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse"
                                    href="#pie-chart" role="button" aria-expanded="false" aria-controls="pie-chart">
                                    نمودار دایره
                                </a>
                            <div class="collapse" id="pie-chart">
                                <form action={{ @route('company.indicator.result', [$subdomain]) }} method="GET"
                                    target="_blank">
                                    @csrf
                                    <label>تاریخ روز</label>
                                    <input data-jdp class="form-control" name="start_date" /><br />
                                    <label>بستر مشترک</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="W" />
                                                <label class="form-check-label">
                                                    Wireless
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="A" checked />
                                                <label class="form-check-label">
                                                    ADSL
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="T" disabled />
                                                <label class="form-check-label">
                                                    TD-LTE
                                                </label>
                                            </div>
                                        </div>
                                    </div><br />

                                    <label>وضعیت مشترک</label>

                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                        name="checked_customer_status[]">
                                        <option value="6" selected>بهره بردار</option>
                                        <option value="5">آماده به نصب</option>
                                        <option value="7">در لیست جمع آوری</option>
                                        <option value="9">جمع شده</option>
                                        <option value="10">مشکل دار</option>
                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="graph_type" value="pie">
                                    <input type="hidden" name="indicator" value="customers">
                                    <button class="btn btn-primary btn-block mt-2">
                                        نمایش
                                    </button>
                                </form>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top fixed-size-image"
                            src="{{ asset('images/graphs/radar-chart.png') }}" />
                        <div class="card-body">
                            <p class="text-center">
                                <a class="btn btn-outline-primary rounded-pill" data-bs-toggle="collapse"
                                    href="#radar-chart" role="button" aria-expanded="false"
                                    aria-controls="radar-chart">
                                    نمودار رادار
                                </a>
                            <div class="collapse" id="radar-chart">
                                <form action={{ @route('company.indicator.result', [$subdomain]) }} method="GET"
                                    target="_blank">
                                    @csrf
                                    <label>شروع بازه</label>
                                    <input data-jdp class="form-control" name="start_date" /><br />
                                    <label>پایان بازه</label>
                                    <input data-jdp class="form-control" name="end_date" /><br />

                                    <label>بستر مشترک</label>
                                    <div class="form-check">
                                        <div class="row">
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="W" />
                                                <label class="form-check-label">
                                                    Wireless
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="A" checked />
                                                <label class="form-check-label">
                                                    ADSL
                                                </label>
                                            </div>
                                            <div class="col-md-4 pt-2">
                                                <input class="form-check-input" type="radio"
                                                    name="checked_customer_type" value="T" disabled />
                                                <label class="form-check-label">
                                                    TD-LTE
                                                </label>
                                            </div>
                                        </div>
                                    </div><br />

                                    <label>وضعیت مشترک</label>

                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                        name="checked_customer_status[]">
                                        <option value="6" selected>بهره بردار</option>
                                        <option value="5">آماده به نصب</option>
                                        <option value="7">در لیست جمع آوری</option>
                                        <option value="9">جمع شده</option>
                                        <option value="10">مشکل دار</option>
                                        </optgroup>
                                    </select>
                                    <input type="hidden" name="graph_type" value="radar">
                                    <input type="hidden" name="indicator" value="customers">
                                    <button class="btn btn-primary btn-block mt-2">
                                        نمایش
                                    </button>
                                </form>

                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

@endsection

@section('css_files')
    <link rel="stylesheet" href={{ asset('extensions/choices.js/public/assets/styles/choices.css') }} />
    <link rel="stylesheet" href={{ asset('extensions/jalali-date-picker/jalali.min.css') }}>
@endsection

@section('inline_css')
    <style>
        @php $colors =Cache::get('company_info');
        $colors =$colors['colors'];
        @endphp
        .form-check-input:checked {
            background-color: #{{ $colors['secondary'] }};
            border-color: #{{ $colors['secondary'] }};
        }

        jdp-container .jdp-btn-close,
        jdp-container .jdp-btn-empty,
        jdp-container .jdp-btn-today {
            background: #{{ $colors['secondary'] }};
        }

        jdp-container .jdp-day-name.selected,
        jdp-container .jdp-day.selected {
            background-color: #{{ $colors['secondary'] }} !important;
        }

        .choices__list--multiple .choices__item {
            background-color: #{{ $colors['secondary'] }};
        }
    </style>
@endsection

@section('js_files')
    <script src={{ asset('extensions/jalali-date-picker/jalali.min.js') }}></script>
    <script src={{ asset('extensions/choices.js/public/assets/scripts/choices.js') }}></script>
    <script src={{ asset('js/pages/form-element-select.js') }}></script>
    <script>
        jalaliDatepicker.startWatch();
    </script>

@endsection
