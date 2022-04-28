<!-- Button trigger modal -->
<!-- button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formAjoutAgent">
          Launch static backdrop modal
</button -->

<!-- Modal -->
<div class="modal fade" id="formModiftAgent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" style="border: 2px solid rgb(0, 121, 98);">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel" style="font-weight: bold;">Formulaire Modification ID Staff</h5>
        <button type="button" class="btn-close bg-adra" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
          <form id="formModiftAgentSend" action="{{route('agent.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row bg-dangerM">
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-3">
                <label>Nom:</label>
                <input type="hidden" name="myId" id="myId" placeholder="Entrez le ID" class="form-control" />
                <span class="text-danger error-text myId_error"></span>

                <input type="text" name="nomModif" id="nomModif" placeholder="Entrez le nom" class="form-control" />
                <span class="text-danger error-text nomModif_error"></span>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-3">
                <label for="nom">Postnom:</label><br />
                <input type="text" name="postnomModif" id="postnomModif" placeholder="Entrez le Postnom facultatif" class="form-control" />
                <span class="text-danger error-text postnomModif_error"></span>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-3">
                <label for="nom">Prénom:</label><br />
                <input type="text" name="prenomModif" id="prenomModif" placeholder="Entrez le Prenom facultatif" class="form-control" />
                <span class="text-danger error-text prenomModif_error"></span>
              </div>
              <div class="form-group col-sm-12 col-md-12 mb-3">
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label>Sexe:</label>
                    <select name="sexeModif" id="sexeModif" class="form-control">
                      <option value="">---Choisir---</option>
                      <option value="homme">Homme</option>
                      <option value="femme">Femme</option>
                    </select>
                    <span class="text-danger error-text sexeModif_error"></span>
                  </div>
                  <div class="col-sm-6">
                    <label>Num Carte Identité:</label>
                    <input type="text" name="numCarteIdentiteModif" id="numCarteIdentiteModif" placeholder="numero carte Identité facultatif" class="form-control" />
                    <span class="text-danger error-text numCarteIdentiteModif_error"></span>
                  </div>
                </div>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-2">
                <label for="nom">ID Agent:</label><br />
                <input type="text" name="IDagentModif" id="IDagentModif" placeholder="Entrez l'ID Agent" class="form-control" />
                <span class="text-danger error-text IDagentModif_error"></span>
              </div>
              <div class="input-groupM form-group col-sm-12 col-md-12 mb-2">
                <button id="btnModifIDagent" type="submit" class="btn bg-adra form-control">Enregistrer le Modification</button>
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