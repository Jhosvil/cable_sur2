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

<script src="js/direccion.js" charset="utf-8"></script>
