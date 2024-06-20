@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">

        <div class="content-wrapper container">
            <div class="page-heading">
                <h3>ثبت پایگاه داده جدید برای شرکت</h3>
            </div>

            @include('admin.layouts.partials.messages')

            <form action="{{ route('admin.companies-database.update', [$company_database->id]) }}" method="POST">
                @method('PUT')
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

                                    @if( old('database_ip') != NULL )
                                    value="{{ old('database_ip') }}"
                                    @else value="{{ $company_database->host }}"
                                    @endif />

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>یوزرنیم پایگاه داده</label>
                                        <input type="text" class="form-control" name="database_username"

                                        @if( old('database_username') != NULL )
                                        value="{{ old('database_username') }}"
                                        @else value="{{ $company_database->username }}"
                                        @endif />

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>پسورد پایگاه داده</label>
                                        <input type="text" class="form-control" name="database_password"

                                        @if( old('database_password') != NULL )
                                        value=" {{old('database_password') }}"
                                        @else value="{{ $company_database->password }}"
                                        @endif />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">شماره پورت</label>
                                    <input class="form-control" type="number" name="database_port" value="3306"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">نام دیتابیس</label>
                                    <input class="form-control" type="text" name="database_name"
                                    @if (old('database_name') != NULL )
                                    value="{{ old('database_name') }}"
                                    @else
                                    value="{{ $company_database->db }}"
                                    @endif/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">شرکت</label>
                                </div>

                                <div class="col-md-2 d-flex justify-content-start mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="company_detail" value="{{ $company_database->name }}" checked disabled />
                                        <label class="form-check-label">
                                            {{ $company_database->name }}
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name ='edit_connection' value="true" class="btn btn-warning me-2 mt-10">
                                        تغییر اطلاعات
                                    </button>
                                    <button type="submit" class="btn btn-primary mt-10" name="test_connection" value="true">
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
