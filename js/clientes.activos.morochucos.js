var idcliente = "";

function listarClienteMorochucos() {
    var datos = {
    'operacion' : 'listarClienteMorochucos'
    }
    $.ajax({
        url : 'controllers/cliente.controller.php',
        type: 'GET',
        data : datos,
        success : function(e) {
            var tabla = $("#tablaClienteMorochucos").DataTable();
            tabla.destroy();
            $("#listarClienteMorochucos").html(e);
            $("#tablaClienteMorochucos").DataTable(dataTableMedium);
        }
    });
}

$("#tablaClienteMorochucos").on("click", "#btnEliminarCliente", function() {
  idcliente = $(this).attr("data-idcliente");
  var datos = {
    'operacion' : 'inabilitarCliente',
    'idcliente' : idcliente
  };
  if (confirm("¿Esta seguro de elimanr a este cliente de ID : " + idcliente+ " ?")) {
    $.ajax({
      url : 'controllers/cliente.controller.php',
      type: 'GET',
      data : datos,
      success : function(e) {
        alert("Se elimino correctamente a este cliente de ID : " + idcliente)
        listarClienteMorochucos();
      }
    });
  }
})

listarClienteMorochucos();
