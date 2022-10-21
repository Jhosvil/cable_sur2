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
                console.log(e);
                alert("Se ah guardado correctamente");
            }
        });
    }
});