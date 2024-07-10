@php 
     $graphs_count = 0; 
@endphp
@foreach ($reports as $report)
    <div class="tab-pane fade" id="custom{{$loop->iteration}}" role="tabpanel"
        aria-labelledby="custom{{$loop->iteration}}-tab">
        <br />
        <div class="col-12">
            <div class="row">
                @if(!$report->reportGraphs->isEmpty())
                    @foreach ($report->reportGraphs as $graphs) 
                        @php 
                            ++$graphs_count; 
                        @endphp
                        <div class="col-{{ ($graphs->graph['name'] === 'pie') ? '4' : '12'}} mt-4">
                            <div class="card border-primary mb-3">
                                <div class="row justify-content-between">
                                    <div class="col-md-4">
                                        <h4>بدون عنوان</h4>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle me-1" type="button"
                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                style="float: left;"
                                                aria-expanded="false">
                                                <i class="bi bi-gear"></i>
                                                تنظیمات
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                                <a class="dropdown-item" href="#">نمایش روزانه</a>
                                                <a class="dropdown-item" href="#">نمایش هفتگی</a>
                                                <a class="dropdown-item" href="#">نمایش ماهانه</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-header">
                                    <h6 class="text-muted mb-0 pt-1">اطلاعات از تاریخ تا هستند</h6>
                                </div>
                                <div class="card-body px-3 py-4-5">
                                    <div chart-type-{{$graphs_count}}="{{$graphs->graph['name']}}"></div>
                                </div>
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

        let count = {!! json_encode($graphs_count) !!};

        if (count !== 0) {

            for (let i = 0; i <= count; i++) {

                let chart_number = document.querySelector('[chart-type-' + i + ']');

                if (chart_number) {

                    let chart_value = chart_number.getAttribute('chart-type-' + i);

                    @include('user.dashboard.components.graphs.charts')
                }
            }
        }

    </script>

@endpush