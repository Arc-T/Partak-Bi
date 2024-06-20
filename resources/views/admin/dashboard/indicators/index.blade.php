@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        @include('admin.layouts.partials.messages')
        <div class="page-content">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">لیست شاخص های ثبت شده</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>نام شاخص</th>
                                        <th>گروه شاخص</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($indicators_group as $indicator_group)
                                        @foreach ($indicators as $indicator)
                                            @if ($indicator->indicator_group_id == $indicator_group->id)
                                                <tr>
                                                    <td>{{ $indicator->name }}</td>
                                                    <td>{{ $indicator_group->name }}</td>
                                                    <td>
                                                        @if ($indicator->active)
                                                            <span class="badge bg-success">فعال</span>
                                                        @else
                                                            <span class="badge bg-danger">غیر فعال</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                @include('admin.layouts.partials.delete', [
                                                                    'route' => 'indicators',
                                                                    'parameter' => $indicator
                                                                ])
                                                            </div>
                                                            <div class="col-md-1">
                                                                @include('admin.layouts.partials.edit', [
                                                                    'route' => 'indicators',
                                                                    'parameter' => $indicator
                                                                ])
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
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
