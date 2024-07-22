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
                            <h5>اندازه نمودار</h5>
                            <select class="form-select" name="graph_size"
                                style="background-position: left.75rem center">
                                <option value="s">کوچک</option>
                                <option value="m">متوسط</option>
                                <option value="l">بزرگ</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-4">
                            <h5>تم رنگ</h5>
                            <select class="form-select" name="graph_theme"
                                style="background-position: left.75rem center">
                                <option value="s">تیره</option>
                                <option value="m">روشن</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">بازگشت</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ثبت تغییرات</span>
                    </button>
                    <input type="hidden" name="id" value="{{$id}}">
                </div>
            </div>
        </form>
    </div>
</div>