<div class="modal fade" id="modalAddVisitante" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Añadir Persona</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row" style="margin-bottom: 10px;">
                <div class="col">
                <label for="nombres">Nombres</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Nombres" aria-label="nombres" id="txtNombres">
                </div>
              </div>

              <div class="row">
                <div class="col">
                <label for="aPaterno">Ap. Paterno</label>
                  <input type="text" name="aPaterno" class="form-control" placeholder="Ap. Paterno" aria-label="Last name" id="txtApePaterno">
                </div>
                <div class="col">
                    <label for="aMaterno">Ap. Materno</label>
                    <input type="text" name="aMaterno" class="form-control" placeholder="Ap. Materno" aria-label="Last name" id="txtApeMaterno">
                  </div>
              </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="AddVisitante">Guardar</button>
          <button class="btn btn-primary" data-bs-target="#modalPersona" data-bs-toggle="modal" data-bs-dismiss="modal">Regresar</button>
        </div>
      </div>
    </div>
  </div>