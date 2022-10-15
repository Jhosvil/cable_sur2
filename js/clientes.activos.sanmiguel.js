function renderDataTablelistarClienteSanMiguel(){

    $("#tablaClienteSanMiguel").DataTable({
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
function listarClienteSanMiguel() {
    var datos = {
        'operacion' : 'listarClienteSanMiguel'
    };
    $.ajax({
    url : 'controllers/cliente.controller.php',
    type : 'GET',
    data : datos,
    success: function(e) {
        tabla = $("#tablaClienteSanMiguel").DataTable();
        tabla.destroy();
        $("#listarClienteSanMiguel").html(e);
        renderDataTablelistarClienteSanMiguel();
    }
    });
}
listarClienteSanMiguel();