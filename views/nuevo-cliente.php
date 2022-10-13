<h2>NUEVO CLIENTE</h2>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
  Nuevo Cliente
</button>

<div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Cliente</h5>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombres</label>
            <input type="text" class="text-capitalize form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Apellidos</label>
            <input type="text" class="text-capitalize form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Dni</label>
            <input type="number" class="text-capitalize form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Telefono</label>
            <input type="number" class="text-capitalize form-control" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-secondary bg-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary boton2" data-target="#exampleModal2">Siguiente</button>
      </div>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
  $(".boton2").click(function(){
    $('#exampleModal2').modal('show');
  })
  $(".boto").click(function(){
    $('#exampleModal2').modal('hide');
  })
</script> -->
