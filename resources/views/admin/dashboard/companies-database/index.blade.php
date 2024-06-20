@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        @include('admin.layouts.partials.messages')
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">لیست دیتابیس های ثبت شده تا اکنون</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                در این بخش میتوانید لیستی از شرکت های ثبت شده به همراه
                                تنظیمات آنها (ویرایش - حذف )
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
                                        <th>آدرس IP</th>
                                        <th>یوزرنیم</th>
                                        <th>پسورد</th>
                                        <th>پورت</th>
                                        <th>دیتابیس</th>
                                        <th>وضعیت اتصال</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies_database as $company_db)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company_db->name }}</td>
                                            <td>{{ $company_db->host }}</td>
                                            <td>{{ $company_db->username }}</td>
                                            <td>{{ $company_db->password }}</td>
                                            <td>{{ $company_db->port }}</td>
                                            <td>{{ $company_db->db }}</td>
                                            <td>
                                                @if ($company_db->connection)
                                                    <span class="badge bg-success">برقرار</span>
                                                @else
                                                    <span class="badge bg-danger">قطع</span>
                                                @endif
                                            </td>
                                            <td>{{ $company_db->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        @include('admin.layouts.partials.delete', [
                                                            'route' => 'companies-database',
                                                            'parameter' => $company_db,
                                                        ])
                                                    </div>
                                                    @include('admin.layouts.partials.edit', [
                                                        'route' => 'companies-database',
                                                        'parameter' => $company_db,
                                                    ])
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
