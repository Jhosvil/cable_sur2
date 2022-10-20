<div class="container">
  <div class="row pt-2">
    <h3> Lista de direcciones con el cual trabaja la empresa</h3>
  </div>
  <div class="row">
    <form class="border border-2">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <span class="label label-default"><b>Nombre de direccion</b></span>
          <input type="text" class="form-control mt-2" placeholder="Francisco Pizarro" id="txtDireccion">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 p-2">
          <button type="button" class="btn btn-success" id="btn-guardar-direccion">Guardar</button>
        </div>
      </div>
    </form>
  </div>

  <div class="row">
    <table class="table" id="tablaDirecciones">
      <thead class="thead-primary">
        <tr>
          <th>Id</th>
          <th>direccion</th>
          <th>Operaciones</th>
        </tr>
      </thead>
      <tbody id="listarDirecciones">
        <!-- Aqui se cargaran las direcciones de manera asincronica -->
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

<script src="js/direccion.js" charset="utf-8"></script>
