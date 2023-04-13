<!-- Modal effects -->
<div class="modal" id="modaldemo8">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title"> كم تريد ان تعطي ل <b class="main-content-label mb-0 mg-t-8 name">rabat</b></h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form id="form" method="POST">
                @csrf
            <div class="modal-body">
                    <div class="form-group mt-2">
                        <input type="hidden" name="article_id" hidden />
                        <input type="hidden" name="db_id" hidden value="{{ $article->id ?? $article['id'] }}">
                        <input type="hidden" name="id" hidden />
                        <label for="Configue" class="main-content-label mb-0 mg-t-8">  كمية<span class="text-danger">*</span></label><br>
                        <input id="input" autocomplete="false" type="number" min="0" max="{{ $article->QuntiteActual ?? $article['quantite'] }}" class="form-control" id="dotation" name="quntite" placeholder="ادخل هنا الكمية">
                    </div>
                    <span>الحد الاقصى ل {{ $article->nom ?? $article['Désignation_ar'] }} هو <b class="text-danger qt">{{$article->QuntiteActual ?? $article['quantite'] }}</b></span>
                </div>
                <div class="modal-footer" style="display: flex;justify-content: right">
                    <button class="btn ripple btn-primary" type="submit">توزيع</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal effects-->