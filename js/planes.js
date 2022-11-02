var idplan = "";

// registrar plan 

$("#btnRegistrarPlan").on("click", function(){
    let nombreplan  = $("#txtNombrePlan").val();
    let descripcion = $("#txtDescripcionPlan").val();
    let precio      = $("#txtPrecioPlan").val();

    if (nombreplan == "" ||descripcion == "" ||precio == ""){
        alert("Por favor completelos cuadros faltantes");
    }else{
        var datos = {
            'operacion'     : 'registrarPlanes',
            'nombreplan'    : nombreplan,
            'descripcion'   : descripcion,
            'precio'        : precio
        }
        $.ajax({
            url: 'controllers/plan.controller.php',
            type: 'GET',
            data : datos,
            success: function (e){
                //console.log(e);
                alert("Se ah guardado correctamente");
                listarPlanesActivos();
            }
        });
    }
});
//listar los planes Activos 
function listarPlanesActivos(){
    var datos = {
        'operacion' : 'listarPlanesActivos'
    }
    $.ajax({
        url: 'controllers/plan.controller.php',
        type : 'GET',
        data: datos,
        success: function(e){
            console.log(e);
            var tabla = $("#tablaListarPlanes").DataTable();
            tabla.destroy();
            $("#listarPlanes").html(e);
            $("#tablaListarPlanes").DataTable(dataTableMedium);
        }
    });
}
//eliminar un plan
$('#tablaListarPlanes').on("click","#btneliminarplan",function(){
    idplan = $(this).attr("data-idplan");
    var datos = {
        'operacion'     :'eliminarplanes',
        'idplan'        : idplan
    }
    if (confirm("¿Esta seguro de eliminar este plan?")){
        $.ajax({
            url:'controllers/plan.controller.php',
            type: 'GET',
            data: datos,
            succes:function(e){
                alert('Se elimino correctamente el plan');
                listarPlanesActivos();
            }
        });
    } 
});
// listar un plan
$("#tablaListarPlanes").on("click", "#btnModificarplan", function(){
    idplan = $(this).attr("data-idplan");
    var datos = {
        'operacion' : 'listarUnPlan',
        'idplan' : idplan
    }
    $.ajax({
        url : 'controllers/plan.controller.php',
        type :'GET',
        data :datos,
        success : function(e){
            if (e != ""){
                var data = JSON.parse(e);
                datosNuevos = false;
                $("#txtNombrePlanMod").val(data.nombreplan);
                $("#txtDescripcionPlanMod").val(data.descripcion);
                $("#txtPrecioPlanMod").val(data.precio);
               
            }
        }
    })
})
//modificar plan
$('#btnModificarPlanMod').on("click", function(){
    let nombreplan   = $("#txtNombrePlanMod").val();
    let descripcion  = $("#txtDescripcionPlanMod").val();
    let precio       = $("#txtPrecioPlanMod").val();

    if(nombreplan == ""  || descripcion == "" || precio == "") {
        alert("Por favor llenar los cuadros faltantes");
    }else{
        var datos = {
            'operacion'   : 'modificarplan',
            'idplan'      : idplan,
            'nombreplan'  : nombreplan,
            'descripcion' : descripcion ,
            'precio'      : precio
        }
        if (confirm("¿Estas seguro de Modicar el plan?")) {
            $.ajax({
                url : 'controllers/plan.controller.php',
                type : 'GET',
                data : datos,
                success: function(e) {
                    alert("Se modifico correctamente");
                    listarPlanesActivos();
                }
            });
        }
    }
});
//listar planes Inactivos
function listarPlanesInactivos(){
    var datos = {
        'operacion' : 'listarPlanesInactivos'
    }
    $.ajax({
        url: 'controllers/plan.controller.php',
        type : 'GET',
        data: datos,
        success: function(e){
            console.log(e);
            var tabla = $("#tablaListarPlanes-inactivos").DataTable();
            tabla.destroy();
            $("#listarPlanes-inactivos").html(e);
            $("#tablaListarPlanes-inactivos").DataTable(dataTableMedium);
        }
    });
}
//habilitar un plan inactivo
$('#listarPlanes-inactivos').on("click","#btnHabilitar",function(){
    idplan = $(this).attr("data-idplan");
    var datos = {
        'operacion'     :'habilitarPlanInactivo',
        'idplan'        : idplan
    }
    if (confirm("¿Esta seguro de habilitar este plan?")){
        $.ajax({
            url:'controllers/plan.controller.php',
            type: 'GET',
            data: datos,
            succes:function(e){
                alert('Se habilito correctamente el plan');
                listarPlanesInactivos();
            }
        });
    } 
});

listarPlanesInactivos();
listarPlanesActivos();