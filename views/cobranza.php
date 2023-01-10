<div class="container pt-3">
    <div class="row">
        <div class="col-md-6">
            <h3>Lista de Cobranza</h3>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4">
            <select id="txtUsuarios" class="js-example-basic-single js-states form-control form-control-border">
                <!-- Se cargarán de forma asincrona -->
            </select>
        </div>
    </div>
    <div class="row">
        <table class="table" id="tabla-cobranza">
            <thead>
                <tr>
                <th>Id</th>
                <th>Cliente</th>
                <th>Direccion</th>
                <th>Referencia</th>
                <th>Telefono</th>
                <th>Dni</th>
                <th>Anexo</th>
                <th>Enero</th>
                <th>Febrero</th>
                <th>Marzo</th>
                <th>Abril</th>
                <th>Mayo</th>
                <th>Junio</th>
                <th>Julio</th>
                <th>Agosto</th>
                <th>Setiembre</th>
                <th>Octubre</th>
                <th>Noviembre</th>
                <th>Diciembre</th>
                </tr>
            </thead>
            <tbody id="listar-Cobranza">
                <!-- Aqui se cargaran los datos de manera asincronica -->
            </tbody>
        </table>
    </div>
</div>
<script src="js/cobranza.js"></script>