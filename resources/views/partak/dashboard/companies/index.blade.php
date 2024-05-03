@extends('partak.layouts.master')
@section('main_content')
    <div class="content-wrapper container">
        @include('partak.layouts.partials.messages')
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">لیست شرکت های ثبت شده</h4>
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
                                        <th>ساب دامین</th>
                                        <th>توضیحات</th>
                                        <th>فعال</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->subdomain }}</td>
                                            <td>{{ $company->description }}</td>
                                            <td>
                                                @if ($company->active)
                                                    <span class="badge bg-success">فعال</span>
                                                @else
                                                    <span class="badge bg-danger">غیر فعال</span>
                                                @endif

                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        @include('partak.layouts.partials.delete', [
                                                            'route' => 'companies',
                                                            'parameter' => $company
                                                        ])
                                                    </div>
                                                    <div class="col-md-1">
                                                        @include('partak.layouts.partials.edit', [
                                                            'route' => 'companies',
                                                            'parameter' => $company,
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
