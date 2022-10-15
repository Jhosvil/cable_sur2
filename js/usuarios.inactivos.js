var idusuario = "";

function renderDataTableUsuariosInactivos(){

    $("#tablaUsuarioInactivo").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#TableAdminds_wrapper .col-md-6:eq(0)');
    $('#example3').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
}

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
            renderDataTableUsuariosInactivos();                   
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