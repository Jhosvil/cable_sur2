<div class="container">
    <div class="row">
        <div><h3>Lista de usuarios inactivos</h3></div>
    </div>
    <div class="row">
        <table border ="1" class="table table-striped table-bordered" id="tablaUsuarioInactivo" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Usuario</th>
                    <th>Rol</th>
                    <th>Fecha Registro</th>
                    <th>Fecha Baja</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dni</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody id="listarUsuarioInactivo">
                <!-- Aqui se cargaran los datos de manera asincrona -->
            </tbody>
        </table>
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


<script>
    $(document).ready(function(){
        var idusuario = "";

        function renderDataTableUsuariosInactivos(){

            $("#tablaUsuarioInactivo").DataTable({
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
        function listarUsuariosInactivos(){
            var datos = {
                'operacion' : 'listarUsuarioInactivo'
            }
            $.ajax({
                url : 'controllers/usuario.controller.php',
                type : 'GET',
                data : datos,
                success: function(e){
                    //console.log(e);
                    var tabla = $("#tablaUsuarioInactivo").DataTable();
                    tabla.destroy();
                    $("#listarUsuarioInactivo").html(e);
                    renderDataTableUsuariosInactivos();
                    
                }
            });
        }

        // HABILITAR A U USUARIO QUE ESTE INACTIVO
        $("#tablaUsuarioInactivo").on("click", "#btnHabilitarUsuario", function(){
            idusuario = $(this).attr("data-idusuario");
            var datos = {
                'operacion' : 'habilitarUsuarioInactivo',
                'idusuario' : idusuario
            }
            $.ajax({
                url : 'controllers/usuario.controller.php',
                type : 'GET',
                data : datos,
                success: function(e){
                    alert('Se habilito correctamente a este usuario');
                    listarUsuariosInactivos();
                }
            });
        });

        listarUsuariosInactivos();
    });
</script>