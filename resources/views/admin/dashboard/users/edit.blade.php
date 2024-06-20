@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        <div class="page-heading">
            <h3>اطلاعات کاربر</h3>
        </div>

        @include('admin.layouts.partials.messages')

        <form action="{{ route('admin.users.update', [$user->id]) }}" method="POST">
            @method('PUT')
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
                                <input type="text" class="form-control" name="user_username"
                                    value="{{ $user->username }}" />
                            </div>
                            <div class="form-group">
                                <label>پسورد</label>
                                <input type="text" class="form-control" name="user_password"
                                    value="{{ $user->password }}" />
                            </div>
                            <div class="form-group">
                                <label class="form-label">شرکت</label>
                            </div>
                            <div class="col-md-2 d-flex justify-content-start mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="company_detail" checked disabled />
                                    <label class="form-check-label">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group pt-1 ">
                                <div class="col-md-2 pt-2 ">
                                    <label>وضعیت حساب</label>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-md-2 d-flex justify-content-start">
                                        <div class="form-check form-check-danger pt-1">
                                            <input class="form-check-input" type="radio" name="user_is_active"
                                                value="0" @if($user->active == '0') checked @endif>
                                            <label class="form-check-label">
                                                غیر فعال
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-start">
                                        <div class="form-check form-check-success pt-1">
                                            <input class="form-check-input" type="radio" name="user_is_active"
                                                value="1" @if($user->active == '1') checked @endif />
                                            <label class="form-check-label">
                                                فعال
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning me-4 mb-4 mt-2">
                                    تغییر اطلاعات
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
