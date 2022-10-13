<div class="container">
  <div class="row">
    <h3>Lista de Clientes del distrito de Los Morochucos</h3>
  </div>
  <div class="row">
    <table border ="1" class="table table-striped table-bordered" id="tablaClienteMorochucos" style="width:100%">
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
      <tbody id="listarClienteMorochucos">
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
  $(document).ready(function() {

    function renderDataTablelistarClienteMorochucos(){
        $("#tablaClienteMorochucos").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })//.buttons().container().appendTo('#TableAdminds_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "order": [[1, "desc"]],
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    }

    function listarClienteMorochucos() {
      var datos = {
        'operacion' : 'listarClienteMorochucos'
      }
      $.ajax({
        url : 'controllers/cliente.controller.php',
        type: 'GET',
        data : datos,
        success : function(e) {
          var tabla = $("#tablaClienteMorochucos").DataTable();
          tabla.destroy();
          $("#listarClienteMorochucos").html(e);
          renderDataTablelistarClienteMorochucos();
        }
      });
    }

    listarClienteMorochucos();
  });
</script>