<div class="modal fade " id="modalDownload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Descargar Reporte de Asistencias</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form class="form-inline">
            <div class="form-group mb-2">
                <label for="label" class="sr-only">Fecha</label>
                <input type="text" readonly class="form-control-plaintext" id="label" value="Fecha">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="txtFecha" class="sr-only">Fecha</label>
                <input type="date" class="form-control" id="txtFecha" placeholder="Fecha">
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="btn_download_report" class="btn btn-primary" >Descargar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>