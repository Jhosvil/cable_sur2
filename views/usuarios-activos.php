<div class="container">
  <div class="row">
    <div>
      <h3>Lista de usuarios activos</h3>
    </div>
  </div>
</div>

<!-- MODAL PARA MODIFICAR USUARIO -->
<div class="modal fade" id="modalModificarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Cargo <i class="fas fa-user-tie"></i></label>
                <select name="" class="custom-select" id="txtRolUsuario">
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
        <button type="button" class="btn btn-success btn-mod-usuario" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>

<table border ="1" class="table table-striped table-bordered" id="tablaUsuario" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Usuario</th>
            <th>Rol</th>
            <th>Fecha Registro</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody id="listarUsuario">
        <!-- Aqui se cargaran los datos de manera asincrona -->
    </tbody>
</table>

<script src="js/usuarios.activos.js"></script>