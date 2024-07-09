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

                    <!-- -------------- General -------------- -->

                    @include('user.dashboard.indicators.general')

                    <!-- -------------- Custom -------------- -->

                    @include('user.dashboard.indicators.custom')

                    <!-- -------------- Result -------------- -->

                    @if ($reports->isNotEmpty())
                        @include('user.dashboard.indicators.result')
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src={{ asset('extensions/choices.js/public/assets/scripts/choices.js') }}></script>

    <script src={{ asset('js/pages/form-element-select.js') }}></script>

    <script src={{ asset('extensions/apexcharts/apexcharts.min.js') }}></script>


    <script>

        parameters = {
            user: "{{ Auth::user()->id }}",
            company: "{{ Request()->subdomain }}",
            indicator: "{{Request()->indicator}}",
            token: "{{md5('Partak.' . Auth::user()->id . Request()->subdomain . date('Y-m-d'))}}"
        };

        $(document).ready(function () {
            // Perform the AJAX request to fetch the data
            $.ajax({
                url: "{{ route('getCities') }}",
                type: "GET",
                data: parameters,
                accepts: "application/json",
                cache: false,
                success: function (data) {
                    // Loop through each select element with class .choices
                    $('.choices').each(function () {
                        var $select = $(this);

                        // Clear existing options and reset select
                        $select.empty();

                        // Add the default option "انتخاب همه"
                        $select.append($('<option>', {
                            value: 'ALL',
                            text: 'انتخاب همه',
                            selected: true
                        }));

                        // Append fetched options from AJAX response
                        data.forEach(res => {
                            $select.append(new Option(res.CityName, res.CityRef));
                        });

                        // Initialize Choices.js for each select element
                        new Choices(this, {
                            delimiter: ',',
                            editItems: true,
                            maxItemCount: -1,
                            removeItemButton: true,
                        });
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed:", textStatus, errorThrown);
                }
            });
        });

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

@endpush

@section('inline_css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href={{ asset('extensions/choices.js/public/assets/styles/choices.css') }} />
@endsection