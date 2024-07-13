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
                                        <a style="float: left;" href="#" data-bs-toggle="modal"
                                            data-bs-target="#danger{{ $report->id . '-' .$graphs->graph['id'] }}" title="حذف نمودار">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                data-feather="trash"></i>
                                        </a>

                                        @include('user.layouts.partials.delete', [
                                        'url' => '/indicators/' . Request()->route . '/' . Request()->sub_route,
                                        'id' => $report->id . '-' . $graphs->graph['id'],
                                        'title' => 'نمودار ' . $graphs->graph['title']
                                        ])
                                        <!-- <a href="#" style="float: left;" title="تغییر اطلاعات">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1 me-1"
                                                data-feather="edit"></i>
                                        </a> -->
                                    </div>
                                </div>
                                <div class="card-header">
                                    <h6 class="text-muted mb-0 pt-1">اطلاعات از تاریخ تا هستند</h6>
                                </div>
                                <div class="card-body px-3 py-4-5">
                                    <div chart-type-{{$report->id . $loop->iteration - 1}}="{{$graphs->graph['name']}}"></div>
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

        let graph = {!! json_encode($reports) !!};

        if (graph.length !== 0) {

            for (let i = 0; i < graph.length; i++) {

                for (let j = 0; j < graph[i].report_graphs.length; j++) {

                    let res = JSON.parse(graph[i].report_graphs[j].data);

                    let chart_number = document.querySelector('[chart-type-' + graph[i].id + j.toString() + ']');

                    if (chart_number) {

                        let chart_value = chart_number.getAttribute('chart-type-' + graph[i].id + j.toString());

                        @include('user.dashboard.components.graphs.charts')
                    }
                }
            }
        }

    </script>

@endpush