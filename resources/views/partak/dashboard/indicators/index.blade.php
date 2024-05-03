@extends('partak.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        @include('partak.layouts.partials.messages')
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
                                                                @include('partak.layouts.partials.delete', [
                                                                    'route' => 'indicators',
                                                                    'parameter' => $indicator
                                                                ])
                                                            </div>
                                                            <div class="col-md-1">
                                                                @include('partak.layouts.partials.edit', [
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

@section('css_files')
    <link rel="stylesheet" href={{ asset('assets/extensions/simple-datatables/style.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/pages/simple-datatables.css') }}>
@endsection

@section('js_files')
    <script src={{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}></script>
    <script src={{ asset('assets/js/pages/simple-datatables.js') }}></script>
@endsection
