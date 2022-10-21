<div class="container">
    <div class="row pt-3">
        <div class="col-md-3">
             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Registra Planes</button>
         </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Planes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del Plan:</label>
                        <input type="text" class="form-control" id="txtNombrePlan">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Descripcion del plan</label>
                        <input type="text" class="form-control" id="txtDescripcionPlan">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Precio</label>
                        <input type="number" class="form-control" id="txtPrecioPlan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnRegistrarPlan" data-dismiss="modal">Registrar</button>
            </div>
        </div>
    </div>
</div>

<script src="js/planes.js"></script>