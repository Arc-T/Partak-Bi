@extends('partak.layouts.master')

@section('css_files')
    <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}" />
@endsection

@section('main_content')
    <div class="content-wrapper container">
        <div class="page-heading">
            <h3>اطلاعات شرکت</h3>
        </div>
        @include('partak.layouts.partials.messages')
        <form action="{{ @route('partak.companies.update', [$company_info]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="page-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">جزءیات شرکت</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group">
                                <label>نام تجاری شرکت</label>
                                <input type="text" class="form-control" name="company_name"
                                    value="{{ $company_info->name }}" />
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>کد رنگ تجاری شرکت</label>
                                    <input type="color" class="form-control" name="company_color"
                                        value="{{ $company_info->primary_color }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>کد رنگ بک گراند </label>
                                    <input type="color" class="form-control" name="company_color_background"
                                        value="{{ $company_info->secondary_color }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">لوگو تجاری شرکت</label>
                                    <input class="form-control" type="file" name="company_logo" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">گروه شرکت</label>
                                    <select class="form-select" name="company_group">
                                        @foreach ($companies_group as $company_group)
                                            <option value="{{ $company_group->id }}">{{ $company_group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>آدرس URL</label>
                                <input type="text" class="form-control" value="{{ $company_info->subdomain }}"
                                    name="company_url" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">توضیحات شرکت</label>
                            <textarea class="form-control" name="company_description" rows="3">{{ $company_info->description }}</textarea>
                        </div>
                        <div class="form-group pt-1 ">
                            <div class="row">
                                <div class="col-md-2 pt-2 ">
                                    <label>وضعیت شرکت</label>
                                </div>
                                <div class="col-md-4 pt-2 d-flex justify-content-end">
                                    <div class="form-check form-check-danger pt-1">
                                        <input class="form-check-input" type="radio" name="company_is_active"
                                            value="0" id="flexRadioDefault1"
                                            @if (!$company_info->Active) checked
                                            @else
                                            unchecked @endif />
                                        <label class="form-check-label">
                                            غیر فعال
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4 pt-2 ">
                                    <div class="form-check form-check-success pt-1">
                                        <input class="form-check-input" type="radio" name="company_is_active"
                                            value="1" id="flexRadioDefault2"
                                            @if ($company_info->active) checked
                                            @else
                                                unchecked @endif />
                                        <label class="form-check-label">
                                            فعال
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-4 mb-4 mt-2">
                                تغییر اطلاعات
                            </button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
@endsection
@section('js_files')
    <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>
    <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('assets/js/pages/filepond.js') }}"></script>
@endsection
