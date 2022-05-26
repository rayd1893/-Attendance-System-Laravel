<div class="modal fade " id="modalPersona" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Listado de Personas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @include('elements.table_persona')
      </div>
      <div class="modal-footer">
        <button type="button" 
                class="btn btn-success" 
                data-bs-target="#modalAddVisitante" 
                data-bs-toggle="modal" 
                data-bs-dismiss="modal">
                Añadir Persona</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>