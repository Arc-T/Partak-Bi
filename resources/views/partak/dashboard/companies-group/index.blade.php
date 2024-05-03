@extends('partak.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        @include('partak.layouts.partials.messages')
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">لیست گروه شرکت ها</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>
                                در این بخش میتوانید لیستی از گروه کمپانی های ثبت شده به همراه
                                تنظیمات آن ( ویرایش - حذف - اعمال دسترسی شاخص - تخصیص شرکت )
                                انجام دهید
                            </p>
                        </div>
                        <!-- table head dark -->
                        <div class="table-responsive">
                            <table class="table mb-2">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام گروه شرکت</th>
                                        <th>وضعیت</th>
                                        <th>اختصاص شده</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies_group as $company_group)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company_group->name }}</td>
                                            <td>
                                                @if ($company_group->active)
                                                    <span class="badge bg-success">فعال</span>
                                                @else
                                                    <span class="badge bg-danger">غیر فعال</span>
                                                @endif

                                            </td>
                                            <td>
                                                @foreach ($companies as $company)
                                                    @if ($company->group_id == $company_group->id)
                                                        <span class="badge bg-primary">{{ $company->name }}</span>
                                                    @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        @include('partak.layouts.partials.delete', [
                                                            'route' => 'companies-group',
                                                            'parameter' => $company_group,
                                                        ])
                                                    </div>
                                                    <div class="col-md-1">
                                                        @include('partak.layouts.partials.edit', [
                                                            'route' => 'companies-group',
                                                            'parameter' => $company_group,
                                                        ])
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="{{ route('partak.companies-group-indicator.edit', [$company_group->id]) }}"
                                                            title="شاخص های گروه شرکت">
                                                            <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                                data-feather="lock"></i>
                                                        </a>
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
