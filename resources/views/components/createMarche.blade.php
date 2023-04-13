<!-- Large Modal -->
<div class="modal" id="modaldemo1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">اضافة سوق</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="p-3" action="{{ route('marche.store') }}" method="POST"  data-parsley-validate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="fw-5">Selectionner Le type De Marche <span class="text-danger">*</span></label>
                            <select class="form-control select2" data-parsley-class-handler="#slWrapper" data-parsley-errors-container="#slErrorContainer" data-placeholder="Choose one" required="" id="name" name="type">
                                <option hidden>اختر نوع السوق</option>
                                @foreach ($arr as $aa)
                                    <option value="<?=$aa?>"><?=$aa?></option>
                                @endforeach
                            </select>
                            <div id="slErrorContainer"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="code" class="fw-5">Selectionner Le Numero De Marche <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required placeholder="Numero de Marche" name="code" id="code">
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-6">
                            <label for="date" class="fw-5">Date <span class="text-danger">*</span></label>
                            <input type="date" required id="date" class="form-control" name="date">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mon" class="fw-5">L'annee <span class="text-danger">*</span></label>
                            <input type="number" placeholder="Annee" required id="mon" class="form-control"
                                name="annee">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-6">
                            <label for="mon" class="fw-5">Montant de Marche (DH)  </label>
                            <input type="number" placeholder="Montant de Marche" required  id="mon" class="form-control"
                                name="montant">
                        </div>  
                        <div class="form-group col-md-6">
                            <label for="date" class="fw-5">Entreprise</label>
                            <input type="text" placeholder="Entreprise"  id="date" class="form-control" name="entreprise">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="Configue" class="fw-5">Objet</label>
                        <input type="text" class="form-control"  id="Configue" name="objet" placeholder="Objet">
                    </div>
                    <div class="form-group mt-2">
                        <label for="obser" class="fw-5">Observation</label>
                        <textarea name="message" class="form-control" placeholder="Observation" id="observation"
                            rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="+ اضافة" class="btn btn-primary ms-auto">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Large Modal -->