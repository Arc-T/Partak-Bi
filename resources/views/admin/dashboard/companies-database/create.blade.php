@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">

        <div class="content-wrapper container">
            <div class="page-heading">
                <h3>ثبت پایگاه داده جدید برای شرکت</h3>
            </div>

            @include('admin.layouts.partials.messages')

            <form action="{{ @route('admin.companies-database.store') }}" method="POST">
                @csrf
                <div class="page-content">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">جزءیات پایگاه داده</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label>آدرس IP پایگاه داده</label>
                                    <input type="text" class="form-control" name="database_ip"
                                        value="{{ old('database_ip') }}" placeholder="نمونه : 192.168.32.1 " />
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>یوزرنیم پایگاه داده</label>
                                        <input type="text" class="form-control" name="database_username"
                                            value="{{ old('database_username') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>پسورد پایگاه داده</label>
                                        <input type="text" class="form-control" name="database_password"
                                            value="{{ old('database_password') }}" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">شماره پورت</label>
                                    <input class="form-control" type="number" name="database_port" value="3306"
                                        value="{{ old('database_port') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">نام دیتابیس</label>
                                    <input class="form-control" type="text" name="database_name"
                                        value="{{ old('database_name') }}" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">شرکت های ثبت نشده</label>
                                </div>

                                @foreach ($companies_database as $db)
                                    <div class="col-md-2 d-flex justify-content-start mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="company_detail"
                                                value="{{ $db->id . '|' . $db->name }}"
                                                {{ $db->id . '|' . $db->name == old('company_detail') ? 'checked' : '' }} />
                                            <label class="form-check-label">
                                                {{ $db->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name ='save_connection' value="true"
                                        class="btn btn-success me-2 mt-10">
                                        ثبت اطلاعات
                                    </button>
                                    <button type="submit" class="btn btn-primary mt-10" name="test_connection"
                                        value="true">
                                        تست پایگاه داده
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
