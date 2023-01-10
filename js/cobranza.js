//LISTAR COBRANZA
function listarConbranza() {
    var datos ={
      'operacion' : 'listarCobranza'
    }
    $.ajax({
      url : 'controllers/cobranza.controller.php',
      type: 'GET',
      data : datos,
      success: function(e) {
        var tabla = $("#tabla-cobranza").DataTable();
        tabla.destroy();
        $("#listar-Cobranza").html(e);
        $("#tabla-cobranza").DataTable(dataTableComplete);
      }
    });
  }

// LISTAR Usuarios EN EL SELECT
function listarUsuariosCobranza() {
  var datos = {
    'operacion' : 'listarusuariosCobranza'
  }
  $.ajax({
    url : 'controllers/cobranza.controller.php',
    type : 'GET',
    data : datos,
    success: function(e){
      $("#txtUsuarios").html(e);
    }
  });
};

//Lista los servicios por categorias
$("#txtUsuarios").change(function (){
  var datos = {
      'operacion'     : 'listarCobranzaXUsuario',
      'idusuarioregistro'     : $(this).val()
  };
  console.log($(this).val());

  $.ajax({
      url: 'controllers/cobranza.controller.php',
      type: 'GET',
      data: datos,
      success: function (e){
          var tabla = $("#tabla-cobranza").DataTable();
          tabla.destroy();
          $("#listar-Cobranza").html(e);
          $("#tabla-cobranza").DataTable(dataTableMedium);
      }
  });
});

listarUsuariosCobranza();
listarConbranza();