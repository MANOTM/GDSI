<!-- Basic modal -->
<div class="modal" id="delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <form action="" id="form" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h6 class="modal-title">حذف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="d-none" name="id" id="id">
                    <h6>هل تريد حذف {{$key}} <b id="code"></b></h6>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger">حذف</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Basic modal -->
