function listarContratosActivos() {
  var datos ={
    'operacion' : 'listarContratos'
  }
  $.ajax({
    url : 'controllers/contrato.controller.php',
    type: 'GET',
    data : datos,
    success: function(e) {
      var tabla = $("#tabla-contratos").DataTable();
      tabla.destroy();
      $("#listar-Contratos").html(e);
      $("#tabla-contratos").DataTable(dataTableMedium);
    }
  });
}

listarContratosActivos();
