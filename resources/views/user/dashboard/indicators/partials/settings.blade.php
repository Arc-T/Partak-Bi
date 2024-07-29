<div class="tab-pane fade {{$tab_index == 3 ? 'show active' : '' }}" id="settings" role="tabpanel"
    aria-labelledby="settings-tab">
    </br>

    <div class="col-12">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h4>تنظیمات آمار جامع</h4>
                <select class="choices form-select multiple-remove mt-2" name='locations' multiple="multiple">
                </select>
            </div>
            <div>
                <button class="btn btn-secondary mt-4" style="float: left;">ثبت تغییرات</button>
            </div>
        </div>
    </div>
</div>


@push('scripts')

    <script src={{ asset('extensions/choices.js/public/assets/scripts/choices.js') }}></script>

@endpush