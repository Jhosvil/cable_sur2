var dni = "";
// LISTAR CLIENTE X DNI...
$("#btnBuscarClienteDni").on("click", function() {
    var dni = $("#txtDni").val();
    $.ajax({
        url  : 'controllers/contrato.controller.php',
        type : 'GET',
        data : {
            'operacion' : 'listarDatosClienteXDni',
            'dni'       : dni
        },
        success: function(e) {
            console.log(e);
            if (e != "") {
                var data = JSON.parse(e);
                datosNuevos = false;
                $("#txtNombresCLi").val(data.cliente);
                $("#txtApellidosCli").val(data.dni);
                $("#txtIdCLi").val(data.idcliente);
                $("#txtCodCintilloCli").val(data.codcintillo);
                $("#txtCodSuministroCli").val(data.codsuministro);
                $("#txtDirCLi").val(data.direccion);
                $("#txtReferenciaCli").val(data.referencia);
            }
        }
    });
});

// LISTAR PAGOS X DNI
$("#btnBuscarClienteDni").on("click", function() {
    var dni = $("#txtDni").val();
    $.ajax({
        url : 'controllers/pago.controller.php',
        type: 'GET',
        data: {
            'operacion' : 'listarPagosXDni',
            'dni'       : dni
        },
        success:function (registro) {
            var tabla = $("#tablaPagosXDni").DataTable();
            tabla.destroy();
            $("#listarPagosXdni").html(registro);
            $("#tablaPagosXDni").DataTable(dataTableBasic);
        }
    });
});

// GENERAR REPORTE
$("#listarPagosXdni").on("click", "#botonImprimirCliente", function() {
    dni = $(this).attr("data-dni");
    
    var datos ={
      'operacion' : 'listarDatosClienteXDni',
      'dni' : dni
    }
    window.location.href = "reports/reporteCliente.php?dni=" + dni;
  })
  
