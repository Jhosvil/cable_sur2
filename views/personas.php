<!--
- MODAL PARA AGREGAR PERSONA
-->
<div class="modal fade" id="modalAgregarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="form-group row">
              <div class="col-sm-4">
                <select id="txtDepartamento" class="js-example-basic-single js-states form-control form-control-border">
                  <!-- Se cargarán de forma asincrona -->
                </select>
              </div>
              <div class="col-sm-4">
                <select id="txtProvincia" class="js-example-basic-single js-states form-control form-control-border">
                  <!-- Se cargarán de forma asincrona -->
                </select>
              </div>
              <div class="col-sm-4">
                <select id="txtDistrito" class="js-example-basic-single js-states form-control form-control-border" >
                  <!-- Se cargarán de forma asincrona -->
                </select>   
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nombres</label>
                <input type="text" class="form-control" id="txtNombresPersona" placeholder="Elian Corina">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Apellidos</label>
                <input type="text" class="form-control" id="txtApellidosPersona" placeholder="Gutierres Tincusi">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Dni <i class="far fa-address-card"></i></label>
                <input type="number" class="form-control" id="txtDniPersona" placeholder="70985557">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Telefono <i class="fas fa-mobile-alt"></i></label>
                <input type="number" class="form-control" id="txtTelefonoPersona" placeholder="973045762" maxlength="9">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email <i class="fas fa-envelope"></i> </label>
                <input type="email" class="form-control" id="txtEmailPersona" placeholder="eliangutierrez525@gmail.com">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success btn-Guardar-Persona" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--
- MODAL PARA MODIFICAR PERSONA
-->
<div class="modal fade" id="modalModificarPersona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nombres</label>
                <input type="text" class="form-control" id="txtNombresPersonaMod" placeholder="Elian Corina">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Apellidos</label>
                <input type="text" class="form-control" id="txtApellidosPersonaMod" placeholder="Gutierres Tincusi">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Dni <i class="far fa-address-card"></i></label>
                <input type="number" class="form-control" id="txtDniPersonaMod" placeholder="70985557">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Telefono <i class="fas fa-mobile-alt"></i></label>
                <input type="number" class="form-control" id="txtTelefonoPersonaMod" placeholder="973045762">
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email <i class="fas fa-envelope"></i> </label>
                <input type="email" class="form-control" id="txtEmailPersonaMod" placeholder="eliangutierrez525@gmail.com">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success btn-mod-Persona" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL PARA AÑADIR USUARIO -->
<div class="modal fade" id="modalAñadirUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="container">
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="txtNombreUsuario" placeholder="">
              </div>
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Clave de Acceso</label>
                <input type="password" class="form-control" id="txtClaveAcceso" placeholder="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="recipient-name" class="col-form-label">Cargo <i class="fas fa-user-tie"></i></label>
                <select name="" class="custom-select" id="txtrolUsu">
                  <option value="Administrador">Administrador</option>
                  <option value="Cobrador">Cobrador</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-success btn-añadir-usuario" data-dismiss="modal">Guardar </button>
      </div>
    </div>
  </div>
</div>

<br>
<button type="button" class="btn btn-primary boton-nuevo-per" data-toggle="modal" data-target="#modalAgregarPersona" data-whatever="@mdo">
  Nueva persona
</button>
<br><br>
<table border ="1" class="table table-striped table-bordered" id="table-personas" style="width:100%">
  <thead>
    <tr>
      <th>Id</th>
      <th>Distrito</th>
      <th>nombres</th>
      <th>Apellidos</th>
      <th>Dni</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Operaciones</th>
    </tr>
  </thead>
  <tbody id="listarPersona">
    <!-- Aqui se cargaran los datos de manera asincrona -->
  </tbody>
</table>


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

<script>
$(document).ready(function () {
  var idpersona = "";

  function renderDataTablePersonas(){

      $("#table-personas").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })//.buttons().container().appendTo('#TableAdminds_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "order": [[1, "desc"]],
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      });
  }

  // LISTAR DEPARTAMENTOS
  function listarDepartamentos() {
    //Enviar datos por ajax, usando el metodo GET
    $.ajax({
      url:    'controllers/ubigeo.controller.php',
      type:   'GET',
      data:   'operacion=listarDepartamentos',
      success: function (e){
        //Renderizar las etiquetas que vienen desde controllers
        $("#txtDepartamento").html(e); //html e Inyecta nuenvas etiquetas e 
      }
    }); // Fin ajax
  }

  // LISTAR PROVINCIAS
  $("#txtDepartamento").change( function (){
    var datos = {
      'operacion'         : 'listarProvincias',
      'iddepartamento'    : $(this).val()
    };
    //console.log($(this).val());
    $.ajax({
      url: 'controllers/ubigeo.controller.php',
      type: 'GET',
      data: datos,
      success: function (e){
        //Renderizar etiquetas que vienen desde controllers
        $("#txtProvincia").html(e);
      }
    });
  });

  // LISTAR DISTRITOS
  $("#txtProvincia").change( function (){ 
    var datos = {
      'operacion' : 'listarDistritos',
      'idprovincia' : $(this).val()
    };               
    $.ajax({
    url: 'controllers/ubigeo.controller.php',
    type: 'GET',
    data: datos,
    success: function (e){
      //console.log(e);
      $("#txtDistrito").html(e);
    }
  });
});

  //LISTAR PERSONAS
  function listarPersonas() {
    var datos = {
      'operacion' : 'listarPersona'
    }
    $.ajax({
      url : 'controllers/persona.controller.php',
      type : 'GET',
      data: datos,
      success: function(e) {
        var tabla = $("#table-personas").DataTable();
        tabla.destroy();
        $("#listarPersona").html(e);
        renderDataTablePersonas();
      }
    });
  }

  // GUARDA PERSONAS
  $(".btn-Guardar-Persona").on("click", function() {
    let iddistrito  = $("#txtDistrito").val();
    let nombres   = $("#txtNombresPersona").val();
    let apellidos = $("#txtApellidosPersona").val();
    let dni       = $("#txtDniPersona").val();
    let telefono  = $("#txtTelefonoPersona").val();
    let email     = $("#txtEmailPersona").val();

    if (iddistrito == "" ||nombres == "" || apellidos == "" || dni == "" || telefono == "") {
      alert("por favor complete los campos que falte");
    }else {
      var datos = {
        'operacion' : 'registrarPersona',
        'iddistrito' : iddistrito,
        'nombres'  : nombres,
        'apellidos': apellidos,
        'dni'     : dni,
        'telefono' : telefono,
        'email'   : email
      }
      $.ajax({
        url : 'controllers/persona.controller.php',
        type : 'GET',
        data : datos,
        success: function(e) {
          alert("se guardo correctamente");
          listarPersonas();
        }
      });
    }
  });

  //LISTA UN DATO PERSONAS
  $("#table-personas").on("click", "#btnModificarPersona", function() {
    idpersona = $(this).attr("data-idpersona");

    $.ajax({
      url  : 'controllers/persona.controller.php',
      type : 'GET',
      data : 'operacion=listarOneDatoPersona&idpersona='+ idpersona,

      success: function(e) {
        if (e != "") {
          var data = JSON.parse(e);
          datosNuevos = false;
          $("#txtNombresPersonaMod").val(data.nombres);
          $("#txtApellidosPersonaMod").val(data.apellidos);
          $("#txtDniPersonaMod").val(data.dni);
          $("#txtTelefonoPersonaMod").val(data.telefono);
          $("#txtEmailPersonaMod").val(data.email);
        }
      }
    });
  })

  //MODIFICAR UN DATO
    $(".btn-mod-Persona").on("click", function() {

      let nombres = $("#txtNombresPersonaMod").val();
      let apellidos = $("#txtApellidosPersonaMod").val();
      let dni = $("#txtDniPersonaMod").val();
      let telefono = $("#txtTelefonoPersonaMod").val();
      let email = $("#txtEmailPersonaMod").val();

      if (nombres == "" || apellidos == "" || dni == "" || telefono == "") {
        alert("por favor llene los campos");
      }else {
        var datos = {
          'operacion' : 'modificarPersona',
          'idpersona' : idpersona,
          'nombres' : nombres,
          'apellidos' : apellidos,
          'dni' : dni,
          'telefono' : telefono,
          'email' : email
        }
        if (confirm("¿Estas seguro de Modicar a esta persona?")) {
          $.ajax({
            url : 'controllers/persona.controller.php',
            type : 'GET',
            data : datos,
            success: function(e) {
              alert("Se modifico correctamente");
              listarPersonas();
            }
          });
        }
      }
    });

  //GUARDAR USUARIO
  $("#table-personas").on("click", "#btnAñadirUsuario" , function(){
      idpersona           = $(this).attr("data-idpersona");
    $(".btn-añadir-usuario").on("click", function(){
    let nombreusuario   = $("#txtNombreUsuario").val();
    let claveacceso     = $("#txtClaveAcceso").val();
    let rol             = $("#txtrolUsu").val();
    
    alert(idpersona);

    if (nombreusuario == "" || claveacceso == "" || rol == "") {
      alert("Por favor complete los datos faltantes");
    }else{
      var datos = {
        'operacion' : 'registrarUsuario',
        'idpersona' : idpersona,
        'nombreusuario' : nombreusuario,
        'claveacceso' : claveacceso,
        'rol'         : rol
      }
      $.ajax({
        url  : 'controllers/persona.controller.php',
        type : 'GET',
        data : datos,
        success: function(e){
          //console.log(e);
          alert("Se guardo correctamente");
        }
      });
    }
    });
    
  });

  // ASIGNAR CLIENTE
  $("#table-personas").on("click", "#btnAñadirCliente", function() {
    idpersona = $(this).attr("data-idpersona");

    var datos = {
      'operacion' : 'registrarCliente',
      'idpersona' : idpersona
    }
    if (confirm("¿Estas seguro de asignar a esta persona como cliente?")) {
      $.ajax({
        url : 'controllers/cliente.controller.php',
        type : 'GET',
        data : datos,
        success: function(e){
          alert("Se Asigno correctamente a esta persona como cliente");
        }
      });
    }
  })

  listarDepartamentos();
  listarPersonas();
});
</script>
