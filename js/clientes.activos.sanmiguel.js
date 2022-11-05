var idcliente = "";

function listarClienteSanMiguel() {
    var datos = {
        'operacion' : 'listarClienteSanMiguel'
    };
    $.ajax({
    url : 'controllers/cliente.controller.php',
    type : 'GET',
    data : datos,
    success: function(e) {
        tabla = $("#tablaClienteSanMiguel").DataTable();
        tabla.destroy();
        $("#listarClienteSanMiguel").html(e);
        $("#tablaClienteSanMiguel").DataTable(dataTableMedium);
    }
    });
}

$("#tablaClienteSanMiguel").on("click", "#btnEliminarCliente", function() {
  idcliente = $(this).attr("data-idcliente");
  var datos ={
    'operacion' : 'inabilitarCliente',
    'idcliente' : idcliente
  };
  if (confirm("¿Esta seguro de eliminar a este cliente de ID : " + idcliente + " ?")) {
    $.ajax({
      url : 'controllers/cliente.controller.php',
      type : 'GET',
      data : datos,
      success:function (e) {
        alert("Se elimino correctamente al cliente de ID : "+idcliente);
        listarClienteSanMiguel();
      }
    });
  }
});

// LISTAR PLANES EN EL SELECT
function listarPlanesContra() {
  var datos = {
    'operacion' : 'listarPlanesContra',
  }
  $.ajax({
    url : 'controllers/plan.controller.php',
    type : 'GET',
    data : datos,
    success: function(e){
      $("#txtPlan").html(e);
    }
  });
};
// LISTAR DIRECCIONES EN EL SELECT
function listarDireccionesContra() {
  var datos = {
    'operacion' : 'listarDireccionContra',
  }
  $.ajax({
    url : 'controllers/direccion.controller.php',
    type : 'GET',
    data : datos,
    success: function(e){
      $("#txtDireccion").html(e);
    }
  });
};

// CAPTURAMOS EL ID DEL CLIENTE
$("#tablaClienteSanMiguel").on("click", "#btnNuevoContrato", function() {
  idcliente = $(this).attr("data-idcliente");
});

// REGISTRAR UN CONTRATO
$(".btn-Guardar-Contrato").on("click", function(){
  let idplan        = $("#txtPlan").val();
  let codcintillo   = $("#txtCodCintillo").val();
  let numSuministro = $("#txtNumSuministro").val();
  let referencia    = $("#txtReferencia").val();
  let tipodireccion = $("#txtTipoDireccion").val();
  let iddireccion   = $("#txtDireccion").val();
  let NumDirecion   = $("#txtNumDirecion").val();
  let Anexo         = $("#txtAnexo").val();
  let fechInicio    = $("#txtfechInicio").val();
  let fechTermino   = $("#txtFechTermino").val();
  let diapago       = $("#txtDiaPago").val();

  if (codcintillo == "") {
    alert("Por favor ingrese el codigo del cintillo");
  }else if(numSuministro == ""){
    alert ("Por favor ingrese el numero de suministro de luz");
  }else if(referencia == ""){
    alert("Por favor ingrese la referencia");
  }else if(NumDirecion == ""){
    alert("Por favor ingrese la numero dirección");
  }else if(Anexo == ""){
    alert("Por favor ingrese el anexo");
  }else if (fechInicio == ""){
    alert("Por favor ingresar la fecha de inicio");
  }else if(fechTermino == ""){
    alert("Por favor ingrese la fecha de termino");
  }else if(diapago == ""){
    alert("Por favor ingrese el dia de pago");
  }
  var datos = {
    'operacion'     : 'registrarContrato',
    'idcliente'     : idcliente,
    'idplan'        : idplan,
    'codcintillo'   : codcintillo,
    'codsuministro' : numSuministro,
    'referencia'    : referencia,
    'tipodireccion' : tipodireccion,
    'iddireccion'   : iddireccion,
    'nrodireccion'  : NumDirecion,
    'anexo'         : Anexo,
    'fechainicio'   : fechInicio,
    'fechatermino'  : fechTermino,
    'diapago'       : diapago
  }
  $.ajax({
    url : 'controllers/contrato.controller.php',
    type : 'GET',
    data : datos,
    success : function(e) {
      console.log(e);
      alert("Se creo el contrato nuevo al cliente de id : " + idcliente);
    }
  });
  
});
listarDireccionesContra();
listarPlanesContra();
listarClienteSanMiguel();
