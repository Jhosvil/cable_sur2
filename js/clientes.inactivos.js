// LISTAR CLIENTES INACTIVOS
function listarClientesInactivos() {
    var datos = {
        'operacion' : 'listarClientesInactivos'
    };
    $.ajax({
        url : 'controllers/cliente.controller.php',
        type : 'GET',
        data : datos,
        success: function(e) {
            tabla = $("#tablaClienteInactivo").DataTable();
            tabla.destroy();
            $("#listarClienteInactivo").html(e);
            $("#tablaClienteInactivo").DataTable(dataTableMedium);
        }
    });
}

// HABILITAR A UN CLIENTE INACTIVO
$("#tablaClienteInactivo").on("click", "#btnHabilitarCliente", function() {
    idcliente = $(this).attr("data-idcliente");
    var datos ={
      'operacion' : 'habilitarCliente',
      'idcliente' : idcliente
    };
    if (confirm("¿Esta seguro de habilitar a este cliente de ID : " + idcliente + " ?")) {
      $.ajax({
        url : 'controllers/cliente.controller.php',
        type : 'GET',
        data : datos,
        success:function (e) {
          alert("Se habilito correctamente al cliente de ID : "+idcliente);
          listarClientesInactivos();
        }
      });
    }
});
listarClientesInactivos();