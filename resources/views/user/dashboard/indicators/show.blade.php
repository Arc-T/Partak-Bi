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

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab"
                            aria-controls="settings" aria-selected="true">تنظیمات</a>
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

                    <!-- -------------- Settings -------------- -->

                    @include('user.dashboard.indicators.settings')

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

    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <!-- <script src={{ asset('extensions/choices.js/public/assets/scripts/choices.js') }}></script> -->

    <!-- <script src={{ asset('js/pages/form-element-select.js') }}></script> -->

    <script src={{ asset('extensions/apexcharts/apexcharts.min.js') }}></script>

@endpush

@section('inline_css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href={{ asset('extensions/choices.js/public/assets/styles/choices.css') }} />

<link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">

@endsection