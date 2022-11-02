var idusuario = "";


// LISTAR USUARIOS
function listarUsuariosInactivos(){
    var datos = {
        'operacion' : 'listarUsuarioInactivo'
    }
    $.ajax({
        url : 'controllers/usuario.controller.php',
        type : 'GET',
        data : datos,
        success: function(e){
             //console.log(e);
            var tabla = $("#tablaUsuarioInactivo").DataTable();
            tabla.destroy();
            $("#listarUsuarioInactivo").html(e);
            $("#tablaUsuarioInactivo").DataTable(dataTableMedium);                   
        }
    });
}

// HABILITAR A U USUARIO QUE ESTE INACTIVO
$("#tablaUsuarioInactivo").on("click", "#btnHabilitarUsuario", function(){
    idusuario = $(this).attr("data-idusuario");
    var datos = {
        'operacion' : 'habilitarUsuarioInactivo',
        'idusuario' : idusuario
    }
    $.ajax({
        url : 'controllers/usuario.controller.php',
        type : 'GET',
        data : datos,
        success: function(e){
            alert('Se habilito correctamente a este usuario');
            listarUsuariosInactivos();
        }
    });
});

listarUsuariosInactivos();