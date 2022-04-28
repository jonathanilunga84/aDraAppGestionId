<!-- Button trigger modal -->
<!-- button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formAjoutAgent">
          Launch static backdrop modal
</button -->

<!-- Modal -->
<div class="modal fade" id="formAjoutAgent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" style="border: 2px solid rgb(0, 121, 98);">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-weight: bold;">Formulaire Ajout ID Staff</h5>
        <button type="button" class="btn-close bg-adra" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
          <form id="formAjoutIDagent" action="{{route('store')}}" method="POST">
            @csrf
            <div class="row bg-dangerM">
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-3">
                <label>Nom:</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez le nom" class="form-control" />
                <span class="text-danger error-text nom_error"></span>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-3">
                <label for="nom">Postnom:</label><br />
                <input type="text" name="postnom" id="postnom" placeholder="Entrez le Prenom facultatif" class="form-control" />
                <span class="text-danger error-text postnom_error"></span>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-3">
                <label for="nom">Prénom:</label><br />
                <input type="text" name="prenom" id="prenom" placeholder="Entrez le Prenom facultatif" class="form-control" />
                <span class="text-danger error-text prenom_error"></span>
              </div>
              <div class="form-group col-sm-12 col-md-12 mb-3">
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label>Sexe:</label>
                    <select name="sexe" id="sexe" class="form-control">
                      <option value="">---Choisir---</option>
                      <option value="homme">Homme</option>
                      <option value="femme">Femme</option>
                    </select>
                    <span class="text-danger error-text sexe_error"></span>
                  </div>
                  <div class="col-sm-6">
                    <label>Num Carte Identité:</label>
                    <input type="text" name="numCarteIdentite" id="numCarteIdentite" placeholder="numero carte Identité facultatif" class="form-control" />
                    <span class="text-danger error-text numCarteIdentite_error"></span>
                  </div>
                </div>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-2">
                <label for="nom">ID Agent:</label><br />
                <input type="text" name="IDagent" id="IDagent" placeholder="Entrez l'ID Agent" class="form-control" />
                <span class="text-danger error-text IDagent_error"></span>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-2">
                <button id="btnStoreIDagent" type="submit" class="btn bg-adra form-control">Enregistrer</button>
              </div>
            </div>
          </form>
      </div>
      <!-- div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div -->
    </div>
  </div>
</div>