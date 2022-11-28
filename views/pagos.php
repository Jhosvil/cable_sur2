<div class="container">
    <div class="row">
        <h3>lista de pagos</h3>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Filtrar por mes</label>
                    <select name="" id="txtMesPagoFilter" class="custom-select">
                        <option selected>seleccione el mes </option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Ablil</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
<table class="table" id="tablaPago">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">nomCli</th>
            <th scope="col">apeCli</th>
            <th scope="col">DireccionCli</th>
            <th scope="col">DniCli</th>
            <th scope="col">mespago</th>
            <th scope="col">netopagar</th>
            <th scope="col">fechapago</th>
            <th scope="col">diapago</th>
        </tr>
    </thead>
    <tbody id="listaPagos">
        <!-- Aqui se cargaran los datos de manera asincronica -->
    </tbody>
</table>
<script src="js/pago.js"></script>