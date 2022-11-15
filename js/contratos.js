var idcontrato = "";

//LISTAR CONTRATOS ACTIVOS
function listarContratosActivos() {
  var datos ={
    'operacion' : 'listarContratos'
  }
  $.ajax({
    url : 'controllers/contrato.controller.php',
    type: 'GET',
    data : datos,
    success: function(e) {
      var tabla = $("#tabla-contratos").DataTable();
      tabla.destroy();
      $("#listar-Contratos").html(e);
      $("#tabla-contratos").DataTable(dataTableMedium);
    }
  });
}

// VER MAS DETALLE EL CONTRATO
$("#tabla-contratos").on("click", "#btnVerContrato", function () {
  idcontrato = $(this).attr("data-idcontrato");
  var datos = {
    'operacion' : 'listarUnContrato',
    'idcontrato' : idcontrato
  }
  $.ajax({
    url : 'controllers/contrato.controller.php',
    type : 'GET',
    data: datos,
    success: function(e) {
      if (e != "") {
        var data = JSON.parse(e);
        datosNuevos = false;
        //Primer Grupo
        $("#txtApeCli").val(data.apellidoCli);
        $("#txtDniCli").val(data.dniCli);
        $("#txtDistCli").val(data.distritoCli);
        $("#txtEmailCli").val(data.emailCli);
        $("#txtNomCli").val(data.nombreCli)
        $("#txtTelCli").val(data.telefonoCli);
        $("#txtDirCli").val(data.direccliente);
        $("#txtRefCli").val(data.referencia);

        //Segundo Grupo
        $("#txtNomPlan").val(data.nombreplan);
        $("#txtPrecPlan").val(data.precio);
        $("#txtFechIni").val(data.fechainicio);
        $("#txtDiaPag").val(data.diapago);
        $("#txtDescipPlan").val(data.descripcion);
        $("#txtCodCinti").val(data.codcintillo);
        $("#txtFechTerm").val(data.fechatermino);
        $("#txtAnexo").val(data.anexo);

        // Tercer Grupo
        $("#txtApeUsu").val(data.apellidoUsu);
        $("#txtDniUsu").val(data.dniUsu);
        $("#txtRolUsu").val(data.rolUsu);
        $("#txtNomUsu").val(data.nombresUsu);
        $("#txtTelUsu").val(data.telefonoUsu);
        $("#txtMailUsu").val(data.emailUsu)
      }
    }
  });
});


// GENERAR REPORTE
$("#tabla-contratos").on("click", "#btnImprimirContrato", function() {
  idcontrato = $(this).attr("data-idcontrato");
  
  var datos ={
    'operacion' : 'listarUnContrato',
    'idcontrato' : idcontrato
  }
  window.location.href = "reports/reporte.php?idcontrato=" + idcontrato;
})

//CULMINAR UN CONTRATO
$("#tabla-contratos").on("click", "#btnConcluirContrato", function() {
  idcontrato = $(this).attr('data-idcontrato');
  var datos = {
    'operacion'   : 'culminarContrato',
    'idcontrato'  :   idcontrato
  }
  if (confirm("¿Estas seguros de culminar?")){
    $.ajax({
      url : 'controllers/contrato.controller.php', 
      type: 'GET',
      data: datos,
      success :function(e){
        alert('se culmino correctamente');
        listarContratosActivos();
      }
    });
  }
});

listarContratosActivos();
