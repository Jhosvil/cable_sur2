<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h3>Lista de operaciones realizadas</h3>
        </div>
    </div>
    <div class="row"> 
        <table class="table" id="tabla-operaciones">
            <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Id Contrato</th>
                        <th scope="col">Tecnico</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Operacion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Materiales Retirados</th>
                        <th scope="col">Materiales Usados</th>
                    </tr>
            </thead>
            <tbody id="listar-operaciones">
                <!-- Aqui se cargaran los datos de manera asincronica -->
            </tbody>
        </table>
    </div>
</div>

<script src="js/operaciones.js"></script>