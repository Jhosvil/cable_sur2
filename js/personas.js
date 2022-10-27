var idpersona = "";

function renderDataTablePersonas(){
    $("#table-personas").DataTable({
    "order": [[0, 'desc']],
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })//.buttons().container().appendTo('#TableAdminds_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //     "paging": true,
    //
    //     "lengthChange": false,
    //     "searching": false,
    //     "order": [[1, "desc"]],
    //     "ordering": true,
    //     "info": true,
    //     "autoWidth": false,
    //     "responsive": true,
    // });
}

// LISTAR DEPARTAMENTOS
function listarDepartamentos() {
    //Enviar datos por ajax, usando el metodo GET
    $.ajax({
        url:    'controllers/ubigeo.controller.php',
        type:   'GET',
        data:   'operacion=listarDepartamentos',
        success: function (e){
        //Renderizar las etiquetas que vienen desde controllers
        $("#txtDepartamento").html(e); //html e Inyecta nuenvas etiquetas e
        }
    }); // Fin ajax
}

// LISTAR PROVINCIAS
$("#txtDepartamento").change( function (){
    var datos = {
        'operacion'         : 'listarProvincias',
        'iddepartamento'    : $(this).val()
    };
    //console.log($(this).val());
    $.ajax({
        url: 'controllers/ubigeo.controller.php',
        type: 'GET',
        data: datos,
        success: function (e){
            //Renderizar etiquetas que vienen desde controllers
            $("#txtProvincia").html(e);
        }
    });
});

// LISTAR DISTRITOS
$("#txtProvincia").change( function (){
    var datos = {
        'operacion' : 'listarDistritos',
        'idprovincia' : $(this).val()
    };
    $.ajax({
        url: 'controllers/ubigeo.controller.php',
        type: 'GET',
        data: datos,
        success: function (e){
            //console.log(e);
            $("#txtDistrito").html(e);
        }
    });
});

//LISTAR PERSONAS
function listarPersonas() {
    var datos = {
        'operacion' : 'listarPersona'
    }
    $.ajax({
        url : 'controllers/persona.controller.php',
        type : 'GET',
        data: datos,
        success: function(e) {
            var tabla = $("#table-personas").DataTable();
            tabla.destroy();
            $("#listarPersona").html(e);
            renderDataTablePersonas();
        }
    });
}

// GUARDA PERSONAS
$(".btn-Guardar-Persona").on("click", function() {
    let iddistrito  = $("#txtDistrito").val();
    let nombres   = $("#txtNombresPersona").val();
    let apellidos = $("#txtApellidosPersona").val();
    let dni       = $("#txtDniPersona").val();
    let telefono  = $("#txtTelefonoPersona").val();
    let email     = $("#txtEmailPersona").val();

    if (iddistrito == "" ||nombres == "" || apellidos == "" || dni == "" || telefono == "") {
        alert("por favor complete los campos que falte");
    }else {
        var datos = {
            'operacion' : 'registrarPersona',
            'iddistrito' : iddistrito,
            'nombres'  : nombres,
            'apellidos': apellidos,
            'dni'     : dni,
            'telefono' : telefono,
            'email'   : email
        }
        $.ajax({
            url : 'controllers/persona.controller.php',
            type : 'GET',
            data : datos,
            success: function(e) {
                alert("se guardo correctamente");
                listarPersonas();
            }
        });
    }
});

//LISTA UN DATO PERSONAS
$("#table-personas").on("click", "#btnModificarPersona", function() {
    idpersona = $(this).attr("data-idpersona");

    $.ajax({
        url  : 'controllers/persona.controller.php',
        type : 'GET',
        data : 'operacion=listarOneDatoPersona&idpersona='+ idpersona,
        success: function(e) {
            if (e != "") {
                var data = JSON.parse(e);
                datosNuevos = false;
                $("#txtNombresPersonaMod").val(data.nombres);
                $("#txtApellidosPersonaMod").val(data.apellidos);
                $("#txtDniPersonaMod").val(data.dni);
                $("#txtTelefonoPersonaMod").val(data.telefono);
                $("#txtEmailPersonaMod").val(data.email);
            }
        }
    });
})

//MODIFICAR UN DATO
$(".btn-mod-Persona").on("click", function() {
    let nombres = $("#txtNombresPersonaMod").val();
    let apellidos = $("#txtApellidosPersonaMod").val();
    let dni = $("#txtDniPersonaMod").val();
    let telefono = $("#txtTelefonoPersonaMod").val();
    let email = $("#txtEmailPersonaMod").val();

    if (nombres == "" || apellidos == "" || dni == "" || telefono == "") {
        alert("por favor llene los campos");
    }else {
        var datos = {
            'operacion' : 'modificarPersona',
            'idpersona' : idpersona,
            'nombres' : nombres,
            'apellidos' : apellidos,
            'dni' : dni,
            'telefono' : telefono,
            'email' : email
        }
        if (confirm("¿Estas seguro de Modicar a esta persona?")) {
            $.ajax({
                url : 'controllers/persona.controller.php',
                type : 'GET',
                data : datos,
                success: function(e) {
                    alert("Se modifico correctamente");
                    listarPersonas();
                }
            });
        }
    }
});

  //GUARDAR USUARIO
$("#table-personas").on("click", "#btnAñadirUsuario" , function(){
    idpersona           = $(this).attr("data-idpersona");
    $(".btn-añadir-usuario").on("click", function(){
        let nombreusuario   = $("#txtNombreUsuario").val();
        let claveacceso     = $("#txtClaveAcceso").val();
        let rol             = $("#txtrolUsu").val();

        alert(idpersona);

        if (nombreusuario == "" || claveacceso == "" || rol == "") {
            alert("Por favor complete los datos faltantes");
        }else{
            var datos = {
                'operacion' : 'registrarUsuario',
                'idpersona' : idpersona,
                'nombreusuario' : nombreusuario,
                'claveacceso' : claveacceso,
                'rol'         : rol
            }
            $.ajax({
                url  : 'controllers/persona.controller.php',
                type : 'GET',
                data : datos,
                success: function(e){
                //console.log(e);
                alert("Se guardo correctamente");
                }
            });
        }
    });
});

  // ASIGNAR CLIENTE
$("#table-personas").on("click", "#btnAñadirCliente", function() {
    idpersona = $(this).attr("data-idpersona");
    var datos = {
        'operacion' : 'registrarCliente',
        'idpersona' : idpersona
    }
    if (confirm("¿Estas seguro de asignar a esta persona como cliente?")) {
        $.ajax({
            url : 'controllers/cliente.controller.php',
            type : 'GET',
            data : datos,
            success: function(e){
                alert("Se Asigno correctamente a esta persona como cliente");
            }
        });
    }
});

listarDepartamentos();
listarPersonas();
