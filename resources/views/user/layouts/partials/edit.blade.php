<a href="#" style="float: left;" title="تغییر اطلاعات" data-bs-toggle="modal" data-bs-target="#primary{{$id}}">
    <i class="badge-circle badge-circle-light-secondary font-medium-1 me-1" data-feather="settings"></i>
</a>
<div class="modal fade text-left" id="primary{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <form action="{{url($url)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">تنظیمات نمودار</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>عنوان نمودار</h5>
                            <input type="text" class="form-control" placeholder="نمودار تست" name="graph_title">
                        </div>
                        <div class="col-md-6 mt-4">
                            <h5>طول نمودار</h5>
                            <select class="form-select" name="graph_width"
                                style="background-position: left.75rem center">
                                <option value="3">کوچک</option>
                                <option value="6">متوسط</option>
                                <option value="12">بزرگ</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-4">
                            <h5>عرض نمودار</h5>
                            <select class="form-select" name="graph_height"
                                style="background-position: left.75rem center">
                                <option value="350">کوچک</option>
                                <option value="550">متوسط</option>
                                <option value="750">بزرگ</option>
                            </select>   
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">بازگشت</span>
                    </button>
                    <button type="submit" class="btn btn-secondary ms-1" style="background-color: #435ebe;">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ثبت تغییرات</span>
                    </button>
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="hidden" value="{{$report}}" name="report_id">
                </div>
            </div>
        </form>
    </div>
</div>