<!-- Large Modal -->
<div class="modal" id="edit">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">تعديل سوق</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" autocomplete="false">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="fw-5">edit Le type De Marche <span class="text-danger">*</span></label>
                            <select class="form-control" id="type" name="type">
                                    <option hidden>اختر نوع السوق</option>
                                @foreach ($arr as $aa)
                                    <option value="<?=$aa?>"><?=$aa?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="code" class="fw-5">edit Le Numero De Marche <span class="text-danger">*</span></label>
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
                            <input type="number" placeholder="Annee" required id="annee" class="form-control"
                                name="annee">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-6">
                            <label for="mon" class="fw-5">Montant de Marche (DH)  </label>
                            <input type="number" placeholder="Montant de Marche" required  id="montant" class="form-control"
                                name="montant">
                        </div>  
                        <div class="form-group col-md-6">
                            <label for="date" class="fw-5">Entreprise</label>
                            <input type="text" placeholder="Entreprise" class="form-control" id="entreprise" name="entreprise">
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label for="Configue" class="fw-5">Objet</label>
                        <input type="text" class="form-control"  id="objet" name="objet" placeholder="Objet">
                    </div>
                    <div class="form-group mt-2">
                        <label for="obser" class="fw-5">Observation</label>
                        <textarea name="message" class="form-control" placeholder="Observation" id="observation"
                            rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="تعديل" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Large Modal -->