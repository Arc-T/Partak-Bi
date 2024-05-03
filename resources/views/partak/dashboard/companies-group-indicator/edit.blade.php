@extends('partak.layouts.master')

@section('main_content')
    <div class="content-wrapper container">
        @include('partak.layouts.partials.messages')
        <form action="{{ @route('partak.company_group_access.update' , ['id' => $company_group_id ]) }}" method="POST">
            @csrf
            <div class="page-content">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">دسترسی گروه شرکت</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            ابتدا گروه کمپانی خود را انتخاب کرده و سپس دسترسی های مدنظر خود را اعمال کنید.
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>گروه کمپانی</label>
                                    <fieldset class="form-group">
                                        <select class="form-select" name="company_group_id" id="company_group_select">
                                            @foreach ($company_groups as $company_group)
                                                <option value="{{ $company_group->ID }}" @if($company_group_id == $company_group->ID) selected @endif>{{ $company_group->Name }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <br />

                                    @foreach ($indicator_groups as $indicator_group)
                                        <div class="form-group">
                                            <h4 class="card-title">{{ $indicator_group->Name }}</h4>
                                            <div class="row">
                                                @foreach ($indicators as $indicator)
                                                    @if ($indicator->IndicatorGroupID == $indicator_group->ID)
                                                    <input type="hidden" value="{{$indicator->ID}}" name="indicators[]">
                                                        <div class="col-md-2 d-flex justify-content-start mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input form-check-primary"
                                                                    type="checkbox" name="checked_indicators[]" value="{{$indicator->ID}}"
                                                                    @foreach ($company_groups_access as $company_group_access)
                                                                        @if ($company_group_access->IndicatorID == $indicator->ID)
                                                                            checked
                                                                        @endif @endforeach/>
                                                                <label class="form-check-label">
                                                                    {{ $indicator->Name }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <hr />
                                    @endforeach

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-warning mb-4 mt-2">
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
@section('js_files')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {
        $('#company_group_select').on('change', function () {
            var newId = $(this).val();
            var currentUrl = window.location.href;
            var newUrl = currentUrl.replace(/\/company-groups-access\/\d+\//, '/company-groups-access/' + newId + '/');
            window.location.href = newUrl;
        });
    });
</script>
@endsection
