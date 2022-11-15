<div class="container pt-3">
    <div class="row">
        <div class="col-md-6">
            <h3>Lista de Contratos No Vigentes</h3>
        </div>
    </div>
    <div class="row">
        <table class="table" id="tabla-contratos-Inac">
            <thead>
                <tr>
                <th>Id</th>
                <th>Distrito</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Dni</th>
                <th>Plan</th>
                <th>Fecha de Inicio</th>
                <th>Fecha Termino</th>
                <th>Dia de Pago</th>
                <th>Operaciones</th>
                </tr>
            </thead>
            <tbody id="listar-Contratos-Inac">
                <!-- Aqui se cargaran los datos de manera asincronica -->
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL PARA VER MAS DETALLE -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- 1er GRUPO -->
                    <div class="p-2 border rounded">
                        <div>
                            <span class="label label-default border-bottom border-2 text-danger"><b> Datos del Cliente</b></span>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Apellidos:</label>
                                    <input type="text" class="form-control form-control-border" id="txtApeCli" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Dni:</label>
                                    <input type="text" class="form-control form-control-border" id="txtDniCli" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Distrito:</label>
                                    <input type="text" class="form-control form-control-border" id="txtDistCli" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Email:</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtEmailCli" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Nombres</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtNomCli" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Telefono</label><br>
                                    <input type="number" class="form-control form-control-border" id="txtTelCli" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Dirección</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtDirCli" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Referencia</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtRefCli"readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 2do GRUPO -->
                    <div class="mt-2 p-2 border rounded">
                        <div>
                            <span class="label label-default border-bottom border-2 text-danger"><b>Contrato</b></span>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Nombre del Plan</label>
                                    <input type="text" class="form-control form-control-border" id="txtNomPlan" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Precio del plan</label>
                                    <input type="text" class="form-control form-control-border" id="txtPrecPlan" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Fecha de Inicio</label>
                                    <input type="text" class="form-control form-control-border" id="txtFechIni" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Dia de pago</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtDiaPag" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Descripcion de Plan</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtDescipPlan" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Cod del cintillo</label><br>
                                    <input type="number" class="form-control form-control-border" id="txtCodCinti" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Fech Termino</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtFechTerm" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Anexo</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtAnexo" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 3° GRUPO -->
                    <div class="mt-2 p-2 border rounded">
                        <div>
                            <span class="label label-default border-bottom border-2 text-danger"><b>Datos del Contratista</b></span>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Apellidos</label>
                                    <input type="text" class="form-control form-control-border" id="txtApeUsu" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Dni</label>
                                    <input type="text" class="form-control form-control-border" id="txtDniUsu" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Rol / Cargo</label>
                                    <input type="text" class="form-control form-control-border" id="txtRolUsu" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Nombres</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtNomUsu" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">Teléfono</label><br>
                                    <input type="number" class="form-control form-control-border" id="txtTelUsu" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label text-primary">E-mail / Correo</label><br>
                                    <input type="text" class="form-control form-control-border" id="txtMailUsu" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/contratos.inactivos.js" charset="utf-8"></script>