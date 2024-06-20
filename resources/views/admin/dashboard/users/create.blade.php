@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        <div class="page-heading">
            <h3>اطلاعات کاربر</h3>
        </div>

        @include('admin.layouts.partials.messages')

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="page-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">جزءیات کاربر</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label>نام کاربری</label>
                                <input type="text" class="form-control" name="user_username" />
                            </div>
                            <div class="form-group">
                                <label>پسورد</label>
                                <input type="text" class="form-control" name="user_password" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">شرکت ها فاقد کاربر</label>
                            </div>
                            @foreach ($companies as $company)
                                <div class="col-md-2 d-flex justify-content-start mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="company_detail"
                                            value="{{ $company->id . '|' . $company->name }}" />
                                        <label class="form-check-label">
                                            {{ $company->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group pt-1 ">
                                <div class="col-md-2 pt-2 ">
                                    <label>وضعیت حساب</label>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-md-2 d-flex justify-content-start">
                                        <div class="form-check form-check-danger pt-1">
                                            <input class="form-check-input" type="radio" name="user_is_active"
                                                value="0" />
                                            <label class="form-check-label">
                                                غیر فعال
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-start">
                                        <div class="form-check form-check-success pt-1">
                                            <input class="form-check-input" type="radio" name="user_is_active"
                                                value="1" checked />
                                            <label class="form-check-label">
                                                فعال
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">
                                    ثبت اطلاعات
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
