var idcontrato  = "";   
$("#tabla-contratos").on("click", "#btnRealizarPago", function() {
    idcontrato = $(this).attr("data-idcontrato");
});

// Realizar Pago
$("#btnGuardarPago").on("click", function() {
    let anopago     = $("#txtAñoPago").val();
    let mespago     = $("#txtMesPago").val();
    let netopagar   = $("#txtNetoPagar").val();
    if (anopago == "") {
        alert("Por favor ingrese el año")
    }else if (mespago == "") {
        alert("Por favor ingrese el mes")
    }else if(netopagar == ""){
        alert("por favor ingrese el importe")
    }else{
        var datos ={
            'operacion' : 'registrarPago',
            'idcontrato': idcontrato,
            'mespago'   : mespago,
            'anopago'   : anopago,
            'netopagar' : netopagar
        }

        if (confirm("¿Esta seguro de realizar el pago correspondiente?")) {
            $.ajax({
                url     : 'controllers/pago.controller.php',
                type    : 'GET',
                data    : datos,
                success : function(e){
                    console.log(e);
                    alert("el pago se realizo exitosamente");
                }
            });
        }
    }
});

//listar Pago
function listarPago() {
    var datos = {
        'operacion' : 'listarPagos'
    };
    $.ajax({
        url     : 'controllers/pago.controller.php',
        type    : 'GET',
        data    : datos,
        success:function(e){
            var tabla = $("#tablaPago").DataTable();
            tabla.destroy();
            $("#listaPagos").html(e);
            $("#tablaPago").DataTable(dataTableMedium);
        }
    });
}

//Lista los servicios por categorias
$("#txtMesPagoFilter").change(function (){
    var datos = {
        'operacion'     : 'listarAcreedores',
        'mespago'         : $(this).val()
    };
    console.log($(this).val());

    $.ajax({
        url: 'controllers/pago.controller.php',
        type: 'GET',
        data: datos,
        success: function (e){
            var tabla = $("#tablaPago").DataTable();
            tabla.destroy();
            $("#listaPagos").html(e);
            $("#tablaPago").DataTable(dataTableMedium);
        }
    });
});
listarPago();