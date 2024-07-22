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
            <form action="{{ url('/indicators/' . Request()->route . '/' . Request()->sub_route . '/report')}}"
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
                        <input type="text" class="form-control" placeholder="گزارش برترین استان ها" name="report_title">
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="row">
                            <h5>وضعیت گزارش</h5>
                            <div class="col-md-6 pt-2 ">
                                <div class="form-check form-check-success pt-1">
                                    <input class="form-check-input" type="radio" name="report_active" value="1"
                                        checked />
                                    <label class="form-check-label">
                                        فعال
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6 pt-2">
                                <div class="form-check form-check-danger pt-1">
                                    <input class="form-check-input" type="radio" name="report_active" value="0" />
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
                                        <td>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#danger{{$report->id}}" title="حذف گزارش">
                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                    data-feather="trash"></i>
                                            </a>
                                                @include('user.layouts.partials.delete', [
                                                'url' => '/indicators/' . Request()->route . '/' . Request()->sub_route . '/report',
                                                'id' => $report->id,
                                                'title' => 'گزارش ' . $report['title'],
                                                'name' =>'report_id'
                                                ])
                                        </td>
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
                    @foreach ($graphs_list as $graph)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-content">
                                    <form method=post
                                        action="{{ url('/indicators/' . Request()->route . '/' . Request()->sub_route) }}">
                                        @csrf
                                        <img class="card-img-top img-fluid"
                                            src="{{ asset('images/graphs/' . $graph->name . '-chart.png') }}"
                                            alt="Card image cap">
                                        <input type="hidden" name="graph" value="{{$graph->id}}">
                                        <div class="card-body">
                                            <h4 class="card-title">{{ 'نمودار ' . $graph->title }}
                                            </h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="mt-4">گزارش ها</h6>
                                                    <select class="form-select" style="background-position: left.75rem center"
                                                        name="report">
                                                        @foreach ($reports as $report)
                                                            <option value="{{$report['id']}}">
                                                                {{$report->title}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="row">
                                                        @foreach ($inputs as $input)
                                                            @if ($input->graph_id === $graph->id)
                                                                <div class="col-md-{{$input->size}} mt-4">
                                                                    <h6>{{$input->title}}</h6>
                                                                    @if($input->type === 'select')
                                                                        <!-- <select id="lastgamer" class="choices form-select multiple-remove"
                                                                            name='{{$input->name}}' multiple="multiple"> -->
                                                                        <!-- </select> -->
                                                                        <select class="form-select" name="location[]" style="background-position: left.75rem center">
                                                                        <option value="NONE">انتخاب کنید ...</option>
                                                                        </select>
                                                                    @elseif($input->type === 'date')
                                                                        <input data-jdp type="text" class="form-control begin_date"
                                                                            name="{{$input->name}}">
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <h6 class="mt-4">نحوه نمایش</h6>
                                                        <div class="btn-group" style="z-index: 0">
                                                            <input type="radio" value="D" class="btn-check"
                                                                name="options-outlined" id="daily{{$graph->id}}" checked="true">
                                                            <label class="btn btn-outline-secondary"
                                                                for="daily{{$graph->id}}">روزانه</label>
                                                            <input type="radio" value="W" class="btn-check"
                                                                name="options-outlined" id="weekly{{$graph->id}}">
                                                            <label class="btn btn-outline-secondary"
                                                                for="weekly{{$graph->id}}">هفتگی</label>
                                                            <input type="radio" value="M" class="btn-check"
                                                                name="options-outlined" id="monthly{{$graph->id}}">
                                                            <label class="btn btn-outline-secondary"
                                                                for="monthly{{$graph->id}}">ماهانه</label>
                                                            <input type="radio" value="Y" class="btn-check"
                                                                name="options-outlined" id="yearly{{$graph->id}}">
                                                            <label class="btn btn-outline-secondary"
                                                                for="yearly{{$graph->id}}">سالانه</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button type="submit"
                                                        class="btn btn-block btn-outline-primary">ثبت</button>
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

@push('scripts')

<script>
        parameters = {
            user: "{{ Auth::user()->id }}",
            company: "{{ Request()->subdomain }}",
            indicator: "{{Request()->route}}",
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
                    // Clear the existing options
                    // $('select[name="location"]').empty();

                    // Append new options
                    data.forEach(res => {
                        $('select[name="location[]"]').append(`<option value="${res.CityRef}">${res.CityName}</option>`);
                    });

                    // Loop through each select element with class .choices

                    // $('.choices').each(function () {
                    //     var $select = $(this);

                    //     // Clear existing options and reset select
                    //     $select.empty();

                    //     // Add the default option "انتخاب همه"
                    //     $select.append($('<option>', {
                    //         value: 'ALL',
                    //         text: 'انتخاب همه',
                    //         selected: true
                    //     }));

                    //     // Append fetched options from AJAX response
                    //     data.forEach(res => {
                    //         $select.append(new Option(res.CityName, res.CityRef));
                    //     });

                    //     // Initialize Choices.js for each select element
                    //     new Choices(this, {
                    //         delimiter: ',',
                    //         editItems: true,
                    //         maxItemCount: -1,
                    //         removeItemButton: true,
                    //     });
                    // });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX request failed:", textStatus, errorThrown);
                }
            });
        });

</script>

    <script type="text/javascript" src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
    <script>
        $(document).ready(function () {

            jalaliDatepicker.startWatch();

            $('input[name="begin_date"], input[name="end_date"]').change(disableInputsBasedOnDateRange);

            function disableInputsBasedOnDateRange() {

                var startDate = $('input[name="begin_date"]').val();

                var endDate = $('input[name="end_date"]').val();

                console.log(startDate);

                console.log(endDate);

                if (startDate && endDate) {

                    var start = new Date(startDate);

                    var end = new Date(endDate);

                    var diffDays = (end - start) / (1000 * 60 * 60 * 24);

                    if (diffDays > 10) {

                        $('#daily1').attr('disabled', true);

                        $('#weekly1').attr('checked', true);

                    } else {

                        $('#daily1').attr('disabled', false);
                    }
                }
            }

        });
    </script>

@endpush