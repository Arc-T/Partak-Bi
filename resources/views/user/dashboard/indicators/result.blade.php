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
                                <div class="card-header">
                                    <h4>بدون عنوان</h4>
                                    <h6 class="text-muted mb-0 pt-1">اطلاعات از تاریخ تا هستند</h6>
                                </div>
                                <div class="card-body px-3 py-4-5">
                                    <div chart-type-{{$graphs_count}}="{{$graphs->graph['name']}}"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mt-4">
                                    <h6>عنوان نمودار</h6>
                                    <input type="text" class="form-control" placeholder="گزارش نمونه" name="title">
                                </div>
                                <div class="col-md-4 mt-4">
                                    <h6>اندازه نمودار</h6>
                                    <select class="form-select" style="background-position: left.75rem center" name="size">
                                        <option value="S">کوچک</option>
                                        <option value="M">متوسط</option>
                                        <option value="B">بزرگ</option>
                                    </select>
                                </div>
                                @foreach ($inputs as $input)
                                    @if ($input->graph_id === $graphs['graph_id'])
                                        <div class="col-md-{{$input->size}} mt-4">
                                            <h6>{{$input->title}}</h6>
                                            @if($input->type === 'select')
                                                <select class="choices form-select multiple-remove" name='{{$input->name}}' multiple="multiple">
                                                    <option value="ALL" selected>انتخاب همه
                                                    </option>
                                                </select>
                                            @elseif($input->type === 'date')
                                                <input type="text" class="form-control" name="{{$input->name}}">
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-md-6 mt-4">
                                    <button type="submit" class="btn btn-block btn-outline-danger">حذف</button>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <button type="submit" class="btn btn-block btn-outline-primary">ثبت</button>
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