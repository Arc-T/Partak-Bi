<div class="modal fade text-left" id="danger{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white" id="myModalLabel120">
                    حذف - {{$title  }}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                قبل از حذف از صحت اطلاعات اطمینان حاصل کنید و پس از آن گزینه (ادامه) را کلیک
                کنید
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">بستن</span>
                </button>
                <form action="{{url($url)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$id}}" name="report_id">
                    <button type="submit" class="btn btn-danger ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">ادامه</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>