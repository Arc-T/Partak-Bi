    <a href="#" data-bs-toggle="modal" data-bs-target="#danger{{ $parameter->id }}" title="حذف رکورد">
        <i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="trash"></i>
    </a>
    <div class="modal fade text-left" id="danger{{ $parameter->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        حذف - {{ $parameter->name }}
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
                    <form action="{{ route("partak.$route.destroy", [$parameter->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">ادامه</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
