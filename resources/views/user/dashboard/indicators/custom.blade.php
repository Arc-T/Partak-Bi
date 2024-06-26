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
            <form action="{{ url('/indicators/' . Request()->indicator . '/' . Request()->route . '/report')}}"
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
                    @foreach ($graphs_list as $graph)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-content">
                                    <form method=post
                                        action="{{ url('/indicators/' . Request()->indicator . '/' . Request()->route) }}">
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
                                                </div>
                                                <div class="mt-4">
                                                    <button type="submit" class="btn btn-block btn-primary">ثبت</button>
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