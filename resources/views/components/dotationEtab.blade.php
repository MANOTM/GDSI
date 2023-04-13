<!-- Modal effects -->
<div class="modal" id="etabdotation">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> كم تريد ان تعطي ل <b class="main-content-label mb-0 mg-t-8 name">rabat</b></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form" method="get">
            @csrf
            <div class="modal-body">
                    <div class="form-group mt-2">
                        <label for="Configue" class="main-content-label mb-0 mg-t-8">  كمية<span class="text-danger">*</span></label><br>
                        <input id="input" autocomplete="false" type="number" min="0" class="form-control" id="dotation" name="quntite" placeholder="ادخل هنا الكمية">
                    </div>
                    <span>الحد الاقصى هو <b class="text-danger qt"></b></span>
                </div>
                <div class="modal-footer" style="display: flex;justify-content: right">
                    <button type="button" class="btn ripple btn-primary dota">توزيع</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal effects-->