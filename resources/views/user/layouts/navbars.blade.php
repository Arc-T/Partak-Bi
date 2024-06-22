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
                        <a class="nav-link active" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="true">فروش</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="sms-tab" data-bs-toggle="tab" href="#sms" role="tab" aria-controls="sms" aria-selected="false">پیامک</a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">پرداخت آنلاین</a>
                    </li>

                    <!-- ############    TABS END      ############ -->
                </ul>

                <div class="tab-content" id="myTabContent">
                    <!-- -------------- SALES TAB START -------------- -->
                    <div class="tab-pane fade show active" id="sales" role="tabpanel" aria-labelledby="sales-tab"></br>
                        <form class="form form-horizontal" action="{{ url('/') }}"> <!-- Form Sales Start -->
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">تنظیمات فروش</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>هزینه راه اندازی کامل</label>
                                                            <input type="text" id="roundText" class="form-control round" placeholder="ریال">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>هزینه راه اندازی مجدد</label>
                                                            <input type="text" id="squareText" class="form-control square" placeholder="ریال">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6 pt-4">
                                                        <div class="form-group">
                                                            <label>هزینه راه اندازی وایرلس</label>
                                                            <input type="text" id="squareText" class="form-control square" placeholder="ریال">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6 pt-4">
                                                        <div class="form-group">
                                                            <label>هزینه تعویض خط</label>
                                                            <input type="text" id="squareText" class="form-control square" placeholder="ریال">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6 pt-4">
                                                        <div class="form-group">
                                                            <label>هزینه نصب و حضور کارشناس</label>
                                                            <input type="text" id="squareText" class="form-control square" placeholder="ریال">
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6 pt-4">
                                                        <div class="form-group">
                                                            <label>هزینه هر ماه IP</label>
                                                            <input type="text" id="squareText" class="form-control square" placeholder="ریال">
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
                                            <div class="card-body">

                                                <div class="form-check form-switch form-group">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">ثبت نام آنلاین</label>
                                                </div>

                                                <div class="form-check form-switch form-group">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">نمایش آمار مشتریان
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="card">
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
                                    <button type="submit" class="btn btn-primary me-2 mb-1">ثبت تنظیمات</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">بازگردانی</button>
                                </div>

                            </div>
                        </form> <!-- Form Sales End -->

                        </br>
                        <hr>

                        <div class="row match-height">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">تنظیمات تخلیه</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">


                                            <form class="form form-horizontal" action="{{ url('/') }}"> <!-- Form Evecuation Start -->
                                                <div class="form-body">
                                                    <div class="row">


                                                        <div class="col-md-4 form-group">
                                                            <label>ما به تفاوت تخلیه</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" placeholder="ریال">
                                                        </div>


                                                        <div class="col-md-4 form-group">
                                                            <label>هزینه نگهداری روزانه پورت</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" placeholder="ریال">
                                                        </div>


                                                        <div class="d-flex justify-content-end me-4 mt-4">
                                                            <button type="submit" class="btn btn-primary me-2 mb-1">ثبت تنظیمات</button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">بازگردانی</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> <!-- Form Evecuation End -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">تنظیمات سرویس</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            <form class="form form-horizontal" action="{{ url('/') }}"> <!-- Form Service Start -->
                                                <div class="form-body">
                                                    <div class="row">


                                                        <div class="col-md-4 form-group">
                                                            <label>آبونمان مخابرات</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" placeholder="ریال">
                                                        </div>


                                                        <div class="col-md-4 form-group">
                                                            <label>هزینه نگهداری روزانه پورت</label>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" class="form-control" placeholder="ریال">
                                                        </div>


                                                        <div class="d-flex justify-content-end me-4 mt-4">
                                                            <button type="submit" class="btn btn-primary me-2 mb-1">ثبت تنظیمات</button>
                                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">بازگردانی</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </form> <!-- Form Service End -->

                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <hr>


                        <div class="page-heading">

                            <section class="section">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">جدول شخصی سازی شده</h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>نام</th>
                                                    <th>ایمیل</th>
                                                    <th>تلفن</th>
                                                    <th>شهر</th>
                                                    <th>وضعیت</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Graiden</td>
                                                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                                                    <td>076 4820 8838</td>
                                                    <td>Offenburg</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Dale</td>
                                                    <td>fringilla.euismod.enim@quam.ca</td>
                                                    <td>0500 527693</td>
                                                    <td>New Quay</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nathaniel</td>
                                                    <td>mi.Duis@diam.edu</td>
                                                    <td>(012165) 76278</td>
                                                    <td>Grumo Appula</td>
                                                    <td>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Darius</td>
                                                    <td>velit@nec.com</td>
                                                    <td>0309 690 7871</td>
                                                    <td>Ways</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Oleg</td>
                                                    <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                                    <td>0500 441046</td>
                                                    <td>Rossignol</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kermit</td>
                                                    <td>diam.Sed.diam@anteVivamusnon.org</td>
                                                    <td>(01653) 27844</td>
                                                    <td>Patna</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jermaine</td>
                                                    <td>sodales@nuncsit.org</td>
                                                    <td>0800 528324</td>
                                                    <td>Mold</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ferdinand</td>
                                                    <td>gravida.molestie@tinciduntadipiscing.org</td>
                                                    <td>(016977) 4107</td>
                                                    <td>Marlborough</td>
                                                    <td>
                                                        <span class="badge bg-danger">Inactive</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kuame</td>
                                                    <td>Quisque.purus@mauris.org</td>
                                                    <td>(0151) 561 8896</td>
                                                    <td>Tresigallo</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Deacon</td>
                                                    <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                                    <td>07740 599321</td>
                                                    <td>Karapınar</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Channing</td>
                                                    <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                                                    <td>0845 46 49</td>
                                                    <td>Warrnambool</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Aladdin</td>
                                                    <td>sem.ut@pellentesqueafacilisis.ca</td>
                                                    <td>0800 1111</td>
                                                    <td>Bothey</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Cruz</td>
                                                    <td>non@quisturpisvitae.ca</td>
                                                    <td>07624 944915</td>
                                                    <td>Shikarpur</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Keegan</td>
                                                    <td>molestie.dapibus@condimentumDonecat.edu</td>
                                                    <td>0800 200103</td>
                                                    <td>Assen</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Ray</td>
                                                    <td>placerat.eget@sagittislobortis.edu</td>
                                                    <td>(0112) 896 6829</td>
                                                    <td>Hofors</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Maxwell</td>
                                                    <td>diam@dapibus.org</td>
                                                    <td>0334 836 4028</td>
                                                    <td>Thane</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Carter</td>
                                                    <td>urna.justo.faucibus@orci.com</td>
                                                    <td>07079 826350</td>
                                                    <td>Biez</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Stone</td>
                                                    <td>velit.Aliquam.nisl@sitametrisus.com</td>
                                                    <td>0800 1111</td>
                                                    <td>Olivar</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Berk</td>
                                                    <td>fringilla.porttitor.vulputate@taciti.edu</td>
                                                    <td>(0101) 043 2822</td>
                                                    <td>Sanquhar</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Philip</td>
                                                    <td>turpis@euenimEtiam.org</td>
                                                    <td>0500 571108</td>
                                                    <td>Okara</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Kibo</td>
                                                    <td>feugiat@urnajustofaucibus.co.uk</td>
                                                    <td>07624 682306</td>
                                                    <td>La Cisterna</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bruno</td>
                                                    <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                                                    <td>07624 869434</td>
                                                    <td>Rocca d"Arce</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Leonard</td>
                                                    <td>blandit.enim.consequat@mollislectuspede.net</td>
                                                    <td>0800 1111</td>
                                                    <td>Lobbes</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Hamilton</td>
                                                    <td>mauris@diam.org</td>
                                                    <td>0800 256 8788</td>
                                                    <td>Sanzeno</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Harding</td>
                                                    <td>Lorem.ipsum.dolor@etnetuset.com</td>
                                                    <td>0800 1111</td>
                                                    <td>Obaix</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Emmanuel</td>
                                                    <td>eget.lacus.Mauris@feugiatSednec.org</td>
                                                    <td>(016977) 8208</td>
                                                    <td>Saint-Remy-Geest</td>
                                                    <td>
                                                        <span class="badge bg-success">Active</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </section>
                        </div>

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
