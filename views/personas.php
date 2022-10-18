<!--
- MODAL PARA AGREGAR PERSONA
-->
<div class="modal fade" id="modalAgregarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="form-group row">
              <div class="col-sm-4">
                <select id="txtDepartamento" class="js-example-basic-single js-states form-control form-control-border">
                  <!-- Se cargarán de forma asincrona -->
                </select>
              </div>
              <div class="col-sm-4">
                <select id="txtProvincia" class="js-example-basic-single js-states form-control form-control-border">
                  <!-- Se cargarán de forma asincrona -->
                </select>
              </div>
              <div class="col-sm-4">
                <select id="txtDistrito" class="js-example-basic-single js-states form-control form-control-border" >
                  <!-- Se cargarán de forma asincrona -->
                </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nombres</label>
                <input type="text" class="form-control" id="txtNombresPersona" placeholder="Elian Corina">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Apellidos</label>
                <input type="text" class="form-control" id="txtApellidosPersona" placeholder="Gutierres Tincusi">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Dni <i class="far fa-address-card"></i></label>
                <input type="number" class="form-control" id="txtDniPersona" placeholder="70985557">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Telefono <i class="fas fa-mobile-alt"></i></label>
                <input type="number" class="form-control" id="txtTelefonoPersona" placeholder="973045762" maxlength="9">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email <i class="fas fa-envelope"></i> </label>
                <input type="email" class="form-control" id="txtEmailPersona" placeholder="eliangutierrez525@gmail.com">
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

<!--
- MODAL PARA MODIFICAR PERSONA
-->
<div class="modal fade" id="modalModificarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nombres</label>
                <input type="text" class="form-control" id="txtNombresPersonaMod" placeholder="Elian Corina">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Apellidos</label>
                <input type="text" class="form-control" id="txtApellidosPersonaMod" placeholder="Gutierres Tincusi">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Dni <i class="far fa-address-card"></i></label>
                <input type="number" class="form-control" id="txtDniPersonaMod" placeholder="70985557">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Telefono <i class="fas fa-mobile-alt"></i></label>
                <input type="number" class="form-control" id="txtTelefonoPersonaMod" placeholder="973045762">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email <i class="fas fa-envelope"></i> </label>
                <input type="email" class="form-control" id="txtEmailPersonaMod" placeholder="eliangutierrez525@gmail.com">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success btn-mod-Persona" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL PARA AÑADIR USUARIO -->
<div class="modal fade" id="modalAñadirUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="txtNombreUsuario" placeholder="">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Clave de Acceso</label>
                <input type="password" class="form-control" id="txtClaveAcceso" placeholder="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Cargo <i class="fas fa-user-tie"></i></label>
                <select name="" class="custom-select" id="txtrolUsu">
                  <option value="Administrador">Administrador</option>
                  <option value="Cobrador">Cobrador</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success btn-añadir-usuario" data-dismiss="modal">Guardar </button>
      </div>
    </div>
  </div>
</div>

<br>
<button type="button" class="btn btn-primary boton-nuevo-per" data-toggle="modal" data-target="#modalAgregarPersona" data-whatever="@mdo">
  Nueva persona
</button>
<br>
<table border ="1" class="table table-striped table-bordered" id="table-personas" style="width:100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Distrito</th>
      <th>nombres</th>
      <th>Apellidos</th>
      <th>Dni</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Operaciones</th>
    </tr>
  </thead>
  <tbody id="listarPersona">
    <!-- Aqui se cargaran los datos de manera asincrona -->
  </tbody>
</table>


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

<script src="js/personas.js"></script>
