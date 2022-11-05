var idusuario = "";
var datosNuevos = "";

// LISTAR USUARIOS
function listarUsuarios(){
    var datos = {
        'operacion' : 'listarUsuario'
    }
    $.ajax({
        url : 'controllers/usuario.controller.php',
        type : 'GET',
        data : datos,
        success: function(e){
            //console.log(e);
            var tabla = $("#tablaUsuario").DataTable();
            tabla.destroy();
            $("#listarUsuario").html(e);
            $("#tablaUsuario").DataTable(dataTableMedium);
        }
    });
}

// LISTAR ONE USUARIO
$("#tablaUsuario").on("click", "#btnModificarUsuario", function(){
    idusuario = $(this).attr("data-idusuario");
    var datos = {
        'operacion' : 'listarOneDatoUsuario',
        'idusuario' : idusuario
    }
    $.ajax({
        url : 'controllers/usuario.controller.php',
        type : 'GET',
        data : datos,
        success : function(e){
            if (e != "") {
                var data = JSON.parse(e);
                datosNuevos = false;
                $("#txtCargoUsuario").val(data.rol);
            }
        }
    });
});

// MODIFICAR USUARIOS
$(".btn-mod-usuario").on("click", function(){
    let rol = $("#txtRolUsuario").val();
    if (rol == "") {
        alert("Por favor llene el campo");
    }else{
        var datos = {
            'operacion' : 'modificarUsuario',
            'idusuario' : idusuario,
            'rol'       : rol
        }
        if (confirm("¿Estas seguro de Modifiacar a este Usuario?")) {
            $.ajax({
                url : 'controllers/usuario.controller.php',
                type : 'GET',
                data : datos,
                success: function(e){
                    alert("Se modifico correctamente");
                    listarUsuarios();
                }
            });
        }
    }
});

// INABILITAR UN USUARIO
$('#tablaUsuario').on("click", "#btnDesabilitarUsuario",function(){
    idusuario = $(this).attr("data-idusuario");

    var datos ={
        'operacion' : 'inabilitarUsuario',
        'idusuario' : idusuario
    }
    if (confirm("¿Estas seguro de inabilitar a este usuario?")) {
        $.ajax({
            url  : 'controllers/usuario.controller.php',
            type : 'GET',
            data : datos,
            success:function(e){
                alert('Se inabilito correctamente a este usuario');
                listarUsuarios();
            }
        });            
    }
});

listarUsuarios();