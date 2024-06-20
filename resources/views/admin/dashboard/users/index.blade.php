@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        @include('admin.layouts.partials.messages')
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">لیست کاربران ثبت شده تا اکنون</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                در این بخش میتوانید لیستی از کاربران ثبت شده به همراه
                                تنظیمات آنها (ویرایش - حذف)
                                انجام دهید
                            </p>
                        </div>
                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام شرکت</th>
                                        <th>یوزرنیم</th>
                                        <th>وضعیت کاربر</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>
                                                @if ($user->active)
                                                    <span class="badge bg-success">فعال</span>
                                                @else
                                                    <span class="badge bg-danger">غیر فعال</span>
                                                @endif
                                            </td>
                                            <td>{{ verta($user->created_at)->format('%Y/%m/%d') }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        @include('admin.layouts.partials.delete', [
                                                            'route' => 'users',
                                                            'parameter' => $user,
                                                        ])
                                                    </div>
                                                    <div class="col-md-1">
                                                        @include('admin.layouts.partials.edit', [
                                                            'route' => 'users',
                                                            'parameter' => $user,
                                                        ])
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
