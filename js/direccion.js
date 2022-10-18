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
        }
      });
    }
  }
});
