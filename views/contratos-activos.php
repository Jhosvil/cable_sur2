<div class="container pt-3">
  <div class="row">
    <div class="col-md-6">
      <h3>Lista de Contratos</h3>
    </div>
  </div>
  <div class="row">
    <table class="table" id="tabla-contratos">
      <thead>
        <tr>
          <th>Id</th>
          <th>Distrito</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Dni</th>
          <th>Plan</th>
          <th>Fecha de Inicio</th>
          <th>Fecha Termino</th>
          <th>Dia de Pago</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody id="listar-Contratos">
        <!-- Aqui se cargaran los datos de manera asincronica -->
      </tbody>
    </table>
  </div>
</div>

<!-- MODAL PARA VER MAS DETALLE -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del Contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="row">
              <div class="col-sm-12 col-md-3">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Apellidos:</label>
                  <input type="text" class="form-control form-control-border" id="recipient-name">
                </div>
              </div>

              <div class="col-sm-12 col-md-3">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Dni:</label>
                  <input type="text" class="form-control form-control-border" id="recipient-name">
                </div>
              </div>

              <div class="col-sm-12 col-md-3">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Distrito:</label>
                  <input type="text" class="form-control form-control-border" id="recipient-name">
                </div>
              </div>

              <div class="col-sm-12 col-md-3">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Email:</label><br>
                  <input type="text" class="form-control form-control-border" id="recipient-name">
                </div>

              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="js/contratos.js" charset="utf-8"></script>
