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

<script>
    $(document).ready(function(){
        var idusuario = "";
        var datosNuevos = "";

        function renderDataTableUsuarios(){

            $("#tablaUsuario").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#TableAdminds_wrapper .col-md-6:eq(0)');
            $('#example3').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        }

        // LISTAR USUARIOS
        function listarUsuarios(){
            var datos = {
                'operacion' : 'listarUsuario'
            }
            $.ajax({
                url : 'controllers/usuario.controller.php',
                type : 'GET',
                data : datos,
                success: function(e){
                    //console.log(e);
                    var tabla = $("#tablaUsuario").DataTable();
                    tabla.destroy();
                    $("#listarUsuario").html(e);
                    renderDataTableUsuarios();
                    
                }
            });
        }

        // LISTAR ONE USUARIO
        $("#tablaUsuario").on("click", "#btnModificarUsuario", function(){
            idusuario = $(this).attr("data-idusuario");
            
            var datos = {
                'operacion' : 'listarOneDatoUsuario',
                'idusuario' : idusuario
            }
            $.ajax({
                url : 'controllers/usuario.controller.php',
                type : 'GET',
                data : datos,
                success : function(e){
                    if (e != "") {
                        var data = JSON.parse(e);
                        datosNuevos = false;
                        $("#txtCargoUsuario").val(data.rol);
                    }
                }
            });
        });

        // MODIFICAR USUARIOS
        $(".btn-mod-usuario").on("click", function(){
            let rol = $("#txtRolUsuario").val();
            if (rol == "") {
                alert("Por favor llene el campo");
            }else{
                var datos = {
                    'operacion' : 'modificarUsuario',
                    'idusuario' : idusuario,
                    'rol'       : rol
                }
                if (confirm("¿Estas seguro de Modifiacar a este Usuario?")) {
                    $.ajax({
                        url : 'controllers/usuario.controller.php',
                        type : 'GET',
                        data : datos,
                        success: function(e){
                            alert("Se modifico correctamente");
                            listarUsuarios();
                        }
                    });
                }
            }
        });

        // INABILITAR UN USUARIO
        $('#tablaUsuario').on("click", "#btnDesabilitarUsuario",function(){
          idusuario = $(this).attr("data-idusuario");

          var datos ={
            'operacion' : 'inabilitarUsuario',
            'idusuario' : idusuario
          }
          if (confirm("¿Estas seguro de inabilitar a este usuario?")) {
            $.ajax({
              url  : 'controllers/usuario.controller.php',
              type : 'GET',
              data : datos,
              success:function(e){
                alert('Se inabilito correctamente a este usuario');
                listarUsuarios();
              }
            });            
          }
        });

        renderDataTableUsuarios();
        
        listarUsuarios();
        
    });
</script>