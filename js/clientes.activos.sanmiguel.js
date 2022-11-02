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
listarClienteSanMiguel();
