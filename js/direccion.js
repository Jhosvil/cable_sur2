var iddireccion = "";

function renderDataTableDirecciones(){
    $("#tablaDirecciones").DataTable({
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

// REGISTRAR DIRECCIONES
$("#btn-guardar-direccion").on('click',function() {
  let direccion = $('#txtDireccion').val();
  if (direccion == "") {
    alert("por favor llene la casilla de direccion");
  }else {
    var datos = {
      'operacion' : 'registrarDireccion',
      'direccion' : direccion
    }
    if (confirm("¿Estas seguro de registrar la direccion : " + direccion + " ?")) {
      $.ajax({
        url : 'controllers/direccion.controller.php',
        type : 'GET',
        data : datos,
        success: function(e) {
          alert("se ah registrado correctamente la direccion : " + direccion);
          listarDirecciones();
        }
      });
    }
  }
});

// LISTAR DIRECCIONES
function listarDirecciones() {
  var datos ={
    'operacion': 'listarDirecciones'
  }
  $.ajax({
    url : 'controllers/direccion.controller.php',
    type : 'GET',
    data : datos,
    success: function(e) {
      var tabla = $("#tablaDirecciones").DataTable();
      tabla.destroy();
      $("#listarDirecciones").html(e);
      renderDataTableDirecciones();
    }
  });
}

// ELIMINAR DIRECCIONES
$("#tablaDirecciones").on('click', '#btn-eliminar-direccion', function() {
  iddireccion = $(this).attr('data-iddireccion');

  var datos ={
    'operacion' : 'eliminarDirecciones',
    'iddireccion' : iddireccion
  };
  if (confirm("¿Estas seguro de eliminar a esta direccion de id : " + iddireccion + " ?")) {
    $.ajax({
      url : 'controllers/direccion.controller.php',
      type : 'GET',
      data : datos,
      success:function(e) {
        alert("Se ah eliminado correctamente a la direccion de id : " + iddireccion);
        listarDirecciones();
      }
    });
  }
});

listarDirecciones();
