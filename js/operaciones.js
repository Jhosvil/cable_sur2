var idcontrato = "";

// CAPTURAMOS EL ID DEL CONTRATO
$("#tabla-contratos").on("click", "#btnOperacion", function() {
    idcontrato = $(this).attr("data-idcontrato");
});

// CREAMOS UN EVENTO CLICK PARA MADAR LOS DATOS POR EL AJAX AL CONTROLADOR
$("#btnGuardarOperacion").on("click", function(){
    let materialesretirados = $("#txtMaterialesRetirados").val();
    let materialesusados    = $("#txtMaterialesUsados").val()
    let tipooperacion       = $("#txttipooperacion").val();
    let fechahora           = $("#txtfechOper").val();

    if (fechahora == "") {
        alert("ingrese la fecha");
    }else{
        var datos = {
            'op'                    : 'registrarOperacion',
            'idcontrato'            : idcontrato,
            'tipooperacion'         : tipooperacion,
            'fechahora'             : fechahora,
            'materialesretirados'   : materialesretirados,
            'materialesusados'      : materialesusados
        }
        $.ajax({
            url: 'controllers/operaciones.controller.php',
            type: 'GET',
            data: datos,
            success: function(e){
                console.log(e);
                alert("Se ah guardo correctamente");
            }
        });
    }
    
});

// FUNCION PARA LISTAR LOS DATOS DE LA TABLA OPERACIONES DESDE LA BD
function listarOperaciones() {
    var datos = {
        'op' : 'listarOperacion'
    }
    $.ajax({
        url     : 'controllers/operaciones.controller.php',
        type    : 'GET',
        data    : datos,
        success: function(e) {
            var tabla = $("#tabla-operaciones").DataTable();
            tabla.destroy();
            $("#listar-operaciones").html(e);
            $("#tabla-operaciones").DataTable(dataTableMedium);
        }
    });
}

listarOperaciones();