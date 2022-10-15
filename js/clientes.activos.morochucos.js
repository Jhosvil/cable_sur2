function renderDataTablelistarClienteMorochucos(){
    $("#tablaClienteMorochucos").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })//.buttons().container().appendTo('#TableAdminds_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "order": [[1, "desc"]],
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    });
}

function listarClienteMorochucos() {
    var datos = {
    'operacion' : 'listarClienteMorochucos'
    }
    $.ajax({
        url : 'controllers/cliente.controller.php',
        type: 'GET',
        data : datos,
        success : function(e) {
            var tabla = $("#tablaClienteMorochucos").DataTable();
            tabla.destroy();
            $("#listarClienteMorochucos").html(e);
            renderDataTablelistarClienteMorochucos();
        }
    });
}

listarClienteMorochucos();