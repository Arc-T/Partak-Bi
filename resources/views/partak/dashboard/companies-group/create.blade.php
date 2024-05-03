@extends('partak.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        <div class="content-wrapper container">
            <form action="{{ @route('partak.companies-group.store') }}" method="POST">
                @csrf
                <div class="page-content">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ثبت گروه شرکت جدید</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label>نام گروه شرکت</label>
                                    <input type="text" class="form-control" name="company_group_name" />
                                </div>
                                <div class="form-group pt-4">
                                    <label>وضعیت</label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-start">
                                    <div class="form-check form-check-success">
                                        <input class="form-check-input" type="radio" name="company_group_active"
                                            value="1" checked />
                                        <label class="form-check-label">
                                            فعال
                                        </label>
                                    </div>
                                    </label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-start">
                                    <div class="form-check form-check-danger">
                                        <input class="form-check-input" type="radio" name="company_group_active"
                                            value="0" />
                                        <label class="form-check-label">
                                            غیر فعال
                                        </label>
                                    </div>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">
                                        ثبت گروه کمپانی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection
