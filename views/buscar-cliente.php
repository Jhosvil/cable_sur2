<h3>buscar cliente</h3>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <input type="number" class="form-control" placeholder="Escriba aqui un DNI" id="txtDni">
        </div>
        <div class="col-md-6 col-sm-6">
            <button type="button" class="btn btn-success" id="btnBuscarClienteDni"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 pt-3">
            <label for=""><b>ID</b> </label>
            <input type="number" class="form-control" id="txtIdCLi" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <label for=""><b>Cliente</b> </label>
            <input type="text" class="form-control" id="txtNombresCLi" readonly>
        </div>
        <div class="col-sm-6 col-md-3">
            <label for=""><b>dni</b></label>
            <input type="text" class="form-control" id="txtApellidosCli" readonly>
        </div>
        <div class="col-sm-6 col-md-3">
            <label for=""><b>Cod Cintillo</b></label>
            <input type="text" class="form-control" id="txtCodCintilloCli" readonly>
        </div>
        <div class="col-sm-6 col-md-3">
            <label for=""><b>Cod Suministro de Luz</b></label>
            <input type="text" class="form-control" id="txtCodSuministroCli" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <label for=""><b>Dirección</b> </label>
            <input type="text" class="form-control" id="txtDirCLi" readonly>
        </div>
        <div class="col-sm-12 col-md-6">
            <label for=""><b>Referencia</b></label>
            <input type="text" class="form-control" id="txtReferenciaCli" readonly>
        </div>
    </div>
</div>
<br><br>
<div >
    <table border ='1' class='table table-striped table-bordered' id='tablaPagosXDni'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Mes Pago</th>
                <th>Fecha de Pago</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody id="listarPagosXdni">
        </tbody>
    </table>
</div>

<script src="js/buscar.cliente.js"></script>