<div class="container pt-3">
  <div class="row">
    <div class="col-md-6">
      <h3>Lista de Contratos Vigentes</h3>
    </div>
  </div>
  <div class="row">
    <table class="table" id="tabla-contratos">
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
      <tbody id="listar-Contratos">
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

<!-- MODAL PARA REGISTRAR UNA OPERACION -->
<div class="modal fade" id="modalRegistrarOperacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Operaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tipo de operación</label>
            <select name="" id="txttipooperacion" class="custom-select">
              <option value="Instalacion">Instalacion</option>
              <option value="Reconexion">Reconexion</option>
              <option value="Corte">Corte</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Materiales Retirados</label>
            <textarea class="form-control" id="txtMaterialesRetirados"></textarea>
          </div>
          
          <div class="form-group">
            <label for="message-text" class="col-form-label">Materiales Usados</label>
            <textarea class="form-control" id="txtMaterialesUsados"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"id= ''>Cancelar </button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnGuardarOperacion">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL PARA REGISTRAR UN PAGO -->
<div class="modal fade" id="modalRegistrarPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Año</label>
            <input type="text" class="form-control form-control-border" id="txtAñoPago" placeholder="2022">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mes</label>
            <select name="" id="txtMesPago" class="custom-select">
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
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
          
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Importe</label>
            <input type="text" class="form-control form-control-border" id="txtNetoPagar">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"id= ''>Cancelar </button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnGuardarPago">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script src="js/contratos.js" charset="utf-8"></script>
<script src="js/operaciones.js" charset="utf-8"></script>
<script src="js/pago.js"></script>