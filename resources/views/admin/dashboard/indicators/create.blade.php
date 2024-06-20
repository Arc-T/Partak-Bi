@extends('admin.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        @include('admin.layouts.partials.messages')
        <form action="{{ route('admin.indicators.store') }}" method="POST">
            @csrf
            <div class="page-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ثبت شاخص جدید</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>نام شاخص</label>
                                    <input type="text" class="form-control" name="indicator_name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>گروه شاخص</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="indicator_group_id">

                                            @foreach ($indicator_groups as $indicator_group)
                                                <option value="{{ $indicator_group->id }}">{{ $indicator_group->name }}</option>
                                            @endforeach

                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pt-1 ">
                            <div class="col-md-2 pt-2 ">
                                <label>وضعیت شاخص</label>
                            </div>
                            <div class="row pt-4">
                                <div class="col-md-2 d-flex justify-content-start">
                                    <div class="form-check form-check-danger pt-1">
                                        <input class="form-check-input" type="radio" name="indicator_is_active"
                                            value="0" />
                                        <label class="form-check-label">
                                            غیر فعال
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-start">
                                    <div class="form-check form-check-success pt-1">
                                        <input class="form-check-input" type="radio" name="indicator_is_active"
                                            value="1" checked />
                                        <label class="form-check-label">
                                            فعال
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-4 mb-4 mt-2">
                                ثبت شاخص
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
