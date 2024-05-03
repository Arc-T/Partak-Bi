@extends('companies.layouts.master')

@section('css_files')
<link rel="stylesheet" href={{ asset('assets/extensions/simple-datatables/style.css') }}>
<link rel="stylesheet" href={{ asset('assets/css/pages/simple-datatables.css') }}>
@endsection

@section('main_content')

<div class="page-heading">
    <p class="text-success">
    <h4>تنظیمات</h4>
    </p>
</div>
<div class="row align-items-center">
    <div class="col-md">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding-right: 1.5em;">

                    <!-- ############    TABS START     ############ -->

                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">کاربران</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="sms-tab" data-bs-toggle="tab" href="#sms" role="tab" aria-controls="sms" aria-selected="false">گروه های کاربری</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">رخداد های کاربران</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="limitation-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">محدودیت ورود</a>
                    </li>

                    <!-- ############    TABS END      ############ -->
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- -------------- SALES TAB START -------------- -->
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab"></br>

                        <div class="tab-pane fade show active" id="sales" role="tabpanel" aria-labelledby="sales-tab"></br>
                            <form class="form form-horizontal" action="{{ url('/') }}"> <!-- Form Sales Start -->
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">ایجاد کاربر جدید</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>نام کاربری</label>
                                                                <div class="form-group has-icon-right pt-1">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control" placeholder="Username" name="username"/>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-person"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>پسورد</label>
                                                                <div class="form-group has-icon-right pt-1">
                                                                    <div class="position-relative">
                                                                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-lock"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group pt-3">
                                                                <label>شماره موبایل</label>
                                                                <div class="form-group has-icon-right pt-1">
                                                                    <div class="position-relative">
                                                                        <input type="number" class="form-control" placeholder="Number" name="number"/>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-phone"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-6">
                                                            <div class="form-group pt-3">
                                                                <label>ایمیل</label>
                                                                <div class="form-group has-icon-right pt-1">
                                                                    <div class="position-relative">
                                                                        <input type="email" class="form-control" placeholder="example@com" name="email"/>
                                                                        <div class="form-control-icon">
                                                                            <i class="bi bi-envelope"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="card">

                                            <div class="card-header">
                                                    <h4 class="card-title">دسترسی های فروش</h4>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="sales">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">فروش - ثبت نام آنلاین</label>
                                                    </div>

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="evecuation" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">فروش - تخلیه کاربران
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="card">
                                            <div class="card-header">
                                                    <h4 class="card-title">دسترسی های پشتیبانی</h4>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">معرف در واحد فروش</label>
                                                    </div>

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">معرف در ثبت نام آنلاین
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <div class="card">
                                            <div class="card-header">
                                                    <h4 class="card-title">دسترسی های آمار</h4>
                                                </div>
                                                <div class="card-body">

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                        <label class="form-check-label" for="flexSwitchCheckDefault">تغییر سرویس در پنل</label>
                                                    </div>

                                                    <div class="form-check form-switch form-group">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">نمایش آمار مشتریان
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end me-4">
                                        <button type="submit" class="btn btn-primary me-2 mb-1">ایجاد کاربر</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">بازگردانی</button>
                                    </div>

                                </div>
                            </form> <!-- Form user End -->
                        </div>

                    </div>
                    <!-- -------------- SALES TAB END   -------------- -->

                    <div class="tab-pane fade" id="sms" role="tabpanel" aria-labelledby="sms-tab"></br>

                        <!-- -------------- SMS TAB START   -------------- -->


                        <section class="basic-choices">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">تنظیمات پیامک</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <h6>سامانه پیامک</h6>
                                                        <div class="form-group">
                                                            <select class="choices form-select" name="sms" id="sms">
                                                                <option selected="none">انتخاب کنید</option>
                                                                <option value="magfa">سامانه مگفا</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <h6>دسترسی کاربران</h6>
                                                        <div class="form-group" name="user_access">
                                                            <select class="choices form-select" id="user_access">
                                                                <option value="romboid">taha hajivand</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- -------------- SMS TAB END   -------------- -->
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <p class="mt-2">




                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js_files')

<script type="text/javascript">
    var conceptName = $('#sms').find(":selected").val();
    $(document).ready(function() {
        $("#sms").change(function() {
            let id = $('#sms').find(":selected").val();
            let dataString = 'sms_id=' + id;
            $.ajax({
                "method": "GET",
                "url": "/getUserSmsAccess",
                "data": dataString,
                "cache": false,
                "success": function(resp) {
                    resp.forEach((response, index) => {
                        var row = '<option value="romboid">' + resp[index].Name + '</option>';
                        $("#user_access").append(row);
                    });
                }
            });
        });
    });
</script>
<script src={{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}></script>
<script src={{ asset('assets/js/pages/simple-datatables.js') }}></script>
@endsection

@endsection
