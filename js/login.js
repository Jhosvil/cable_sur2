$(".btn-ingresar-login").on('click', function() {
    let nombreusuario  = $("#txtnombreusuario").val();
    let claveacceso    = $("#txtcontraseña").val();

    if (nombreusuario == "" || claveacceso == "") {
        alert("por favor ingrese los campos");
    }else {
        var datos = {
        'operacion' : 'login',
        'nombreusuario' : nombreusuario,
        'claveacceso' : claveacceso
        };
        $.ajax({
            url : 'controllers/usuario.controller.php',
            type : 'GET',
            data : datos,
            success: function(e) {
                if (e !="") {
                //Al ser diferente de vacio, Se entiende que hay un error
                alert(e);
                }else {
                    window.location.href= "main.php";
                }
            }
        });
    }
});