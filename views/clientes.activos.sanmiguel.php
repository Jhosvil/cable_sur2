<div class="container">
  <div class="row">
    <h3>Lista de Clientes del distrito de san miguel</h3>
  </div>
  <div class="row">
    <table border ="1" class="table table-striped table-bordered" id="tablaClienteSanMiguel" style="width:100%">
      <thead>
        <tr>
          <th>Id</th>
          <th>Apellido del cliente</th>
          <th>Nombre del cliente</th>
          <th>Dni del cliente</th>
          <th>Apellido del usuario</th>
          <th>Nombre del usuario</th>
          <th>Fecha de registro</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody id="listarClienteSanMiguel">
        <!-- Aqui se cargaran los datos de manera asincrona -->
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Para Registrar Un Contrato -->
<div class="modal fade" data-backdrop="static" id="modalRegistrarContrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="form-group row">
              <div class="col-sm-4">
                <select id="txtPlan" class="js-example-basic-single js-states form-control form-control-border">
                  <!-- Se cargarán de forma asincrona -->
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">N° del Cintillo</label>
                <input type="text" class="form-control" id="txtNombresPersona" placeholder="Elian Corina">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">N° del Suministro del Luz</label>
                <input type="text" class="form-control" id="txtApellidosPersona" placeholder="Gutierres Tincusi">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="recipient-name" class="col-form-label">Referencia</label>
                <input type="text" class="form-control" id="txtDniPersona" placeholder="70985557">
              </div>
            </div>
            <div class="row">
              <div class="form-group row">
                <div class="col-sm-2">
                  <select id="txtTipoDireccion" class="js-example-basic-single js-states form-control form-control-border">
                    <option value="Av">Av</option>
                    <option value="Jr">Jr</option>
                  </select>
                </div>
                <div class="col-sm-5">
                  <select id="txtDireccion" class="js-example-basic-single js-states form-control form-control-border">
                    <!-- Se cargarán de forma asincrona -->
                  </select>
                </div>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="txtEmailPersona" placeholder="N° direccion..">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Anexo <i class="fas fa-envelope"></i> </label>
                <input type="email" class="form-control" id="txtEmailPersona" placeholder="eliangutierrez525@gmail.com">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Fecha Inicio </label>
                  <input type="date" class="form-control" id="txtEmailPersona" placeholder="eliangutierrez525@gmail.com">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Fecha Termino</label>
                  <input type="date" class="form-control" id="txtEmailPersona" placeholder="eliangutierrez525@gmail.com">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Dia de Pago</label>
                  <input type="date" class="form-control" id="txtEmailPersona" placeholder="eliangutierrez525@gmail.com">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success btn-Guardar-Persona" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<script src="js/clientes.activos.sanmiguel.js"></script>
